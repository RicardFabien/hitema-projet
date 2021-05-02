<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';
	require_once __DIR__ . '/../_inc/carousel-b-n.php';
?>
	<style>
		.carousel-item {
			height: 32rem;
			background: black;
			color: white;
			position: relative;
			background-position: center;
			background-size: cover;
		}

		.container{
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
			padding-bottom: 50px;
		}

		.overlay-image 
		{
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
			top: 0;
			background-position: center;
			background-size: cover;
			opacity: 0.4;
		}

		h2 {
			color: #198754;
		}

		.card:hover{
			transform: scale(1.05);
			box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
		}

		.row {
			--bs-gutter-x: 0rem;
		}

		#slide-1 {
			background-image:url();
		}
	</style>

		<!-- Card BARS -->
		<div class="container-md">
		<div class="container-md" style="margin-top: 2rem;">
		<h2 class="d-flex justify-content-center mt-5">Bars</h2>
		<div class="row d-flex justify-content-center">
				<div class="col-md-2 me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Bars n°1</h5>
						<p class="card-text">Bars dans le 5ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-mg me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Bars n°2</h5>
						<p class="card-text">Bars dans le 12ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-mg me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Bars n°3</h5>
						<p class="card-text">Bars dans le 11ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-mg me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Bars n°4</h5>
						<p class="card-text">Bars dans le 13ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<a class="btn btn-outline-success me-2" type="button" href="/annonces/bars">Voir tous les bars</a>
				</div>
		</div>
		</div>
		
		<!-- Card BARS -->

		<hr class="my-6">

		<!-- Card BOITES -->
		
		<div class="container-md" style="margin-top: 2rem;">
		<h2 class="d-flex justify-content-center mt-5">Boîtes de nuit</h2>
		<div class="row d-flex justify-content-center">
				<div class="col-md-2 me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Boîte de nuit n°1</h5>
						<p class="card-text">Boîte de nuit dans le 14ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-mg me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Boîte de nuit n°2</h5>
						<p class="card-text">Boîte de nuit dans le 16ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-mg-4 me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Boîte de nuit n°3</h5>
						<p class="card-text">Boîte de nuit dans le 11ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-mg me-2 mt-2 hover-shadow">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">Boîte de nuit n°4</h5>
						<p class="card-text">Boîte de nuit dans le 18ème arrondissement</p>
						<a href="#" class="btn btn-outline-success btn-sm">Reservez !</a>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<a class="btn btn-outline-success me-2" type="button" href="/annonces/BN">Voir toutes les boîtes de nuit</a>
				</div>
		</div>
		</div>
		</div>
		<!-- Card BOITES -->

<?php
require_once __DIR__ . '/../_inc/footer.php';
?>