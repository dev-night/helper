<?php
include "admin/includes/config.php";

$result = $pdo->prepare("SELECT * FROM link");
$result->execute();

/* Fetch all of the remaining rows in the result set */

$row = $result->fetch(PDO::FETCH_ASSOC);
$youtube = $row['url'];
$active = $row['active'];
$infoText = $row['infotext'];
$nextNight = $row['nextnight'];

if ($active == 0) {
    Redirect($youtube, false);
}else {
//ELSE TODO
        echo $infoText;
        echo "The next /dev/night is on: ".$nextNight;
}
function Redirect($url, $permanent = false)
{
if (headers_sent() === false) {
header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
}
exit();
}
?>

