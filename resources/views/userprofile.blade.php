@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                @if(Auth::user()->hasRole('patient'))
                    Patient
                @elseif (Auth::user()->hasRole('doctor'))
                    Doctor
                @endif
                Dashboard</div>

                <div class="card-body">

                        <div class="row">
                            <div class="cal-sm-12">
                                <p><strong>Your name:</strong> {{ $userProfile->name }}</p>
                                <p><strong>Your surname:</strong> {{ $userProfile->surname }}</p>
                                <p><strong>City \ Address:</strong> {{ $userProfile->city }}</p>
                                <p><strong>Additional information:</strong> {{ $userProfile->addinfo }}</p>
                                <p>
                                @if(Auth::user()->hasRole('patient'))
                                    <strong>Birthdate:</strong> {{ $userProfile->birthdate }}
                                @elseif (Auth::user()->hasRole('doctor'))
                                    <strong>Working hours: {{ $userProfile->birthdate }}</strong>
                                @endif
                                </p>
                            </div>
                        </div>

                        <hr>

                        @if(Auth::user()->hasRole('patient'))

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <h3>Please, update your medical card.</h3>

                                @component('components.clientProfile')
                                @endcomponent
                            </div>
                        </div>

                        @elseif (Auth::user()->hasRole('doctor'))

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <h3>Please, update your doctor info.</h3>

                                @component('components.doctorProfile')
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
