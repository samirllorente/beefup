<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-language"></i> <span>BEEF UP</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2>{{ Auth::user()->name }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Inicio</a></li>
          @if(Auth::user()->hasAnyRole(['teacher','student']))
          <li {!! classActivePath('reading*') !!}>
            <a><i class="fa fa-laptop"></i> Actividades <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li {!! classActivePath('reading*') !!}>
                <a>Lectura<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  @if(!Auth::user()->hasAnyRole('student'))
                  <li><a href="{{ route('reading.create') }}">Crear</a></li>
                  @endif
                  <li><a href="{{ route('reading.index') }}">Ver todas</a></li>
                </ul>
              </li>
              <!--li>
                <a>Oraciones<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Crear</a></li>
                  <li><a href="#">Ver todas</a></li>
                </ul>
              </li-->
            </ul>
          </li>
          @endif  
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Salir" href="#"
        onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>