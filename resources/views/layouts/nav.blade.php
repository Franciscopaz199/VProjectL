<header class="header">
    <nav class="nave">
      <a href="{{route('index')}}" class="logo nave-link">VProjectL</a>
      <button class="nave-toggle" aria-label="Abrir menú">
        <i class="fas fa-bars" aria-hidden="true"></i>
      </button>
      <ul class="nave-menu">
        @if (request()->routeIs('index'))
        <li class="nave-menu-item">
          <a href="#acercade" class="nave-menu-link nave-link">acercade</a>
        </li>
        @endif
        <li class="nave-menu-item">
          <a href="{{route('registershow')}}" class="nave-menu-link nave-link {{request()->routeIs('registershow') ? 'nave-menu-link_active' : ' '}}">registrarse</a>

        </li>
        <li class="nave-menu-item">
          <a href="{{route('sesionStar')}}" class="nave-menu-link nave-link {{request()->routeIs('sesionStar') ? 'nave-menu-link_active' : ' '}}">iniciarsesion</a>
        </li>
      </ul>
    </nav>
  </header>