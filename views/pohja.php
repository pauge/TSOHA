

<!DOCTYPE html>
<html>
    <head>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <title>Drinkkiarkisto</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="page">
            
        <div> 
            <div id="top">Drinkkiarkisto</div>
            <div id="top_msg">
                <?php if(isset($viesti['virhe'])){
                    echo "<p>";
                    echo $viesti['virhe'];
                    echo "</p>";
                    }    
                ?>
            </div>
        </div>
        
            <div id="side">
                <div id="navbox">
                    <dl>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/index.php">Etusivu</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/ark.php">Arkisto</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/hak.php">Haku</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/res.php">Reseptiehdotus</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/kirj.php">Kirjautuminen</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/rek.php">Rekisteröityminen</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/logout.php">Kirjaudu ulos</a></dt>
                        <?php if($_SESSION['kirjautunut']!=null) {
                                echo " Hei ";
                                echo $_SESSION['kirjautunut'];
                                }
                        ?>
                    </dl>
                </div>
            </div>
        <div id="content"> 
            <?php require $sivu;?>
        </div>
        </div>
    </body>
</html>
