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



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

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
            <li><a href="{{ route('import-form') }}"><i class='fa fa-upload'></i> <span>Importar datos del biométrico</span></a></li>
            <li><a href="{{route('consolidado_individual.index')}}"><i class='fa fa-file-excel-o'></i> <span>Exportar Timbradas Biométrico</span></a></li>
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
            <li><a href="{{ route('profile.inspector') }}"><i class='fa fa-user-circle'></i> <span>Perfil</span></a></li>
            <li><a href="{{ route('calculo_tiempos.index') }}"><i class='fa fa-users'></i> <span>Calcular horas y permisos</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Permisos</span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('permisos.index') }}">Todos</a></li>
                </ul>
            </li>
            <li><a href="{{ route('timbrada_permisos.index') }}"><i class='fa fa-bell-o'></i><span>Timbrar Permisos</span></a></li>
            <li><a href="{{ route('tiempo_reposicions.index_inspector') }}"><i class='fa fa-clock-o'></i><span>Días Reposición</span></a></li>
            <li><a href="{{route('consolidado_individual.index')}}"><i class="fa fa-download" aria-hidden="true"></i><span>Timbradas Biométrico</span></a></li>
            <li><a href="{{route('consolidado_permisos.index')}}"><i class="fa fa-download" aria-hidden="true"></i><span>Timbradas Permisos</span></a></li>

            @endhasrole
            @hasrole('Profesor')
            <li><a href="{{ route('profile.profesor') }}"><i class='fa fa-user'></i> <span>Perfil</span></a></li>
            <li><a href="{{ route('jornada.index') }}"><i class='fa fa-clock-o'></i> <span>Jornada</span></a></li>
            <li><a href="{{ route('atrasos.index') }}"><i class='fa fa-cogs'></i> <span>Atrasos</span></a></li>
            <li class="treeview">
                <a href="#"><span><i class='fa fa-clock-o'></i> <span> Reponer Horas</span></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('tiempo_reposicions.create') }}"><span>Crear Reposición</span></a></li>
                    <li><a href="{{ route('tiempo_reposicions.shows') }}">Ver Reposiciones</a></li>
                </ul>
            </li>
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
