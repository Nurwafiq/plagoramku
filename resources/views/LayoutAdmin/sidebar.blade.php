  <!-- Sidebar Start -->
  <aside class="left-sidebar shadow" style="background: #7BA4EC;">
      <!-- Sidebar scroll-->
      <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
              <a href="{{ url('/dashboard-admin') }}" class="text-nowrap logo-img">
                  <img src="{{ asset('img/icon-login.png') }}" alt="" width="40%" class="mx-auto d-block py-3">
                  <p class="text-center" style="color: #fff;">Selamat Datang {{ auth()->user()->name }}<br> Algoritma
                      Apriori
                  </p>
              </a>
              <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                  <i class="ti ti-x fs-8"></i>
              </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
              <ul id="sidebarnav">
                  <li class="nav-small-cap">
                      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                      <span class="hide-menu">Menu</span>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ $title == 'Dashboard' ? 'active' : '' }}"
                          href="{{ url('/dashboard-admin') }}">
                          <span>
                              <i class="ti ti-chart-bar"></i>
                          </span>
                          <span class="hide-menu">Dashboard</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ $title == 'Data Pengguna' ? 'active' : '' }}"
                          href="{{ url('/admin/data-pengguna') }}">
                          <span>
                              <i class="ti ti-users"></i>
                          </span>
                          <span class="hide-menu">Pengguna</span>
                      </a>
                  </li>
                  {{-- <li class="sidebar-item">
                      <a class="sidebar-link {{ $title == 'Data Produk' ? 'active' : '' }}"
                          href="{{ url('/admin/data-produk') }}">
                          <span>
                              <i class="ti ti-shopping-cart"></i>
                          </span>
                          <span class="hide-menu">Data Produk</span>
                      </a>
                  </li> --}}
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ $title == 'Data Penjualan' ? 'active' : '' }}"
                          href="{{ url('/admin/data-penjualan') }}">
                          <span>
                              <i class="ti ti-report-money"></i>
                          </span>
                          <span class="hide-menu">Data Penjualan</span>
                      </a>
                  </li>
              </ul>

          </nav>
          <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
