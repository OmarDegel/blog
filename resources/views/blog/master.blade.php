<!doctype html>
<html lang="en">

@include('blog.layouts.head')



<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

@include('blog.layouts.header')




@yield('content')




@include('blog.layouts.footer')

@include('blog.layouts.scripts')
@livewireScripts

</body>

</html>
