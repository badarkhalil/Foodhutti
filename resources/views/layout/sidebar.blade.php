<style>
.slimScrollBar{
    width: 10px !important;
    opacity: 1 !important;

}
</style>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{  url ('dashboard.index')}}"><span class="m-l-10"> Foodhutti</span></a>
    </div>
    <div class="menu" >
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="{{ asset('assets/images/frontendimages/default-logo.png') }}" width="30%" alt="User"></a></div>
                    <div class="detail">
                        <h4>FoodHutti</h4>
                        <small>Restaurants</small>
                    </div>
                </div>
            </li>


            @if (Auth::user()->hasRole('admin'))
            <li class="{{ Request::segment(1) === 'dashboard' ? 'active open' : null }}"><a href="{{ url('dashboard') }}" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li class="{{ Request::segment(1) === 'categories' ? 'active open' : null }}">
                    <a href="#App" class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>Category</span></a>
                    <ul class="ml-menu">
                        <li class="{{ Request::segment(2) === 'addcategory' ? 'active' : null }}"><a href="{{ route ('category.create') }}">Add Category</a></li>
                        <li class="{{ Request::segment(2) === 'categories' ? 'active' : null }}"><a href="{{ route ('category.index') }}">View Category</a></li>
                         </ul>
                </li>
                <li class="{{ Request::segment(1) === 'menu' ? 'active open' : null }}">
                    <a href="#App" class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>Menu</span></a>
                    <ul class="ml-menu">
                        <li class="{{ Request::segment(2) === 'addmenu' ? 'active' : null }}"><a href="{{ route ('menu.create') }}">Add Menu</a></li>
                        <li class="{{ Request::segment(2) === 'menu' ? 'active' : null }}"><a href="{{ route ('menu.index') }}">View Menu</a></li>
                         </ul>
                </li>
                <li class="{{ Request::segment(1) === 'menu' ? 'active open' : null }}">
                    <a href="#App" class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>Static Ads</span></a>
                    <ul class="ml-menu">
                        <li class="{{ Request::segment(2) === 'addmenu' ? 'active' : null }}"><a href="{{ route ('bannerad') }}">Add Ads</a></li>
                    </ul>
                </li>
                <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('admin_restaurant') }}" ><i class="zmdi zmdi-apps"></i><span>View Restaurants</span></a></li>
                <li class="{{ Request::segment(1) === 'menu' ? 'active open' : null }}">
                    <a href="#App" class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>Packages Paid</span></a>
                    <ul class="ml-menu">
                        <li class="{{ Request::segment(2) === 'addmenu' ? 'active' : null }}"><a href="{{ route ('pending_requests_admin') }}">Pending Requets</a></li>
                        <li class="{{ Request::segment(2) === 'menu' ? 'active' : null }}"><a href="{{ route ('accepted_request_admin') }}">Accepted Request</a></li>
                    </ul>
                </li>


            @endif

            @if (Auth::user()->hasRole('manager'))
            <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('restaurant.index') }}" ><i class="zmdi zmdi-apps"></i><span>View/Advertise Restaurant</span></a></li>
             <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route ('restaurant.create') }}" ><i class="zmdi zmdi-apps"></i><span>Add/Update Restaurant</span></a></li>
             @php
                 $rest = App\Models\restaurant::where('user_id',Auth::user()->id)->first();
             @endphp
              @if ($rest != null)
                <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('restaurant.profile') }}" ><i class="zmdi zmdi-apps"></i><span>Restaurant Image</span></a></li>
                <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('restaurant.menu') }}" ><i class="zmdi zmdi-apps"></i><span>Menu Attachments</span></a></li>
                <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('restaurant.buffet') }}" ><i class="zmdi zmdi-apps"></i><span>Buffet Attachments</span></a></li>
                <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('restaurant.hitea') }}" ><i class="zmdi zmdi-apps"></i><span>Hi-Tea Attachments</span></a></li>
                <li class="{{ Request::segment(1) === '' ? 'active open' : null }}"><a href="{{ route('restaurant.brunch') }}" ><i class="zmdi zmdi-apps"></i><span>Brunch Attachments</span></a></li>
                <li class="{{ Request::segment(1) === 'menu' ? 'active open' : null }}">
                    <a href="#App" class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>Packages Paid</span></a>
                    <ul class="ml-menu">
                        <li class="{{ Request::segment(2) === 'addmenu' ? 'active' : null }}"><a href="{{ route ('user_pending_requests') }}">Pending Requets</a></li>
                        <li class="{{ Request::segment(2) === 'menu' ? 'active' : null }}"><a href="{{ route ('accepted_request') }}">Accepted Request</a></li>
                    </ul>
                </li>
             @endif
             @if ($rest != null)
                @if ($rest->publish == 1)
                    <li class="mb-4"><a href="{{ route('publish',$rest->id) }}" class="btn btn-success text-white" ><i class=""></i><span>Publish</span></a></li>
                @else
                    <li class="mb-4"><a href="{{ route('unpublish',$rest->id) }}" class="btn btn-danger text-white" ><i class=""></i><span>Unpublish</span></a></li>
                @endif

             @endif
             @endif

             <li class="btn btn-danger text-white btn-sm mb-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a onclick="event.preventDefault();
                        this.closest('form').submit();" href="{{ url('login') }}" class="mega-menu" title="Sign Out">
                        Logout
                        </a>
                    </form>
                </li>












        </ul>
    </div>
</aside>
