@extends('index')

@section('content')
    <div class="row">
        <div class="offset-1 col-md-10">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount/kg</th>
                        <th scope="col">Cost/so'm</th>
                        <th scope="col">Summ/so'm</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <th scope="row">{{ $data->id}}</th>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->amount}}</td>
                                <td>{{ $data->cost}}</td>
                                <td>{{ $data->summ}}</td>
                                <td>{{ $data->type}}</td>
                                <td>{{ $data->created_at}}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection