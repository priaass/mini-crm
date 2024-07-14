  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Dashboard</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dashboard-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('companie.index') }}">
              <i class="bi bi-circle"></i><span>Companies</span>
            </a>
          </li>
          <li>
            <a href="{{ route('employee.index') }}">
              <i class="bi bi-circle"></i><span>Employees</span>
            </a>
          </li>
          <li>
            <a href="{{ route('division.index') }}">
              <i class="bi bi-circle"></i><span>Divisions</span>
            </a>
          </li>
        </ul>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('profile.profil') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
        <a class="nav-link collapsed" href="{{ route('contact.index') }}">
        @elseif (Auth::user()->role == 'user')
        <a class="nav-link collapsed" href="{{ route('contact.create') }}">
        @endif
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->
      @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('akun.index') }}">
          <i class="bi bi-key"></i>
          <span>User</span>
        </a>
      </li><!-- End User Page Nav -->
      @endif
    </ul>

  </aside><!-- End Sidebar-->
