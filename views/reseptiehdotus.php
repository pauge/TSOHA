<div> 
            <h1>Reseptiehdotus<br></br><br></br></h1>
            <p>Jos et löydä tarvittavaa aineosaa listalta, lisää se tässä:</p>
            <form action="../libs/lisaaAine.php" method="post">
                <p><input type="text" name="uusi"><input type="submit"></p>
            </form>
            <br><br>
            <form action="../libs/lisaaresepti.php" method="post">
                <div>
                    <p>Reseptin nimi:</p>
                    <p><input type="text" name="nimi" maxlength="20" size="20"></p><br>
                    <p>Määrä ja aines</p>
                    <p><input type="text" name="maara" maxlength="4" size="4">  <input type="text" name="aines"></p><br>
                </div>
                <p>Ohjeet</p>
                    <textarea rows="3" cols="50" name="ohje"></textarea>
                <p>Lisähuomautukset</p>
                    <textarea rows="3" cols="50"></textarea>
                <p><input type="submit"></p>
            </form>
        </div>

