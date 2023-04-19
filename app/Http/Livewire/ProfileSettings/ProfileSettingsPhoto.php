<?php

namespace App\Http\Livewire\ProfileSettings;

use Livewire\Component;
use Livewire\WithFileUploads;

use Intervention\Image\ImageManagerStatic;

use Storage;

class ProfileSettingsPhoto extends Component
{
    use WithFileUploads;

    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function update_profile_photo()
    {

        $user = auth()->user();

        if(!$this->image) {
            $this->dispatchBrowserEvent('process-swall', ['type' => 'warning', 'title' => 'Nav izvēlēta bilde!']);
        } else {

            // $this->validate([
            //     'img' =>  'required|image|mimes:jpg,jpeg,png|max:1024',
            // ]);

            if ($user->profila_bilde != 'default.jpg') {
                $destination = 'public/images/users/'.$user->profila_bilde;
                if(Storage::exists($destination)) {
                    Storage::delete($destination);
                }
            }

            $img = ImageManagerStatic::make($this->image)->encode('jpg');
            $filename = time() . '.jpg';
            Storage::put('public/images/users/'.$filename, $img);

            $user->update([
                'profila_bilde' => $filename,
            ]);

            $this->dispatchBrowserEvent('process-swall', ['type' => 'success', 'title' => 'Profila bilde veiksmīgi atjaunota!']);
        }
    }

    public function delete_profile_photo()
    {
        $user = auth()->user();

        if ($user->profila_bilde != 'default.jpg') {
            $destination = 'public/images/users/'.$user->profila_bilde;
            if(Storage::exists($destination)) {
                Storage::delete($destination);
            }
            $this->dispatchBrowserEvent('process-swall', ['type' => 'success', 'title' => 'Profila bilde tika dzēsta']);
            $user->update([
                'profila_bilde' => 'default.jpg',
            ]);
        } else {
            $this->dispatchBrowserEvent('process-swall', ['type' => 'error', 'title' => 'Kļūda']);
        }
    }

    public function render()
    {
        return view('livewire.profile-settings.profile-settings-photo');
    }
}