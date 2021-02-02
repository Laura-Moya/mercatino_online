<?php

function checkMail($cid, $login)
{
	$risultato= array("msg"=>"","status"=>"ok");

	$sql = "SELECT * FROM utente where email = '$login'";

	$res = $cid->query($sql);
	if ($res==null)
	 {
			 $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
			 $risultato["status"]="ko";
			 $risultato["msg"]=$msg;
	 }elseif($res->num_rows==0 || $res->num_rows>1)
	 {
			 $msg = "Login sbagliato";
			 $risultato["status"]="ko";
			 $risultato["msg"]=$msg;
	 }elseif($res->num_rows==1)
	 {
		 $msg = "Login effettuato con successo";
		 $risultato["status"]="ok";
		 $risultato["msg"]=$msg;
	 }
	 return $risultato;

}

function isUser($cid,$login,$pwd)
{
	$risultato= array("msg"=>"","status"=>"ok");

   /* inserire controlli dell'input */
   $sql = "SELECT * FROM utente where email = '$login' and password = '$pwd'";

   $res = $cid->query($sql);
   if ($res==null)
	{
	    $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;
	}elseif($res->num_rows==0 || $res->num_rows>1)
	{
			$msg = "Login o password sbagliate";
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;
	}elseif($res->num_rows==1)
	{
	  $msg = "Login effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;

	}

    return $risultato;
}

//funzione per leggere un annuncio
function leggiAnnuncio($cid, $codice)
{
	$prodotto= array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }
	$sql = "SELECT annuncio.nome_annuncio, annuncio.nome_prodotto, annuncio.prezzo, utente.nome, utente.cognome, annuncio.regione, annuncio.comune, stato.stato, annuncio.categorie, annuncio.sottocategorie, annuncio.nuovo
				  FROM annuncio, stato, utente
				  WHERE annuncio.venditore = utente.codice_fiscale AND annuncio.codice = stato.prodotto AND annuncio.codice = $codice";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	while ($row=$res->fetch_row()) {
			for ($i=0; $i < 11 ; $i++) {
				$prodotto[$i] = $row[$i];
			}

  }
	$risultato["contenuto"] = $prodotto;
	return $risultato;
}

function leggiUtente($cid, $codicefiscale)
{
	$utente= array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT utente.nome as 'NOME', utente.cognome as 'COGNOME', utente.email,
					AVG((valutazione.serieta+valutazione.puntualita)/2) as 'VALUTAZIONE MEDIA'
					FROM valutazione, utente
					WHERE utente.codice_fiscale = valutazione.codice_fiscale_valutato AND utente.codice_fiscale = '$codicefiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
	while ($row=$res->fetch_row()) {
			for ($i=0; $i < 4 ; $i++) {
				$utente[$i] = $row[$i];
			}
  }

	$risultato["contenuto"] = $utente;
	return $risultato;
}

//Conta prodotti venduti
function leggiProdottiVenduti($cid, $codicefiscale)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT DISTINCT COUNT(annuncio.nome_annuncio)
					FROM annuncio, stato, utente
					WHERE annuncio.venditore = utente.codice_fiscale AND annuncio.codice = stato.prodotto
								AND stato.stato = 'venduto' AND utente.codice_fiscale = '$codicefiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
	$row=$res->fetch_row();


	$risultato["contenuto"] = $row;
	return $risultato;
}

//Conta prodotti osservati
function leggiProdottiOsservati($cid, $codicefiscale)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT COUNT(osserva.prodotto)
					FROM osserva
					WHERE osserva.utente = '$codicefiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
	$row=$res->fetch_row();


	$risultato["contenuto"] = $row;
	return $risultato;
}

//Conta prodotti acquistati
function leggiProdottiAcquistati($cid, $codicefiscale)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT COUNT(annuncio.acquirente)
					FROM annuncio, stato
					WHERE stato.prodotto = annuncio.codice
								AND stato.stato = 'venduto' AND annuncio.acquirente = '$codicefiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
	$row=$res->fetch_row();


	$risultato["contenuto"] = $row;
	return $risultato;
}

//Conta prodotti in vendita
function leggiProdottiInVendita($cid, $codicefiscale)
{
	$prodottiInVendita = array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT stato.prodotto, stato.data_ora FROM stato ORDER BY data_ora ASC";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	$row=$res->fetch_row();
	$prodottiInVendita[0] = $row[0];


	$risultato["contenuto"] = $prodottiInVendita;
	return $risultato;
}

//Tutti i tuoi annunci osservati
function annunciOsservati($cid, $codicefiscale)
{
	$annunciOsservati= array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");
	$prodotto = array();

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }
	$sql = "SELECT DISTINCT annuncio.nome_annuncio, annuncio.nome_prodotto, osserva.prodotto
					FROM osserva, annuncio
					WHERE osserva.prodotto = annuncio.codice AND osserva.utente = '$codicefiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	$i=0;
	while ($row=$res->fetch_row()) {
		for ($j=0; $j < 3; $j++) {
			$prodotto[$j] = $row[$j];
		}
		$annunciOsservati[$i]=$prodotto;
		$i++;
  }

	$risultato["contenuto"] = $annunciOsservati;
	return $risultato;
}

//In primo piano
function inPrimoPiano($cid)
{
	$primoPiano= array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");
	$prodotto = array();

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }
	$sql = "SELECT DISTINCT annuncio.nome_annuncio, annuncio.nome_prodotto, osserva.prodotto
					FROM osserva, annuncio
					WHERE osserva.prodotto = annuncio.codice
					GROUP BY osserva.prodotto
					ORDER BY COUNT(osserva.utente) DESC";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	$i=0;
	while ($row=$res->fetch_row()) {
		for ($j=0; $j < 3; $j++) {
			$prodotto[$j] = $row[$j];
		}
		$primoPiano[$i]=$prodotto;
		$i++;
  }

	$risultato["contenuto"] = $primoPiano;
	return $risultato;
}


// Funzione relative alle funzione degli annunci

function leggiAnnunci($cid)
{
  $annunci = array();
  $risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");
	$prodotto = array();

  if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

  $sql = "SELECT annuncio.codice, utente.nome AS 'NOME', utente.cognome AS 'COGNOME', annuncio.nome_annuncio, annuncio.nome_prodotto, annuncio.foto, annuncio.prezzo, annuncio.categorie, annuncio.sottocategorie, annuncio.nuovo, annuncio.provincia
          FROM annuncio, utente
          WHERE annuncio.venditore = utente.codice_fiscale;";
  $res=$cid->query($sql);
  if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
  }

  while ($row=$res->fetch_row()) {
		for ($i=0; $i < 11 ; $i++) {
			$prodotto[$i] = $row[$i];
		}
		$annunci[$row[0]] = $prodotto;

  }

  $risultato["contenuto"] = $annunci;
  return $risultato;

}


function newUser($cid, $nome, $cognome, $login, $password, $tipo_utente, $immagine, $codicefiscale)
{
		$risultato= array("msg"=>"","status"=>"ok");
		$sql= "INSERT INTO `utente` (`codice_fiscale`, `nome`, `cognome`, `email`, `immagine`, `tipo_utente`, `password`)
					VALUES ('$codicefiscale', '$nome', '$cognome', '$login', '$immagine', '$tipo_utente', '$password')";

		$res = $cid->query($sql);
		if ($res==null)
	 {
			 $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
			 $risultato["status"]="ko";
			 $risultato["msg"]=$msg;
		 }
		else
		{
			$msg = "Registrazione effettuata con successo";
			$risultato["status"]="ok";
			$risultato["msg"]=$msg;
		}
		 return $risultato;

}

function inserireAnnuncio($cid, $codice, $nome_annuncio)
{

}

?>
