@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>Sign In</h2>
			@if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <P>{{$error}}</P>
                @endforeach
            </div>
            @endif
			{{ Form::open(array('route' => 'signin')) }}

		        <div class="control-group">
		            {{ Form::label('email', 'Email') }}
		            <div class="controls">
		                {{ Form::text('email', Input::old('email')) }}
		            </div>
		        </div>

		         <div class="control-group">
		            {{ Form::label('password', 'Password') }}
		            <div class="controls">
		                {{ Form::password('password') }}
		            </div>
		        </div>

		        <div class="form-actions">
		            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-save btn-large')) }}
		        </div>

	    	{{ Form::close() }}
	</div>
</div>
@stop