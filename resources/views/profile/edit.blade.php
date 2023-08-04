<x-app-layout>

    <x-slot:title> Sukema - Profile</x-slot>
    <x-slot:description>Sistem Pengarsipan Surat Keluar & Surat Masuk</x-slot>

    @pushOnce('styles')
        {{-- Custom CSS --}}
        <link rel="stylesheet" href="/assets/vendors/dropify/dist/css/dropify.min.css">
    @endPushOnce

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    @pushOnce('scripts')
        <script src="/assets/vendors/dropify/dist/js/dropify.min.js"></script>

        <script>
                $('.dropify').dropify();
        </script>
    @endPushOnce
</x-app-layout>
