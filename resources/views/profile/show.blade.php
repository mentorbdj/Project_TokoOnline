@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <table class="table">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $data->email }}</td>
        </tr>
    </table>
</div>
@endsection
