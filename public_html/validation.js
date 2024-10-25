/*function validate(form){
    var ok=1
    var msg=""
    for(var i =0; i< form.length; i++){
        if (form.elements[i].value.trim() == ""){
            msg += "" +form.elements[i].name + " is void."
            ok=0
        }
        
    }

    if (!validateCharacters(form)){
        ok = false;

    }
    
    if (ok == 0){
        alert(msg)
        return false
    }
    else{
        return true
    }
}
*/

function validate(form){
    var letters = /[A-Z][a-z\s]*$/;
    if (form.title.value == "" ){
        alert("Please enter a name");
        return false;
     }

     if(form.title.value.match(letters))
     {
      return true;
     }
   else
     {
        alert("Please only enter alphabetical characters");
     return false;
     }
     
    }