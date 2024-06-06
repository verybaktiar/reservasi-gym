<header class="header">
  <nav>
    <div class="nav__header">
      <div class="nav__logo">
        <a href="#"><img src="{{asset('user/assets/logo.png')}}" alt="logo" />Power</a>
      </div>
      <div class="nav__menu__btn" id="menu-btn">
        <span><i class="ri-menu-line"></i></span>
      </div>
    </div>
    <ul class="nav__links" id="nav-links">
      <li class="link"><a href="#home">Home</a></li>
      <li class="link"><a href="#about">About</a></li>
      <li class="link"><a href="#class">Classes</a></li>
      <li class="link"><a href="#trainer">Trainers</a></li>
      <li class="link"><a href="#price">Pricing</a></li>
      @if(auth()->check())
        <li class="link dropdown">
          <a href="#" class="dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-user-line"></i> Profil
          </a>
          <ul class="dropdown-menu" aria-labelledby="profileDropdown">
            <li>
              <span class="dropdown-item saldo">
                <i class="ri-money-dollar-circle-line"></i>
                Rp. {{ auth()->user()->saldo ? auth()->user()->saldo->saldo_member : 0 }}
              </span>
            </li>
            <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
          </ul>
        </li>
      @endif
    </ul>
  </nav>
</header>