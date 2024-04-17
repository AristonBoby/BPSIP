<div class="collapse navbar-collapse order-3 ml-5" id="navbarCollapse">
    <ul class="navbar-nav">
        <li class="nav-item"></li>
        <li class="nav-item"><a href="{{ route('branda') }}" class="nav-link">Beranda</a></li>
        <li class="nav-item"><a href="{{ route('jenisLayanan') }}" class="nav-link">Jenis Layanan</a></li>
        <li class="nav-item dropdown show">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pemeriksaan</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('pendaftaran')}}" class="dropdown-item">Pendaftaraan </a></li>
            <li><a href="#" class="dropdown-item">Hasil Pemeriksaan</a></li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li>
                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                        </li>
                        <li class="dropdown-submenu">
                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="dropdown-item">level 2</a></li>
                        <li><a href="#" class="dropdown-item">level 2</a></li>
                    </ul>
            </li>
        </ul>
        <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Ganti Password</a></li>
    </ul>
</div>
