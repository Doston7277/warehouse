@extends('index')

@section('content')

    <center class="mt-5">
        <h1 class="text-dark">BAZA</h1>
    </center>
                
<div class="row mt-5">

    <div class="offset-1 col-md-4">
        <div class="form-group">
            <button type="button" class="form-control btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Type
            </button>
            <div class="dropdown-menu"> 
                @foreach($types as $type)
                    <a class="dropdown-item" href="{{url('baza')}}/{{$type->name}}">{{ $type->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <form action="/search" method="get" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="name" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

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