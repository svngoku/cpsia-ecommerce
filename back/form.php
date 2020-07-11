<?php
    include("./api/config/config-genos.php");
    include("./api/config/config-views.php");
    if (isset($_GET["module"]) && isset($_GET['cas'])) {
        $module = ucfirst($_GET['module']);
        $cas = ucfirst($_GET['cas']);
    }
?>
<!doctype html>
    <html lang="fr">
    <?php Head("Formulaire"); ?>
        <body>
            <div class="container">
            <?php Head($mod) ?>
            <?php $_GET["module"]::$cas(); ?>
            <?php Js(); ?>
            </div>
        </body>
    </html>