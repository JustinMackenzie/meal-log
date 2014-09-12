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

            {{ Form::model($entry, array('route' => array('weights.update', $entry->id), 'method' => 'PUT')) }}

            <div class="control-group">
                {{ Form::label('weight', 'Weight') }}
                {{ Form::text('weight', Input::old('weight', $entry->weight), array('class' => 'form-control')) }}
            </div>

            <div class="form-actions">
                {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                <a href="{{ URL::route('weights.index') }}" class="btn btn-large">Cancel</a>
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop