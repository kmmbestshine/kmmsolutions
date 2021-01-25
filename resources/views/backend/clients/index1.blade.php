@extends('layouts.backend.main')
@section('heading')

@stop

@section('content')

    <table class="table table-hover " >
        <thead>
        <tr>
            <th>Client Name</th>
            <th>Company Name</th>
            <th>Mobile</th>
            <th>Software Type</th>
            <th>Email</th>
            <th>Address</th>
             <th>Land Mark</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->company_name}}</td>
                <td>{{$client->pri_mobile}}<br>{{$client->sec_mobile}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->address}}</td>
                <td>{{$client->landmark}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop

@push('scripts')

@endpush
