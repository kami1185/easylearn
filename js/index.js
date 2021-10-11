
document.addEventListener("DOMContentLoaded", function() {

    // fetchCheklistJSON();

    // async function fetchCheklistJSON() {

    //     try {
    //         const response = await fetch(''+url+'/check/create', {
    //             method: 'GET', // *GET, POST, PUT, DELETE, etc.
    //             headers: {
    //             'Content-Type': 'application/json'
    //             // 'Content-Type': 'application/x-www-form-urlencoded',
    //             }
    //         });
    //         const data = await response.json(); // parsing dell'oggetto json

    //         if (!response.ok) {
    //             const message = `An error has occured: ${response.status}`;
    //             throw new Error(message)
    //         }

    //         if(data.successful == "false"){
    //             alert(data.messagge + data.error)
    //         }
    //         else{
    //             datajson = data;
    //             //insertDataChecklist(data)
    //         }
    //     }
    //     catch(error){
    //         alert('Errore: - ' +  error.message)
    //     }
    //     //return data;
    // }

    document.getElementById('scheda').addEventListener('click', function () {

        $("#containerData").load("html/scheda.html", function( response, status, xhr ) {
            if ( status === "error" ) {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }
            else
                showData();
        });

        // fetch("html/utente.html" /*, options */)
        // .then((response) => response.text())
        // .then((html) => {
        //     document.getElementById("containerData").innerHTML = html;
        // })
        // .catch((error) => {
        //     console.warn(error);
        // });
    });

    document.getElementById('utente').addEventListener('click', function () {

        $("#containerData").load("html/utente.html", function( response, status, xhr ) {
            if ( status === "error" ) {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }
            else
                showData();
        });

    });

    function showData(){
        let el_title = document.getElementById('page-title');
                el_title.classList.add('show-content');
                el_title.classList.remove('hide-content');
                let el_slide = document.getElementById('background');
                el_slide.classList.add('hide-content');
                //el_slide.classList.remove('show-content');
                let el_table = document.getElementById('containerData');
                el_table.classList.add('show-content');
                el_table.classList.remove('hide-content');
    }
    
});

window.addEventListener('scroll', function() {

    let height=  document.querySelector('.top-header').clientHeight;
    var rect = document.querySelector('.header').getBoundingClientRect();
    let top = rect.top + window.scrollY; 

    if (top > 10) {
        document.querySelector('.top-header').classList.add('hide');
        document.querySelector('.navigation').classList.add('nav-bg');
        $('.navigation').css('margin-top', '-' + height + 'px');
    } else {
        document.querySelector('.top-header').classList.remove('hide');
        document.querySelector('.navigation').classList.remove('nav-bg');
        document.querySelector('.navigation').setAttribute("style", 'margin-top: -' + 0 + 'px');
    }
});