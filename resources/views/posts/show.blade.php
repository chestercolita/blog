<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10 px-10">
                @if($photo = $post->photo)
                    <div class="my-4 flex justify-center">
                        <img src="{{ $photo->url }}" alt="" width="500" height="600">
                    </div>
                @endif
                <h1 class="flex font-semibold text-xl text-gray-800 leading-tight justify-center">
                    {{ __($post->title) }}
                </h1>
                <div class="flex justify-center mb-6">by {{ $post->user->name }}</div>
                <div class="flex justify-center">
                    <a href="{{ route('posts.edit', $post->id) }}"
                       class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white
                       uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
                       disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __("  Edit  ")  }}
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-jet-danger-button type="submit" href="{{ route('posts.edit', $post->id) }}" class="ml-4">Delete</x-jet-danger-button>
                    </form>
                </div>
                <div class="d-block mx-6 mt-12">
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
