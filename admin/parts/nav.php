<ul class="nav">
    <li class="nav-item <?php if($page == "home"){ echo "active";} ?>">
        <a class="nav-link" href="/admin">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Home</p>
        </a>
    </li>
    <li class = "nav-item <?php if($page == "users"){ echo "active";} ?>">
        <a class="nav-link " href="./orders.php">
            <i class="nc-icon">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
            </i>
            <p>Orders</p>
        </a>
    </li>
    <li class = "nav-item <?php if($page == "products"){ echo "active";} ?>">
        <a class="nav-link " href="/admin/products.php">
            <i class="nc-icon nc-app"></i>
            <p>Products</p>
        </a>
    </li>
    <li class = "nav-item <?php if($page == "categories"){ echo "active";} ?>">
        <a class="nav-link " href="/admin/categories.php">
            <i class="nc-icon nc-bullet-list-67"></i>
            <p>Categories</p>
        </a>
    </li>
    <li class="nav-item <?php if($page == "logOut"){ echo "active";} ?>">
        <a class="nav-link" href="/">
            <i class="nc-icon nc-key-25"></i>
            <p>Log out</p>
        </a>
    </li>
</ul>