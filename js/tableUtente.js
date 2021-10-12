


function viewUtente(id){

    $.ajax({
        url: 'fetchUtente.php',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({'data':id}),
        success: function (data) {

            $("#containerData").load("html/scheda.html", function( response, status, xhr ) {
                if ( status === "error" ) {
                    var msg = "Sorry but there was an error: ";
                    alert(msg + xhr.status + " " + xhr.statusText);
                }

                data.utente.forEach(elem => {
                    document.getElementById('nomeUtente').value = elem.nome;
                    document.getElementById('cognomeUtente').value = elem.cognome;
                    document.getElementById('sesso').value = elem.sesso;
                    document.getElementById('email').value = elem.email;
                    document.getElementById('dataNascita').value = elem.datanascita; 
                });

                if (data.esperienze.length > 0)
                    createEsperienze(data.esperienze)

            });
        }
    });
    // fetch("html/utente.html" /*, options */)
    // .then((response) => response.text())
    // .then((html) => {
    //     document.getElementById("containerData").innerHTML = html;
    // })
    // .catch((error) => {
    //     console.warn(error);
    // });
}

function createEsperienze(arrayEsperienze){

    arrayEsperienze.forEach(elem => {
        //console.log('ccc: '+ elem.argomenti)
         
        let elements = document.getElementById('divAddExperience');
        elements.innerHTML +=   `<div class="form-group row"> 
                                    <label class="col-3 form-control-label" for="entita">Tipo Instituzione:</label>
                                    <div class="col-3">
                                        <select id="entita" name="entita[]">
                                                <option value="1">Istituto</option>
                                                <option value="2">Università</option>
                                                <option value="3">Ente di formazione</option>
                                        </select>
                                    </div>
                                    <label class="col-2 form-control-label" for="nomeentita">Nome Entità:</label>
                                    <div class="col-4">
                                        <input type="text" 
                                            value="" 
                                            class="form-control allow_edition" 
                                            id="nomeentita" 
                                            name="nomeentita[]" 
                                            placeholder="Inserire Instituzione">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 form-control-label" for="argomenti">Argomenti:</label>
                                    <div class="col-4">
                                        <input type="text" 
                                            autocomplete="off" 
                                            class="form-control allow_edition" 
                                            id="argomenti" 
                                            name="argomenti[]"
                                            value="`+elem.argomenti+`">
                                    </div>
                                    <label class="col-2 form-control-label" for="anno">Anno di frequenza:</label>
                                    <div class="col-4">
                                        <input type="text" 
                                                id="anno" 
                                                name="anno[]" 
                                                class="form-control" 
                                                placeholder="Inserire l'nno di frequenza"
                                                value="`+elem.annofrequenza+`" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 form-control-label" for="votazione">Votazione:</label>
                                    <div class="col-4">
                                        <input type="text" 
                                                id="votazione" 
                                                name="votazione[]" 
                                                class="form-control" 
                                                placeholder="Inserire il voto"
                                                value="`+elem.votazione+`" />
                                    </div>
                                </div>`;
    });
}

async function deleteUtente(id_utente)
{ 
    if(confirm("Are you sure you want to remove this?"))
    {
        const request = new FormData();
        request.append('id', id_utente);

        //chiamata al server per ricuperare la lista degli utenti
        try {
            const response = await fetch('delete.php', {
                method: 'POST',
                body: request
            });

            const data = await response.json(); // parsing dell'oggetto json

            if (!response.ok) {
                const message = `An error has occured: ${response.status}`;
                throw new Error(message)
            }

            if(data.success == "true"){
                alert(data.message)
                $("#user_data").DataTable().ajax.reload(null, false );
            }

            if(data.success == "false"){
                alert(data.message)
            }

        }
        catch(error){
            alert('Erroreee: - ' +  error.message)
        }
    }
}

$('#user_data').DataTable({
    "destroy": true,
    "processing" : true,
    "serverSide" : true,
    "filter": true,
    "order" : [],
    "ajax" : {
        url:"fetch.php",
        type:"POST"
    },
    "pageLength": 10
});