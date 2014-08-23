@extends('layouts.default')

@section('content')
<h2>Save a New Food Entry</h2>
    <div class="row">
        <div class="col-md-8">
            
            @if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <P>{{$error}}</P>
                @endforeach
            </div>
            @endif

            {{ Form::open(array('route' => 'entries.store')) }}

            <div class="control-group">
                {{ Form::label('food', 'Food') }}
                <div class="controls">
                    {{ Form::text('food', Input::old('food')) }}
                </div>
            </div>

            <div class="control-group">
                {{ Form::label('calories', 'Calories') }}
                <div class="controls">
                    {{ Form::input('number','calories', Input::old('calories')) }}
                </div>
            </div>

            <div class="control-group">
                {{ Form::label('fats', 'Fats') }}
                <div class="controls">
                    {{ Form::input('number','fats', Input::old('fats')) }}
                </div>
            </div>

            <div class="control-group">
                {{ Form::label('carbohydrates', 'Carbohydrates') }}
                <div class="controls">
                    {{ Form::input('number','carbohydrates', Input::old('carbohydrates')) }}
                </div>
            </div>

            <div class="control-group">
                {{ Form::label('proteins', 'Proteins') }}
                <div class="controls">
                    {{ Form::input('number','proteins', Input::old('proteins')) }}
                </div>
            </div>
    		

            <div class="form-actions">
                {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                <a href="{{ URL::route('entries.index') }}" class="btn btn-large">Cancel</a>
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop