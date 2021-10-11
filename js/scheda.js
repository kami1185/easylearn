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
                    $('#user_data').DataTable().destroy();
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

    $('#anno').datetimepicker({
        format: "YYYY-MM-DD"
    });

    $('#dataNascita').datetimepicker({
        format: "YYYY-MM-DD"
    });

    document.getElementById('addExperience').addEventListener('click', function () {

        var i = 0;
        let original = document.getElementById('htmlExperience' + i);
        let clone = original.cloneNode(true); // "deep" clone
        clone.querySelector('.entita').value = '';
        clone.querySelector('.argomenti').value = '';
        clone.querySelector('.anno').value = '';
        clone.querySelector('.votazione').value = '';
        //function duplicate() {
            clone.id = "htmlExperience" + ++i; 
            //original.appendChild(clone);
            document.getElementById("divAddExperience").appendChild(clone);
        //}

        // var itm = document.getElementById("htmlExperience");
        // var cln = itm.cloneNode(true);
        // document.getElementById("divAddExperience").appendChild(cln);

        // let elements = document.getElementById('divAddExperience');
        // elements.innerHTML +=   `<div class="form-group row"> 
        //                             <label class="col-3 form-control-label" for="entita">Tipo Instituzione:</label>
        //                             <div class="col-3">
        //                                 <select id="entita" name="entita[]">
        //                                         <option value="1">Istituto</option>
        //                                         <option value="2">Università</option>
        //                                         <option value="3">Ente di formazione</option>
        //                                 </select>
        //                             </div>
        //                             <label class="col-2 form-control-label" for="nomeentita">Nome Entità:</label>
        //                             <div class="col-4">
        //                                 <input type="text" 
        //                                     value="" 
        //                                     class="form-control allow_edition" 
        //                                     id="nomeentita" 
        //                                     name="nomeentita[]" 
        //                                     placeholder="Inserire la residenza">
        //                             </div>
        //                         </div>

        //                         <div class="form-group row">
        //                             <label class="col-2 form-control-label" for="argomenti">Argomenti:</label>
        //                             <div class="col-4">
        //                                 <input type="text" 
        //                                     autocomplete="off" 
        //                                     class="form-control allow_edition" 
        //                                     id="argomenti" 
        //                                     name="argomenti[]">
        //                             </div>
        //                             <label class="col-2 form-control-label" for="anno">Anno di frequenza:</label>
        //                             <div class="col-4">
        //                                 <input type="text" id="anno" name="anno[]" class="form-control" placeholder="Inserire data del tampone"/>
        //                             </div>
        //                         </div>

        //                         <div class="form-group row">
        //                             <label class="col-2 form-control-label" for="votazione">Votazione:</label>
        //                             <div class="col-4">
        //                                 <input type="text" id="votazione" name="votazione[]" class="form-control" placeholder="Inserire data del tampone"/>
        //                             </div>
        //                         </div>`;
    });

    document.getElementById('formUtente').addEventListener('submit', function (e) {
    // $('#saveData').click(function() {

        e.preventDefault();

        // let form = document.getElementById("formUtente");

        // var form_data = new FormData(e.target);
        

        // console.log(JSON.stringify(Object.fromEntries(form_data)))
        
        // var data1 = JSON.stringify($('#formUtente').serializeJSON());
        // console.log("jquery: ",data1)

        // fetch('register-data.php', {
		// method: 'POST',
        // body: JSON.stringify({data: [$('#formUtente').serializeJSON()]}),
        // //body: JSON.stringify(serializeForm(e.target)),
		// //body: JSON.stringify({data: [Object.fromEntries(form_data)]}),
		// headers: {
		// 	'Content-type': 'application/json; charset=UTF-8'
		// }
        // }).then(function (response) {
        //     if (response.ok) {
        //         return response.json();
        //     }
        //     return Promise.reject(response);
        // }).then(function (data) {
        //     console.log(data);
        // }).catch(function (error) {
        //     console.warn(error);
        // });

        var data = JSON.stringify($('#formUtente').serializeJSON());

        $.ajax({
            url: 'register-data.php',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            data: {
                    data: data
            },
            success: function (data) {

                alert('glad');
            }
        });
    });

    function serializeForm() {
        var obj = {};
        var formData = new FormData(document.getElementById("formUtente"));
        for (var key of formData.keys()) {
            obj[key] = formData.get(key);
        }
        return obj;
    };
    
