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

function valuta(cid, codicefiscaleValutato, codicefiscaleValuta)
{
  let puntualita = prompt('Valutazione della puntualità: ');
  let serieta = prompt('Valutazione della serietà: ');
  alert("Puntualità: " + puntualita + "\n" + "Serietà: " + serieta);
  if (confirm('Sei sicuro della tua valutazione?')){
    console.log(codicefiscaleValutato);
    console.log(cid);

      valuta_php(cid, codicefiscaleValutato, codicefiscaleValuta, serieta, puntualita);
      window.location = "prodottiAcquistati.php";
  }
}
