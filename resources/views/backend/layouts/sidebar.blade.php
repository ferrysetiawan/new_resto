<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Pengeluaran LGR</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">LGR</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
        </li>
        <li class="menu-header">Master Data</li>

        <li class="{{ request()->is('dashboard/hero*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('hero.index') }}"><i class="fas fa-list"></i>
                <span>Hero</span></a>
        </li>
        <li class="{{ request()->is('dashboard/about*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('about.index') }}"><i class="fas fa-box"></i> <span>About Us</span></a>
        </li>
        <li class="dropdown {{ request()->is('dashboard/product*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-store"></i><span>Menu</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('dashboard/product/categoryproduct*') ? 'active' : '' }}"><a
                        class="nav-link" href="{{ route('categoryProduct.index') }}">Kategori Menu</a></li>
                <li class="{{ request()->is('dashboard/product/productitems*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('product.index') }}">Spesial Menu</a></li>
            </ul>
        </li>
        <li class="{{ request()->is('dashboard/chef*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('chef.index') }}"><i class="fas fa-users"></i> <span>Team</span></a>
        </li>
        <li class="{{ request()->is('dashboard/event*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('event.index') }}"><i class="fas fa-calendar"></i> <span>Event</span></a>
        </li>
        <li class="dropdown {{ request()->is('dashboard/news*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>News</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('dashboard/news/categories*') ? 'active' : '' }}"><a
                        class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                <li class="{{ request()->is('dashboard/news/tags*') ? 'active' : '' }}"><a
                        class="nav-link" href="{{ route('tags.index') }}">Tag</a></li>
                <li class="{{ request()->is('dashboard/news/post*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('post.index') }}">Post</a></li>
            </ul>
        </li>
        <li class="{{ request()->is('dashboard/gallery*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('gallery.index') }}"><i class="fas fa-images"></i> <span>Gallery</span></a>
        </li>
    </ul>
</aside>
