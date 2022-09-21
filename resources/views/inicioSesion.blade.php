@extends('layouts.plantilla')

@section('links')
    <link rel="stylesheet" href="{{asset('css/styleForm.css')}}">  
@endsection

@section('body')

    @include('layouts.formulario')

    @error('email')
       <div class="bg bg-danger" style="color: white; display: flex; justify-content: space-around;" > 
           <span>Por favor ingrese un email valido</span>
        </div>
    @enderror

@endsection


