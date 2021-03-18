<?php

// inclusion du header

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
    <h1>S'enrengistrer</h1>
    <?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
        <section class="Form my-4 mx-5">
        <div class="container d-flex p-2 bd-highlight justify-content-center">
        <form action="/register" method ="POST">

                        <div class="form-row">
                            <div class="col-lg-7">
                                 <input type="email" placeholder="Adresse email" class="form-control my-3 p-3" name="email"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                 <input type="text" placeholder="Nom d'utilisateur" class="form-control my-3 p-3" name = "login"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Mot de passe" class="form-control my-3 p-3" name = "password"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn mt-3 mb-4 btn-success btn-block btn-lg">Inscription</button>
                            </div>
                        </div>
                        <p>Vous possédez déjà un compte ? <a href="/login">Connectez-vous ici !</a></p>

        </form> 

        <?php if($alreadyInUse){ ?>
            <p>Ce compte existe déjà</p>
        <?php } ?>
        </div>
    </section>
    <?php } else {?>
        <p>Vous êtes connecté sous le pseudo <?php echo $_SESSION["password"] ?>, veuillez vous déconnecter pour changer de compte </p>
        <form action="/logout"  method ="POST">

            <input type=hidden id="disconnect" name = "disconnect" value = "disconnect"/> 
            <input type="submit" value="Se deconnecter">

        </form> 
    <?php } ?>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';