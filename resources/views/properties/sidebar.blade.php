<aside class="main-sidebar sidebar-light-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">E-RAPOR</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('md.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Mata Diklat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kk.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>
                            Kompetensi Keahlian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sk.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-ribbon"></i>
                        <p>
                            Standar Kompetensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('guru.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>
                            Guru
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('siswa.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-astronaut"></i>
                        <p>
                            Siswa
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>