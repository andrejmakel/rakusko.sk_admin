<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.log") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            Visitors
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('main_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/malls*") ? "menu-open" : "" }} {{ request()->is("admin/shops*") ? "menu-open" : "" }} {{ request()->is("admin/places*") ? "menu-open" : "" }} {{ request()->is("admin/posts*") ? "menu-open" : "" }} {{ request()->is("admin/infos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/malls*") ? "active" : "" }} {{ request()->is("admin/shops*") ? "active" : "" }} {{ request()->is("admin/places*") ? "active" : "" }} {{ request()->is("admin/posts*") ? "active" : "" }} {{ request()->is("admin/infos*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-home">

                            </i>
                            <p>
                                {{ trans('cruds.main.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('mall_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.malls.index") }}" class="nav-link {{ request()->is("admin/malls") || request()->is("admin/malls/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mall.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('shop_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.shops.index") }}" class="nav-link {{ request()->is("admin/shops") || request()->is("admin/shops/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-basket">

                                        </i>
                                        <p>
                                            {{ trans('cruds.shop.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('place_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.places.index") }}" class="nav-link {{ request()->is("admin/places") || request()->is("admin/places/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked">

                                        </i>
                                        <p>
                                            {{ trans('cruds.place.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('post_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.posts.index") }}" class="nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-newspaper">

                                        </i>
                                        <p>
                                            {{ trans('cruds.post.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('info_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.infos.index") }}" class="nav-link {{ request()->is("admin/infos") || request()->is("admin/infos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-info-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.info.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('property_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/tags*") ? "menu-open" : "" }} {{ request()->is("admin/activities*") ? "menu-open" : "" }} {{ request()->is("admin/shop-categories*") ? "menu-open" : "" }} {{ request()->is("admin/navis*") ? "menu-open" : "" }} {{ request()->is("admin/openings*") ? "menu-open" : "" }} {{ request()->is("admin/opening-texts*") ? "menu-open" : "" }} {{ request()->is("admin/prices*") ? "menu-open" : "" }} {{ request()->is("admin/price-texts*") ? "menu-open" : "" }} {{ request()->is("admin/langs*") ? "menu-open" : "" }} {{ request()->is("admin/sidebars*") ? "menu-open" : "" }} {{ request()->is("admin/ads*") ? "menu-open" : "" }} {{ request()->is("admin/carousels*") ? "menu-open" : "" }} {{ request()->is("admin/holiday-names*") ? "menu-open" : "" }} {{ request()->is("admin/holidays*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/tags*") ? "active" : "" }} {{ request()->is("admin/activities*") ? "active" : "" }} {{ request()->is("admin/shop-categories*") ? "active" : "" }} {{ request()->is("admin/navis*") ? "active" : "" }} {{ request()->is("admin/openings*") ? "active" : "" }} {{ request()->is("admin/opening-texts*") ? "active" : "" }} {{ request()->is("admin/prices*") ? "active" : "" }} {{ request()->is("admin/price-texts*") ? "active" : "" }} {{ request()->is("admin/langs*") ? "active" : "" }} {{ request()->is("admin/sidebars*") ? "active" : "" }} {{ request()->is("admin/ads*") ? "active" : "" }} {{ request()->is("admin/carousels*") ? "active" : "" }} {{ request()->is("admin/holiday-names*") ? "active" : "" }} {{ request()->is("admin/holidays*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.property.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tags.index") }}" class="nav-link {{ request()->is("admin/tags") || request()->is("admin/tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activity_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.activities.index") }}" class="nav-link {{ request()->is("admin/activities") || request()->is("admin/activities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bicycle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.activity.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('shop_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.shop-categories.index") }}" class="nav-link {{ request()->is("admin/shop-categories") || request()->is("admin/shop-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-basket">

                                        </i>
                                        <p>
                                            {{ trans('cruds.shopCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('navi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.navis.index") }}" class="nav-link {{ request()->is("admin/navis") || request()->is("admin/navis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-location-arrow">

                                        </i>
                                        <p>
                                            {{ trans('cruds.navi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('opening_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.openings.index") }}" class="nav-link {{ request()->is("admin/openings") || request()->is("admin/openings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.opening.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('opening_text_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.opening-texts.index") }}" class="nav-link {{ request()->is("admin/opening-texts") || request()->is("admin/opening-texts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.openingText.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('price_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.prices.index") }}" class="nav-link {{ request()->is("admin/prices") || request()->is("admin/prices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-euro-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.price.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('price_text_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.price-texts.index") }}" class="nav-link {{ request()->is("admin/price-texts") || request()->is("admin/price-texts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-euro-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.priceText.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lang_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.langs.index") }}" class="nav-link {{ request()->is("admin/langs") || request()->is("admin/langs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-globe">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lang.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sidebar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sidebars.index") }}" class="nav-link {{ request()->is("admin/sidebars") || request()->is("admin/sidebars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-align-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sidebar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ad_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ads.index") }}" class="nav-link {{ request()->is("admin/ads") || request()->is("admin/ads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ad.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('carousel_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.carousels.index") }}" class="nav-link {{ request()->is("admin/carousels") || request()->is("admin/carousels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chevron-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.carousel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('holiday_name_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.holiday-names.index") }}" class="nav-link {{ request()->is("admin/holiday-names") || request()->is("admin/holiday-names/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.holidayName.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('holiday_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.holidays.index") }}" class="nav-link {{ request()->is("admin/holidays") || request()->is("admin/holidays/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.holiday.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('translation_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/trans-malls*") ? "menu-open" : "" }} {{ request()->is("admin/trans-shops*") ? "menu-open" : "" }} {{ request()->is("admin/trans-places*") ? "menu-open" : "" }} {{ request()->is("admin/trans-posts*") ? "menu-open" : "" }} {{ request()->is("admin/trans-infos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/trans-malls*") ? "active" : "" }} {{ request()->is("admin/trans-shops*") ? "active" : "" }} {{ request()->is("admin/trans-places*") ? "active" : "" }} {{ request()->is("admin/trans-posts*") ? "active" : "" }} {{ request()->is("admin/trans-infos*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-language">

                            </i>
                            <p>
                                {{ trans('cruds.translation.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('trans_mall_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trans-malls.index") }}" class="nav-link {{ request()->is("admin/trans-malls") || request()->is("admin/trans-malls/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transMall.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trans_shop_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trans-shops.index") }}" class="nav-link {{ request()->is("admin/trans-shops") || request()->is("admin/trans-shops/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-basket">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transShop.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trans_place_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trans-places.index") }}" class="nav-link {{ request()->is("admin/trans-places") || request()->is("admin/trans-places/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transPlace.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trans_post_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trans-posts.index") }}" class="nav-link {{ request()->is("admin/trans-posts") || request()->is("admin/trans-posts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-newspaper">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transPost.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trans_info_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trans-infos.index") }}" class="nav-link {{ request()->is("admin/trans-infos") || request()->is("admin/trans-infos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-info-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transInfo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>