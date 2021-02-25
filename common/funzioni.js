var sottocategorie = {};
sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altri elettrodomestici'];
sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori fotografici', 'Telecamere', 'Microfoni', 'Altro da foto e video'];
sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro da abbigliamento'];
sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Riviste', 'Altro da hobby'];



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
