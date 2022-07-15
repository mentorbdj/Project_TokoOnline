<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{ route('dashboard') }}"
            aria-expanded="false"
            ><i class="mdi mdi-view-dashboard"></i
            ><span class="hide-menu">Dashboard</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{ route('customer.index') }}"
            aria-expanded="false"
            ><i class="fas fa-users"></i
            ><span class="hide-menu">Pelanggan</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{ route('product.index') }}"
            aria-expanded="false"
            ><i class="fas fa-box-open"></i
            ><span class="hide-menu">Produk</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{ route('category.index') }}"
            aria-expanded="false"
            ><i class="fas fa-shopping-cart"></i
            ><span class="hide-menu">Kategori</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{ route('order.index') }}"
            aria-expanded="false"
            ><i class="fas fa-desktop"></i
            ><span class="hide-menu">Transaksi</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link has-arrow waves-effect waves-dark"
            href="javascript:void(0)"
            aria-expanded="false"
            ><i class="mdi mdi-receipt"></i
            ><span class="hide-menu">Report </span></a
          >
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link"
                ><i class="mdi mdi-note-outline"></i
                ><span class="hide-menu"> Laporan Penjualan </span></a
              >
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link"
                ><i class="mdi mdi-note-plus"></i
                ><span class="hide-menu"> Laporan Pembelian </span></a
              >
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
