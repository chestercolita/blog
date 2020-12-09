<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Posts') }}
            <a href="{{ route('posts.create') }}"
               class="ml-4 px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white
                   hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">
                Create Post
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10 px-10">
                <ul>
                @foreach($posts as $post)
                    <li class="py-4">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                            <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a>
                        </h2>
                        <div class="mx-5">{{ $post->content }}</div>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
