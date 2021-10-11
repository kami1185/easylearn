<?php
//fetch.php
    // $connect = mysqli_connect("localhost", "root", "", "testing");
    include 'connect_db.php';

    $DB = new Database();
    //$DB ->connect();

    $query = 'SELECT * FROM utente';

    $res = $DB -> read($query);
    //echo $res;
    //print_r($res);
    //$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

    //$result = mysqli_query($db, $query);

    $data = array();

    if($res -> rowCount() > 0){
        // while($row = mysqli_fetch_assoc($res))
        while($row = $res -> fetch())
        {
            //printf ("%s %s\n", $row["nome"], $row["email"]);
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

    $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  $res -> rowCount(),
        "recordsFiltered" => $res -> rowCount(),
        "data"    => $data
    );

    echo json_encode($output);

?>
