
//función para dar interactividad al boton para desplegar el menú
async function PlegarDesplegarMenu() {
    var menu = document.getElementById("Category-Menu");

    // Si el menú está cerrado, ábrelo; si está abierto, ciérralo
    if (menu.style.left === "-250px") {
        menu.style.left = "0";
    } else {
        
        //este if es porque de principio no agarra bien la propiedad lef
        if(menu.style.left === "")
        {
            menu.style.left = "0";
        }
        else
        {
            menu.style.left = "-250px";
        }
    }
}

//funcion para obtener la pagina de login i colocarla en el layout
async function ShowLogin()
{
    //habra que poner la URL correcta de acuerdo con MVC

    fetch("./Login.html")
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        return response.text();;
    })
    .then(data => {
        //modificamos el contenido 
        document.getElementById('Body').innerHTML = data;
    })
}

//función para obtener la pagina de registro i colocarla en el layout
function ShowRegister()
{
    //habra que poner la URL correcta de acuerdo con MVC
    fetch("./Register.html")
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        return response.text();;
    })
    .then(data => {
        //modificamos el contenido 
        document.getElementById('Body').innerHTML = data;
    })
}

//funcion para hacer todas las peticiones 
//si no hace falta passar ID se passa directamente -1 en el campo ID
function run_and_substitute_html(action,ID,ID_label_html)
{
    fetch("index.php?Accio="+action+"&ID="+ID)
    .then(response => {
        
        if (!response.ok) {
          throw new Error('Hubo un problema con la solicitud. Código de estado HTTP: ' + response.status);
        }
        return response.text();
    })
    .then(data => {

        //en este caso
        var element = document.getElementById(ID_label_html);
        element.innerHTML = data;
        console.log(data);
    })

    var menu = document.getElementById("Category-Menu");
    menu.style.left = "-250px";
}


$(document).ready(function() {
    
    // Manejo de eventos delegado para #btn_User_menu_back y #btn_User_menu
    $("#Login_Register0").on("click", "#btn_User_menu_back", function() {
        var nuevoContenido = "<button id=\"btn_User_menu\">Mi Menu</button>";
        $("#Login_Register0").html(nuevoContenido);
    });

    $("#Login_Register0").on("click", "#btn_User_menu", function() {
        $.ajax({
            url: "index.php?Accio=User_Menu", 
            method: "GET",          
            success: function(response) {
                $("#Login_Register0").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error:", textStatus, errorThrown);
            }
        });
    });
});


//$(document).ready(function() {
//    $("#btn_User_menu_back").on("click", function() {
//        var nuevoContenido = "<button id=\"btn_User_menu\">Mi Menu</button>";
//        $("#Login_Register0").html(nuevoContenido);
//    });
//});
//
//$(document).ready(function() {
//
//    $("#btn_User_menu").on("click", function() {
//        $.ajax({
//            url: "index.php?Accio=User_Menu", 
//            method: "GET",          
//            success: function(response) {
//                $("#Login_Register0").html(response);  // Actualizar el contenido de la etiqueta con id "body"
//            },
//            error: function(jqXHR, textStatus, errorThrown) {
//                console.error("Error:", textStatus, errorThrown);
//            }
//        });
//    });
//});


//función para vaciar carrito
function Vaciar_carrito()
{
    try
    {
        //eliminamos todos los elementos de contenedor-grid
        var carrito = document.getElementById("elementos_carrito");
        //vaciamos 
        carrito.innerHTML = "";
    }
    catch
    {}

    run_and_substitute_html("vaciar_carrito","-1","Carrito");
}

//fucnión para confirmar compra
async function Confirmar_compra()
{
    await run_and_substitute_html("confirmar_compra","-1","Body");

    await run_and_substitute_html("vaciar_carrito","-1","Carrito");

    // a implementar
}
