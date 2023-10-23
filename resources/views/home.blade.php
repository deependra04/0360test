@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                   <form method="POST" action="/inputListCategores">
                  @csrf
                    <lable>Categories:</lable>
                    <input type="text" name="categories" placeholder="Text Input">
                    <button type="submit">Submit</button>
                   </form>
                </div>
                <div class="card-body">
@if(!empty($enteredValure))
               <h4>Entered categories </h4>
                <ul>
                    @foreach($enteredValure as $value)
                    <li>{{$value}}</li>
                    @endforeach
                </ul>
                <form method="POST" action="/saveAll">
                    @csrf
                    <button type="submit">Save all</button>               
                </from>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
