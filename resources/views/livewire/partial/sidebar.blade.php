<ul class="sidebar menu p-4 w-80 min-h-full text-base-content space-y-6" data-theme="dark">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            @can('home')
                <li>
                    <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                        <x-tabler-calendar class="size-5" />
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcan
            @can('tamu.dashboard')
                <li>
                    <a href="{{ route('tamu.dashboard') }}" @class([
                        'active' => Route::is([
                            'tamu.dashboard',
                            'tamu.index',
                            'tamu.create',
                            'tamu.show',
                        ]),
                    ]) wire:navigate>
                        <x-tabler-users class="size-5" />
                        <span>Buku Tamu</span>
                    </a>
                </li>
            @endcan
            @can('ticket.index')
                <li>
                    <a href="{{ route('ticket.index') }}" @class([
                        'active' => Route::is(['ticket.index', 'ticket.show']),
                    ]) wire:navigate>
                        <x-tabler-ticket class="size-5" />
                        <span>Ticketing</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Buat Laporan</h2>
        <ul>
            @can('laporan.index')
                <li>
                    <a href="{{ route('laporan.index') }}" @class(['active' => Route::is(['laporan.index', 'laporan.show'])]) wire:navigate>
                        <x-tabler-home class="size-5" />
                        <span>Laporan Rutin</span>
                    </a>
                </li>
            @endcan
            @can('tamu.dashboard')
                <li>
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-tabler-users class="size-5" />
                        <span>Laporan Insidensial</span>
                    </a>
                </li>
            @endcan
            @can('home')
                <li>
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-tabler-home class="size-5" />
                        <span>Pergantian Rutin</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    @canany(['user.index', 'permission.index', 'database', 'setting.index', 'tamu.index'])
        <li>
            <h2 class="menu-title">Pengaturan</h2>
            <ul>
                @can('setting.index')
                    <li>
                        <a href="{{ route('setting.index') }}" @class(['active' => Route::is('setting.index')]) wire:navigate>
                            <x-tabler-settings class="size-5" />
                            <span>Pengaturan</span>
                        </a>
                    </li>
                @endcan
                @can('user.index')
                    <li>
                        <a href="{{ route('user.index') }}" @class(['active' => Route::is('user.index')]) wire:navigate>
                            <x-tabler-users class="size-5" />
                            <span>User Management</span>
                        </a>
                    </li>
                @endcan
                @can('site.index')
                    <li>
                        <a href="{{ route('site.index') }}" @class(['active' => Route::is('site.index')]) wire:navigate>
                            <x-tabler-building class="size-5" />
                            <span>Site Management</span>
                        </a>
                    </li>
                @endcan
                @can('permission.index')
                    <li>
                        <a href="{{ route('permission.index') }}" @class(['active' => Route::is('permission.index')]) wire:navigate>
                            <x-tabler-key class="size-5" />
                            <span>Role & Permission</span>
                        </a>
                    </li>
                @endcan
                @can('database')
                    <li>
                        <a href="/adminer">
                            <x-tabler-database class="size-5" />
                            <span>Adminer Database</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
    <li>
        <h2 class="menu-title">Lainnya</h2>
        <ul>
            @can('about')
                <li>
                    <a href="{{ route('about') }}" @class(['active' => Route::is('about')]) wire:navigate>
                        <x-tabler-file class="size-5" />
                        <span>Tentang Aplikasi</span>
                    </a>
                </li>
            @endcan
            @can('profile')
                <li>
                    <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                        <x-tabler-user-circle class="size-5" />
                        <span>Edit Profile</span>
                    </a>
                </li>
            @endcan
            <li>
                <button wire:click="$dispatch('logout')">
                    <x-tabler-logout class="size-5" />
                    <span>Keluar Aplikasi</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
