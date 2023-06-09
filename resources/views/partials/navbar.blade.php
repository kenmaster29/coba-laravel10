<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="/">ELIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/report" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Report
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/shiftreport">SHIFT</a></li>
              <li><a class="dropdown-item" href="/n1ohreport">OH NAR1</a></li>
              <li><a class="dropdown-item"  href="/report">OH NAR2</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            --}}

          <li class="nav-item">
                <a class="nav-link {{ ($title === "Report") ? 'active' : '' }}" href="/report">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Report Categories") ? 'active' : '' }}" href="/categories">Category</a>
      </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About</a>
          </li>
        </ul>

        <form class="d-flex" role="search" action="/report">
          <input class="form-control me-2" type="search" placeholder="Find here..." aria-label="Search" name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>

        <ul class="navbar-nav ms-auto">
            @auth

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/login" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="/dashboard"><i class="bi bi-window-stack"></i>  My Dashboard</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>  Logout</button>
                        </form>
                    </li>
                </ul>
            </li>

            @else
            <li class="nav-item">
                <a href="/login" class="nav-link {{ ($title === "Login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        </ul>
        @endauth


      </div>
    </div>
  </nav>
