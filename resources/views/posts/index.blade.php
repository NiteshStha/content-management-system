@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Add Posts</a>
</div>

<div class="card card-default">
    <div class="card-header">Posts</div>

    <div class="card-body">
        @if ($posts->count() > 0)
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><img src="{{ asset('/storage/'.$post->image) }}" width="120px" height="80px" alt="Image"/></td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $post->category_id) }}">
                                    {{ $post->category->name }}
                                </a>
                            </td>
                            <td>
                                @if ($post->trashed())
                                    <form class="d-inline-block" action="{{ route('posts.restore', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Restore
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                @endif
                            </td>
                            <td>
                                <form class="d-inline-block" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4 class="text-center">No Posts Yet</h4>
        @endif
    </div>
</div>

@endsection
