<div>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ Route('home') }}"  class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permohonanAnalis') }}" class="nav-link">
              <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
              <p>Form Permohonan Analis</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>Manajemen Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="{{ route('formJenisPengujian') }}" class="nav-link">
                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                <p>Jenis Pengujian Sampel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('FormAnalisaSampel') }}" class="nav-link">
                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                <p>Analisa Sampel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jenisPemeriksaan') }}" class="nav-link">
                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                <p>Jenis Pemeriksaan</p>
              </a>
            </li>
          </ul>
        </li>
    </ul>
</div>
