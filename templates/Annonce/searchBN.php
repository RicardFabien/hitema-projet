<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';

    use App\Query\UserQuery;

?>
<style>
    .carousel-item {
        height: 28rem;
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

    #date-picker-example::-webkit-input-placeholder {
        color: white;
    }
</style>
    <!-- Carousel -->
<div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
			<div class="carousel-inner">
                
				<div class="carousel-item active">
                
					<div class="overlay-image" style="background-image:url(https://images.unsplash.com/photo-1570872626485-d8ffea69f463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);"></div> 
					<div class="container">
						<div class="carousel-caption text-center">
                        <form class="d-flex p-2 bd-highlight justify-content-center" action="#" method="GET">
                            <div class="d-grid">
                                <select class="form-select btn-success mb-1" style="width: 10rem;" name="Ville">
                                    <option selected>Ville</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-select btn-success mb-1" style="width: 10rem;" name="nbParticipants">
                                    <option selected>Participants</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="input-group mb-3"  id="datetimepicker" style="width: 10rem;">
                                    <input placeholder="dd/mm/yyyy" type="date" id="date-picker-example" class="form-control btn-success" name="date">
                                </div>
                                <button type="submit" class="btn btn-success" style="width: 10rem;">Rechercher</button>
                            </div>
                        </form>
                        
							<h3>Recherchez les Boîtes nuit qui correspondent à vos critères</h3>
							<p>
								Découvrez notre large pannel de Boîtes nuit partenaires
							</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Carousel -->

        <!-- Pagination -->
        <div class="container-md d-flex p-2 bd-highlight justify-content-center mt-3">
            <nav class="row" aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li class="page-item "><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul>
            </nav>
        </div>
        <!-- Pagination -->
        <div class="container-md mt">
            <?php if ($level == UserQuery::HOST_INDICATOR || $level == UserQuery::ADMIN_INDICATOR) { ?>

            <div class="container-md d-flex p-2 bd-highlight row gy-2 justify-content-center">
                <a href="/annonces/BN/ajouter" class="btn btn-success">Ajouter une annonce</a>
                <a href="/annonces/BN/modifier" class="btn btn-warning">Modifier une annonce</a>
                <hr style="max-width: 750px;">
            <?php } ?>
        <?php
            foreach($BN as $BN)
            {
                $description = str_split($BN['description'], 115);
                        echo '<div class="card mb-3 border-success bg-light d-flex p-2" style="max-width: 750px;">';
                            echo '<div class="row g-0">';
                                echo '<div class="col-md-4">'; 
                                    echo '<img src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" alt="..." style="max-width: 250px; max-height: 200px;" class="rounded mt-3">';
                                echo '</div>';
                                echo '<div class="col-md-8">';
                                    echo '<div class="card-body text-success">';
                                        echo '<h5 class="card-title">'.$BN['name'].'</h5>';
                                        echo '<p class="card-text">'.$description[0].'...</p>';
                                        echo '<div class="row justify-content-between">';
                                            echo '<small class="text-muted">Localisation : '.$BN['lieu'].'</small></p>';
                                            echo '<small class="text-muted">Référence : '.$BN['id'].'</small></p>';
                                            echo '<div class="col-4">';
                                                echo '<small class="text-muted">Créee le '.$BN['date_creation'].'</small></p>';
                                            echo '</div>';
                                            echo '<div class="col-4">';
                                                echo '<a class="btn btn-outline-success me-2" type="button" href="/annonces/BN/'.$BN['id'].'">Voir l\'annonce</a>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
            }
        ?>      
                <hr style="max-width: 750px;">  
            </div>
        </div>
        <!-- Pagination -->
        <div class="container-md d-flex p-2 bd-highlight justify-content-center">
            <nav class="row" aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul>
            </nav>
        </div>
        <!-- Pagination -->    
<?php
require_once __DIR__ . '/../_inc/footer.php';
?>