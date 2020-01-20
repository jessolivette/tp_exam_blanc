// console.log('js path ok'); // test for script path in the footer

// XMLHttpRequest instanciation for all browsers
function createInstance()
{
  var req = null;
  if(window.XMLHttpRequest) {
    req = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) {
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
       try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            alert("XHR not created");
          }
      }
    }
    return req;
}

// event function
function validateClient(index) {
     req = createInstance(); // XMLHttpRequest instanciation
     var clientId = document.getElementsByClassName("clientId");
     // console.log(clientId[index].value); // get the client id of the clicked button.
     var cId = "client_id=" + clientId[index];
     req.onreadystatechange = function () {
        if(req.readyState == 4) {
            if(req.status == 200) {
                storing(req.responseText); // définir cette fonction au dessu pour gérer l'affichage de la réponse du serveur => la div client mais dans la partie clients inscrits.
            }
            else {
                alert("Error: returned status code " + req.status + " " + req.statusText);
            }
        }
     };
     req.open("POST", "url_du_script_PHP_visé", true);
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     req.send(cId);
}
