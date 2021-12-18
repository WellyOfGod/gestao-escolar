@php

    $currentPage = '';
    $page = menuList()
        ->filter(function($value) use(&$currentPage)
        {
            $find = false;
            foreach($value['dropdown']['dropdown-menu'] as $menu)
            {
                if($menu['routeName'] === Route::current()->getName())
                {
                    $currentPage = $menu['menuLink'];
                    $find = true;
                }
            }
            return $find;
        });
@endphp
@if($page->isNotEmpty())
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                {{ $page[0]['menu-header'] }}
            </div>
            <div class="breadcrumb-item">
                {{ $page[0]['dropdown']['nav-link'] }}
            </div>
            <div class="breadcrumb-item">
                {{ $currentPage }}
            </div>
        </div>
    </div>
@endif
