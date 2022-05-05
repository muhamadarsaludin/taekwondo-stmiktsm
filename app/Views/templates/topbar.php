<nav class="navbar navbar-expand-lg navbar-light shadow">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Brand -->
    <a class="navbar-brand" href="/">
      <img src="<?= base_url("/img/logos/logo.png") ?>" width="50" class="d-inline-block align-top" alt="Sportpedia Logo">
    </a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">    
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Alerts -->
        <li class="nav-item active no-arrow mx-1">
          <a class="nav-link" href="/">
            Beranda
          </a>        
        </li>
        <li class="nav-item no-arrow mx-1">
          <a class="nav-link" href="/main/about">
            Tentang Kami
          </a>        
        </li>
        <li class="nav-item no-arrow mx-1">
          <a class="nav-link" href="/main/galery">
            Galeri
          </a>        
        </li>
        <li class="nav-item no-arrow mx-1">
          <a class="nav-link" href="/main/article">
            Artikel
          </a>        
        </li>
        <li class="nav-item no-arrow mx-1 d-flex flex-column justify-content-center">
          <form action="" class="user">
            <a class="btn btn-outline-warning btn-user btn-block" href="/login">
              <i class="fa-solid fa-arrow-right-to-bracket"></i>
              <span>Masuk</span>
            </a>        
          </form>
        </li>
        <li class="nav-item no-arrow mx-1 d-flex flex-column justify-content-center">
          <form action="" class="user">
            <a class="btn btn-warning btn-user btn-block" href="/register">
              <i class="fa-solid fa-handshake-simple"></i>
              <span> Bergabung Bersama Kami</span>
            </a>        
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>