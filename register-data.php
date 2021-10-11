<?php

    ini_set('display_errors', 1); error_reporting(-1);

    include 'connect_db.php';

    //header('Content-Type: application/json; charset=utf-8');

    //$data = $_POST['value']
    $data = $_POST['data'];
    //print_r("datosss: ", $data);

    $datajson = json_decode($data);
    print_r($datajson);
    
    $nomeUtente = $datajson->nomeUtente;
    $cognomeUtente = $datajson->cognomeUtente;
    $sesso = $datajson->sesso;
    $email = $datajson->email;
    $dataNascita = $datajson->dataNascita;

    $DB = new Database();
    $sql = "INSERT INTO utente(nome, cognome, sesso, email, datanascita) VALUES (?, ?, ?, ?, ?)";
    $smt = $DB->save($sql);
    $smt -> execute([$nomeUtente, $cognomeUtente, $sesso, $email, $dataNascita]);

    $entita = $datajson -> nomeentita;



    // foreach ($datajson as $rows) {
    //     echo $rows['nomeUtente'];
    //     echo $rows['cognomeUtente'];
    //     echo $rows['sesso'];
    // }
    // $sql = "INSERT INTO utente(argomenti, annofrequenza, votazione, idutente, identita) VALUES (?, ?, ?, ?, ?)";
    // $smt = $DB->save($sql);
    // $smt -> execute([$nomeUtente, $cognomeUtente, $sesso, $email, $dataNascita]);


    // $val1 = array_values($datajson['tipoPaziente']);
    // $tipoPaziente = $val1[0];
    //$nomePaziente = mysqli_real_escape_string($db, $datajson['nomePaziente']);
    // $cognomePaziente = mysqli_real_escape_string($db, $datajson['cognomePaziente']);
    // $codiceFiscale = mysqli_real_escape_string($db, $datajson['codiceFiscale']);
    // $telefono = mysqli_real_escape_string($db, $datajson['telefono']);
    // $indirizzo = mysqli_real_escape_string($db, $datajson['indirizzo']);
    // $email = mysqli_real_escape_string($db, $datajson['email']);
    // $dataNascita = mysqli_real_escape_string($db, $datajson['dataNascita']);
    // $luogoNascita = mysqli_real_escape_string($db, $datajson['luogoNascita']);
    // $residenza = mysqli_real_escape_string($db, $datajson['residenza']);
    // $domicilio = mysqli_real_escape_string($db, $datajson['domicilio']);
    // $dataTampone = mysqli_real_escape_string($db, $datajson['dataTampone']);
    // $val2= array_values($datajson['esitoTampone']);
    // $esitoTampone = $val2[0];
    // $val3= array_values($datajson['tipoTest']);
    // $tipoTest = $val3[0];


    // $insert_data = "INSERT INTO
    //                 paziente(nome, cognome, codice_fiscale, numero_telefono, indirizzo, email, data_nascita, luogo_nascita, residenza, domicilio, referto, id_paziente)
    //                 VALUES 	('$nomePaziente', '$cognomePaziente', '$codiceFiscale', '$telefono', '$indirizzo', '$email', '$dataNascita', '$luogoNascita', '$residenza', '$domicilio', ' ', '$tipoPaziente')";

    // $success_data = mysqli_query($db, $insert_data);
    // if (!$success_data) {
    //     die('Error: ' . mysqli_error($db));
    // }

    // $insert_tampone = "INSERT INTO
    //                 tampone(idpaziente, data_tampone, id_test, id_esito)
    //                 VALUES 	(LAST_INSERT_ID(), '$dataTampone', '$tipoTest', '$esitoTampone')";

    // $success_data2 = mysqli_query($db, $insert_tampone);
    // if (!$success_data2) {
    //     die('Error: ' . mysqli_error($db));
    // }

    // echo json_encode(array('success' => 'true'));

    // mysqli_close($db);

?>