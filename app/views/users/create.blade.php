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
			{{ Form::open(array('route' => 'users.store')) }}

				<div class="form-group">
		            {{ Form::label('email', 'Email') }}
		            <div class="controls">
		                {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		            </div>
		        </div>

		         <div class="form-group">
		            {{ Form::label('password', 'Password') }}
		            <div class="controls">
		                {{ Form::password('password', array('class' => 'form-control')) }}
		            </div>
		        </div>

		        <div class="form-group">
		            {{ Form::label('confirmation', 'Confirmation') }}
		            {{ Form::password('confirmation', array('class' => 'form-control')) }}
		        </div>

		        <div class="form-actions">
		            {{ Form::submit('Sign Up', array('class' => 'btn btn-primary btn-save btn-large')) }}
		        </div>

	    	{{ Form::close() }}
	</div>
</div>
@stop