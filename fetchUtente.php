<?php

    include 'connect_db.php';
    //Attempt to decode the incoming RAW post data from JSON.
    //$content = trim(file_get_contents("php://input"));
    $data = json_decode(file_get_contents('php://input'), true);
    
    $id = ($data['data']);

    $DB = new Database();
    $conn = $DB->connect();

    $sql = 'SELECT * FROM utente WHERE id = ? ';
    $smt = $conn->prepare($sql);
    $smt -> execute([$id]);
    $utenti = $smt -> fetchAll();

    //print_r($utenti);

    
    $sub_array = array();

    //$data["utente"]=$utenti;

    $sql2 = 'SELECT * FROM esperienze AS e WHERE e.idutente = ? ';
    $smt2 = $conn->prepare($sql2);
    $smt2 -> execute([$id]);
    $esperienze = $smt2 -> fetchAll();

    //$data["esperienze"]=$esperienze;
    $data = array('utente' => $utenti, 'esperienze' => $esperienze);

    // if($res -> rowCount() > 0){
    //     while($row = $res -> fetch())
    //     {

    //         $sub_array = array();
    //         $sub_array[] = '<div contenteditable class="update" data-id="data1">' . $row["nome"] . '</div>';
    //         $sub_array[] = '<div contenteditable class="update" data-id="data2" data-column="cognome">' . $row["cognome"] . '</div>';
    //         $sub_array[] = '<div contenteditable class="update" data-id="data3" data-column="data_nascita">'.$row["sesso"].'</div>';
    //         $sub_array[] = '<div contenteditable class="update" data-id="data4" data-column="residenza">'.$row["email"].'</div>';
    //         $sub_array[] = '<div contenteditable class="update" data-id="data5" data-column="telefono">'.$row["datanascita"].'</div>';
    //         $sub_array[] = array('<a href="#" name="view" class="btn btn-primary btn-xs view" onclick=viewUtente("'.$row["id"].'"); id="'.$row["id"].'">Guarda</a>');
    //         $sub_array[] = array('<a href="#" name="delete" class="btn btn-danger btn-xs delete" onclick=deleteUtente("'.$row["id"].'"); id="'.$row["id"].'">Elimina</a>');

    //         $data[] = $sub_array;

    //     }
    // }


    echo json_encode($data);

?>