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
			{{ Form::open(array('route' => 'profiles.store')) }}

				<div class="form-group">
		            {{ Form::label('gender', 'Gender') }}
		            {{ Form::select('gender', $genders, Input::old('gender'), array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('age', 'Age') }}
		            {{ Form::input('number','age', Input::old('age'), array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('height', 'Height') }}
		            {{ Form::input('number','height', Input::old('height'), array('class' => 'form-control')) }}
		            <label>
		            {{ Form::radio('heightUnit', 'cm', true) }}
		            Centimeters
		        	</label>
		        	<br/>
		        	<label>
		            {{ Form::radio('heightUnit', 'in') }}
		            Inches
		        	</label>
		        </div>

		        <div class="form-group">
		            {{ Form::label('weight', 'Weight') }}
		            {{ Form::input('number','weight', Input::old('weight'), array('class' => 'form-control')) }}
		            <label>
		            {{ Form::radio('weightUnit', 'kg', true) }}
		            Kilograms
		        	</label>
		        	<br/>
		        	<label>
		            {{ Form::radio('weightUnit', 'lb') }}
		            Pounds
		        	</label>
		        </div>

		        <div class="form-group">
		            {{ Form::label('activity', 'Activity Level') }}
		            {{ Form::select('activity', $activities, Input::old('activity'), array('class' => 'form-control')) }}
		        </div>

		        <div class="form-actions">
		            {{ Form::submit('Save', array('class' => 'btn btn-primary btn-save btn-large')) }}
		        </div>

	    	{{ Form::close() }}
	</div>
</div>
@stop