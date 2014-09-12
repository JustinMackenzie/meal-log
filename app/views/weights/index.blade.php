@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1 center-text">
        <h1>Your Weight Entry Log</h1>
        <a href="{{ URL::route('weights.create') }}" class="btn btn-success"> Weigh In</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->created_at }}</td>
                        <td>{{ $entry->weight }}</td>
                        <td>
                            <a href="{{ URL::route('weights.edit', $entry->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                        
                        	{{ Form::open(array('route' => array('weights.destroy', $entry->id), 'method' => 'delete')) }}
                                <button type="submit" href="{{ URL::route('weights.destroy', $entry->id) }}" class="btn btn-danger btn-mini pull-left">Delete</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop