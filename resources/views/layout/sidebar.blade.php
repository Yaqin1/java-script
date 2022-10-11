<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="../../index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Smk Antartika 1 Sidoarjo</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{Auth()->user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">DASHBOARD</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : ''}}">
                    <i class="fas fa-compass"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>


                @if(auth()->user()->role== 'admin')
                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('guru.index') }}" class="nav-link {{ request()->is('guru*') ? 'active' : ''}}">
                        <i class="fa fa-user-tie"></i>
                        <p>
                             Guru
                        </p>
                    </a>


                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}" class="nav-link {{ request()->is('kelas*') ? 'active' : ''}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>
                             Kelas
                        </p>
                    </a>

                <li class="nav-item">
                    <a href="{{ route('mapel.index') }}" class="nav-link {{ request()->is('mapel*') ? 'active' : ''}}">
                    <i class="fas fa-book-open"></i>
                        <p>
                            Mapel
                        </p>
                    </a>

                <li class="nav-item">
                    <a href="{{ route('siswa.index') }}" class="nav-link {{ request()->is('siswa*') ? 'active' : ''}}">
                        <i class="fas fa-user-graduate"></i>
                        <p>
                             Siswa
                        </p>
                    </a>
</li>
@endif
</ul>

        </nav>

    </div>

</aside>