@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faculties as $faculty)
        <tr>
            <td>
                {{$faculty->user->name}}
            </td>
            <td>
                {{$faculty->user->email}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection