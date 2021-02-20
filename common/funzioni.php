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

function prendereCF($cid, $email)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");
	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }
	$sql = "SELECT utente.codice_fiscale
					FROM utente
					WHERE utente.email = '$email'";

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

function prendereIndirizzi ($cid, $codice_fiscale){
	$utente = array();
	$indirizzi = array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");
	if ($cid->connect_errno) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
		return $risultato;
	}
	$sql = "SELECT *
					FROM vive
					WHERE vive.codice_fiscale = '$codice_fiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
		return $risultato;
	}
	$j=0;
	while ($row=$res->fetch_row()) {
		for ($i=0; $i < 5 ; $i++) {
			$utente[$i] = $row[$i];
		}
		$indirizzi[$j] = $utente;
		$j++;
	}

	$risultato["contenuto"] = $indirizzi;
	return $risultato;

}
function prendereTipoUtente($cid, $email)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }
	$sql = "SELECT utente.tipo_utente
					FROM utente
					WHERE utente.email = '$email'";

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
	$sql = "SELECT annuncio.nome_annuncio, annuncio.nome_prodotto, annuncio.prezzo, utente.nome, utente.cognome,
								 annuncio.regione, annuncio.comune, stato.stato, annuncio.categorie, annuncio.sottocategorie,
								 annuncio.nuovo, annuncio.codice, annuncio.venditore, annuncio.garanzia, annuncio.copertura_garanzia,
								 annuncio.tempo_usura, annuncio.stato_usura, annuncio.foto, annuncio.acquirente, annuncio.visibilita
				  FROM annuncio, stato, utente
				  WHERE annuncio.venditore = utente.codice_fiscale AND annuncio.codice = stato.prodotto AND annuncio.codice = '$codice'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	while ($row=$res->fetch_row()) {
			for ($i=0; $i < 20 ; $i++) {
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

	$sql = "SELECT utente.nome as 'NOME', utente.cognome as 'COGNOME', utente.email, utente.immagine,
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
			for ($i=0; $i < 5 ; $i++) {
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
					FROM annuncio, stato s, utente
					WHERE annuncio.venditore = utente.codice_fiscale AND annuncio.codice = s.prodotto
								AND s.stato = 'venduto' AND utente.codice_fiscale = '$codicefiscale' ";

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


function prodottiAcquistati($cid, $codicefiscale)
{
	$prodotti = array();
	$prodotto = array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT annuncio.acquirente, annuncio.nome_prodotto, annuncio.nome_annuncio, annuncio.codice, annuncio.foto
					FROM annuncio, stato
					WHERE stato.prodotto = annuncio.codice
								AND stato.stato = 'venduto' AND annuncio.acquirente = '$codicefiscale'";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	$j = 0;
	while ($row=$res->fetch_row()) {
			for ($i=0; $i < 5 ; $i++) {
				$prodotto[$i] = $row[$i];
			}
			$prodotti[$j] = $prodotto;
			$j++;
  }

	$risultato["contenuto"] = $prodotti;
	return $risultato;
}


//Conta prodotti in vendita
function leggiProdottiInVendita($cid, $codicefiscale)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT COUNT(*)
					FROM annuncio p, stato s
					WHERE s.stato = 'in vendita' AND p.codice = s.prodotto AND p.venditore = '$codicefiscale' AND p.codice NOT IN
								(SELECT s.prodotto
								FROM stato s2
								WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";




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

//Conta prodotti eliminati
function leggiProdottiEliminati($cid, $codicefiscale)
{
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT COUNT(*)
					FROM annuncio p, stato s
					WHERE s.stato = 'eliminato' AND p.codice = s.prodotto AND p.venditore = '$codicefiscale' AND p.codice NOT IN
								(SELECT s.prodotto
								FROM stato s2
								WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";


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

//Prodotti in prodottiInVendita
function prodottiInVendita($cid, $codicefiscale)
{
	$prodotti = array();
	$prodotto = array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT DISTINCT p.nome_prodotto, p.nome_annuncio, p.codice, p.venditore, s.stato, s.data_ora, p.foto
					FROM annuncio p, stato s
					WHERE s.stato = 'in vendita' AND p.codice = s.prodotto AND p.venditore = '$codicefiscale' AND p.codice NOT IN
								(SELECT s.prodotto
								FROM stato s2
								WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
$j=0;
	while ($row=$res->fetch_row()) {
			for ($i=0; $i <= 6 ; $i++) {
				$prodotto[$i] = $row[$i];
			}
			$prodotti[$j] = $prodotto;
			$j++;
  }

	$risultato["contenuto"] = $prodotti;
	return $risultato;
}

//Prodotti venduti
function prodottiVenduti($cid, $codicefiscale)
{
	$prodotti = array();
	$prodotto = array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT DISTINCT p.nome_prodotto, p.nome_annuncio, p.codice, p.venditore, p.foto
					FROM annuncio p, stato s
					WHERE s.prodotto = p.codice AND s.stato = 'venduto' AND p.venditore = '$codicefiscale' ";

	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
$j=0;
	while ($row=$res->fetch_row()) {
			for ($i=0; $i < 5 ; $i++) {
				$prodotto[$i] = $row[$i];
			}
			$prodotti[$j] = $prodotto;
			$j++;
  }

	$risultato["contenuto"] = $prodotti;
	return $risultato;
}

//Prodotti in prodotti eliminati
function prodottiEliminati($cid, $codicefiscale)
{
	$prodotti = array();
	$prodotto = array();
	$risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

	$sql = "SELECT DISTINCT annuncio.nome_prodotto, annuncio.nome_annuncio, annuncio.codice, annuncio.venditore, s.stato, s.data_ora, annuncio.foto
					FROM annuncio , stato s
					WHERE s.stato = 'eliminato' AND annuncio.codice = s.prodotto AND annuncio.venditore = '$codicefiscale' 	AND annuncio.codice NOT IN
						(SELECT s.prodotto
						FROM stato s2
						WHERE annuncio.codice = s2.prodotto and s.data_ora < s2.data_ora)";


	$res=$cid->query($sql);

	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}
$j=0;
	while ($row=$res->fetch_row()) {
			for ($i=0; $i <= 6 ; $i++) {
				$prodotto[$i] = $row[$i];
			}
			$prodotti[$j] = $prodotto;
			$j++;
  }

	$risultato["contenuto"] = $prodotti;
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
	$sql = "SELECT DISTINCT annuncio.nome_annuncio, annuncio.nome_prodotto, osserva.prodotto, annuncio.foto
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
		for ($j=0; $j < 4; $j++) {
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
	$sql = "SELECT DISTINCT annuncio.nome_annuncio, annuncio.nome_prodotto, osserva.prodotto, annuncio.foto
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
		for ($j=0; $j < 4; $j++) {
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
  $sql = "SELECT annuncio.codice, utente.nome AS 'NOME', utente.cognome AS 'COGNOME', annuncio.nome_annuncio,
	 				annuncio.nome_prodotto, annuncio.foto, annuncio.prezzo, annuncio.categorie, annuncio.sottocategorie,
					annuncio.nuovo, annuncio.provincia, annuncio.visibilita, annuncio.regione
          FROM annuncio, utente
          WHERE annuncio.venditore = utente.codice_fiscale;";
  $res=$cid->query($sql);
  if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
  }
  while ($row=$res->fetch_row()) {
		for ($i=0; $i < 13 ; $i++) {
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

		if ($cid->connect_errno) {
	    $risultato["status"] = "ko";
	    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
	    return $risultato;
	  }

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

function newIndirizzo($cid, $nuovaVia, $nuovoComune, $nuovaProvincia, $nuovaRegione)
{
		$risultato= array("msg"=>"","status"=>"ok");

		if ($cid->connect_errno) {
	    $risultato["status"] = "ko";
	    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
	    return $risultato;
	  }

		$sql= "INSERT INTO `indirizzo` (`via`, `comune`, `provincia`, `regione`)
		         VALUES ('$nuovaVia', '$nuovoComune', '$nuovaProvincia', '$nuovaRegione')";

		$res = $cid->query($sql);
		if ($res)
	 {
		 $msg = "Indirizzo aggiunto con successo";
		 $risultato["status"]="ok";
		 $risultato["msg"]=$msg;

		 }
		else
		{
			$msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;
		}
		 return $risultato;

}

function osservare($cid, $prodotto, $codicefiscale){

	$risultato= array("msg"=>"","status"=>"ok");

	if ($cid->connect_errno) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
		return $risultato;
	}

	$sql="INSERT INTO `osserva` (`utente`, `prodotto`) VALUES ('$codicefiscale','$prodotto')";

	$res = $cid->query($sql);
	if ($res==null)
 {
		 $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
		 $risultato["status"]="ko";
		 $risultato["msg"]=$msg;

	 }
	else
	{
		$msg = "Osserva effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;
	}
	 return $risultato;

}

function diventaVenditore($cid, $codicefiscale)
{
	echo "ciao";
	$risultato= array("msg"=>"","status"=>"ok");

	if ($cid->connect_errno) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
		return $risultato;
	}

	$sql="UPDATE `utente` SET `tipo_utente` = 'venditore' WHERE `utente`.`codice_fiscale` = '$codicefiscale'";

	$res = $cid->query($sql);
	if ($res==null)
 {
		 $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
		 $risultato["status"]="ko";
		 $risultato["msg"]=$msg;
	 }
	else
	{
		$msg = "Diventa venditore effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;
	}
	 return $risultato;
}

function valuta_php($cid, $codicefiscaleValutato, $codicefiscaleValuta, $serieta, $puntualita)
{
	$risultato= array("msg"=>"","status"=>"ok");

	if ($cid->connect_errno) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
		return $risultato;
	}

	$sql= "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`)
				 VALUES ('$codicefiscaleValuta', '$codicefiscaleValutato', '$serieta', '$puntualita')";

	$res = $cid->query($sql);
	if ($res==null)
 {
		 $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
		 $risultato["status"]="ko";
		 $risultato["msg"]=$msg;
	 }
	else
	{
		$msg = "Valutazione effettuata con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;
	}

	return $risultato;
}

function inserireAnnuncio($cid, $codice, $nome_annuncio)
{

}

function contaOsservatori($cid, $codice){
	$risultato= array("msg"=>"","status"=>"ok");

	if ($cid->connect_errno) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
		return $risultato;
	}

	$sql="SELECT COUNT(*)
				FROM `osserva`
				WHERE osserva.prodotto ='$codice' ";

	$res = $cid->query($sql);
	if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
	}

	$row=$res->fetch_row();

	$risultato["contenuto"] = $row;
	return $risultato;
}

function prodottoOsservato ( $cid, $codicefiscale, $codice){
	$risultato= array("msg"=>"","status"=>"ok");

	if ($cid->connect_errno) {
		$risultato["status"] = "ko";
		$risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
		return $risultato;
	}

	$sql="SELECT * FROM `osserva` WHERE osserva.prodotto='$codice' AND osserva.utente='$codicefiscale'";

	$res = $cid->query($sql);

	$row=$res->fetch_row();


	if ($row == null) {
		$oss = 0;
		$risultato["contenuto"] = $oss;

    return $risultato;
	} else {
		$oss = 1;
		$risultato["contenuto"] = $oss;
		return $risultato;
	}
}

?>
