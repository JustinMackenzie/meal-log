@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Make a mistake?</h2>
            @if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <P>{{$error}}</P>
                @endforeach
            </div>
            @endif

            {{ Form::model($entry, array('route' => array('entries.update', $entry->id), 'method' => 'PUT')) }}

            <div class="control-group">
                {{ Form::label('food', 'Food') }}
                {{ Form::text('food', Input::old('food', $entry->food), array('class' => 'form-control')) }}
            </div>

            <div class="control-group">
                {{ Form::label('calories', 'Calories') }}
                {{ Form::input('number','calories', Input::old('calories', $entry->calories), array('class' => 'form-control')) }}
            </div>

            <div class="control-group">
                {{ Form::label('fats', 'Fats') }}
                {{ Form::input('number','fats', Input::old('fats', $entry->fats), array('class' => 'form-control')) }}
            </div>

            <div class="control-group">
                {{ Form::label('carbohydrates', 'Carbohydrates') }}
                {{ Form::input('number','carbohydrates', Input::old('carbohydrates', $entry->carbohydrates), array('class' => 'form-control')) }}
            </div>

            <div class="control-group">
                {{ Form::label('proteins', 'Proteins') }}
                {{ Form::input('number','proteins', Input::old('proteins', $entry->proteins), array('class' => 'form-control')) }}
            </div>
    		

            <div class="form-actions">
                {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                <a href="{{ URL::route('entries.index') }}" class="btn btn-large">Cancel</a>
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop