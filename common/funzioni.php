
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

    $annunci[$row[0]] = $prodotto;
		$prodotto[0] = $row[1];
		$prodotto[1] = $row[4];

  }

  $risultato["contenuto"] = $annunci;
  return $risultato;

}

function stampaAnnunci($risultato)
{

  echo "<div class=\"table-responsive\">";
	echo "<table class=\"table text-center\">";
	echo "<tr><th class=\"text-center\">Codice</th>
						<th class=\"text-center\">Nome annuncio</th>
	          <th class=\"text-center\">Nome Venditore</th>
					  <th class=\"text-center\">Modifica</th>
					  <th class=\"text-center\">Cancella</th>
			  </tr>";
  foreach ($risultato["contenuto"] as $codice => $nome) {
    echo "<tr><td>$codice</td>";

					foreach ($annunci[$codice] as $key => $value) {
						echo "$value";
					}


		echo	"<td>$nome</td>
		      <td><a href=\"../backend/updateS.php?id=$codice\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
		      <td><a href=\"../backend/deleteS.php?id=$codice\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>
          </tr>";
          // bisogna implementare queste funzioni

  }

  echo "</table>";
  echo "</div>";
}

function inserireAnnuncio($cid, $codice, $nome_annuncio)
{

}


?>
