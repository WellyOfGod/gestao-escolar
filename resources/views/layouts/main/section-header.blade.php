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
    @component('components.section-header', [
        'menuHeader'    => $page[0]['menu-header'] ,
        'navLink'       => $page[0]['dropdown']['nav-link'],
        'currentPage'   => $currentPage,
    ])
    @endcomponent
@else
    @yield('custom-section-header')
@endif
