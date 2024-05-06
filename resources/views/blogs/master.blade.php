
<!doctype html>
<html lang="en">
@include('blogs.layouts.head')
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	@include('blogs.layouts.header')

	
	

	@yield('content')
	


	@include('blogs.layouts.footer') <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    @include('blogs.layouts.script')

    
  </body>
  </html>
