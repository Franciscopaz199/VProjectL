<header class="header">
    <nav class="nave">
      <a href="{{route('index')}}" class="logo nave-link">VProjectL</a>
      <button class="nave-toggle" aria-label="Abrir menú">
        <i class="fas fa-bars" aria-hidden="true"></i>
      </button>
      <ul class="nave-menu">
        <li class="nave-menu-item">
          <a href="{{route('home')}}" class="nave-menu-link nave-link {{request()->routeIs('home') ? 'nave-menu-link_active' : ' '}}">buscar archivos</a>
        </li>
        @can('subirArchivo')
          <li class="nave-menu-item">
            <a href="{{route('subirArchivo')}}" class="nave-menu-link nave-link {{request()->routeIs('subirArchivo') ? 'nave-menu-link_active' : ' '}}">subir archivos</a>
        
          </li>
          <li class="nave-menu-item">
            <a href="{{route('saveNames')}}" class="nave-menu-link nave-link {{request()->routeIs('saveNames') ? 'nave-menu-link_active' : ' '}}">Subir Nombres</a>
          </li>
        @endcan
        
        @can('permitirAcceso')
          <li class="nave-menu-item">
            <a href="{{route('permitirAcceso')}}" class="nave-menu-link nave-link {{request()->routeIs('permitirAcceso') ? 'nave-menu-link_active' : ' '}}">Permitir acceso</a>
          </li>
        @endcan

         
          <li class="nave-menu-item">
            <a href="{{route('cerrarSesion')}}" class="nave-menu-link nave-link ">cerrar Sesion</a>
          </li>
        

      </ul>
    </nav>
  </header>