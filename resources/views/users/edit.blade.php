<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Your Profile Information') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <form action="{{ route('profile.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <x-label for="name">Name</x-label>
                            <x-input class="mt-2 w-full" type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"></x-input>
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="username">Username</x-label>
                            <x-input class="mt-2 w-full" type="text" name="username" id="username" value="{{ old('username', Auth::user()->username) }}"></x-input>
                            @error('username')
                                <div class="text-red-500 mt-2 text-sm" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="email">Email</x-label>
                            <x-input class="mt-2 w-full" type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"></x-input>
                            @error('email')
                                <div class="text-red-500 mt-2 text-sm" >{{ $message }}</div>
                            @enderror
                        </div>
                        <x-button>Update</x-button>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>