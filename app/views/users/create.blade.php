@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>Sign Up</h2>
			@if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <P>{{$error}}</P>
                @endforeach
            </div>
            @endif
			{{ Form::open(array('route' => 'users.store')) }}

		        <div class="control-group">
		            {{ Form::label('username', 'Username') }}
		            <div class="controls">
		                {{ Form::text('username', Input::old('username')) }}
		            </div>
		        </div>

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

		        <div class="control-group">
		            {{ Form::label('confirmation', 'Confirmation') }}
		            <div class="controls">
		                {{ Form::password('confirmation') }}
		            </div>
		        </div>

		        <div class="form-actions">
		            {{ Form::submit('Submit', array('class' => 'btn btn-success btn-save btn-large')) }}
		        </div>

	    	{{ Form::close() }}
	</div>
</div>
@stop