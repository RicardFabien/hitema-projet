<?php

// inclusion du header

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
<div class = "mt-5">
    <?php if($isValid){
        echo '<div class="alert alert-success" role="alert">L\'operation à réussi</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">'.$errorMessage.'</div>';
    } ?>
    </div>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
