<?php

// inclusion du header

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
<div class = "mt-5">
    <?php if($isValid){
        echo "L'operation à réussi";
    } else {
        echo "Il y a eu une erreur";
    } ?>
    </div>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
