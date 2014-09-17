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
                {{ Form::select('food', $foods, Input::old('food'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('servings', 'Number of Servings') }}
                {{ Form::input('number','servings', Input::old('servings'), array('class' => 'form-control')) }}
            </div>

            <div class="form-actions">
                {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                <a href="{{ URL::route('entries.index') }}" class="btn btn-large">Cancel</a>
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop