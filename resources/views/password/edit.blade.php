<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Change Your Password') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <form action="{{ route('password.change') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <x-label for="current_password">Current Password</x-label>
                            <x-input class="mt-2 w-full" type="password" name="current_password" id="current_password"></x-input>
                            @error('current_password')
                                <div class="text-red-500 mt-2 text-sm" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="password">New Password</x-label>
                            <x-input class="mt-2 w-full" type="password" name="password" id="password"></x-input>
                            @error('password')
                                <div class="text-red-500 mt-2 text-sm" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="password_confirmation">Confirm Password</x-label>
                            <x-input class="mt-2 w-full" type="password" name="password_confirmation" id="password_confirmation"></x-input>
                            @error('password_confirmation')
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