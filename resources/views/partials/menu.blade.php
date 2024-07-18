<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background-color: #91DDCF;">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#" style="color: white;">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link" style="color: white; background-color: #91DDCF;" 
               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt" style="color: white;">
                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#" style="color: white; background-color: #91DDCF;"
                   onmouseover="this.style.backgroundColor='#088395';" 
                   onmouseout="this.style.backgroundColor='#91DDCF';">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon" style="color: white;">
                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}" 
                               style="color: white; background-color: #91DDCF;" 
                               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
                               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon" style="color: white;">
                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}" 
                               style="color: white; background-color: #91DDCF;" 
                               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
                               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon" style="color: white;">
                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}" 
                               style="color: white; background-color: #91DDCF;" 
                               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
                               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon" style="color: white;">
                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('fn_b_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is('admin/tables*') ? 'c-show' : '' }} {{ request()->is('admin/bookings*') ? 'c-show' : '' }} {{ request()->is('admin/prices*') ? 'c-show' : '' }} {{ request()->is('admin/products*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#" style="color: white; background-color: #91DDCF;"
                   onmouseover="this.style.backgroundColor='#088395';" 
                   onmouseout="this.style.backgroundColor='#91DDCF';">
                    <i class="fa-fw fas fa-clipboard c-sidebar-nav-icon" style="color: white;">
                    </i>
                    {{ trans('cruds.pengelolaan.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pesanan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.pesanans.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/pesanans') || request()->is('admin/pesanans/*') ? 'c-active' : '' }}" 
                               style="color: white; background-color: #91DDCF;" 
                               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
                               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon" style="color: white;">
                                </i>
                                {{ trans('cruds.pesanan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.products.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'c-active' : '' }}" 
                               style="color: white; background-color: #91DDCF;" 
                               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
                               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                                <i class="fa-fw fas fa-box c-sidebar-nav-icon" style="color: white;">
                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}" 
                       style="color: white; background-color: #91DDCF;" 
                       onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon" style="color: white;">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" 
               style="color: white; background-color: #91DDCF;" 
               onmouseover="this.style.backgroundColor='#088395'; this.style.color='white';" 
               onmouseout="this.style.backgroundColor='#91DDCF'; this.style.color='white';">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt" style="color: white;">
                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>