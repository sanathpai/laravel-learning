@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Faculty') }}</div>

                <div class="card-body">

                    <table class="table">
                        <tbody>

                            <tr>
                                <th>
                                    Employee Code
                                </th>
                                <td>
                                    {{$faculty->employee_code}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    {{$faculty->user->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Designation
                                </th>
                                <td>
                                    {{$faculty->designation}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Email
                                </th>
                                <td>
                                    {{$faculty->user->email}}
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection