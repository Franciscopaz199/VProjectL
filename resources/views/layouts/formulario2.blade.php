<div class="container bodyPage" style="display:flex;">
    <div class="formularios">
        <div class="imagen">
            <img src="{{asset('img/iconoazul.png')}}" alt="" class="imagenPrincipal">
        </div>
        <small>Registrarse</small>
        <form action="" method="POST" class="container">
            @csrf
             <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="input nombre de usuario" placeholder="Nombre" name="name">
        
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo Electronico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="input correo electronico" placeholder="Correo electronico" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre de usuario</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="input nombre de usuario" placeholder="Nombre de usuario" name="username">
        
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contrasena</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="input contrasena" placeholder="contrasena" name="password">
        
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Confirmar contrasena</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="input confimar contrasena" placeholder="confirmar Contrasena" name="confirmedPassword">
            
              </div>
            <br>
            <input type="submit" value="enviar" class="btn btn-primary"><br>
            
          <span> Ya tienes una cuenta? <a href="{{route('sesionStar')}}">Iniciar Sesion</a></span>
        </form>    
    </div>
</div>