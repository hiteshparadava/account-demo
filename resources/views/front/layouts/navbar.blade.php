<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="container-xxl">
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
      <a href="{{ route('home') }}" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0"
            />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
              fill="#161616"
            />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
              fill="#161616"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0"
            />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Company</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
        <i class="ti ti-x ti-sm align-middle"></i>
      </a>
    </div>

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    
      <ul class="navbar-nav flex-row align-items-center ms-auto">
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}"><i class="tf-icons navbar-icon ti ti-user ti-xs me-1"></i> Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i class="tf-icons navbar-icon ti ti-lock-open ti-xs me-1"></i> LogIn</a>
        </li>
        @else
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="ti ti-logout me-2 ti-sm"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        @endguest
      </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
      <input
        type="text"
        class="form-control search-input border-0"
        placeholder="Search..."
        aria-label="Search..."
      />
      <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
  </div>
</nav>
