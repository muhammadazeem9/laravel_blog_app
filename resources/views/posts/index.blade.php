@extends('layouts.master')

@section('content')
<h1 class="text-center mt-2">Welcome! to blog App</h1>

<div class="text-center pt-2">
    <a href="{{url('create/post')}}"><button class="btn btn-info">Create New <i class="bi bi-pencil-square"></i></button></a>
</div>


<div class=" mt-3 d-flex justify-content-center align-items-center">
    <div class="card shadow w-100" style="max-width: 960px;">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Posts List</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td style="white-space: pre-line;">{{ $post->description }}</td>
                        <td>
                            <a href="{{url('edit/post/' .$post->id)}}" class="btn btn-warning"> <i class="bi bi-pencil"></i></a>


                            <form action="{{ url('delete/post/' .$post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection