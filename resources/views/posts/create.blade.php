@extends('layouts.master')


@section('content')

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h3 class="text-2xl font-semibold mb-6 text-center">Post</h3>
        <form action="{{ isset($post) ? url('store/post/' . $post->id) : url('store/post') }}" method="POST">
            @csrf
            <label for="title" class="block mb-2 font-medium">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ $post->title ?? '' }}"
                class=" form-control w-full px-3 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-green-400"
                placeholder="Title">

            <label for="description" class="block mb-2 font-medium">Description</label>
            <textarea
                name="description"
                id="description"
                class="form-control w-full px-3 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-green-400"
                placeholder="Description">{{ $post->description ?? '' }}</textarea>

            <button
                type="submit"
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                {{ isset($post) ? 'Update' : 'Create' }} Post
            </button>
        </form>
    </div>
</div>
@endsection