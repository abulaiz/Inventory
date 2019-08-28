  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="@yield('beranda') nav-item"><a href="/"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Beranda</span></a>
        </li>
        <li class="@yield('data_barang') nav-item"><a href="/category"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">Data Barang</span></a>
        </li>
        <li class="@yield('laporan_kehilangan') nav-item"><a href="/missing_item"><i class="icon-logout"></i><span class="menu-title" data-i18n="nav.dash.main">Laporan Kehilangan</span></a>
        </li> 
        @if(!Auth::user()->hasRole('manager'))
        <li class=" nav-item"><a href="#"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.category.support">Pengajuan Barang</span></a>
          <ul class="menu-content">
            <li class="@yield('pengajuan_baru')"><a class="menu-item" href="/submission/create" data-i18n="nav.support_raise_support.main">Pengajuan Baru</a>
            </li>
            <li class="@yield('laporan_pengajuan')"><a class="menu-item" href="/submission"
              data-i18n="nav.support_documentation.main">Laporan Pengajuan</a>
            </li>
          </ul>
        </li>
        @else
        <li class="@yield('laporan_pengajuan') nav-item"><a href="/submission"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.dash.main">Pengajuan Barang</span></a>
        </li>   
        @endif
        <li class="@yield('portal_unit') nav-item"><a href="/unit"><i class="icon-calendar"></i><span class="menu-title" data-i18n="nav.dash.main">Portal Unit</span></a>
        </li>        
      </ul>
    </div>
  </div>