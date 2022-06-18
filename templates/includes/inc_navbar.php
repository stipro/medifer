<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Punto de Venta para Farmacia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">POS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ventas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin Usuarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Asignaciones</a></li>
                        <li><a class="dropdown-item" href="#">Permisos</a></li>
                        <li><a class="dropdown-item" href="#">Usuarios</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./mantenimiento">Admin Usuarios</a></li>
                        <li><a class="dropdown-item" href="./productos/">Productos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mantenimiento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./presentaciones">Presentaciónes</a></li>
                        <li><a class="dropdown-item" href="./laboratorios">Laboratórios</a></li>
                        <li><a class="dropdown-item" href="./grupos">Grupos</a></li>
                        <li><a class="dropdown-item" href="./principioactivo">Principios Activo</a></li>
                        <li><a class="dropdown-item" href="./indicaciones">Indicaciónes</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./mantenimiento">Mantenimiento</a></li>
                        <li><a class="dropdown-item" href="./productos">Productos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Link</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Hola <?php echo $_SESSION['user_session']['user']['nombreUsuario_usuario']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php if (!Auth::validate()) : ?>

                    <?php else : ?>
                        <li><a class="dropdown-item" href="#">Administrar cuenta</a></li>
                        <li><a class="dropdown-item" href="logout">Cerrar sesión</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</nav>