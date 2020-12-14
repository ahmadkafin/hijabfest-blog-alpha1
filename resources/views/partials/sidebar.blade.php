<div class="sidebar">
    <div class="user-profile">
        <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle"
                src="{{asset('vendor/label/assets/images/profile/male/image_1.png')}}" alt="profile image">
        </div>
        <div class="info-wrapper">
            <p class="user-name">{{Auth::user()->name}}</p>
        </div>
    </div>
    <ul class="navigation-menu">
        <li class="nav-category-divider">MAIN</li>
        <li class="{{Request::segment(2) === 'dashboard' ? 'active' : ''}}">
            <a href="/admin/dashboard">
                <span class="link-title">Dashboard</span>
                <i class="mdi mdi-gauge link-icon"></i>
            </a>
        </li>
        <li class="{{Request::segment(2) === 'articles' || Request::segment(2) === 'categories' ? 'active' : ''}}">
            <a href="#blogs" data-toggle="collapse"
                {{Request::segment(2) === 'articles' || Request::segment(2) === 'categories' ? 'aria-expanded=true' : 'aria-expanded="false" class="collapsed"'}}>
                <span class="link-title">Blogs</span>
                <i class="mdi mdi-flask link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu {{Request::segment(2) === 'articles' || Request::segment(2) === 'categories' ? 'show' : ''}}"
                id="blogs">
                <li>
                    <a class="{{Request::segment(2) === 'articles' ? 'active' : ''}}"
                        href="/admin/articles">Articles</a>
                </li>
                <li>
                    <a class="{{Request::segment(2) === 'categories' ? 'active' : ''}}" href="#">Categories</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">UI Elements</span>
                <i class="mdi mdi-bullseye link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="ui-elements">
                <li>
                    <a href="pages/ui-components/buttons.html">Buttons</a>
                </li>
                <li>
                    <a href="pages/ui-components/tables.html">Tables</a>
                </li>
                <li>
                    <a href="pages/ui-components/typography.html">Typography</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pages/forms/form-elements.html">
                <span class="link-title">Forms</span>
                <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
        </li>
        <li>
            <a href="pages/charts/chartjs.html">
                <span class="link-title">Charts</span>
                <i class="mdi mdi-chart-donut link-icon"></i>
            </a>
        </li>
        <li>
            <a href="pages/icons/material-icons.html">
                <span class="link-title">Icons</span>
                <i class="mdi mdi-flower-tulip-outline link-icon"></i>
            </a>
        </li>
        <li class="nav-category-divider">DOCS</li>
        <li>
            <a href="../docs/docs.html">
                <span class="link-title">Documentation</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
    </ul>
</div>