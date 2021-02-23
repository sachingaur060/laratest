@extends('admin.layout.adminlayout')

@section('content')


<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            
        </tr>

        @foreach($users as $value)
            <tr>{{ $value->name }}</tr>
            <tr>{{ $value->email }}</tr>
            <tr><a href="{{ route('user.edit',[$value->id]) }}" target="_blank"> Edit</a></tr>
        @endforeach
    </thead>
    <tbody>
@endsection