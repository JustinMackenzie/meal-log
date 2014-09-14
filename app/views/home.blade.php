@extends('layouts.default')

@section('content')
<div class="jumbotron">
	<div class="container center-text">
		<h1>Welcome to MyMealLog!</h1>
		<p>Achieving what you wanted has never been easier! 
			<br/>Get on the fast track to achieving your fitness goals with just one click!</p>
		<a href="{{ URL::route('users.create') }}" class="btn btn-primary btn-lg">Sign Up</a>
	</div>
</div>
@stop