<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">MENING</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MNG</a>
          </div>
          <ul class="sidebar-menu">
             @if(auth()->user()->role == "admin")
              <li class="">
                <a class="nav-link" href="/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="/fakultas"><i class="far fa-square"></i> <span>Fakultas</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="/jurusan"><i class="far fa-square"></i> <span>Jurusan</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="/ruangan"><i class="far fa-square"></i> <span>Ruangan</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="/barang"><i class="far fa-square"></i> <span>Barang</span></a>
              </li>
               @elseif(auth()->user()->role == "staff")
               <li class="">
                <a class="nav-link" href="/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a>
              </li>
               <li class="">
                <a class="nav-link" href="/barang"><i class="far fa-square"></i> <span>Barang</span></a>
              </li>
              @endif
          </ul>
        </aside>
      </div>