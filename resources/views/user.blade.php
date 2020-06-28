@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    User Page.
                    
                    @foreach($users as $user)
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                {{$user->name}}
                                {{$user->surname}}
                                {{$user->addinfo}}
                                @foreach($user->roles as $role)
                                    <small class="text-muted">{{$role->name}}</small>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection