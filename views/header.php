<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">DES Loja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <?php
                if (isset($_SESSION['logado'])) { ?>
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="produto.php?action=index">Produtos</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="usuario.php?action=edit">Perfil</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="colaborador.php?action=index">Colaborador</a>
                    </li>                 
                </ul>
                <ul class="navbar-nav">
                    <span><?=$_SESSION['usuario']['email'] ?></span> 
                    <li class="nav-item">
                        <a class="nav-link" href="usuario.php?action=logout">Logout</a>
                    </li>                       
                </ul>

                <?php } ?>

                
            </div>
        </div>
    </nav>
</header>