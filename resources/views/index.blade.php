@extends('layouts.plantilla')
@section('links')
    <link rel="stylesheet" href="{{asset('css/sliderStyles.css')}}">    
    <link rel="stylesheet" href="{{asset('css/highlightjs/dracula.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/highlightjs-line-numbers.js/dist/highlightjs-line-numbers.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/StylesForViewFiles.css')}}">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}" />
@endsection

@section('body')
        <div class="inicio">
                <div class="informacion-bienbenido">
                    <div class="text-start titu">
                        <h2 class="title">HOLA BIENVENIDO(A)  </h2>
                        <h2 class="title tituloV">A VProjectL</h2>
                        <P style="color: #8193b2;">Es un proyecto pensado para hacer que tu introduccion a la programacion sea menos traumatica...</P>
                        <a href="{{route('home')}}" class="button">Comenzar</a>
                    </div>

                </div>
                <div class="logoContainer">
                    <img src="{{asset('img/iconoblanco.png')}}"  class="imagenLogo">
                </div>
        </div>

        @section('inter')
        <div class="lineaDivisoria">
            <div class="left-info">
                <div class="text-start borde">
                    <P style="color: #8193b2;">Copia un ejemplo de codigo para que practiques</P>
                    <h2>Copiado de codigo rapido </h2>
                    <p>Practica con ejercicios, comprueba que esten buenos y al finalizar puedes copiar tu codigo de una forma rapida, 
                        intentalo!</p>
                </div>
            </div>
            <div class="rigth-info-code">
                <div class="code" style="border-right:none;">
                        @php
$text = '
//Librerias                             
#include<iostream>

using namespace std;
                                
int main(void)
{
    cout<<"Hola Mundo.";
    
    return 0;
}'
                        @endphp
                        <div class="contenedor">
                            <div class="linea" style="top: 80px; background:rgb(11, 44, 82);
                                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                            "> <button id="copy-button" >Copy</button></div>
                            <div class="code-wrapper">
                          <pre>
                            <code id="code">  
                               {{$text}}
                            </code>
                            </pre>
                          
                        </div>
                        </div>
                        <span id="copy-success">se ha copiado el codigo :)</span>
                </div>
            </div>
        </div>

        <div class="lineaDivisoria" style="flex-direction: row-reverse; 
        background:#f4f5ff;"> 
            <div class="left-info">
                <div class="text-start borde">
                    <P style="color: #8193b2;">Ayuda a la comunidad</P>
                    <h2>Quieres hacer tu humilde aporte?</h2>
                    <p>Puedes subir tus tutorias para que las personas puedan ver la explicacion de el codigo.</p>
                    <a href="{{route('home')}}" class="button" style="border: 1px solid darkblue; color:darkblue;">Ir a </a>
                </div>
            </div>
            <div class="rigth-info-code">
                <img src="https://cdn.icon-icons.com/icons2/936/PNG/512/code_icon-icons.com_73620.png" alt="" style="max-width: 300px;" class="imagenCodigo">
            
            </div>
            </div>
        </div>
        
        <div class="lineaDivisoria" style="flex-direction: column;  align-items: center" id="acercade">
            <h1>acerca de</h1>
            <div style="width: 100%; display:flex; flex-direction: row-reverse;      justify-content: center; " class="linea-acerca">
                <div class="left-info">
                    <div class="text-start borde">
                        <P style="color: #8193b2;">acerca de</P>
                        <h2>Que es?</h2>
                        <p>VProjectL surge como iniciativa de colaborar con la comunidad universitaria de UNAH-CU para ayudar
                        a dar explicacion a ciertos temas de programacion basica.</p>
                        <br>
                        <h2>Desarrollador</h2>
                        <p>FP, estudiante del CURLP.
                            <a href="">Contacto</a>
                        </p>
                        <br>
                        <h2>Objetivo</h2>
                        <p>El objetivo de VProjectL es brindar tutorias de programacion de una forma simple y amigable al usuario
                            con codigos de ejemplo interactivos.
                        </p>
                    </div>
                </div>
                <div class="rigth-info-code" style="width: 30% ; background:#f4f5ff;">
                    <img src="{{asset('img/iconoazul.png')}}" alt="" style="max-width: 400px;" class="imagen-logo-azul">
                
                </div>
            </div>
        </div>
        @endsection
        
@endsection
@section('scripts')
    
    <script src="{{asset('js/main.js')}}"></script>
@endsection
