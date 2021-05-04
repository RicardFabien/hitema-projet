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
              <p class="card-text">'.$BN['user'].'</p>
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
          <?php
          if ($Comments != null) {
            foreach($Comments as $Comments)
              {
                if($Comments['reviews'] == 5)
                {
                  $img = "https://img.icons8.com/carbon-copy/50/000000/5-c.png";
                }
                elseif($Comments['reviews'] == 4)
                {
                  $img = "https://img.icons8.com/carbon-copy/50/000000/4-c.png";
                }
                elseif($Comments['reviews'] == 3)
                {
                  $img = "https://img.icons8.com/carbon-copy/50/000000/3-c.png";
                }
                elseif($Comments['reviews'] == 2)
                {
                  $img = "https://img.icons8.com/carbon-copy/50/000000/2-c.png";
                }
                elseif($Comments['reviews'] == 1)
                {
                  $img = "https://img.icons8.com/carbon-copy/50/000000/1-c.png";
                }
                echo  '<p>'.$Comments['comment_description'].'</p>
                <img src="'.$img.'" class="img-fluid" style="max-width: 30px;">
                <small class="text-muted">Commentaires de '.$Comments['user'].' écrit le '.$Comments['date_creation'].'</small>
                
                <hr>';
              }
          }
            ?>
            <form action="/annonces/CommentsBN/add" method ="POST">
                        <div class="form-row">
                          <input type="text" class="form-label col" value ="<?php echo $BN['id']?>" name ="boites_de_nuit_id" hidden></input>
                            <div class="col-lg-7">
                                 <textarea type="text" placeholder="Votre commentaire..." class="form-label my-3 p-3 w-100" name ="description" required></textarea>
                            </div>
                        </div>
                        <label>Note : </label><br>
                        <div class="form-row">
                            <div class="col-lg-7">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="reviews" id="inlineRadio1" value="1">
                              <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="reviews" id="inlineRadio2" value="2">
                              <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="reviews" id="inlineRadio3" value="3">
                              <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="reviews" id="inlineRadio3" value="4">
                              <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="reviews" id="inlineRadio3" value="5">
                              <label class="form-check-label" for="inlineRadio2">5</label>
                            </div>
                            <button type="submit" class="btn btn-success">Ajouter votre commentaire</button>
                            </div>
                        </div>
                    </form>
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