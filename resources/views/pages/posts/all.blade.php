@extends('welcome')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="p-8 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="px-6 py-1 w-full bg-gray-400 bg-current border border-b-2 border-gray-900"><h1>Posts</h1></div>
            <div class="">
                <ul>
                    @foreach($posts as $post)
                        <li>
                            <a class="underline text-blue-600" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a> <p class="text-right">by {{ $post->user->name }}</p>
                        </li>
                    @endforeach
                </ul>
                @auth
                    <a href="{{ route('posts.create') }}">Create Post</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
