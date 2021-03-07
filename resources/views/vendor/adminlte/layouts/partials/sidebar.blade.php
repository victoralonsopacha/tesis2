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
            @hasrole('Admin')
            <li><a href="{{ route('home') }}"><i class=''></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#"><span><i class='fa fa-users'></i> <span>Usuarios</span></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.create') }}">Crear usuario</a></li>
                    <li><a href="{{ route('users.activos') }}">Ver Usuarios</a></li>
                </ul>
            </li>
            <li><a href="{{ route('import-form') }}"><i class='fa fa-upload'></i> <span>Importar datos biometrico</span></a></li>
            <li><a href="{{route('consolidado_individual.index')}}"><i class='fa fa-file-excel-o'></i> <span>Exportar Timbradas Biometrico</span></a></li>
            <li><a href="{{route('consolidado_permisos.index')}}"><i class='fa fa-file-excel-o'></i> <span>Exportar Timbradas Permisos</span></a></li>
            <!--
            <li class="treeview">
                <a href="#"><span><i class='fa fa-bell-o'></i> <span>Permisos Timbrados</span></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('timbrada_permisos.index') }}">Registrar Permiso</a></li>
                    <li><a href="{{ route('consolidado_individual.index') }}">Ver Permisos registrados</a></li>
                </ul>
            </li>-->

            @endhasrole
            @hasrole('Inspector')
            <li><a href="{{ route('dashboard.inspector') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('profile.inspector') }}"><i class='fa fa-user-circle'></i> <span>Perfil</span></a></li>
            <li><a href="{{ route('calculo_tiempos.index') }}"><i class='fa fa-users'></i> <span>Calcular horas</span></a></li>
            <li><a href="{{ route('permisos.index') }}"><i class='fa fa-file-o'></i> <span>Permisos</span></a></li>
            <li><a href="{{ route('timbrada_permisos.index') }}"><i class='fa fa-bell-o'></i> <span>Timbrar Permisos</span></a></li>
            <li class="treeview">
                <a href="#"><span><i class='fa fa-clock-o'><span>  Dias Reposicion</span></span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('tiempo_reposicions.index') }}">Todos</a></li>
                    <li><a href="{{route('tiempo_reposicions.index_inspector')}}">Por Usuario</span></a></li>
                </ul>
            </li>

            <li><a href="{{route('consolidado_individual.index')}}"><i class='fa fa-file-excel-o'></i> <span>Exportar Timbradas Biometrico</span></a></li>


            <li><a href="{{route('consolidado_permisos.index')}}"><i class='fa fa-file-excel-o'></i> <span>Exportar Timbradas Permisos</span></a></li>
            <!--
            <li><a href="{{route('consolidado_individual.exportPdf')}}"><i class='fa fa-file-excel-o'></i> <span>EXPORTAR PDF</span></a></li>
            -->

            <!-- <li><a href=""><i class='fa fa-link'></i> <span>Justificaciones</span></a></li> -->
            @endhasrole
            @hasrole('Profesor')
            <li class="active"><a href="{{ route('dashboard.profesor') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('perfil.profesor') }}"><i class='fa fa-user'></i> <span>Perfil</span></a></li>
            <li><a href="{{ route('jornada.index') }}"><i class='fa fa-clock-o'></i> <span>Jornada</span></a></li>
            <li><a href="{{ route('atrasos.index') }}"><i class='fa fa-cogs'></i> <span>Atrasos</span></a></li>
            <li><a href="{{ route('tiempo_reposicions.create') }}"><i class='fa fa-clock-o'></i> <span>Reponer Horas</span></a></li>
            <li class="treeview">
                <a href="#"><span><i class='fa fa-file-o'></i> <span> Permisos</span></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('permiso_profesors.create') }}">Crear Permiso</a></li>
                    <li><a href="{{ route('permiso_profesors.shows') }}">Ver Permisos</a></li>
                </ul>
            </li>
            @endhasrole

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
