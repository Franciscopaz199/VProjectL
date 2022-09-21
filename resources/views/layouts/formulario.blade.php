<div class="container bodyPage" style="display:flex;">
    <div class="formularios">
        <div class="imagen">
            <img src="{{asset('img/iconoazul.png')}}" alt="" class="imagenPrincipal">
        </div>
        <small>Iniciar Sesion</small>
        <form action="{{route('getSesion')}}" method="POST" class="container">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Correo Electronico</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
              <small id="emailHelp" class="form-text text-muted">correo electronico que te registraste</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contrasena</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div><br>
             <button type="submit" class="btn btn-primary">Enviar</button><br>
             <span> Aun no te registras? <a href="{{route('registershow')}}">Crear Cuenta</a></span> 
          </form>
    </div>
</div>