@extends('layouts.app')


@section('content')
    <div class="container">
        

        <section>
        @if( session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
            <div class="row">
               
            @foreach( $products as $product)
                
                <div class="col-md-4">
                
                    <div class="card mb-2">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{$product->SKE}}</p>
                                <p><strong> $ {{ $product->price }}</strong></p>
                                <a href="{{ route('cart.add',$product)}}" class="btn btn-primary"> Buy</a>
                            </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
            
        </section>
    </div>
@endsection