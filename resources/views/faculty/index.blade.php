@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Faculty') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary float-right mb-2" href="{{route('faculties.create')}}">Create Faculty</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Employee Code
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Designation
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faculties as $faculty)
                            <tr>
                                <td>
                                    {{$faculty->employee_code}}
                                </td>
                                <td>
                                    {{$faculty->user->name}}
                                </td>
                                <td>
                                    {{$faculty->designation}}
                                </td>
                                <td>
                                    {{$faculty->user->email}}
                                </td>
                                <td>
                                    <form action="{{route('faculties.destroy', ['faculty'=>$faculty->id])}}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-primary mr-2"
                                            href="{{route('faculties.show', ['faculty'=>$faculty->id])}}">View</a>
                                        <a class="btn btn-primary mr-2"
                                            href="{{route('faculties.edit', ['faculty'=>$faculty->id])}}">Update</a>
                                        <button class="btn btn-danger mr-2" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection