<?php

// inclusion du footer

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>

<style>

.t1 {
    display : none;
}

.t2 {
    display : none;
}

.t3 {
    display : none;
}

.t4 {
    display : none;
}

</style>

<h1>Se connecter</h1>
<?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
    <section class="Form my-4 mx-5">
        <div class="container d-flex p-2 bd-highlight justify-content-center">

            <div class="col-lg-7 px-5 pt-5">
                <h1 style="color:#017143">nLife</h1>
                <h4>Connectez vous à votre compte</h4>
                <?php if (isset($_SESSION["login"])) { ?> <p class="btn btn-danger disabled" style="height: 35px; opacity: 1;">Ce compte n'existe pas</p> <?php }?>
                <form action="/login" method="POST">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="text" placeholder="Nom de compte" class="form-control my-3 p-3" name="login" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Mot de passe" class="form-control my-3 p-3" name="password" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button type="submit" class="btn mt-3 mb-4 btn-success btn-lg">Connexion</button>
                        </div>
                    </div>
                    <!---<a href="#">Mot de passe oublié ?</a>-->
                    <p>Vous ne possédez pas de compte ? <a href="/register">Inscrivez-vous ici !</a></p>
                </form>
            </div>

        </div>
    </section>
<?php unset($_SESSION["login"]);} else { ?>
    <center><p><b>Vous êtes connecté sous le pseudo :</b> <b style="color:darkgreen;"><u><?php echo $_SESSION["login"] ?></u></b></p></center>
    <form action="/logout" method="POST">

        <center><input type=hidden id="disconnect" name="disconnect" value="disconnect" />
        <input class="btn btn-outline-dark" type="submit" value="Se deconnecter"></center>
        
    </form>
    <center class="mt-5"><h2><u>Section Commentaires</u></h2></center>
    
    <div class="row">
        <div class="col m-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>

                                <th scope="col"><h2>Bars</h2></th>
                                
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($Comments)) {
                                foreach ($Comments as $Comments) {
                                    echo '
                                    <form method="post" action="/modifier_commentbars" enctype="multipart/form-data">
                                        <tr class="t2">
                                            <td class="w-25">
                                                <img src="/admin/image/'.$Comments['image'].'" class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td><h2>'.$Comments['name'].'</h2><a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/'. $Comments['Bars_id'] . '">Voir l\'annnonce</a><br><br>
                                                <div class="row">
                                                    <div class="col ms-2 "><label>Commentaire :</label><br><textarea type="text"  class="form-label my-3 p-3 " name ="description" required>'.$Comments['comment_description'].'</textarea></div>
                                                    <div class="col ms-2 "><label>Note :</label><input type="number" step="1" min="1" max="5" class="form-control form-control-lg mt-3" value="'.$Comments['reviews'].'" name="reviews"></div>
                                                    <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$Comments['comment_id'].'" name="id" hidden>
                                                    <div class="col ms-2 "><button class="btn btn-success " type="submit">Sauvegarder</button></div>
                                    </form>
                                    <form method="post" action="/supprimer_commentbars" enctype="multipart/form-data">
                                                    <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$Comments['comment_id'].'" name="id" readonly hidden>
                                                    <div class="col ms-2 "><button class="btn btn-danger " type="submit">Supprimer</button></div>
                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                    ';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load2" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>
            </div>
        </div><br><br>
        <div class="col m-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>
                                <th scope="col"><h2>Boîtes de nuit</h2></th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($CommentsBN)){
                                foreach ($CommentsBN as $CommentsBN) {
                                echo '
                                <form method="post" action="/modifier_commentbn" enctype="multipart/form-data">
                                    <tr class="t1">
                                        <td class="w-25">
                                            <img src="/admin/image/'.$CommentsBN['image'].'" class="img-fluid img-thumbnail" alt="Sheep">
                                        </td>
                                        <td><h2>'.$CommentsBN['name'].'</h2><a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/'. $CommentsBN['boites_de_nuit_id'] . '">Voir l\'annnonce</a><br><br>
                                            <div class="row">
                                                <div class="col ms-2 "><label>Commentaire :</label><br><textarea type="text"  class="form-label my-3 p-3 " name ="description" required>'.$CommentsBN['comment_description'].'</textarea></div>
                                                <div class="col ms-2 "><label>Note :</label><input type="number" step="1" min="1" max="5" class="form-control form-control-lg mt-3" value="'.$CommentsBN['reviews'].'" name="reviews"></div>
                                                <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$CommentsBN['comment_id'].'" name="id" readonly hidden>
                                                <div class="col ms-2 "><button class="btn btn-success " type="submit">Sauvegarder</button></div>
                                </form>
                                <form method="post" action="/supprimer_commentbn" enctype="multipart/form-data">
                                            <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$CommentsBN['comment_id'].'" name="id" readonly hidden>
                                            <div class="col ms-2 "><button class="btn btn-danger " type="submit">Supprimer</button></div>
                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                ';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load1" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>
            </div>
        </div>

        <?php if ($level == UserQuery::HOST_INDICATOR || $level == UserQuery::ADMIN_INDICATOR) { ?>

            <center class="mt-5"><h2><u>Section Annonces</u></h2></center><br><br><br><br><br><br>
            
            <div class="row">
                    <div class="col m-5">
                    <center><a href="http://localhost:8000/annonces/bars/ajouter"><button class="btn btn-success"> Ajouter une annonce de bars</button></a></center>
                        <table class="table table-image">
                            <thead>
                                <tr>

                                    <th scope="col"><h2>Bars</h2></th>
                                    <th scope="col"><h2></h2></th>
                                    <th scope="col"><h2></h2></th>
                                        

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($AnnoncesBars)){
                                foreach ($AnnoncesBars as $AnnoncesBars) {
                                    echo '
                                    <form method="post" action="/modifier_bars" enctype="multipart/form-data">
                                        <tr class="t3">
                                            <td class="w-25">
                                                <img src="/admin/image/'.$AnnoncesBars['image'].'" class="img-fluid img-thumbnail" alt="Sheep">
                                                Image :<input type="file" class="form-control" id="customFile" data-show-preview="true" name="file"/>
                                            </td>
                                            <td><p>Nom :<input type="text" class="form-control " value="'.$AnnoncesBars['name'].'" name="name" required></p>
                                            <div class="row">
                                                <div class="col-sm ms-3 me-3">Nombre de personne max :<input type="number" class="form-control form-control-lg mb-3" value="'.$AnnoncesBars['max_person'].'" name="max_person" id="exampleInputPassword1"></div>
                                                <div class="col-sm ms-3 me-3">Prix : <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$AnnoncesBars['price'].'" name="price" id="exampleInputPassword1"></div>
                                                <div class="col-sm ms-3 me-3">
                                                Département : 
                                                <select class="form-select form-select-lg mb-3"  name="lieu" >
                                                    <option value="'.$AnnoncesBars['lieu'].'" selected>'.$AnnoncesBars['lieu'].'</option>
                                                    <option value="Essonne">Essonne</option>
                                                    <option value="Hauts-de-Seine">Hauts-de-Seine</option>
                                                    <option value="Paris">Paris</option>
                                                    <option value="Seine-et-Marne">Seine-et-Marne</option>
                                                    <option value="Seine-Saint-Denis">Seine-Saint-Denis</option>
                                                    <option value="Val-de-Marne">Val-de-Marne</option>
                                                    <option value="Val-d\'Oise">Val-d\'Oise</option>
                                                    <option value="Yvelines">Yvelines</option>
                                                </select>
                                            </div>
                                                <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$AnnoncesBars['id'].'" name="id" hidden>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm ms-3 me-3">
                                                    Adresse : 
                                                    <input class="form-control form-control-lg mb-3" type="text" name="adress" value="'.$AnnoncesBars['adress'].'">
                                                </div>
                                                <div class="col-sm ms-3 me-3">
                                                    Code Postal : 
                                                    <input class="form-control form-control-lg " type="number" name="zip_code" value="'.$AnnoncesBars['zip_code'].'">
                                                </div>
                                            </div>
                                            <a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/'. $AnnoncesBars['id'] . '">Voir l\'annnonce</a><br><br>
                                            <p>Description : <textarea type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" name="description">'.$AnnoncesBars['description'].'</textarea></p>
                                            <div class="row">
                                            <button class="btn btn-success col" type="submit">Sauvegarder</button>
                                        </form>
                                        <form method="post" action="/supprimer_ADbars" enctype="multipart/form-data" class="col">
                                                    <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$AnnoncesBars['id'].'" name="id" readonly hidden>
                                                    <div class="ms-2 "><button class="btn btn-danger" type="submit">Supprimer</button></div>
                                        </form>
                                        </div>
                                            </td>
                                            
                                        </tr>
                                   ';
                                }
                            }
                            ?>

                            </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load3" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>

                <div class="col m-5">
                <center><a href="http://localhost:8000/annonces/BN/ajouter"><button class="btn btn-success"> Ajouter une annonce de Boîte de nuit</button></a></center>
                <table class="table table-image">
                            <thead>
                                <tr>

                                    <th scope="col"><h2>Boîtes de nuit</h2></th>
                                    <th scope="col"><h2></h2></th>
                                    <th scope="col"><h2></h2></th>
                                        

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($AnnoncesBN)){
                                foreach ($AnnoncesBN as $AnnoncesBN) {
                                    echo '
                                    <form method="post" action="/modifier_bn" enctype="multipart/form-data">
                                        <tr class="t4">
                                            <td class="w-25">
                                                <img src="/admin/image/'.$AnnoncesBN['image'].'" class="img-fluid img-thumbnail" alt="Sheep">
                                                Image :<input type="file" class="form-control" id="customFile" data-show-preview="true" name="file"/>
                                            </td>
                                            <td><p>Nom :<input type="text" class="form-control " value="'.$AnnoncesBN['name'].'" name="name" required></p>
                                            <div class="row">
                                                <div class="col-sm ms-3 me-3">Nombre de personne max :<input type="number" class="form-control form-control-lg mb-3" value="'.$AnnoncesBN['max_person'].'" name="max_person" id="exampleInputPassword1"></div>
                                                <div class="col-sm ms-3 me-3">Prix : <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$AnnoncesBN['price'].'" name="price" id="exampleInputPassword1"></div>
                                                <div class="col-sm ms-3 me-3">
                                                Département : 
                                                <select class="form-select form-select-lg mb-3"  name="lieu" >
                                                    <option value="'.$AnnoncesBN['lieu'].'" selected>'.$AnnoncesBN['lieu'].'</option>
                                                    <option value="Essonne">Essonne</option>
                                                    <option value="Hauts-de-Seine">Hauts-de-Seine</option>
                                                    <option value="Paris">Paris</option>
                                                    <option value="Seine-et-Marne">Seine-et-Marne</option>
                                                    <option value="Seine-Saint-Denis">Seine-Saint-Denis</option>
                                                    <option value="Val-de-Marne">Val-de-Marne</option>
                                                    <option value="Val-d\'Oise">Val-d\'Oise</option>
                                                    <option value="Yvelines">Yvelines</option>
                                                </select>
                                            </div>
                                                <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$AnnoncesBN['id'].'" name="id" hidden>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm ms-3 me-3">
                                                    Adresse : 
                                                    <input class="form-control form-control-lg mb-3" type="text" name="adress" value="'.$AnnoncesBN['adress'].'">
                                                </div>
                                                <div class="col-sm ms-3 me-3">
                                                    Code Postal : 
                                                    <input class="form-control form-control-lg " type="number" name="zip_code" value="'.$AnnoncesBN['zip_code'].'">
                                                </div>
                                            </div>
                                            <a class="btn btn-outline-success me-2" type="button" href="/annonces/BN/'. $AnnoncesBN['id'] . '">Voir l\'annnonce</a><br><br>
                                            <p>Description : <textarea type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" name="description">'.$AnnoncesBN['description'].'</textarea></p>
                                            <div class="row">
                                            <button class="btn btn-success col" type="submit">Sauvegarder</button>
                                        </form>
                                        <form method="post" action="/supprimer_ADbn" enctype="multipart/form-data" class="col">
                                                    <input type="number" step="0.01" class="form-control form-control-lg mb-3" value="'.$AnnoncesBN['id'].'" name="id" readonly hidden>
                                                    <div class="ms-2 "><button class="btn btn-danger" type="submit">Supprimer</button></div>
                                        </form>
                                        </div>
                                            </td>
                                            
                                        </tr>';
                                }
                            }
                            ?>
                            
                            </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load4" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>
             
            </div>

        <?php } ?>

        <?php if ($level == UserQuery::ADMIN_INDICATOR) { ?>

            <center class="mt-5"><h2><u>Section ADMIN</u></h2><br><br><br>
            
                <table class="table" style="max-width: 500px;">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($allUsers as $Users)
                            echo'<tr>
                            <th scope="row">'.$Users['id'].'</th>
                            <form action="/modifier_user" method="post">
                            <td><input type="text" name="pseudo" value="'.$Users['login'].'" readonly="readonly"></td>
                            <td><select class="form-select" name="newlevel">
                                    <option selected>'.$Users['level'].'</option>
                                    <option value="user">user</option>
                                    <option value="host">host</option>
                                    <option value="admin">admin</option>
                                </select>
                                <br>
                                <button class="btn btn-success" type="submit">Sauvegarder</button>
                            </form>
                          </td>
                            </tr>';
                    ?>
                    </tbody>
                </table>
                </center>

        <?php } ?>
            

    </div>



    
<?php } if ($userLevel === UserQuery::USER_INDICATOR) { ?>
<center><button class="btn btn-success" style="width : 500px; font-weight: bold;">Vous possedez un établissement et voulez devenir partenaire ? Contactez-nous !</button></center>

<?php
}
 if ($level == UserQuery::VISITOR_INDICATOR) { ?>
<script>
document.title = "Login";
</script>

<?php } else {?>

<script>
document.title = "Profil - <?=$_SESSION["login"]?>";
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".t1").slice(0,3).show()
$("#btn-load1").on("click", function(){
    $(".t1:hidden").slice(0,3).slideDown()
    if ($(".t1:hidden").length == 0) {
        $("#btn-load1").fadeOut('slow')
    }
})

$(".t2").slice(0,3).show()
$("#btn-load2").on("click", function(){
    $(".t2:hidden").slice(0,3).slideDown()
    if ($(".t2:hidden").length == 0) {
        $("#btn-load2").fadeOut('slow')
    }
})

$(".t3").slice(0,3).show()
$("#btn-load3").on("click", function(){
    $(".t3:hidden").slice(0,3).slideDown()
    if ($(".t3:hidden").length == 0) {
        $("#btn-load3").fadeOut('slow')
    }
})

$(".t4").slice(0,3).show()
$("#btn-load4").on("click", function(){
    $(".t4:hidden").slice(0,3).slideDown()
    if ($(".t4:hidden").length == 0) {
        $("#btn-load4").fadeOut('slow')
    }
})


</script>



<?php
}


// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
