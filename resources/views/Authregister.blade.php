@extends('layouts.plantilla')

@section('titulo','registrar')
@section('links')
    <link rel="stylesheet" href="{{asset('css/styleForm.css')}}">  
@endsection
@section('body')
@if ($errors->any())
<br>
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>            
        @endforeach
        </ul>
</div>
@endif
  @include('layouts.formulario2')   
  
  @error('email')
      <div class="bg bg-danger" style="color: white; display: flex; justify-content: space-around;" > 
          <span>ha ocurrido un error</span>
      </div>
  @enderror
@endsection

