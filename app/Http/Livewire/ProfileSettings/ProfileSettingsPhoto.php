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
            return null;
        } else {

            $this->validate([
                'image.*' =>  'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

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

            session()->flash('photo_success');

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

            $user->update([
                'profila_bilde' => 'default.jpg',
            ]);

            session()->flash('delete_photo_success');

        } else {
            return null;
        }
    }

    public function render()
    {
        return view('livewire.profile-settings.profile-settings-photo');
    }
}