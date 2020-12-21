<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
            @if(Auth::user()->user_image!=null)
                <img class="img-circle"
                     src="{{asset('/storage/uploads/users/images/profilePic/'.Auth::user()->user_image)}}"
                     alt="User Image" height="160px">
            @else
                <img class="img-circle"
                     src="{{url('/uploads/images/dummyUser.gif')}}"
                     alt="User Image" height="160px">
            @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <p style="font-size: 12px; margin-left: 10px;">Programmer</p>
            </div>
        </div>


        <?php
        $firstLevelMenus = App\Models\Roles\Menu::getMenu($id = 0);
        $secondLevelMenus = App\Models\Roles\Menu::getMenu($id = session('menuId'));
        $menus = App\Models\Roles\Menu::getMenus();

        ?>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li>
                <a href="{{url('/dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @if(count($firstLevelMenus)>0)
                @foreach($menus as $menu)
                    @if($menu->parent_id==0)
                        <?php $secondLevelMenus = App\Models\Roles\Menu::getMenu($menu->id);  ?>

                        @if(count($secondLevelMenus)>0)
                            <li class="treeview">
                                <a href="#" class="dropdown-toggle"
                                   data-toggle="dropdown">{!! $menu->menu_icon !!}<span>{{$menu->menu_name}}</span>
                                    <span
                                            class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>         </span></a>


                                <ul class="treeview-menu">
                                    @foreach($secondLevelMenus as $secondLevelMenu)

                                        <li>
                                            <a href="{{url("$secondLevelMenu->menu_link")}}">{!! $secondLevelMenu->menu_icon !!} {{$secondLevelMenu->menu_name}}</a>
                                        </li>

                                    @endforeach
                                </ul>
                            </li>

                        @else
                            <li>
                                <a href="{{url($menu->menu_link)}}">{!! $menu->menu_icon !!}
                                    <span>{{$menu->menu_name}}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                @endforeach
            @endif
            <li>
                <a href="{{url('/feedback')}}">
                    <i class="fa fa-comments-o"></i>
                    <span>Feedback</span>
                </a>
            </li>
        </ul>
    </section>
</aside>