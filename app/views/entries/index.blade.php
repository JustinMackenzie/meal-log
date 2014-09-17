@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1 center-text">
        <h1>Today's Meal Log</h1>
        <a href="{{ URL::route('entries.create') }}" class="btn btn-success"> Add New Entry</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Servings</th>
                    <th>Calories</th>
                    <th>Fats</th>
                    <th>Carbohydrates</th>
                    <th>Proteins</th>
                    <th><i class="icon-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->food->name }}</td>
                        <td>{{ $entry->servings }}</td>
                        <td>{{ $entry->calories() }}</td>
                        <td>{{ $entry->fats() }}</td>
                        <td>{{ $entry->carbohydrates() }}</td>
                        <td>{{ $entry->proteins() }}</td>
                        <td>
                            <a href="{{ URL::route('entries.edit', $entry->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                        
                        	{{ Form::open(array('route' => array('entries.destroy', $entry->id), 'method' => 'delete')) }}
                                <button type="submit" href="{{ URL::route('entries.destroy', $entry->id) }}" class="btn btn-danger btn-mini pull-left">Delete</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                	<td><b>Total</b></td>
                    <td></td>
                	<td><b>{{ $totalCalories }}</b></td>
                    <td><b>{{ $totalFats }}</b></td>
                    <td><b>{{ $totalCarbs }}</b></td>
                    <td><b>{{ $totalProteins }}</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Goal</b></td>
                    <td></td>
                    <td><b>{{ $goalCalories }}</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>To Go</b></td>
                    <td></td>
                    <td><b>{{ $toGoCalories }}</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop