@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>What did you eat?</h2>
            @if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <P>{{$error}}</P>
                @endforeach
            </div>
            @endif

            {{ Form::open(array('route' => 'entries.store')) }}

            <div class="form-group">
                {{ Form::label('food', 'Food') }}
                {{ Form::text('food', Input::old('food'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('calories', 'Calories') }}
                {{ Form::input('number','calories', Input::old('calories'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('fats', 'Fats') }}
                {{ Form::input('number','fats', Input::old('fats'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('carbohydrates', 'Carbohydrates') }}
                {{ Form::input('number','carbohydrates', Input::old('carbohydrates'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('proteins', 'Proteins') }}
                {{ Form::input('number','proteins', Input::old('proteins'), array('class' => 'form-control')) }}
            </div>
    		

            <div class="form-actions">
                {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                <a href="{{ URL::route('entries.index') }}" class="btn btn-large">Cancel</a>
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop