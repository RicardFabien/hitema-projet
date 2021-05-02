<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';

?>
<div class="container-md d-flex p-2 bd-highlight justify-content-center mt-3" >
    <div class="col-lg-9 mt-5">

    <?php 
      if ($BN != null) {
        foreach($BN as $BN)
        {
          echo '<div class="card mt-4">
            <img class="card-img-top img-fluid" src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" style="max-height: 42rem;" alt="">
            <div class="card-body">
              <h3 class="card-title">'.$BN['name'].'</h3>
              <h4>Ville : '.$BN['lieu'].'</h4>
              <h4>Prix : '.$BN['price'].' €</h4>
              <p class="card-text">'.$BN['description'].'</p>
              <p class="card-text">'.$BN['date_creation'].'</p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>';
        }
      ?>


        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Avis
          </div>
          <div class="card-body">
            <p>Endroit chaleureux, super service !</p>
            <small class="text-muted">Commentaires de Pierre écrit le 13/03/21</small>
            <hr>
            <p>Service top pour 50 personnes, je conseille.</p>
            <small class="text-muted">Commentaires de Estelle écrit le 01/03/21</small>
            <hr>
            <p>Prestation sans plus, serveur désagréable par moments.</p>
            <small class="text-muted">Commentaires de Eva écrit le 02/02/21</small>
            <hr>
            <a href="#" class="btn btn-success">Écrire un commentaire</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
<?php
      }
      else {
        echo "<h1 class='mt-5'>Cette annonce n'existe plus !</h1>";
        echo "<img src='https://png.pngtree.com/png-vector/20200313/ourmid/pngtree-page-not-found-error-404-concept-with-people-trying-to-fix-png-image_2157908.jpg' class='img-fluid'>";
      }
?>
</div>

<?php
	require_once __DIR__ . '/../_inc/footer.php';	
?>