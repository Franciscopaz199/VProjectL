<footer>
    <div class="footerC" >
        <div class="imagenFooter">
            <img src="{{asset('img/iconoblanco.png')}}" alt="" class="imagenPrincipal">
        </div>
    </div>
    <div class="footerC">
        <div class=" text-start ">
            <h4>VProjectL</h4>
            <small>Es un proyecto desarrollado en Laravel 9 con el objetivo de <a href="
                @if (request()->routeIs('index'))
                    #acercade
                @endif
                ">saber mas...</a></small>
        </div><br>
        <div class=" text-start ">
            <h4>Desarrolado por</h4>
            <small>FP, Estudiante del centro universitario del litoral pacifico UNAH-CURLP</small>
            <a href="https://api.whatsapp.com/send?phone=50498472717&text=Hola,%20FP">Contacto</a>
        </div><br>
    </div>
    <div class="footerC">
        <div class=" text-start ">
            <h4>Dudas?</h4>
            <small>Si tienes alguna duda comentario o quieres reportar un problema puedes hacerdo 
                desde <a href="https://api.whatsapp.com/send?phone=50498472717&text=Hola,%20FP">aqui</a></small>
        </div><br>
        
    </div>
</footer>
<div class="lineaFooter">
    <small>Un proyecto de <b>Manguito Team </b></small>
    <small> VProjectL version 0.0.1</small>
</div>