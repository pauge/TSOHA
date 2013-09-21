

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
            
        <div id="top">Drinkkiarkisto</div>
        
            <div id="side">
                <div id="navbox">
                    <dl>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/html-demo/index.php">Etusivu</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/html-demo/arkisto.php">Arkisto</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/html-demo/haku.php">Haku</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/html-demo/reseptiehdotus.php">Reseptiehdotus</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/html-demo/kirjautuminen.php">Kirjautuminen</a></dt>
                        <dt><a href="http://askivilu.users.cs.helsinki.fi/html-demo/rekisteroituminen.php">Rekisteröityminen</a></dt>
                    </dl>
                </div>
            </div>
        <div id="content"> 
            <h1>Kirjautuminen<br></br><br></br></h1>
            <form action="../libs/kirjaudu.php" method="post">
                <p>Käyttäjätunnus:</p>
                <p><input type="text" name="ID"></p>
                <p>Salasana:</p>
                <p><input type="text" name="passwd"></p>
                <p><input type="submit"></p>
            </form>
        </div>
        </div>
    </body>
</html>
