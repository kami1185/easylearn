<?php

    ini_set('display_errors', 1); error_reporting(-1);

    include 'connect_db.php';

    //header('Content-Type: application/json; charset=utf-8');

    $data = $_POST['data'];

    $datajson = json_decode($data);

    $nomeUtente = $datajson->nomeUtente;
    $cognomeUtente = $datajson->cognomeUtente;
    $sesso = $datajson->sesso;
    $email = $datajson->email;
    $dataNascita = $datajson->dataNascita;

    $DB = new Database();
    $conn = $DB->connect();
    $sql = "INSERT INTO utente(nome, cognome, sesso, email, datanascita) VALUES (?, ?, ?, ?, ?)";
    $smt = $conn->prepare($sql);
    //$smt = $DB->save($sql);
    $smt -> execute([$nomeUtente, $cognomeUtente, $sesso, $email, $dataNascita]);
    $idutente = $conn->lastInsertId();

    $tipoentita = $datajson -> entita;
    $nomeentita = $datajson -> nomeentita;
    $argomenti = $datajson -> argomenti;
    $anno = $datajson -> anno;
    $votazione = $datajson -> votazione;

    $count = count($nomeentita);

    for($i=0; $i<$count; $i++){
        $sql = "INSERT INTO esperienze (argomenti, annofrequenza, votazione, idutente, tipoentita, nomeentita) VALUES (?, ?, ?, ?, ?, ?)";
        $smt = $DB->save($sql);
        $smt -> execute([$argomenti[$i], $anno[$i], $votazione[$i], $idutente, $tipoentita[$i], $nomeentita[$i]]);
    }


    echo json_encode(array('success' => 'true'));

?>