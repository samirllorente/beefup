<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ $title }}</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					@isset($options)
					<li class="dropdown">
						<a href="#Options" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i></a>
						<ul class="dropdown-menu" role="menu">
							{{ $options }}
						</ul>
					</li>
					@endisset
					<li><a class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
		      {{ $slot }}
		  </div>
		</div>
	</div>
</div>