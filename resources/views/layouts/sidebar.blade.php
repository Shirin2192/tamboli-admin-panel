<div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
    <!-- Logo -->
    <div class="text-center mb-4">
        <img src="{{ asset('storage/logo.svg') }}" alt="Logo" style="max-width: 150px;">
    </div>

    <!-- Title -->
    <h4 class="text-center">Admin Panel</h4>

    <!-- Navigation -->
    <ul class="nav flex-column mt-3">
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('banners.index') }}">Banners</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('about.index') }}">About Us</a></li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.why.index') }}">
                Why Choose Us
            </a>
        </li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('services.index') }}">Services</a></li>

        <!-- Added Package Categories -->
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('package-categories.index') }}">Package Categories</a></li>

        <!-- Added Packages -->
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('packages.index') }}">Packages</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('contacts.index') }}">Contact Info</a></li>

        <li class="nav-item mt-3">
            <a class="nav-link text-white" href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
