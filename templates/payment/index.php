<?php

// inclusion du header

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
<div class = "mt-5">
    <?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
        Vous n'êtes pas connecté
    <?php } else if (!isset($locationData) || $locationData === false ) { ?>
        Cette annonce n'existe pas
    <?php } else if(isset($locationData) || $locationData !== false) { ?>
        
        <p>Etablissement : <?php echo $locationData->getName() ?></p>
        <form method="POST" action="/payment_processing" id = "payment-form">
    
        <input type = text name="name" placeholder = "Nom Prenom"></input>
        <input type = text name="email" placeholder = "Email"></input>

            <input type = "text" placeholder = "numero de carte" name = number ></input>
            <select name = "exp_month" ><?php for($i = 0; $i < 12;$i = $i + 1){ ?>
                <option> <?php echo ($i+1)?></option>
                <?php } ?>
            </select>

            <select name = "exp_year"><?php for($i = 2020; $i < 2030;$i = $i + 1){ ?>
                <option> <?php echo ($i+1)?></option>
                <?php } ?>
            </select>

            <input type = text placeholder = "Code à 3 chiffre" name = "cvc"></input>
            <input type="submit"/>
        </form>
       
    <?php } ?>
    </div>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
?>


