<?php

// inclusion du footer

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
    <h1>Se connecter</h1>
    <?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
        <section class="Form my-4 mx-5">
        <div class="container d-flex p-2 bd-highlight justify-content-center">
           
                <div class="col-lg-7 px-5 pt-5">
                    <h1 style="color:#017143">nLife</h1>
                    <h4>Connectez vous à votre compte</h4>
                    <form action="/login" method ="POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                 <input type="text" placeholder="Nom de compte" class="form-control my-3 p-3" name = "login"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Mot de passe" class="form-control my-3 p-3" name = "password"/>
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
    <?php } else {?>
        <p>Vous êtes connecté sous le pseudo <?php echo $_SESSION["login"] ?> </p>
        <form action="/logout"  method ="POST">

            <input type=hidden id="disconnect" name = "disconnect" value = "disconnect"/> 
            <input type="submit" value="Se deconnecter">

        </form> 
    <?php } ?>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';