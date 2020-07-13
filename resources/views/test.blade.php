@extends('layouts.app')
@section('content')

@php
$users = App\Student::all();
@endphp
@foreach($users as $user)
<p>User {{$loop->index}}: {{$user->name}}</p>
@endforeach
@endsection