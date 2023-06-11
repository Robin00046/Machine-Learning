<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? '' :'collapsed' }}"  href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        {{-- <a class="nav-link {{ Request::is('product') ? '' :'collapsed' }}" href="{{ route('product.index') }}"> --}}
          <i class="bi bi-person"></i>
          <span>Admin</span>
        {{-- </a> --}}
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->