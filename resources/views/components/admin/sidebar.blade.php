<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title">
                Administrator
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('assets-admin/build/images/back_disabled.png') }}" alt="..."
                    class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>Afif Maulana</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
            <div class="menu_section">

                <ul class="nav side-menu">
                    <h3 class="mb-3" style="color: #adadad">Dashboard</h3>
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </span></a>
                    </li>

                    <h3 class="mb-3" style="color: #adadad; padding-top: 10px;">Users</h3>
                    <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-list"></i> Users </span></a></li>

                    <h3 class="mb-3" style="color: #adadad; padding-top: 10px;">Brand</h3>
                    <li><a href="#"><i class="fa fa-list"></i> Brand </span></a></li>

                    <h3 class="mb-3" style="color: #adadad; padding-top: 10px;">Jenis</h3>
                    <li><a href="#"><i class="fa fa-list"></i> Jenis </span></a></li>

                    <h3 class="mb-3" style="color: #adadad; padding-top: 10px;">Ukuran</h3>
                    <li><a href="#"><i class="fa fa-list"></i> Ukuran </span></a></li>
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Dashboard">
                <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>

            <a href="#" data-toggle="tooltip" data-placement="top"
                title="Update Profile">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
