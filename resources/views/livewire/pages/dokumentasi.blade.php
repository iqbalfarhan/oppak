<div class="page-wrapper">

    @livewire('partial.header', ['title' => 'Dokumentasi aplikasi'])

    <div class="flex flex-row md:flex-row-reverse gap-12 ">
        <ul class="menu w-80">
            <li class="menu-title">Dokumentasi aplikasi :</li>
            <li>
                <ul>
                    @foreach ($files as $permission => $filename)
                        @can($permission)
                            <li>
                                <button wire:click="setFile('{{ $filename }}')" @class(['active' => $filename == $file])>
                                    {{ Str::replaceLast('.md', '', basename($filename)) }}
                                </button>
                            </li>
                        @endcan
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="flex-1">
            <article class="prose">
                @if ($this->file)
                    {!! Str::markdown($content) !!}
                @endif
            </article>
        </div>
    </div>
</div>
