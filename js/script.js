 document.getElementById('btn_registrarse').addEventListener('click', registrar);
document.getElementById('btn_login').addEventListener('click',iniciarSesion);
 /* DECLARAMOS LAS VARIABLES
 */
var formulario_login = document.querySelector('.formulario__login');
var formulario_registro = document.querySelector('.formulario__registro');
var contenedor__login_registro = document.querySelector('.contenedor__login-resgistrar');
var c_login = document.querySelector('.caja__login');
var c_registro = document.querySelector('.caja_registro');
var fotos = document.querySelector('.col-md-5');

//Función
const container = document.document.getElementById('btn_registrarse');
const btnLogin = document.getElementById('btn_login');
const btnRegistrar = document.getElementById('btn_registrarse');
/**
 * -INICIAR SESIÓN, APAREZCA EL FORMULARIO LOGIN E INICIAR
 */
function iniciarSesion() {
    if (window.innerWidth > 850) {
        formulario_registro.style.display = "none";
        contenedor__login_registro.style.right = "-200px";
        formulario_login.style.display = "block";
        contenedor__login_registro.style.display = "block";
        contenedor__login_registro.style.opacity = "1";
        fotos.style.display = "none";
        c_registro.style.opacity = "1";
        c_login.style.opacity = "1";
    }else{
        formulario_registro.style.display = "block";
        contenedor__login_registro.style.right = "0px";
        formulario_login.style.display = "none";
        c_registro.style.opacity = "1";
        c_registro.style.left="100px";
        c_login.style.opacity = "1";
        fotos.style.display = "none";
        contenedor__login_registro.style.display = "block";
        contenedor__login_registro.style.right = "8px"; // Ajusta el margen derecho
        contenedor__login_registro.style.top = "50%"; // Ajusta la posición vertical
        contenedor__login_registro.style.transform = "translateY(-50%)";
    }
}

/**
 *  EN REGISTRAR, APAREZCA EL FORMULARIO REGISTRAR Y QUE NO SALGA EL DE LOGIN
 */
function registrar() {
    formulario_registro.style.display = "block";
    contenedor__login_registro.style.right = "-180px";
    contenedor__login_registro.style.margin=" -0%";
    formulario_login.style.display = "none";
    contenedor__login_registro.style.opacity = "1";
    fotos.style.display = "none";
    c_registro.style.opacity = "1"; // Elimina ".style.style"
    c_login.style.opacity = "1"; // Elimina ".style.style"
    
}

registrar.addEventListener('click',()=>{
/**
 * link.Mysql con JavaScript - Tutorial
 * Registrar
 * - una vez registrado--> ir la pagina principal
 */


})

btnLogin.addEventListener('click',() =>{
/**
 * MIrar en la base de datos si esta el usuario
 * -si esta --> ir la pagina principal
 * -si no esta -->error y luego regitrar
 * -si esta mal --> avisar
 */
})

/**COGER LOS DATOS EN TIEMPO REAL DESDE UN THINGBOARD/ATMOTUBE-PRO */
// Función para obtener y mostrar la información de Atmotube PRO en tiempo real
function getAtmotubeInfo() {
    // Realizamos una solicitud HTTP GET a la API de Atmotube
    fetch('https://api.atmotube.com/v2/devices/YOUR_DEVICE_ID/current')
        .then(response => response.json())
        .then(data => {
            // Extraemos los datos relevantes de la respuesta JSON
            var temperature = data.sensors.temperature;
            var humidity = data.sensors.humidity;
            var co2 = data.sensors.co2;
            var voc = data.sensors.voc;

            // Actualizamos los elementos HTML con los valores obtenidos
            document.getElementById("temperature").innerText = temperature;
            document.getElementById("humidity").innerText = humidity;
            document.getElementById("co2").innerText = co2;
            document.getElementById("voc").innerText = voc;
        })
        .catch(error => console.error('Error al obtener la información de Atmotube:', error));
}

// Llamamos a la función para obtener la información de Atmotube al cargar la página
window.onload = function() {
    getAtmotubeInfo();
    // Actualizamos la información cada 5 minutos (300,000 milisegundos)
    setInterval(getAtmotubeInfo, 300000); // 300,000 milisegundos = 5 minutos
};