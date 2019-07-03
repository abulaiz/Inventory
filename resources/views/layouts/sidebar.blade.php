  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="@yield('beranda') nav-item"><a href="/"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Beranda</span></a>
        </li>
        <li class="@yield('data_barang') nav-item"><a href="/category"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">Data Barang</span></a>
        </li>
        <li class=" nav-item"><a href="index.html"><i class="icon-logout"></i><span class="menu-title" data-i18n="nav.dash.main">Laporan Kehilangan</span></a>
        </li>                
        <li class=" nav-item"><a href="#"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.category.support">Pengajuan Barang</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="http://support.pixinvent.com/" data-i18n="nav.support_raise_support.main">Pengajuan Baru</a>
            </li>
            <li><a class="menu-item" href="https://pixinvent.com/robust-bootstrap-admin-template/documentation"
              data-i18n="nav.support_documentation.main">Laporan Pengajuan</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="index.html"><i class="icon-calendar"></i><span class="menu-title" data-i18n="nav.dash.main">Portal Unit</span></a>
        </li>        
      </ul>
    </div>
  </div>