<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            @if($menus)
            @foreach($menus as $v)
            @permission($v['slug'])
            @if($v['child'])
            <li class="nav-item  {{active_class(if_uri_pattern(explode(',',$v['url'])),'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="{{$v['icon']}}"></i>
                    <span class="title">{{$v['name']}}</span>
                    <span class="arrow {{active_class(if_uri_pattern(explode(',',$v['url'])),'open')}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    @foreach($v['child'] as $val)
                    @permission($val['slug'])
                    <li class="nav-item {{active_class(if_uri_pattern([$val['url'].'*']),'active')}}">
                        <a href="{{url($val['url'])}}" class="nav-link">
                            <i class="{{$val['icon']}}"></i>
                            <span class="title">{{$val['name']}}</span>

                        </a>
                    </li>
                    @endpermission
                    @endforeach
                </ul>
            </li>
            @else
            <li class="nav-item {{active_class(if_uri_pattern([$v['url']]))}}">
                <a href="{{url($v['url'])}}" class="nav-link nav-toggle">
                    <i class="{{$v['icon']}}"></i>
                    <span class="title">{{$v['name']}}</span>
                </a>
            </li>
            @endif
            @endpermission
            @endforeach
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR