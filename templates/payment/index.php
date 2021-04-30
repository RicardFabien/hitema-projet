<?php

// inclusion du header

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
    <h1>S'enrengistrer</h1>
    <?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
        Vous n'êtes pas connecté
    <?php } else if (!isset($locationData) || $locationData === false ) { ?>
        Cette salle n'existe pas
    <?php } else { ?>
        <form>
            <input type = text></input>
            <select><?php for($i = 0; $i < 12;$i = $i + 1){ ?>
                <option> <?php echo ($i+1)?></option>
                <?php } ?>
            </select>

            <select><?php for($i = 2021; $i < 2024;$i = $i + 1){ ?>
                <option> <?php echo ($i+1)?></option>
                <?php } ?>
            </select>

            <input type = text></input>
        </form>
       
    <?php } ?>


<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
