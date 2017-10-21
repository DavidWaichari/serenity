
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>
            @can(['clients.index','clients.create'])
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Clients</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('clients.index') !!}"><i class="fa fa-circle-o"></i> Clients List</a></li>
                        <li><a href="{!! route('clients.create') !!}"><i class="fa fa-circle-o"></i> Add Client</a></li>
                    </ul>
                </li>
            @endcan
            @can(['sponsors.index','sponsors.create'])
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Sponsors</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('sponsors.index') !!}"><i class="fa fa-circle-o"></i> Sponsors List</a></li>
                    <li><a href="{!! route('sponsors.create') !!}"><i class="fa fa-circle-o"></i> Add Sponsor</a></li>
                </ul>
            </li>
            @endcan
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Admissions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admissions.index')}}"><i class="fa fa-circle-o"></i> Admissions List</a></li>
                    <li><a href="{!! route('admissions.create') !!}"><i class="fa fa-circle-o"></i>Add Admission</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Employees</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('employees.index') !!}"><i class="fa fa-circle-o"></i> Employees List</a></li>
                    <li><a href="{!! route('employees.create') !!}"><i class="fa fa-circle-o"></i> Add Employee</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Roles</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o"></i>Roles List</a></li>
                    <li><a href="{!! route('roles.create') !!}"><i class="fa fa-circle-o"></i>Add Role</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Permissions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('permissions.index')!!}"><i class="fa fa-circle-o"></i>Permissions List</a></li>
                    <li><a href="{!! route('permissions.create') !!}"><i class="fa fa-circle-o"></i>Add Permission</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i> Users List</a></li>
                    <li><a href="{!! route('users.create') !!}"><i class="fa fa-circle-o"></i>Add User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Stations</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('stations.index')}}"><i class="fa fa-circle-o"></i>Stations List</a></li>
                    <li class="active"><a href="{{route('stations.create')}}"><i class="fa fa-circle-o"></i>Add Station</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
