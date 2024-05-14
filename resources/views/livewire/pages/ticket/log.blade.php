<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Log ticket'])

    @livewire('pages.ticket.chat', ['ticket' => $ticket])
</div>
