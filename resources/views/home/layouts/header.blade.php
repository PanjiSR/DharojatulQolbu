<header>
  <!-- Fixed navbar -->
  <nav class= "navbar navbar-expand-md  nav-color shadow-sm position-fixed w-100">
    <div class="container-fluid mx-3">
      <a class="navbar-brand madrasah" href="/">
        <img src="/image/logo-nav-black.png" alt="" style="height: 40px"></a>
      <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mx-auto d-flex gap-4">
          <li class="nav-item ">
            <a class=" {{ Request::is('profile') ? 'active' : '' }} " href="/profile">Tentang Kami</a>
          </li>
          <li class="nav-item ">
            <a class=" {{ Request::is('program') ? 'active' : '' }} " href="/program">Program & Kegiatan</a>
          </li>
          <li class="nav-item ">
            <a class=" {{ Request::is('gallery') ? 'active' : '' }}" aria-current="page" href="/gallery">Galeri</a>
          </li>
          <li class="nav-item">
            <a class=" {{ Request::is('contact') ? 'active' : '' }} " href="/contact">Hubungi Kami</a>
          </li>
          {{-- <li>
            <a href="#" class="brosur">Download Brosur</a>
          </li> --}}

        </ul>
        <li class="navbar-nav">
          @auth
          <a href="/admin/dashboard" class="login"><i class="fas fa-user"></i> Dashboard</a>
          @else
          <a href="/login" class="login"> <i class="fas fa-sign-in-alt"></i> Masuk</a>
          @endauth
        </li>
      </div>
    </div>
  </nav>

  

</header>