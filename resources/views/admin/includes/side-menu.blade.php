<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.index')}}" class="site_title"><span>Axelan | Admin</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ $gravatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Välkommen,</span>
                <h2>{{ $admin->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <div class="clear"></div>
                <h3>Meny</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Hem</a></li>
                    <li><a><i class="fa fa-ticket"></i> Bokningar <span class="fa fa-chevron-down"></span> </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.books') }}">Alla</a></li>
                            <li><a href="{{ route('admin.books.checkin') }}">Checka in</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i> Användare <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.users') }}">Alla</a></li>
                            <li><a href="{{ route('admin.users.admins') }}">Admins</a></li>
                            <li><a href="{{ route('admin.users.new') }}">Lägg till ny</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>