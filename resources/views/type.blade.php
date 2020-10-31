
@extends('index')

@section('content')

    <center class="mt-5">
        <h1 class="text-dark">TYPE</h1>
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
            <form action="/type_insert" method="post">
            
            {{ csrf_field() }}
            
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" placeholder="Meva">
                    @if($errors -> first('type'))
                        <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                    @endif
                </div>
                <button class="form-control btn btn-success mt-2" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection