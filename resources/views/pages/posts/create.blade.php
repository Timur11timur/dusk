@extends('welcome')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="p-8 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <form action="{{ route('posts.store') }}">
                @csrf
                <div class="px-6 py-1 w-full bg-gray-400 bg-current border border-b-2 border-gray-900"><h1>Create Post</h1></div>
                <div>
                    <input type="text" name="title" required>
                    <textarea name="text"></textarea>
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
