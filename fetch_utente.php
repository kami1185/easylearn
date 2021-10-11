<?php

    include 'connect_db.php';

    $idUtente = $_POST['id'];

    $DB = new Database();

    $query = 'SELECT * FROM utente WHERE ';

    $res = $DB -> read($query);

    $data = array();

    if($res -> rowCount() > 0){
        while($row = $res -> fetch())
        {

            $sub_array = array();
            $sub_array[] = '<div contenteditable class="update" data-id="data1">' . $row["nome"] . '</div>';
            $sub_array[] = '<div contenteditable class="update" data-id="data2" data-column="cognome">' . $row["cognome"] . '</div>';
            $sub_array[] = '<div contenteditable class="update" data-id="data3" data-column="data_nascita">'.$row["sesso"].'</div>';
            $sub_array[] = '<div contenteditable class="update" data-id="data4" data-column="residenza">'.$row["email"].'</div>';
            $sub_array[] = '<div contenteditable class="update" data-id="data5" data-column="telefono">'.$row["datanascita"].'</div>';
            $sub_array[] = array('<a href="#" name="view" class="btn btn-primary btn-xs view" onclick=viewUtente("'.$row["id"].'"); id="'.$row["id"].'">Guarda</a>');
            $sub_array[] = array('<a href="#" name="delete" class="btn btn-danger btn-xs delete" onclick=deleteUtente("'.$row["id"].'"); id="'.$row["id"].'">Elimina</a>');

            $data[] = $sub_array;

        }
    }


    echo json_encode($data);

?>