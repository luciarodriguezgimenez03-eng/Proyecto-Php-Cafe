function validar() {
    let nom  = document.getElementById("nombre").value;
    let contra  = document.getElementById("contraseña").value;
    var formvalido = true;
 
    if (nom == "") {
                
        document.getElementById("Errornombre").innerHTML = "Error completalo";
        document.getElementById("Errornombre").style.color = "red";
       // document.getElementById("Errornombre").style.border = "1px solid";
        
        formvalido = false;
    } else {
        document.getElementById("Errornombre").innerHTML = "";
        
    }




    if (contra == "") {
        document.getElementById("Errorcon").innerHTML = "Error completalo";
        document.getElementById("Errorcon").style.color = "red";
        document.getElementById("Errorcon").style.border = "1px solid";
        formvalido = false;
    } else {
        document.getElementById("Errorcon").innerHTML = "";
       

    }
    return formvalido;


}