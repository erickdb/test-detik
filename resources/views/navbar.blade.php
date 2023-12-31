<nav class="navbar navbar-expand-md bg-light">
  <div class="container d-flex">
    <div class="col-4 d-flex align-items-center">
      <a class="navbar-brand">Digital Library</a>
    </div>
      <!-- toggler button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
      </button>
      <!-- offcanvas -->
    <div class="col-4 text-center offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Heading</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <div class="d-block d-lg-flex text-center ms-auto gap-3">
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Kategori
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Olahraga</a></li>
                      <li><a class="dropdown-item" href="#">Pendidikan</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="d-block d-md-none">
                  <a href={{ route('sesi.index') }} class="btn btn-outline-dark">Login</a>
                  <a href={{ route('sesi.regisIndex') }} class="btn btn-warning">Register</a>
                </div>
              </div>
          </div>
    </div>
    <div class="col-4 text-end d-none d-md-block">
      <a href={{ route('sesi.index') }} class="btn btn-outline-dark">Login</a>
      <a href={{ route('sesi.regisIndex') }} class="btn btn-warning">Register</a>
    </div>
  </div>
</nav>