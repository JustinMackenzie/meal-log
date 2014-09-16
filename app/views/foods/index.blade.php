@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1 center-text">
        <h1>Your Saved Foods</h1>
        <a href="{{ URL::route('foods.create') }}" class="btn btn-success"> Add New Food</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Serving Size</th>
                    <th>Calories</th>
                    <th>Fats</th>
                    <th>Carbohydrates</th>
                    <th>Proteins</th>
                    <th><i class="icon-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->serving_size }}</td>
                        <td>{{ $food->calories }}</td>
                        <td>{{ $food->fats }}</td>
                        <td>{{ $food->carbohydrates }}</td>
                        <td>{{ $food->proteins }}</td>
                        <td>
                            <a href="{{ URL::route('foods.edit', $food->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                        
                        	{{ Form::open(array('route' => array('foods.destroy', $food->id), 'method' => 'delete')) }}
                                <button type="submit" href="{{ URL::route('foods.destroy', $food->id) }}" class="btn btn-danger btn-mini pull-left">Delete</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop