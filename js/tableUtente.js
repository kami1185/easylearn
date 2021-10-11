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

function viewUtente(id){
$("#containerData").load("html/scheda.html", function( response, status, xhr ) {
    if ( status === "error" ) {
        var msg = "Sorry but there was an error: ";
        alert(msg + xhr.status + " " + xhr.statusText);
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