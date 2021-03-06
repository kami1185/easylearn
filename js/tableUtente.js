


async function viewUtente(id){

    try {
        const response = await fetch('fetchUtente.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
              },
            body: JSON.stringify({'data':id})
        });

        const data = await response.json(); // parsing dell'oggetto json

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            throw new Error(message)
        }

        $("#containerData").load("html/scheda.html", function( response, status, xhr ) {
            
            if ( status === "error" ) {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }

            data.utente.forEach(elem => {
                let element = document.getElementById('formUtente');
                element.innerHTML +=   `<div class="form-group row"> 
                                                <input type="text"
                                                    class="form-control hide-content" 
                                                    id="idutente" 
                                                    name="idutente"
                                                    value="`+elem.id+`">
                                        </div>`;
                
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
    catch(error){
        alert('Erroreee: - ' +  error.message)
    }

}

function createEsperienze(arrayEsperienze){

    const container = document.querySelector('#divAddExperience');
    removeAllChildNodes(container);

    arrayEsperienze.forEach(elem => {
         
        let elements = document.getElementById('divAddExperience');
        //elements.innerHTML="";
        elements.innerHTML +=   `<div class="form-group row"> 
                                    <label class="col-3 form-control-label" for="entita">Tipo Instituzione:</label>
                                    <div class="col-3">
                                        <select id="entita" name="entita[]">
                                                <option value="1">Istituto</option>
                                                <option value="2">Universit??</option>
                                                <option value="3">Ente di formazione</option>
                                        </select>
                                    </div>
                                    <label class="col-2 form-control-label" for="nomeentita">Nome Entit??:</label>
                                    <div class="col-4">
                                        <input type="text" 
                                            value="`+elem.nomeentita+`" 
                                            class="form-control allow_edition" 
                                            id="nomeentita" 
                                            name="nomeentita[]" 
                                            placeholder="Inserire nome Instituzione">
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
                                            placeholder="Inserire argomento"
                                            value="`+elem.argomenti+`">
                                    </div>
                                    <label class="col-2 form-control-label" for="anno">Anno di frequenza:</label>
                                    <div class="col-4">
                                        <input type="text" 
                                                id="anno" 
                                                name="anno[]" 
                                                class="form-control" 
                                                placeholder="Inserire l'anno di frequenza"
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
                                </div>

                                <div class="form-group row">
                                    <input type="text" 
                                            id="idesperienza" 
                                            name="idesperienza" 
                                            class="hide-content" 
                                            value="`+elem.id+`" />
                                </div>`;
    });
}

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
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