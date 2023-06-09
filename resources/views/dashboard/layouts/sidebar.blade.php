
<nav class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">ELIN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              My Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/reports*') ? 'active' : '' }}" href="/dashboard/reports">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#people"/></svg>
              My Profiles
            </a>
          </li>
        </ul>

        @can('admin')

        <hr class="my-3">

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-body-secondary text-uppercase text-muted">
            <span>Administrator</span>
        </h6>

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" {{ Request::is('dashboard/categories*') ? 'active' : '' }}href="/dashboard/categories">
              <svg class="bi"><use xlink:href="#puzzle"/></svg>
              Categories
            </a>
          </li>
        </ul>
        @endcan
      </div>
    </div>
</nav>
