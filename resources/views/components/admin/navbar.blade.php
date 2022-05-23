<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars" style="color: #9e78f8"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">

                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('assets-admin/build/images/avatar.png') }}" alt="">Afif
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ route('admin.profile.edit') }}"><i class="fa fa-user pull-right"></i>
                                Profile</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-green">5</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        {{-- @foreach ($log as $item)
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{ asset('assets-admin/build/images/avatar.png') }}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>{{ $item->user->name }}</span>
                                    <span class="time">{{ $item->created_at }}</span>
                                </span>
                                <span class="message">
                                    {{ $item->description }}
                                </span>
                            </a>
                        </li>
                        @endforeach --}}
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->