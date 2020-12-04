<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
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
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle form-size"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categoria
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Elettrodomestici</a>
                  <a class="dropdown-item" href="#">Hobby</a>
                  <a class="dropdown-item" href="#">Foto e Video</a>
                  <a class="dropdown-item" href="#">Abbigliamento</a>
                </div>
              </div>
            </td>
            <td>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle form-size" class=""href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sottocategoria
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">xxxx</a>
                  <a class="dropdown-item" href="#">xxxx</a>
                  <a class="dropdown-item" href="#">xxxx</a>
                  <a class="dropdown-item" href="#">xxxx</a>
                </div>
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
            <!-- <tr>
              <td align="center">
                <input class="btn btn-primary" id="btn" type="submit" value="OK" />
              </td>
              <td align="center">
                <input class="btn btn-primary" id="btn" type = "reset" value = "Cancella"/>
              </td>
            </tr> -->
        </table>
      </form>
  </div>

  </body>
</html>
