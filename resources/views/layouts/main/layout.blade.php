<!DOCTYPE html>
<html lang="pt-br">
@include('layouts.main.head')

<body>
<div id="app">
    <div class="main-wrapper">
        @include('layouts.main.navbar')
        @include('layouts.main.main-sidebar')
        <div class="main-content">
            <section class="section">
                @include('layouts.main.section-header')
                <div class="section-body">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
</div>
</body>
@include('layouts.main.footer')
</html>
