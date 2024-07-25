<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="container d-flex justify-content-center bg-white dark:bg-gray-800 shadow pb-3">
                <div>
                    <div>
                        <img src="{{ asset('assets/imgs/user') }}/{{ Auth::user()->photo }}" alt="" width="200" style="border: solid 1px white; border-radius: 500px; margin: 10px 10px;">
                    </div>
                    <div class="pb-3">
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="p-4 sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
                <div class="p-4 sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                <div class="p-4 sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
