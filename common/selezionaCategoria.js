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
