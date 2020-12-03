
<?php

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


// Funzione relative alle funzione degli annunci

function leggiAnnunci($cid)
{
  $annunci = array();
  $risultato = array("status"=> "ok", "msg"=>"", "contenuto"=>"");

  if ($cid->connect_errno) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella connessione al db " . $cid->connect_errno;
    return $risultato;
  }

  $sql = "SELECT annuncio.codice, utente.nome AS 'NOME', utente.cognome AS 'COGNOME', nome_annuncio, nome_prodotto, foto, prezzo, categorie, sottocategorie, nuovo, provincia
          FROM annuncio, utente
          WHERE annuncio.venditore = utente.codice_fiscale;";
  $res=$cid->query($sql);
  if ($res == null) {
    $risultato["status"] = "ko";
    $risultato["msg"] = "Errore nella esecuzione della interrogazione " . $cid->error;
    return $risultato;
  }

  while ($row=$res->fetch_row()) {
    $annunci[$row[0]] = $row[1];
		echo $row[0];
  }

  $risultato["contenuto"] = $annunci;
  return $risultato;

}

function stampaAnnunci($annunci)
{
	print_r( $annunci);
  echo "<div class=\"table-responsive\">";
	echo "<table class=\"table text-center\">";
	echo "<tr><th class=\"text-center\">Codice Prodotto</th>
	          <th class=\"text-center\">Nome venditore</th>
			  <th class=\"text-center\">Modifica</th>
			  <th class=\"text-center\">Cancella</th>
			  </tr>";
  foreach ($annunci as $codice => $nome) {
    echo "<tr><td>$codice</td>
		      <td>$nome</td>
		      <td><a href=\"../backend/updateS.php?id=$codice\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
		      <td><a href=\"../backend/deleteS.php?id=$codice\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>
          </tr>";
              // bisogna implementare queste funzioni
					print_r($nome);
  }

  echo "</table>";
  echo "</div>";
}

function inserireAnnuncio($cid, $codice, $nome_annuncio)
{

}


?>
