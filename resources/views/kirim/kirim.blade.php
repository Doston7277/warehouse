
@extends('index')

@section('content')

    <center class="mt-5">
        <h1 class="text-dark">KIRIM</h1>
    </center>
    <div class="row">
        <div class="offset-3 col-md-6">
            @if(Session :: has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="offset-3 col-md-6">
            <form action="/kirim_insert" method="post">
            
            {{ csrf_field() }}
            
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Apple">
                    @if($errors -> first('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control" placeholder="200">
                    @if($errors -> first('amount'))
                        <div class="alert alert-danger">{{ $errors->first('amount') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="text" name="cost" class="form-control" placeholder="2500">
                    @if($errors -> first('amount'))
                        <div class="hidden alert alert-danger">{{ $errors->first('cost') }}</div>
                    @endif
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