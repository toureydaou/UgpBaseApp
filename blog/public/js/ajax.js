var comboBoxDistrcits = document.getElementById('districts');

function retriveDistrict(elt) {
  var id = elt.value;
  httpRequest = new XMLHttpRequest();

  if (!httpRequest) {
    alert('Erreur dans le chargement des districts associés');
    return false;
  }

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState === 4) {
      var results = JSON.parse(httpRequest.responseText);
      
      

      var child = comboBoxDistrcits.lastElementChild;

      while (child) {
        comboBoxDistrcits.removeChild(child)
        child = comboBoxDistrcits.lastElementChild
      }
      
      

        for (let i = 0; i < results["results"].length; i++) {
          var option = document.createElement('option')
          option.value = results["results"][i].id
          option.innerHTML = results["results"][i].nom
          comboBoxDistrcits.appendChild(option)  
        }
        
        
      
    }
  }

  httpRequest.open('GET', 'retriveDistrict/' + id, true);
  httpRequest.send(id);
}






