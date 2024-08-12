  <!--  Header Start -->
  <header class="app-header" style="background-color: blue;">
      <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                  <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                      <i class="ti ti-menu-2"></i>
                  </a>
              </li>
              <li class="nav-item align-self-center fs-4 fw-semibold" style="color: white;">{{ $title }}</li>

          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                  <li class="nav-item dropdown">
                      <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('img/profile.png') }}" alt="" width="35" height="35"
                              class="rounded-circle">
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                          <div class="message-body">
                              <a href="{{ url('/dashboard-umkm') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                  <i class="ti ti-user fs-6"></i>
                                  <p class="mb-0 fs-3">{{auth()->user()->name }}</p>
                              </a>
                              <a href="{{ url('/logout') }}"
                                  class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                          </div>
                      </div>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <!--  Header End -->
