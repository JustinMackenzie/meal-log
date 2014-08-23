@extends('layouts.default')

@section('content')
<h1>Food Entries</h1>
<table class="table table-striped">
        <thead>
            <tr>
                <th>Food</th>
                <th>Date/Time</th>
                <th>Calories</th>
                <th>Fats</th>
                <th>Carbohydrates</th>
                <th>Proteins</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
                <tr>
                    <td>{{ $entry->food }}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td>{{ $entry->calories }}</td>
                    <td>{{ $entry->fats }}</td>
                    <td>{{ $entry->carbohydrates }}</td>
                    <td>{{ $entry->proteins }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop