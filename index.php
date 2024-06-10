<?php         
    session_start();
    require_once __DIR__ . '/vendor/autoload.php';
    require_once("src/configs/routes.php");
    use App\App;

    $app = new App();
?>

