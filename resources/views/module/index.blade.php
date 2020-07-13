@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Modules') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary float-right mb-2" href="{{route('modules.create')}}">Create Module</a>

                    <table class="table">
                        <thead>
                            <tr>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modules as $module)
                            <tr>

                                <td>
                                    {{$module->name}}
                                </td>

                                <td>
                                    <form action="{{route('modules.destroy', ['module'=>$module->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-primary mr-2"
                                            href="{{route('modules.show', ['module'=>$module->id])}}">View</a>
                                        <a class="btn btn-primary mr-2"
                                            href="{{route('modules.edit', ['module'=>$module->id])}}">Update</a>
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