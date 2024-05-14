<div class="page-wrapper">

    @livewire('partial.header', ['title' => 'Dokumentasi aplikasi'])

    <div class="flex flex-col md:flex-row gap-12 ">
        <div class="flex-1">
            <article class="prose">
                @if ($this->file)
                    {!! Str::markdown($content) !!}
                @endif
            </article>
        </div>

        <div>
            <ul class="menu w-full md:w-80 bg-base-300 p-4 rounded-lg">
                <h2 class="menu-title">Dokumentasi aplikasi :</h2>
                <li></li>
                @foreach ($files as $permission => $filename)
                    @can($permission)
                        <li>
                            <button wire:click="setFile('{{ $filename }}')" @class(['active' => $filename == $file])>
                                {{ $no++ }}. {{ Str::title($filename) }}
                            </button>
                        </li>
                    @endcan
                @endforeach
            </ul>
        </div>
    </div>
</div>
