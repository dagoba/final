{!! Form::open([]) !!}

@csrf
<div class="container">
    <div class="form-check">
        {{ Form::label('name', 'Your Name', ['class' => 'control-label mt-3']) }}
        {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Enter Your Name']) }}
    </div>

    <div class="form-check">
            {{ Form::label('surname', 'Your Surname', ['class' => 'control-label mt-3']) }}
            {{ Form::text('surname', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Enter Your Surname']) }}
    </div>

    <div class="form-check">
            {{ Form::label('speciality', 'Your Speciality', ['class' => 'control-label mt-3']) }}
            {{ Form::text('speciality', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Enter Your Speciality']) }}
    </div>

    <div class="form-check">
            {{ Form::label('city', 'Your Working date', ['class' => 'control-label mt-3']) }}
            {{ Form::text('workingdate', '9 - 18', ['class' => 'datepicker']) }}
    </div>

    <div class="form-check">
            {{ Form::label('Info About You', 'Comment', ['class' => 'control-label mt-3']) }}
            {{ Form::textarea('addinfo', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Enter additional info about You']) }}
        </div>
    </div>

<div class="row justify-content-center mt-3">
    <div class="col-sm-6">
        <button class="btn btn-block btn-success" type="submit">Update</button>
    </div>
</div>

{!! Form::close() !!}