<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Your Status') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <form action="{{ route('statuses.update', $status->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <x-label for="body">Status</x-label>
                            <x-input class="mt-2 w-full" type="text" name="body" id="body" value="{{ old('body', $status->body) }}"></x-input>
                            @error('body')
                                <div class="text-red-500 mt-2 text-sm" >{{ $message }}</div>
                            @enderror
                        </div>
                        <x-button class="text-right">Update</x-button>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>