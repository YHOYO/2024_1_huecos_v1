<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('rols.index') }}" class="nav-link {{ Request::is('rols*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Rols</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('photos.index') }}" class="nav-link {{ Request::is('photos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Photos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('photodetalles.index') }}" class="nav-link {{ Request::is('photodetalles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Photodetalles</p>
    </a>
</li>
