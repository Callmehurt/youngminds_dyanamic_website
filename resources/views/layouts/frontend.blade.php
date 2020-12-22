<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frontend</title>

{{--    Bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('lib/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>
<section class="header_section shadow-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar">
                    <div>
                        <a href="{{route('frontend.home')}}" style="text-decoration: none;color: black"><h2>YoungMinds</h2></a>
                        <ul class="menu_list">
                            <div class="icon cancel-btn">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </div>

                            <?php
                            $firstLevelMenus = App\Models\NavbarMenu::getMenus();
                            ?>
                            @if(count($firstLevelMenus)>0)
                                @foreach($firstLevelMenus as $menu)
                                    @if($menu->parent_id==0)
                                        <?php   $secondLevelMenus = App\Models\NavbarMenu::getMenu($id = $menu->id); ?>
                                        @if(empty($menu->module_url))
                                                <li><a href="{{$menu->site_url}}">{{$menu->menu_name}} @if(count($secondLevelMenus)>0)<i class="fa fa-caret-down" style="margin-left: 5px"></i>@endif</a>
                                            @else
                                                <li><a href="{{$menu->module_url}}">{{$menu->menu_name}} @if(count($secondLevelMenus)>0)<i class="fa fa-caret-down" style="margin-left: 5px"></i>@endif</a>
                                        @endif
                                            @if(count($secondLevelMenus) > 0)
                                                <ul class="second-menu">
                                                    @foreach($secondLevelMenus as $secondMenu)
                                                        @if(empty($secondMenu->slug))
                                                            @if(empty($secondMenu->module_url))
                                                            <li><a href="{{$secondMenu->site_url}}" target="_blank">{{$secondMenu->menu_name}}</a></li>
                                                            @else
                                                            <li><a href="{{$secondMenu->module_url}}">{{$secondMenu->menu_name}}</a></li>
                                                            @endif
                                                            @else
                                                            <li><a href="{{route('frontend.getSinglePage',[$secondMenu->slug])}}">{{$secondMenu->menu_name}}</a></li>
                                                        @endif
                                                        @endforeach
                                                </ul>
                                                @endif
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div class="icon menu-btn">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<section>
    @yield('content')
</section>
<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="footer-wrapper">
                    <h3>About</h3>
                    <hr>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-wrapper">
                    <h3>Quick Links</h3>
                    <hr>
                    <ul class="quick-links">
                        <?php $lastest = App\Models\News::getLastestNews(); ?>
                        @foreach($lastest as $val)
                            <li class="footer-list"><a href="{{route('frontend.getNews', [$val->id])}}" class="link">{{$val->title}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-wrapper">
                    <h3>Address</h3>
                    <hr>
                    <ul class="address-list">
                        <li class="footer-list"><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px"></i>Kathmandu, Nepal</li>
                        <li class="footer-list"><i class="fa fa-envelope" aria-hidden="true" style="margin-right: 5px"></i>P.O.Box: Kathmandu, Nepal</li>
                        <li class="footer-list"><i class="fa fa-fax" aria-hidden="true" style="margin-right: 5px"></i>Fax: 977 1 4569852</li>
                        <li class="footer-list"><i class="fa fa-volume-control-phone" aria-hidden="true" style="margin-right: 5px"></i>Phone: 977 1 4569852</li>
                        <li class="footer-list"><i class="fa fa-envelope" aria-hidden="true" style="margin-right: 5px"></i>Email: youngminds@mail.com.np</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script>
    const menu = document.querySelector(".menu_list");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");

    menuBtn.onclick = () => {
        menu.classList.add("active");
        menuBtn.classList.add("hide");
    }

    cancelBtn.onclick = () => {
        menu.classList.remove("active");
        menuBtn.classList.remove("hide");
    }


    const currentLocation = location.href;
    const links = document.querySelectorAll(".menu_list li a");
    for (i=0;i<links.length; i++){
        // alert('current:'+currentLocation + 'link:' + links[i])
        if(links[i].href === currentLocation){
            links[i].className = 'active'
        }
    }

</script>
</body>
</html>