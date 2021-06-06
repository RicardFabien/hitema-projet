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
        
        <input type="hidden" name = "type" value = <?php echo $type ?> />
        <input type="hidden" name = "id" value = <?php echo $id ?> />

        <input type = text name="name" placeholder = "Nom Prenom" required></input><br/>
        <input type = "email" name="email" placeholder = "Email" required></input><br/>

            <input type = "text" placeholder = "numero de carte" name = number required></input>
            <select name = "exp_month" ><?php for($i = 0; $i < 12;$i = $i + 1){ ?>
                <option> <?php echo ($i+1)?></option>
                <?php } ?>
            </select>

            <select name = "exp_year"><?php for($i = 2020; $i < 2030;$i = $i + 1){ ?>
                <option> <?php echo ($i+1)?></option>
                <?php } ?>
            </select>

            <input type = text placeholder = "Code à 3 chiffre" name = "cvc"></input><br/>

            <input type="number" name = "person_number" min = 0 required/> <br/>
            <select name = "location_date" required><?php foreach($dates as $date){ ?>
                <option value = <?php echo $date[0] ?>> <?php  echo date('d/m/Y', strtotime($date[0]))?></option>
                <?php } ?>
            </select> 


            <input type="submit"/>
        </form>
       
    <?php } ?>
    </div>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
?>


