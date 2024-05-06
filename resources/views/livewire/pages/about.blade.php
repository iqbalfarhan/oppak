<div class="page-wrapper" wire:poll>
    @livewire('partial.header', ['title' => 'Tentang aplikasi'])

    <article class="prose mx-auto py-6">
        {!! Str::markdown(file_get_contents(base_path('README.md'))) !!}
    </article>
</div>
