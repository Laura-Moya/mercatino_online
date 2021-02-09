
<?php

$tipoErrore = array("1"=>"Inserire il nome dell'annuncio",
                    "2" =>"Inserire il nome del prodotto",
          					"3" =>"Prezzo del prodotto non valido",);
$errore = array();
$dati = array();

if (isset($_GET["status"]))
{
	if ($_GET["status"]=='ko') $errore=unserialize($_GET["errore"]);
	$dati=unserialize($_GET["dati"]);
}
else
{
	$dati["nomeannuncio"]="";
	$dati["nomeprodotto"]="";
	$dati["prezzo"]="";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
      <script type="text/javascript" src="common/funzioni.js"></script>
  </head>
  <body>

  <?php include "common/navbar.php";?>

  <div class="container-creare-annuncio" align="center">
      <form class="" action="checkAnnuncio.php" method="GET">
        <table class="">
          <tr>
            <h2 class="title">Creare Annuncio</h2>
          </tr>
          <tr>
            <td colspan="2"><h6>Nome Annuncio</h6></td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="nomeannuncio" value= "<?php  echo $dati["nomeannuncio"];?>"> </br> <?php if (isset($errore["nomeannuncio"]))  echo "<span class=\"errore\">" . $tipoErrore[$errore["nomeannuncio"]] . "</span>"; ?>
             </td>
          </tr>
          <tr>
            <td colspan="2"> <h6> Nome Prodotto</h6> </td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="nomeprodotto" value = "<?php  echo $dati["nomeprodotto"];?>"> </br>
              <?php if (isset($errore["nomeprodotto"]))  echo "<span class=\"errore\">" . $tipoErrore[$errore["nomeprodotto"]] . "</span>"; ?>
             </td>
          </tr>
          <tr>
            <td colspan="2"><h6>Prezzo</h6></td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="prezzo" value = "<?php  echo $dati["prezzo"];?>"> </br>
              <?php if (isset($errore["prezzo"]))  echo "<span class=\"errore\">" . $tipoErrore[$errore["prezzo"]] . "</span>"; ?>
             </td>
          </tr>
          <!-- Dropdowns -->
          <tr>
            <td>
              <div class="">
                <label for="validationCustom03">Categoria:</label>
                <select class="form-control form-control-md" name="category" id="validationCustom03" onchange="ChangecatList()" required>
                  <option value="">Seleziona... </option>
                  <option value="Elettrodomestici">Elettrodomestici</option>
                  <option value="Foto e Video">Foto e Video</option>
                  <option value="Abbigliamento">Abbigliamento</option>
                  <option value="Hobby">Hobby</option>
                </select>
              </div>
            </td>
            <td>
              <div class="">
                <label for="validationCustom04">Sottocategoria:</label>
                <select class="form-control form-control-md" id="validationCustom04" name="sottocategoria" required></select>
              </div>
            </td>
          </tr>
          <!-- Ratios -->
          <tr>
            <td style="width: 50%">
            <h6>Seleziona la visibilità</h6>
            <input type="radio" id="Pubblica" name="visibilità" value="pubblica">
            <label style="margin-right:0.5rem" for="Pubblica">Pubblica </label><br/>
            <input type="radio" id="Privata" name="visibilità" value="privata">
            <label for="Privata">Privata </label><br/>
            <input type="radio" id="Ristretta" name="visibilità" value="ristretta">
            <label for="Ristretta">Ristretta</label>
            </td>
              <td style="width: 50%; vertical-align: top; padding-left: 3.2rem;">
              <h6 >Seleziona lo stato</h6>
              <input class="inputpaga" type="radio" id="N" name="SP" onclick="ExecuteNuovo()"/>
              <label class ="labelpagamento" for="N" style="margin-right:0.5rem">Nuovo </label>
              <input class="inputpaga" type="radio" id="U" name="SP" onclick="ExecuteUsato()"/>
              <label class ="labelpagamento" for="U">Usato</label>
              </td>
          </tr>
          <tr>
            <td colspan="2">
              <div id="garanzia">
                <center><input class="" type="checkbox" id="G" onclick="openDivTempoGar()">
                <label class ="" for="G">Il prodotto ha una garanzia?</label><center></center>
              </div>
              <tr>
                <td colspan="2">
                  <div id="tempogaranzia">
                  <center><h6>Tempo di garanzia:</h6>
                  <input type="text" name="tempogaranzia" value=""/><center></center>
                </div>
              </td>

              </tr>

            </td>
          </tr>
          <tr>
              <td>
                <div id="tempousura">
                <h6>Tempo di usura:</h6>
                <input type="text" name="tempousura" value="">
              </div>

              </td>
              <td>
                <div id="statousura">
                <h6>Stato di usura:</h6>
                <select class="form-control form-control-md" name="">
                  <option value="">Seleziona...</option>
                  <option value="Parianuovo">Pari a nuovo</option>
                  <option value="Buono">Buono</option>
                  <option value="Meglio">Meglio</option>
                  <option value="Usato">Usato</option>
                </div>
                </select>
              </td>

          </tr>
          <tr>

            <td colspan="2" align="center"> <h6 style="margin-top: 0.5rem;">Carica una immagine del tuo annuncio</h6></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="file" name=""></td>
          </tr>
          <tr>
            <td align="center">
              <input class="btn btn-primary" id="btn" type="submit" value="OK" />
            </td>
            <td align="center">
              <input class="btn btn-primary" id="btn" type = "reset" value = "Cancella"/>
            </td>
          </tr>
        </table>
      </form>
  </div>
  <script>
  function ExecuteNuovo() {
    openDivGaranzia();
    closeDivUsura();
  }
  function ExecuteUsato() {
    openDivUsura();
    closeDivGaranzia();
  }
  function openDivGaranzia() {
    document.getElementById("garanzia").style.visibility = "visible";
    document.getElementById("garanzia").style.height = "auto";
    // document.getElementById("tempousura").reset();
    // document.getElementById("statousura").reset();
  }
  function closeDivUsura() {
    document.getElementById("tempousura").style.visibility = "hidden";
    document.getElementById("tempousura").style.height = "0px";
    document.getElementById("statousura").style.visibility = "hidden";
    document.getElementById("statousura").style.height = "0px";

  }
  function openDivTempoGar() {
    if (document.getElementById("G").checked == true){
      document.getElementById("tempogaranzia").style.visibility = "visible";
      document.getElementById("tempogaranzia").style.height = "auto";
    }
    else {
      document.getElementById("tempogaranzia").style.visibility = "hidden";
      document.getElementById("tempogaranzia").style.height = "0px";
    }
  }
  function cancellareUsato(){

  }

  function openDivUsura() {
    document.getElementById("tempousura").style.visibility = "visible";
    document.getElementById("tempousura").style.height = "auto";
    document.getElementById("statousura").style.visibility = "visible";
    document.getElementById("statousura").style.height = "auto";
  }
  function closeDivGaranzia() {
    document.getElementById("garanzia").style.visibility = "hidden";
    document.getElementById("garanzia").style.height = "0px";
    document.getElementById("tempogaranzia").style.visibility = "hidden";
    document.getElementById("tempogaranzia").style.height = "0px";
  }

  </script>

  </body>
</html>
