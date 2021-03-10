<?php

// inclusion du footer

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
?>
    <h1>Se connecter</h1>
    <?php if ($level = UserQuery::VISITOR_INDICATOR) { ?>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>  method ="POST">
        
            <label for="login">Pseudo:</label>
            <input type="text" id="login" name="login"><br><br>
            <label for="password">Mot de passe:</label>
            <input type="text" id="password" name="password"><br><br>
            <input type="submit" value="Se connecter">

        </form> 
    <?php } else {?>
        <p>Vous êtes connecté sous le pseudo <?php echo $_SESSION["password"] ?> </p>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>  method ="POST">

            <input type=hidden id="disconnect" name = "disconnect" value = "disconnect"/> 
            <input type="submit" value="Se connecter">

        </form> 
    <?php } ?>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';