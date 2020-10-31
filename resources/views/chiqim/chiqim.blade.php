
@extends('index')

@section('content')

    <center class="mt-5">
        <h1 class="text-dark">CHIQIM</h1>
    </center>   
    <div class="row">
        <div class="offset-3 col-md-6">
            @if(Session :: has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session :: has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
        </div>
    </div>
    <div class="row mt-3">
        <div class="offset-3 col-md-6">
            <form action="/chiqim_insert" method="post">
           
            {{ csrf_field() }}

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Apple">
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control" placeholder="200">
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="text" name="cost" class="form-control" placeholder="2500">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type</label>
                    <select class="form-control" name="type" id="exampleFormControlSelect1">
                        <option>Meva</option>
                        <option>Sabzavot</option>
                        <option>Oziq-ovqat</option>
                    </select>
                </div>
                <button class="form-control btn btn-success mt-2" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection