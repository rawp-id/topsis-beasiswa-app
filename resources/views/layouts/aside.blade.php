<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="/dashboard" wire:navigate class="aside-logo">Beasiswa<span>App</span></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <ul class="nav nav-aside">
            <li class="nav-label">Dashboard</li>
            <li class="nav-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link" wire:navigate>
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="nav-item {{ $title == 'apply' ? 'active' : '' }}">
                <a href="/beasiswa/create" class="nav-link" wire:navigate>
                    <i data-feather="edit-2"></i>
                    <span>Apply Beasiswa</span>
                </a>
            </li>

            {{-- <li class="nav-item {{ $title == 'riwayat' ? 'active' : '' }}">
                <a href="/beasiswa/create" class="nav-link" wire:navigate>
                    <i data-feather="book"></i>
                    <span>Riwayat Pengajuan</span>
                </a>
            </li> --}}

            <li class="nav-label mt-4">Form Setting</li>
            <li class="nav-item {{ $title == 'Kriteria' ? 'active' : '' }}">
                <a href="/kriteria" class="nav-link" wire:navigate>
                    <i data-feather="table"></i>
                    <span>Kriteria</span>
                </a>
            </li>
            <li class="nav-item {{ $title == 'Pekerjaan' ? 'active' : '' }}">
                <a href="/pekerjaan-ortu" class="nav-link" wire:navigate>
                    <i data-feather="briefcase"></i>
                    <span>Pekerjaan Ortu</span>
                </a>
            </li>
            <li class="nav-item {{ $title == 'Penghasilan' ? 'active' : '' }}">
                <a href="/penghasilan-ortu" class="nav-link" wire:navigate>
                    <i data-feather="dollar-sign"></i>
                    <span>Penghasilan Ortu</span>
                </a>
            </li>
            <li class="nav-item {{ $title == 'Tanggungan' ? 'active' : '' }}">
                <a href="/tanggungan-ortu" class="nav-link" wire:navigate>
                    <i data-feather="anchor"></i>
                    <span>Tanggungan Ortu</span>
                </a>
            </li>
            <li class="nav-item {{ $title == 'Usia' ? 'active' : '' }}">
                <a href="/usia-ortu" class="nav-link" wire:navigate>
                    <i data-feather="activity"></i>
                    <span>Usia Ortu</span>
                </a>
            </li>
            <li class="nav-item {{ $title == 'Nilai' ? 'active' : '' }}">
                <a href="/nilai" class="nav-link" wire:navigate>
                    <i data-feather="percent"></i>
                    <span>Nilai</span>
                </a>
            </li>

            <li class="nav-label mt-4">Menu</li>
            <li class="nav-item">
                <a href="/logout" class="nav-link" wire:navigate>
                    <i data-feather="log-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
