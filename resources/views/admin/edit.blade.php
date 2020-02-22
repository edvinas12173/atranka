@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit {{$user->name}}
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action' => ['AdminController@update', $user->id], 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">User role</label>
                                        <select class="form-control" name="role">
                                            <option value="{{$user->role}}">{{$user->role}}</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
