<div class="card card-compact">
    <div class="card-body flex flex-row gap-3 items-center">
        <div class="avatar placeholder">
            <div @class([
                'w-12 rounded-full text-lg',
                'bg-base-200' => $color == 'base',
                'bg-success' => $color == 'success',
                'bg-warning' => $color == 'warning',
            ])>
                <span>{{ $number }}</span>
            </div>
        </div>
        <div class="flex flex-col flex-1">
            <div class="text-lg font-bold">{{ $title }}</div>
            <div class="text-sm">{{ $desc }}</div>
        </div>
    </div>
</div>
