<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	<!-- Navbar Brand-->
	<a class="navbar-brand ps-3" href="/arenafacil/app/index.php">Arena<b>Fácil</b></a>
	<!-- Sidebar Toggle-->
	<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
	<!-- Navbar Search-->
	<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
	<p></p>
	</form>
	<!-- Navbar-->
	<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
			<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
				<li><b><p class="dropdown-item" disabled><?php echo"$nome_arena_logado" ?></p></b></li>	
				<li><hr class="dropdown-divider" /></li>
				<li><a class="dropdown-item" href="http://localhost/arenafacil/app/v/usuario/edit.php?id=<?php echo"$usuario_id_logado" ?>">Meu Perfil</a></li>				
				<li><hr class="dropdown-divider" /></li>
				<li><a class="dropdown-item" href="/arenafacil/app/utl/sair.php">Sair</a></li>
			</ul>
		</li>
	</ul>
</nav>