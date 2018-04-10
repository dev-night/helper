<?php include 'secure.php'; ?>
<?php
if (isset($_POST['active'])){
    $activeStatus = $_POST['active'];
}else {
    $activeStatus = 0;
}

$infoText = $_POST['infoText'];
$nextNight = $_POST['nextNight'];

try{
    $pdo = new PDO('sqlite:'.dirname(__FILE__)."/users.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die ('DB Error');
}
$statement = $pdo->prepare("UPDATE link SET active=?, infotext=?, nextnight=?");
$statement->execute(array($activeStatus, $infoText, $nextNight));
