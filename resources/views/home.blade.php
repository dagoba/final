@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row mb-4">

                        <div class="col-sm-4">
                            You are logged in!
                        </div>

                    </div>

                        @if(Auth::user()->hasRole('user'))

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <h3>Please, choose who you are?</h3>

                                @component('components.chooseRole')
                                @endcomponent
                            </div>
                        </div>
                            
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
