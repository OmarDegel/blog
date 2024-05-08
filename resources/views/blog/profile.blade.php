
@extends('blog.master')
@section('content')


	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>


	<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
					<div class="blog-entry d-flex blog-entry-search-item">
						<a href="single.html" class="img-link me-4">
							<img src="images/img_5_sq.jpg" alt="Image" class="img-fluid">
						</a>
						<div>
							<span class="date">Apr. 14th, 2022</span>
							<h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
							<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
						</div>
					</div>

					

				</div>

				<div class="col-lg-4 sidebar">
					
					<div class="sidebar-box search-form-wrap mb-4">
						
					</div>
					<!-- END sidebar-box -->
					<div class="sidebar-box">
						<div class="bio text-center">
							<img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid mb-3">
							<div class="bio-body">
								<p><a href="#" class="btn btn-primary btn-sm rounded px-1 py-1">edit img</a></p>
							<h2>Hannah Anderson</h2>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
							<p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">add blog</a></p>
							<p class="social">
								<a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
								<a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
								<a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
								<a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
							</p>
							</div>
											</div>
					<!-- END sidebar-box -->

					
					<!-- END sidebar-box -->


				</div>
			</div>
		</div>
	</div>

	@endsection
