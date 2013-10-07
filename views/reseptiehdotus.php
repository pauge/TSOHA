<div>
    <h1>Reseptiehdotus<br><br></h1>
            <p>Jos et löydä tarvittavaa aineosaa listalta, lisää se tässä:</p>
            <form action="../libs/lisaaAine.php" method="post">
                <p><input type="text" name="uusi" maxlength="20"><input type="submit"></p>
            </form>
            <br>
            <form action="../libs/lisaaresepti.php" method="post">
                <div>
                    <p>Reseptin nimi:</p>
                    <p><input type="text" name="nimi" maxlength="30" size="30"></p><br>
                    <p>Määrä ja aines</p>
                    <p><?php tulostaAineet()?></p><br>
                </div>
                <p>Ohjeet</p>
                    <textarea rows="3" cols="50" name="ohje"></textarea>
                <p>Lisähuomautukset</p>
                    <textarea rows="3" cols="50" name="lisaohje"></textarea>
                <p><input type="submit"></p>
            </form>
        </div>
