@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

               
                <div class="card-body">
                @foreach($plans as $plan)
                    <div class="card-body">
                        <h3>{{$plan->name}}</h3>
                        <h5>{{$plan->description}}</h5>
                        <form action="{{route('transaction.store')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$plan->id}}" name="id">
                            <button class="btn btn-md btn-primary" type="submit" >Buy</button>
                        </form>
                    </div>
                @endforeach    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
