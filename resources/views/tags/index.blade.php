@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success">Add Tag</a>
</div>

<div class="card card-default">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @if ($tags->count() > 0)
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Posts</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td class="text-right">
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4 class="text-center">No Tags Yet</h4>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteLabelModel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletetagForm">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteLabelModel">Delete tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">Are you sure you want to delete this tag?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            const form = document.getElementById('deletetagForm');
            form.action = `/tags/${id}`;
            $('#deleteModel').modal('show');
        }
    </script>
@endsection
