<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <link rel="stylesheet" href="common/selezionaCategoria.js">
  <body>

  <?php include "common/navbar.php";?>

  <div class="container-creare-annuncio" align="center">

      <form class="" action="" method="">
        <table class="">
          <tr>
            <h2 class="title">Creare Annuncio</h2>
          </tr>
          <tr>
            <td colspan="2"><h6>Nome Annuncio</h6></td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="nome_prodotto"> </td>
          </tr>
          <tr>
            <td colspan="2"> <h6> Nome Prodotto</h6> </td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="nome_annuncio"> </td>
          </tr>
          <tr>
            <td colspan="2"><h6>Prezzo</h6></td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="prezzo"> </td>
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
            <label style="margin-right:0.5rem" for="pubblica">Pubblica </label><br/>
            <input type="radio" id="Privata" name="visibilità" value="privata">
            <label for="privata">Privata </label><br/>
            <input type="radio" id="Ristretta" name="visibilità" value="ristretta">
            <label for="ristretta">Ristretta</label>
            </td>
            <td style="width: 50%; vertical-align: top; padding-left: 3.2rem;">
            <h6>Seleziona lo stato</h6>
            <input type="radio" id="nuovo" name="stato_prodotto" value="nuovo">
            <label style="margin-right:0.5rem" for="nuovo">Nuovo </label><br/>
            <input type="radio" id="usato" name="stato_prodotto" value="usato">
            <label for="usato">Usato</label>
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
  <script type="text/javascript">
    var sottocategorie = {};
      sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altro'];
      sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori', 'Telecamere', 'Microfoni', 'Altro'];
      sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro'];
      sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro'];



      function ChangecatList() {
  var catList = document.getElementById("validationCustom03");
  var sotList = document.getElementById("validationCustom04");
  var selCat = catList.options[catList.selectedIndex].value;
  while (sotList.options.length) {
      sotList.remove(0);
  }
  var cats = sottocategorie[selCat];
  if (cats) {
      var i;
      for (i = 0; i < cats.length; i++) {
          var cat = new Option(cats[i], i);
          sotList.options.add(cat);
      }
  }
}

  </script>
  </body>
</html>