<div>
    @if ($logotype == 'image')
        <img src="{{ url('oppaklogo.svg') }}" @class([$class]) />
    @else
        <div class="font-bold text-5xl mb-4 text-base-content">{{ config('app.name') }}</div>
    @endif
</div>
