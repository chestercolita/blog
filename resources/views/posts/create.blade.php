<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5 px-10">
                <form method="POST" action="/posts">
                    @csrf

                    <div class="mt-4">
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}" required/>
                        @error('title')
                            <div class="text-sm alert-danger alert text-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="content" value="{{ __('Content') }}" />
                        <textarea id="content" class="block mt-1 w-full form-input rounded-md shadow-sm" type="text" name="content" rows="10" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-sm alert-danger alert text-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Submit') }}
                        </x-jet-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
