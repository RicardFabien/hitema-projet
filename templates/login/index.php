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
<?php } else { ?>
    <p>Vous êtes connecté sous le pseudo <?php echo $_SESSION["login"] ?> </p>
    <form action="/logout" method="POST">

        <input type=hidden id="disconnect" name="disconnect" value="disconnect" />
        <input type="submit" value="Se deconnecter">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>

                                <th scope="col">Image du bar</th>
                                <th scope="col">Nom du bar</th>
                                <th scope="col">Commentaire</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($Comments))
                                foreach ($Comments as $Comments) {
                                    echo '<tr>
                                <td class="w-25">
                                    <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" class="img-fluid img-thumbnail" alt="Sheep">
                                </td>
                                <td><a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/' . $Comments['Bars_id'] . '">Voir l\'annnonce</a></td>
                                <td>' . $Comments['comment_description'] . '</td>
        
                            </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br><br>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>

                                <th scope="col">Image de la boîte de nuit</th>
                                <th scope="col">Nom de la boîte de nuit</th>
                                <th scope="col">Commentaire</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($CommentsBN))
                                foreach ($CommentsBN as $CommentsBN) {
                                    echo '<tr>
                                <td class="w-25">
                                    <img src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" class="img-fluid img-thumbnail" alt="Sheep">
                                </td>
                                <td><a class="btn btn-outline-success me-2" type="button" href="/annonces/BN/' . $CommentsBN['boites_de_nuit_id'] . '">Voir l\'annnonce</a></td>
                                <td>' . $CommentsBN['comment_description'] . '</td>
        
                            </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </form>
<?php } ?>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
