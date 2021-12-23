<div class="section-header">
    @isset($title)
        <h1>{{ $title }}</h1>
    @else
        <h1>@yield('title')</h1>
    @endisset
    <div class="section-header-breadcrumb">
        @isset($menuHeader)
            <div class="breadcrumb-item">
                {{ $menuHeader }}
            </div>
        @endisset
        @isset($navLink)
            <div class="breadcrumb-item">
                {{ $navLink }}
            </div>
        @endisset
        @isset($currentPage)
            <div class="breadcrumb-item">
                {{ $currentPage }}
            </div>
        @endisset
    </div>
</div>
