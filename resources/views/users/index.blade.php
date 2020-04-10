@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Users</div>

    <div class="card-body">
        @if ($users->count() > 0)
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email) }}"
                                    style="border-radius: 50%" width="40px" height="40px" alt="Image"/>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!$user->isAdmin())
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4 class="text-center">No Users Yet</h4>
        @endif
    </div>
</div>

@endsection
