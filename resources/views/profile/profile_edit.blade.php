@extends('layouts.app')

@section('title')
    {{ 'Profila iestatījumi' }}
@endsection

@section('content')
    <div class="section-min-height color-2 flex w-full flex-col items-center pt-[50px] pb-[100px]">
        <h2 class="mb-[50px] text-[25px] font-semibold tracking-wide">Profila iestaījumi</h2>
        <div class="flex w-[1200px] flex-col max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%]">
            <div class="flex justify-between max-md:flex-col">
                @livewire('profile-settings.profile-settings-base')
                @livewire('profile-settings.profile-settings-photo')
            </div>
            @livewire('profile-settings.profile-settings-password')
            @livewire('profile-settings.profile-settings-additional')
        </div>
    </div>
    <script>
        window.addEventListener('process-swall', event => {
            let type = event.detail.type;
            let title = event.detail.title;
            let icon = type;
            Swal.fire({
                title,
                icon,
                confirmButtonColor: '#2b6777',
            });
        });
        window.livewire.on('fileChoosen', () => {

            let file = document.getElementById('image').files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUpload', reader.result);
            }

            reader.readAsDataURL(file);

        });
    </script>
@endsection
