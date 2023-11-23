                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  @if (isset($active_side)) {{ $active_side }} @endif">
                            <a href="/user/departemen/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="sidebar-item @if (isset($active_home)) {{ $active_home }} @endif">
                            <a href="/user/departemen/DataMahasiswa" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Data Progres Studi</span>
                            </a>
                        </li>


                        <li class="sidebar-item @if (isset($active_side)) {{ $active_side }} @endif">
                            <a href="/user/departemen/ProgresPKL" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Progres PKL</span>
                            </a>
                        </li>


                        <li class="sidebar-item @if (isset($active_side)) {{ $active_side }} @endif">
                            <a href="/user/departemen/ProgresSkripsi" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Progres Skripsi</span>
                            </a>
                        </li>
                    </ul>
                </div>
