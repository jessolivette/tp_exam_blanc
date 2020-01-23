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

/* function called to set the display on the banker space :
   pick the client clicked, erase he's card from the first div
   puts it in the second div (validated clients) */
function storing(data) {
    console.log(data);
}

// event function
function validateClient(index) {
     req = createInstance(); // XMLHttpRequest instanciation
     var clientId = document.getElementsByClassName("clientId");
     //console.log(clientId[index].value); // get the client id of the clicked button.
     var cId = "client_id=" + clientId[index].value;
     req.onreadystatechange = function () {
        if(req.readyState == 4) {
            if(req.status == 200) {
                storing(req.responseText); // appel fonct° d'affichage de la réponse du serveur
            }
            else {
                alert("Error: returned status code " + req.status + " " + req.statusText);
            }
        }
     };
     req.open("POST", "/CI_picsou/account_creation", true);
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     req.send(cId);
}
