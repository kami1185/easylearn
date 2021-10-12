<?php

    ini_set('display_errors', 1); error_reporting(-1);

    include 'connect_db.php';

    //header('Content-Type: application/json; charset=utf-8');

    $data = $_POST['data'];

    $datajson = json_decode($data);

    //print_r($datajson);

    $nomeUtente = $datajson->nomeUtente;
    $cognomeUtente = $datajson->cognomeUtente;
    $sesso = $datajson->sesso;
    $email = $datajson->email;
    $dataNascita = $datajson->dataNascita;
    $idutente = $datajson->idutente;

    $DB = new Database();
    $conn = $DB->connect();
    $sql = "UPDATE utente SET nome=?, cognome=?, sesso=?, email=?, datanascita=? WHERE id=?";
    //$stmt->execute([$name, $surname, $sex, $id]);
    //$sql = "INSERT INTO utente(nome, cognome, sesso, email, datanascita) VALUES (?, ?, ?, ?, ?)";
    $smt = $conn->prepare($sql);
    //$smt = $DB->save($sql);
    $smt -> execute([$nomeUtente, $cognomeUtente, $sesso, $email, $dataNascita, $idutente]);
    

    $tipoentita = $datajson -> entita;
    $nomeentita = $datajson -> nomeentita;
    $argomenti = $datajson -> argomenti;
    $anno = $datajson -> anno;
    $votazione = $datajson -> votazione;
    $idesperienza = $datajson -> idesperienza;
    

    $count = count($nomeentita);
    

    for($i=0; $i<$count; $i++){
        $sql = "UPDATE esperienze SET argomenti=?, annofrequenza=?, votazione=?, idutente=?, tipoentita=?, nomeentita=? WHERE id=?";
        $smt = $conn->prepare($sql);
        $smt -> execute([$argomenti[$i], $anno[$i], $votazione[$i], $idutente, $tipoentita[$i], $nomeentita[$i], $idesperienza]);
    }


    echo json_encode(array('success' => 'true'));

?>