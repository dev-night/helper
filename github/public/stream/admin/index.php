<? include 'includes/secure.php'; ?>
<? include 'includes/head.php';?>
<? include 'includes/header.php';?>
<?
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
    echo '<script type="text/javascript">alert("Die aktuelle Youtube-URL wurde aktualisiert.");window.location.href = "index.php";</script>';
};
?>
<body>
    <div style="height: 100vh">
        <div class="flex-center flex-column">
            <div class="dev_night_logo"><img id="logo" src="img/dev_night-logo.png" class="shadowfilter"></div>
            <div class="card">
                <div class="card-header blue-grey lighten-1 white-text">Youtube-URL aktualisieren</div>
                <div class="card-body">
                    <!-- Material form register -->
                    <form action="includes/sql_newURL.php" method="post">
                            <input type="text" name="url" placeholder="https://youtube.com/" required id="exampleForm2" class="form-control">
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
