<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
	<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="#">
				Mascotas </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<li class="dropdown nav-item">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fas fa-home"></i> Inicio
					</a>

					<!-- DropBox -->

					<?php if (!isset($_SESSION['token']['logged_in'])) : ?>

						<div class="dropdown-menu dropdown-with-icons">
							<a href="login" class="dropdown-item">
								<i class="fas fa-user-circle"></i> Iniciar sesión
							</a>
							<a href="registro" class="dropdown-item">
								<i class="fas fa-user-plus"></i> Registrarse
							</a>
						</div>

					<?php else : ?>

						<div class="dropdown-menu dropdown-with-icons">
							<a href="dashboard" class="dropdown-item">
								<i class="fas fa-user-circle"></i> Perfil
							</a>
						</div>
					<?php endif ?>

					<!-- DropBox -->
				</li>
			</ul>
		</div>
	</div>
</nav>