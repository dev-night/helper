<?php include 'includes/secure.php'; ?>
<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>
<?php
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
    echo '<script type="text/javascript">alert("Die aktuelle Youtube-URL wurde aktualisiert.");window.location.href = "index.php";</script>';
};
?>
<body>
<div style="height: 100vh">
    <div class="flex-center flex-column">
        <div class="dev_night_logo"><img class="shadowfilter" id="logo" src="img/dev_night-logo.png"></div>
        <!--<div class="card">
            <div class="card-header blue-grey lighten-1 white-text">
                Übersicht
            </div>
            <div class="card-body">
                <form action="includes/sql_setStatus.php" method="post">
                    <input name="active" type="checkbox"value="1" class="btn btn-blue-grey">

                    <input class="form-control" name="infoText" placeholder="textBla" type="text">
                    <input class="form-control" name="nextNight" placeholder="textBla" type="text">
                    <div class="text-center mt-4">
                        <button class="btn btn-blue-grey" type="submit">Aktualisieren</button>
                    </div>
                </form>
            </div>
        </div>-->

        <div class="card">
            <div class="card-header blue-grey lighten-1 white-text">
                Youtube-URL aktualisieren
            </div>
            <div class="card-body">
                <form action="includes/sql_newURL.php" method="post">
                    <input class="form-control" id="exampleForm2" name="url" placeholder="https://youtube.com/" required="" type="text">
                    <div class="text-center mt-4">
                        <button class="btn btn-blue-grey" type="submit">Aktualisieren</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<? include 'includes/scripts.php';?>
</body>
</html>
