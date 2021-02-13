<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            @hasrole('Admin')
            <li><a href="{{ route('users.index') }}"><i class='fa fa-users'></i> <span>Usuarios</span></a></li>
            <li><a href="{{ route('import-form') }}"><i class='fa fa-upload'></i> <span>Importar Archivo</span></a></li>
            <li><a href="{{ route('timbrada_permisos.index') }}"><i class='fa fa-bell-o'></i> <span>Timbrar Permisos</span></a></li>

            @endhasrole
            @hasrole('Inspector')
            <li><a href="{{ route('dashboard.inspector') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('perfil.inspector') }}"><i class='fa fa-user-circle'></i> <span>Perfil</span></a></li>
            <li><a href="{{ route('calculo_tiempos.index') }}"><i class='fa fa-users'></i> <span>Usuarios</span></a></li>
            <li><a href="{{ route('permisos.index') }}"><i class='fa fa-file-o'></i> <span>Permisos</span></a></li>
            <li><a href="#"><i class='fa fa-clock-o'></i><span>Atrasos</span></a></li>
            <li><a href="{{ route('timbrada_permisos.index') }}"><i class='fa fa-bell-o'></i> <span>Timbrar Permisos</span></a></li>
            <li><a href="{{route('consolidado_individual.index')}}"><i class='fa fa-file-excel-o'></i> <span>Reportes</span></a></li>


            <!-- <li><a href=""><i class='fa fa-link'></i> <span>Justificaciones</span></a></li> -->
            @endhasrole
            @hasrole('Profesor')
            <li><a href="{{ route('dashboard.profesor') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('perfil.profesor') }}"><i class='fa fa-tachometer'></i> <span>Perfil</span></a></li>
            <li><a href="{{ route('jornada.index') }}"><i class='fa fa-clock-o'></i> <span>Jornada</span></a></li>
            <li><a href="{{ route('permiso_profesors.principal') }}"><i class='fa fa-file-o'></i> <span>Permisos</span></a></li>
            <li><a href="{{ route('atrasos.index') }}"><i class='fa fa-cogs'></i> <span>Atrasos</span></a></li>
            <li><a href="{{ route('permiso_profesors.principal') }}"><i class='fa fa-check-square-o'></i> <span>Justificaciones</span></a></li>
            @endhasrole

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
