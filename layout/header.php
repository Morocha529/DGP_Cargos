<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <!--<a class="nav-link menu_nav disabled" id="a_link_bd" href="verEntradas.php">Consultar BD</a>-->
                    <a class="nav-link menu_nav disabled" id="a_link_bd" href="#">Consultar BD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu_nav" id="a_link_login" data-bs-target="#loginModal" data-bs-toggle="modal" href="#loginModal">Login</a>
                </li>
                <li class="nav-item" id="circle">
                    <p class="nav-link menu_nav"  id="usuario"></p>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu_nav disabled" id="a_link_logout" href="" >Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>