<div class="flex justify-between items-start">
    <div class="flex flex-col">
        <h3 class="font-semibold text-lg">{{ $title }}</h3>
        <span class="text-xs opacity-50">{{ $desc }}</span>
    </div>
    <div class="text-xs breadcrumbs hidden md:flex">
        <ul>
            @foreach ($routes as $route)
                <li class="capitalize">{{ $route }}</li>
            @endforeach
        </ul>
    </div>
</div>
