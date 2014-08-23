@extends('layouts.default')

@section('content')
<h1>Today's Meal Log</h1>
<a href="{{ URL::route('entries.create') }}" class="btn btn-success"> Add New Entry</a>
<table class="table table-striped">
        <thead>
            <tr>
                <th>Food</th>
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
                    <td>{{ $entry->food }}</td>
                    <td>{{ $entry->calories }}</td>
                    <td>{{ $entry->fats }}</td>
                    <td>{{ $entry->carbohydrates }}</td>
                    <td>{{ $entry->proteins }}</td>
                    <td>
                        <a href="{{ URL::route('entries.edit', $entry->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop