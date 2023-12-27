<div>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ Route('home') }}"  class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pendaftaranPemohon') }}" class="nav-link">
              <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
              <p>Form Pendaftaran Pemohon</p>
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
                <p>Item Jenis Analisa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('FormAnalisaSampel') }}" class="nav-link">
                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                <p>Item Pengujian Sampel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jenisPemeriksaan') }}" class="nav-link">
                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                <p>Item Pengujian</p>
              </a>
            </li>
          </ul>
        </li>
    </ul>
</div>
