@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <P>{{$error}}</P>
                @endforeach
            </div>
            @endif

            {{ Form::model($food, array('route' => array('foods.update', $food->id), 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name', $food->name), array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('serving', 'Serving Size') }}
                {{ Form::input('number', 'serving', Input::old('serving', $food->serving_size), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('calories', 'Calories') }}
                {{ Form::input('number','calories', Input::old('calories', $food->calories), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('fats', 'Fats') }}
                {{ Form::input('number','fats', Input::old('fats', $food->fats), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('carbohydrates', 'Carbohydrates') }}
                {{ Form::input('number','carbohydrates', Input::old('carbohydrates', $food->carbohydrates), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('proteins', 'Proteins') }}
                {{ Form::input('number','proteins', Input::old('proteins', $food->proteins), array('class' => 'form-control')) }}
            </div>
    		

            <div class="form-actions">
                {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                <a href="{{ URL::route('foods.index') }}" class="btn btn-large">Cancel</a>
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop