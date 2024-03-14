<ul class="menu p-4 w-80 min-h-full space-y-4" data-theme="dark">
    <li>
        <a href="">
            <img src="{{ url('logo.png') }}" alt="" class="h-6">
        </a>
    </li>
    <li>
        <h2 class="menu-title">Dashboard laporan</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                    <x-tabler-dashboard class="icon-5" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-tabler-list-check class="icon-5" />
                    <span>Laporan rutin</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-tabler-egg-cracked class="icon-5" />
                    <span>Laporan insidensial</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-tabler-table-export class="icon-5" />
                    <span>Export data laporan</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Ticketing</h2>
        <ul>
            <li>
                <a href="{{ route('ticket.index') }}" @class(['active' => Route::is('ticket.index')]) wire:navigate>
                    <x-tabler-ticket class="icon-5" />
                    <span>Data ticketing</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-tabler-table-export class="icon-5" />
                    <span>Export data ticket</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Pergantian rutin</h2>
        <ul>
            <li>
                <a href="#">
                    <x-tabler-filter class="icon-5" />
                    <span>Pergantian rutin</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-tabler-input-search class="icon-5" />
                    <span>Input pergantian rutin</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Buku tamu site</h2>
        <ul>
            <li>
                <a href="{{ route('tamu.index') }}" @class(['active' => Route::is('tamu.index')]) wire:navigate>
                    <x-tabler-id class="icon-5" />
                    <span>Buku tamu</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tamu.index') }}" @class(['active' => Route::is('tamu.index')]) wire:navigate>
                    <x-tabler-edit class="icon-5" />
                    <span>Input buku tamu</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Data master</h2>
        <ul>
            <li>
                <a href="#">
                    <x-tabler-settings class="icon-5" />
                    <span>Role field</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-tabler-home class="icon-5" />
                    <span>Setting list</span>
                </a>
            </li>
            <li></li>
            <li>
                <a href="{{ route('user.index') }}" @class(['active' => Route::is('user.index')]) wire:navigate>
                    <x-tabler-users class="icon-5" />
                    <span>User management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('lokasi.index') }}" @class(['active' => Route::is('lokasi.index')]) wire:navigate>
                    <x-tabler-building class="icon-5" />
                    <span>Site management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('role.index') }}" @class(['active' => Route::is('role.index')]) wire:navigate>
                    <x-tabler-asterisk class="icon-5" />
                    <span>Role & permission</span>
                </a>
            </li>
            <li>
                <a href="/adminer" target="_blank">
                    <x-tabler-database class="icon-5" />
                    <span>Adminer Database</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Pengaturan akun</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                    <x-tabler-user class="icon-5" />
                    <span>Edit profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dokumentasi') }}" @class(['active' => Route::is('dokumentasi')]) wire:navigate>
                    <x-tabler-book class="icon-5" />
                    <span>Dokumentasi</span>
                </a>
            </li>
            <li>
                <button wire:click="logout">
                    <x-tabler-logout class="icon-5" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
