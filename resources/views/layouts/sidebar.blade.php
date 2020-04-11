<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">{{__('front.Main')}}</li>

            <li>
                <a href="index" class="waves-effect">
                    <i class="ti-home"></i><span class="badge badge-pill badge-primary float-right">2</span>
                    <span>{{__('front.Dashboard')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('contacts.index')}}" class="waves-effect">
                    <i class="ti-home"></i><span class="badge  badge-primary float-right"></span>
                    <span>{{__('front.Contacts')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('language.index')}}" class="waves-effect">
                    <i class="ti-home"></i><span class="badge  badge-primary float-right"></span>
                    <span>{{__('front.Languages')}}</span>
                </a>
            </li>


        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->