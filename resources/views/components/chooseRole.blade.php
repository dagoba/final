{!! Form::open(['route' => 'home.store', 'method' => 'post']) !!}

@csrf
<div class="container">
    <div class="form-check">
        {{ Form::radio('chooseRole', '3', null, ['class' => 'form-check-input', 'id' => 'exampleRadios1']) }}
        {{ Form::label('pacientBtn', 'A Pacient.', ['class' => 'form-check-label']) }}
    </div>

    <div class="form-check">
        {{ Form::radio('chooseRole', '4', null, ['class' => 'form-check-input', 'id' => 'exampleRadios2']) }}
        {{ Form::label('doctorBtn', 'A Doctor.', ['class' => 'form-check-label']) }}
    </div>
</div>

<div class="row justify-content-center mt-3">
        <div class="col-sm-6">
            <button class="btn btn-block btn-success" type="submit">Choose Role</button>
        </div>
    </div>
{!! Form::close() !!}