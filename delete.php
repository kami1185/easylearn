<?php

    include 'connect_db.php';

    $id_utente = $_POST['id'];

    $datajson = json_decode($id_utente,true);
    //print_r($id_utente);

    $DB = new Database();

    $sql_utente = 'DELETE utente,esperienze FROM utente
                    INNER JOIN
                        esperienze ON esperienze.idutente = utente.id 
                    WHERE
                        utente.id = :id';

    $response = $DB ->delete($sql_utente, $id_utente);

    // $success = "true";
    // $message = "Utente eliminato";

    // $output = array(
    //     "success"    => $success,
    //     "message"  =>  $response
    // );

    echo json_encode($response);

?>
