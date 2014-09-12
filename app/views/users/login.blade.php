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
			{{ Form::open(array('route' => 'signin')) }}

		        <div class="form-group">
		            {{ Form::label('email', 'Email') }}
		            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		        </div>

		         <div class="form-group">
		            {{ Form::label('password', 'Password') }}
		            {{ Form::password('password', array('class' => 'form-control')) }}
		        </div>

		        <div class="form-actions">
		            {{ Form::submit('Sign In', array('class' => 'btn btn-primary btn-save btn-large')) }}
		        </div>

	    	{{ Form::close() }}
	</div>
</div>
@stop