function mostrare(id) {
    if (id == "ritiro_a_mano") {
      $("#ritiro_a_mano").show();
      $("#carta_credito").hide();
    }

    if (id == "carta_credito") {
        // document.getElementById("ritiro_a_mano").hide();
        // document.getElementById("carta_credito").show();
        $("#ritiro_a_mano").hide();
        $("#carta_credito").show();
    }

}
