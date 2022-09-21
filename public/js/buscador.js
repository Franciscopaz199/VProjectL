// Obtener Datos en formato JSOn
/*
var input = document.getElementById("search"),
    intervalo;

document.getElementById("search").addEventListener("keyup", function(){
    clearInterval(intervalo);
    intervalo = setInterval(function(){
        alert ("Has dejado de escribir");
        clearInterval(intervalo);
    }, 1000);
}, false);

document.getElementById('search').addEventListener("keyup", function()
{   
      
    intervalo = setInterval(function(){ //Y vuelve a iniciar
        alert ("Has dejado de escribir"); //Cumplido el tiempo, se muestra el mensaje
        clearInterval(intervalo); //Limpio el intervalo
    }, 1500);
    clearInterval(intervalo); //Al escribir, limpio el intervalo  
}, false);

*/


document.getElementById('search').addEventListener("keyup",()=>{
   if(document.getElementById('search').value.length > 5){
    $.ajax({
        url:`${variable}`,
        dataType: 'json',
        data:{
            term: document.getElementById('search').value
        },
        // The server respuesta
        success: (respuesta) => {mostrarDatos(respuesta)}
    });
   }else{
    resultados = document.querySelector('.resultados').innerHTML = " ";
   }

});

function mostrarDatos(respuesta){
    var resultados = document.querySelector('.resultados');
    let fragmento =  document.createDocumentFragment();
    for(resultado of respuesta){
        let input = document.createElement("INPUT");
        input.type = "radio";
        input.id = resultado.id;
        input.value = resultado.id;
        input.name = "opcion";
        input.setAttribute("class","inputs");
        input.setAttribute("onChange","this.form.submit()");
        let divC = document.createElement("LABEL");
        divC.setAttribute("class","resultado-busqueda");
        divC.setAttribute("for",`${resultado.id}`);
        let lefts = document.createElement("DIV");
        lefts.setAttribute("class","left-section");
        let rigth = document.createElement("DIV");
        rigth.setAttribute("class","rigth-section");
        lefts.innerHTML = `<p><b>Tipo</b><br>${resultado.tipo}</p>`;
        rigth.innerHTML = `<p><b>Encunciado</b><br>${resultado.enunciado}</p>`;
        divC.appendChild(lefts);
        divC.appendChild(rigth);
        console.log(resultado.enunciado);
        fragmento.appendChild(input);
        fragmento.appendChild(divC);
    }
    resultados.innerHTML = " "; 
    resultados.appendChild(fragmento);
}