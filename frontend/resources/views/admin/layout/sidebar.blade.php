<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i
                        class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('featured-listing') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('featured') }}"><i class="fa fa-user-plus"></i> <span>Featured Listings</span></a>
            </li>

            </li>
            <li class="{{ Request::is('logs') ? 'active' : '' }}"><a class="nav-link" href="{{ route('getlogs') }}"><i
                        class="fa fa-cog"></i>
                    <span>Logs</span></a>
            </li>

            <li class="{{ Request::is('edit-profile') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('editprofile') }}"><i class="fa fa-user-plus"></i> <span>Profile</span></a>






        </ul>
    </aside>
</div>
