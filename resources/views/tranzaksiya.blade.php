@extends('index')

@section('content')

    <center class="mt-5">
        <h1 class="text-dark">KIRIM-CHIQIM-RO'YXAT</h1>
    </center>

<div class="row mt-5">
    <div class="offset-2 col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount/kg</th>
                    <th scope="col">Cost/so'm</th>
                    <th scope="col">Type</th>
                    <th scope="col">K-CH Type</th>
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
                        <td>{{ $data->type}}</td>
                        <td>{{ $data->io_type}}</td>
                        <td>{{ $data->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection