<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Quản trị!</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="public/backend/production/images/img.jpg" alt="public/backend." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Xin chào,</span>
                <h2>{{Str::upper(Auth::user()->name)}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{route('getDashBoard')}}"><i class="fa fa-home"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="{{route('cate.index')}}"><i class="fa fa-home"></i> Danh mục </a>
                    </li>
                    <li>
                        <a><i class="fa fa-home"></i> Truyện <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('book.create')}}">Thêm</a></li>
                            <li><a href="{{route('book.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-home"></i> Chương <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('chapter.create')}}">Thêm</a></li>
                            <li><a href="{{route('chapter.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
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
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>