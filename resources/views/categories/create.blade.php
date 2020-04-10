@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header d-flex align-items-center">
        <a href="{{ route('categories.index') }}">
            @include('partials.back')
        </a>
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>
    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
            method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($category) ? 'Update Category' : 'Add Category' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
