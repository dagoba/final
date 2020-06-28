{!! Form::open([]) !!}

@csrf
<div class="container">
    <div class="form-check">
        {{ Form::label('name', 'Choose doctor', ['class' => 'control-label mt-3']) }}
        {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Enter Your Name']) }}
    </div>

    <div class="form-check">
            {{ Form::label('city', 'Choose visit date', ['class' => 'control-label mt-3']) }}
            {{ Form::text('date', '9 - 18', ['class' => 'datepicker']) }}
    </div>

<div class="row justify-content-center mt-3">
    <div class="col-sm-6">
        <button class="btn btn-block btn-success" type="submit">Make record</button>
    </div>
</div>

{!! Form::close() !!}