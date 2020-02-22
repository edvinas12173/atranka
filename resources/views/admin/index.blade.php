@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Admin dashboard
                    </div>
                    <div class="card-body">
                        @if(count($users) > 0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v text-primary"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="/admin/{{$user->id}}/edit">Edit</a>
                                                    {!! Form::open(['action' => ['AdminController@destroy', $user->id], 'method' => 'POST']) !!}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', ['class' => 'dropdown-item']) }}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            Users not found!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

