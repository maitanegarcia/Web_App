<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>IoT ActiveLife For You</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />

  
  <!-- Custom styles for this template -->
  <link href="css/style_init.css" rel="stylesheet" />
  
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
 
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
             IoT ActiveLife
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">SALIR</a>
                <a href="Pagina_Principal.php">PAGINA PRINCIPAL</a>
                <a href="temperatura_humedad.php">INFORMACIÓN SOBRE LA TEMPERATURA/HUMEDAD</a>
                <a href="Calidad_aire.php">CALIDAD DEL AIRE</a>
                <a href="feature.html">CALCULADORAS DE SALUD</a>
                <a href="contact.html">RUTAS</a>
                <a href="contact.html">EJERCICIOS Y RUTINAS</a>
                <a href="index.html">CONSEJOS PARA UN ESTILO DE VIDA SALUABLE</a>
                <a href="about.html">RECETAS SALUDABLES Y SOSTENIBLES</a>
                <a href="feature.html">MÁS INFORMACIÓN</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

  <!----------------------------------------------------------------------------------------------------------------------------------------->

  
  <!-- HOME-->
  <section class="slider_section position-relative">
  <div class="container" id="container">
    <div class="row">
      <!-- Parte izquierda: Datos de la persona y filtro de páginas -->
      <div class="col-md-5">
        <div class="detail-box">
          
          <?php
          session_start(); // Iniciar sesión si aún no está iniciada

          // Verificar si el usuario ha iniciado sesión y la sesión tiene la clave 'usuario'
          if (!isset($_SESSION['usuario'])) {
              // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
              header("Location: index.php");
              exit();
          }

          // Obtener el nombre de usuario de la sesión
          $usuario = $_SESSION['usuario'];

          // Conexión a la base de datos
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "basededatos";

          // Crear conexión
          $conn = new mysqli($servername, $username, $password, $database);

          // Comprobar la conexión
          if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
          }

          // Consulta SQL para obtener los datos del usuario
          $sql = "SELECT nombre, primer_apellido, segundo_apellido FROM usuarios WHERE usuario = '$usuario'";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Mostrar los datos del usuario
            $row = $result->fetch_assoc();
            $nombre = $row["nombre"];
            $primer_apellido = $row["primer_apellido"];
            $segundo_apellido = $row["segundo_apellido"];
          } else {
            echo "Usuario no encontrado";
          }

          $conn->close();
          ?>

          <!-- Mostrar los datos del usuario -->
          <div class="persona_bienvenida_persona" id=datos>
            <h2 style="font-size: 30px; font-weight: bold; color: black;">Bienvenido/a</h2>
            <p  style="font-size: 45px; font-weight: bold; color: purple;"> <?php echo $nombre. ' '. $primer_apellido . ' ' . $segundo_apellido; ?></p>
          </div>
        </div>
      </div>
          <!-- Parte derecha: Carrusel de imágenes -->
        <div class="col-md-7">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="img-box">
                <img src="images/img_2.png" alt="" />
              </div>
            </div>
            <div class="carousel-item">
              <div class="img-box">
                <img src="images/img_1.png" alt="" />
              </div>
            </div>
            <div class="carousel-item">
              <div class="img-box">
                <img src="images/img_3.png" alt="" />
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!----------------------------------------------------------------------------------------------------------------------------------------->
  <!--INFORMACION SOBRE LA TEMPERATURA Y HUMEDAD -->
  <!--
    CONECTAR CON LA RASPBERRY PI
    -HUMEDAD
    -TEMPERATURA
    CONECTAR CON EL ATMOTUBE-PRO
    GRAFICAS
    TDOD EL TIEMPO REAL
--->
<!--------------------------------------------------------------------------------------------->
  <section class="feature_section layout_padding2 layout_margin">
    <div class="container">
      <div class="heading_container">
        <h2>
         TEMPERATURA Y HUMEDAD <br />
        </h2>
      </div>
    </div>
    <div class=datos_humedad/temepratura>
      <div id="weather-info">
        <h2>Información Meteorológica</h2>
        <p><strong>Temperatura:</strong> <span id="temperature"></span> &deg;C</p>
        <p><strong>Humedad:</strong> <span id="humidity"></span>%</p>
        <p><strong>Posibilidad de Lluvia:</strong> <span id="chance-of-rain"></span>%</p>
        <p><strong>Salida del Sol:</strong> <span id="sunrise"></span></p>
        <p><strong>Puesta del Sol:</strong> <span id="sunset"></span></p>
      </div>
      <script type="text/javascript" src="js/script.js"></script>
    </div>

    <div class="d-flex justify-content-center">
      <a href="https://www.eltiempo.es/">
        METEOROLOGÍA & SOSTENIBILIDAD
      </a>
    </div>
  </section>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
  <!-- end iNFORMACION Y HUMEDAD -->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>


<!----------------------------------------------------------------------------------------------------------------------------------------->
  <!--INFORMACION CALIDAD DEL AIRE -->
    <!--
    CONECTAR CON LA RASPBERRY PI
    -CALIDAD
    CONECTAR CON EL ATMOTUBE-PRO
    GRAFICAS
    TODO EN TIEMPO REAL-->


    <!--pasos a seguir
    Conexión con la Raspberry Pi para obtener datos sobre la calidad del aire:

      Debes configurar tu Raspberry Pi para que recolecte y proporcione datos sobre la calidad del aire. Esto podría implicar el uso de sensores de calidad del aire y un software para recopilar y procesar los datos.
    Una vez que tengas los datos disponibles en la Raspberry Pi, puedes crear una API en la Raspberry Pi que exponga estos datos de alguna manera. 
    Esto podría ser a través de una API web o de otro protocolo de comunicación.
     tu página web, puedes hacer solicitudes a esta API de la Raspberry Pi para obtener los datos en tiempo real y mostrarlos en tu página web.
    Conexión con Atmotube PRO para mostrar gráficas en tiempo real:

    Debes configurar tu Atmotube PRO para que proporcione datos en tiempo real a través de su API.
        Puedes usar JavaScript para hacer solicitudes a la API de Atmotube PRO y obtener los datos necesarios para tus gráficas.
       una biblioteca de gráficos como Chart.js, D3.js, o cualquier otra, para crear las gráficas y mostrar los datos en tiempo real en tu página web.
        -->
<!--AÑADIR EL MAPA
  

Inicia sesión en ThingsBoard: Accede a tu panel de ThingsBoard utilizando tus credenciales.

Navega a la pestaña de Dashboards: Una vez que hayas iniciado sesión, ve a la pestaña de Dashboards en el menú de navegación.

Crea o selecciona un Dashboard: Puedes crear un nuevo dashboard o seleccionar uno existente en el que desees agregar el mapa.

Añade un nuevo widget de mapa: Haz clic en el botón de "Add new widget" o "Añadir nuevo widget" (dependiendo de la interfaz de usuario de tu versión de ThingsBoard). Selecciona el tipo de widget de mapa. ThingsBoard ofrece varios tipos de widgets de mapa, como Mapa, Mapa de calor, Marcadores, etc. Selecciona el que mejor se adapte a tus necesidades.

Configura el widget de mapa: Una vez agregado el widget de mapa, configúralo según tus preferencias. Puedes personalizar el centro del mapa, el nivel de zoom, los marcadores, el estilo del mapa, etc.

Conecta los datos del mapa: En la configuración del widget de mapa, puedes seleccionar los datos que deseas mostrar en el mapa. Dependiendo de cómo hayas configurado tus dispositivos en ThingsBoard y qué datos estén disponibles, podrás mostrar datos como la ubicación de los dispositivos en el mapa, el estado de los sensores, etc.

Guarda el dashboard: Una vez que hayas configurado el widget de mapa según tus preferencias, guarda los cambios en el dashboard.

Visualiza el dashboard: Ahora puedes visualizar el dashboard para ver el mapa que has añadido con los datos correspondientes.

Siguiendo estos pasos, podrás agregar un mapa a través de ThingsBoard y visualizar los datos que desees en él. Recuerda que la disponibilidad y funcionalidad exacta de los widgets pueden variar dependiendo de la versión específica de ThingsBoard que estés utilizando.-->
<!--------------------------------------------------------------------------------------------->
<section class="feature_section layout_padding2 layout_margin">
    <div class="container">
      <div class="heading_container">
        <h2>
         MAPA DE CALIDAD DEL AIRE <br />
        </h2>
      </div>
    </div>
    <div class=calidad_aire>
        <h2>Información Calidad del aire</h2>
        <p><strong>Calidad del aire:</strong> <span id="airquality"></span> PM</p>
    </div>
    <script>
        // URL de la API de ThingsBoard para obtener los datos de tu dispositivo Atmotube
        var apiUrl = 'TU_URL_DE_LA_API_DE_THINGSBOARD';

        // Función para obtener y mostrar los datos de calidad del aire
        function getAirQualityData() {
            // Realizar solicitud GET a la API de ThingsBoard
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Extraer los datos relevantes
                    var airquality = data.airQuality;
                    // Mostrar los datos en la página
                    document.getElementById("airquality").innerText = temperature;
                    
                })
                .catch(error => console.error('Error al obtener los datos de calidad del aire:', error));
        }

        // Llamar a la función para obtener los datos cuando se cargue la página
        window.onload = function() {
            getAirQualityData();
        };
    </script>
    <div class="d-flex justify-content-center">
      <a href="https://www.euskadi.eus/web01-a2ingai2/es/aa17aCalidadAireWar/estacion/mapa?locale=es">
        CALIDAD DEL AIRE EN EUSKADI
      </a>
    </div>
  </section>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
  <!-- end CALIDAD DEL AIRE -->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>


  <!-- download section -->

  <section class="download_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Download Anytime, Anywhere
        </h2>
      </div>
      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-md-4">
            <div class="box">
              <div class="head-box">
                <div class="img-box">
                  <img src="images/cloud-download.png" alt="" />
                </div>
                <h6>
                  Download The App
                </h6>
              </div>
              <div class="detail-box">
                <p>
                  Enhance your sports experience in Bilbao with Bilbao SportAir!
                  Download our mobile app now and sign up to receive real-time notifications about environmental conditions along the riverbank. 
                  Prioritize your safety and well-being! 🏃‍♀️🚴‍♂️ #BilbaoSportAir #SafeSport
                </p>
              </div>
            </div>
            <div class="box">
              <div class="head-box">
                <div class="img-box">
                  <img src="images/playstore.png" alt="" />
                </div>
                <h6>
                  Integration with Wearable Devices
                </h6>
              </div>
              <div class="detail-box">
                <p>
                  Seamless integration with wearable devices! Bilbao SportAir connects with fitness trackers and smartwatches, 
                  offering users direct access to environmental data. Stay updated effortlessly during your activities.
                   🌐🏃‍♂️ #WearableIntegration
                </p>
              </div>
            </div>
            <div>
              <a href="" class="btn-1">
                Read More
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="main-img-box">
              <img src="images/img2.png" alt="" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="head-box">
                <div class="img-box">
                  <img src="images/heart.png" alt="" />
                </div>
                <h6>
                  Community health
                </h6>
              </div>
              <div class="detail-box">
                <p>
                  Prioritize community health with Bilbao SportAir! Stay informed about environmental conditions along the riverbank.
                   Join us in fostering a healthier community! 🌍🏞️ #BilbaoSportAir #CommunityHealth
                </p>
              </div>
            </div>
            <div class="box">
              <div class="head-box">
                <div class="img-box">
                  <img src="images/trophy_.png" alt="" />
                </div>
                <h6>
                  Emergency Response Preparedness
                </h6>
              </div>
              <div class="detail-box">
                <p>
                  Enhance safety with Bilbao SportAir! In emergencies like extreme weather or environmental hazards, receive timely alerts for quick action. Proactive measures ensure the safety of athletes and the community. 🚨🆘 #BilbaoSportAir #EmergencySafety
                </p>
              </div>
            </div>
            <div>
              <a href="" class="btn-2">
                Download Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end download section -->

<!-- SECCIÓN ABOUT AS-->
<section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container d-flex justify-content-lg-start">
        <h2>
          About Us
        </h2>
      </div>
      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box b-1">
              <p>
              Este proyecto se centra en el diseño e implementación de una Aplicación Web que permite a los usuarios registrar y
               visualizar en tiempo real datos sobre la calidad del aire, temperatura, 
              presión atmosférica y humedad a través de un dispositivo IoT situado en una ubicación específica.
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
          <div class="col-md-5">
            <div class="detail-box b-2">
              <p>
              dirigido a una amplia gama de audiencias, incluyendo deportistas, residentes locales, investigadores ambientales y cualquier persona preocupada por su salud y el medio ambiente. Proporciona datos valiosos y 
              herramientas para tomar decisiones informadas y promover estilos de vida saludables y sostenibles.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- subscribe section -->
  <section class="subscribe_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Subscribe For Updates
        </h2>
      </div>
      <form action="" class="layout_padding2-top">
        <input type="email" placeholder="Enter your email" />
        <button>
          subscribe
        </button>
      </form>
    </div>
  </section>

  <!-- end subscribe section -->

  <!-- client section -->
  <section class="client_section layout_margin">
    <div class="container">
      <div class="heading_container">
        <h2>
          Check what people say About us!
        </h2>
      </div>
      <div class="client_container layout_padding2-top">
        <div class="client-id">
          <div class="img-box">
            <img src="images/client.png" alt="" />
          </div>
          <div class="name">
            <img src="images/quote.png" alt="" />
            <h6>
              Sandy Delex
            </h6>
            <p>
              Runner
            </p>
          </div>
        </div>
        <div class="client-detail">
          <p>
            Bilbao SportAir has taken my outdoor fitness experience to a whole new level. The app, with its real-time data on air quality and environmental conditions, 
            has enabled me to make safer decisions during my outdoor workouts. Its user-friendly approach and commitment to the community make it my essential 
            companion for an active and healthy lifestyle. If you're looking for an app that makes a difference, 
            Bilbao SportAir is the perfect choice! 🏃‍♀️🌿 #BilbaoSportAir #ActiveLiving
          </p>
        </div>
        <div class="d-flex justify-content-end">
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->



  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="d-flex ">
        <h2>
          Contact Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">

          <form action="">
            <div class="contact_form-container">
              <div>
                <div>
                  <input type="text" placeholder="Name">
                </div>
                <div>
                  <input type="text" placeholder="Phone Number">
                </div>
                <div>
                  <input type="email" placeholder="Email">
                </div>
                <div class="mt-5">
                  <input type="text" placeholder="Message">
                </div>
                <div class="mt-5">
                  <button type="submit">
                    send
                  </button>
                </div>
              </div>

            </div>

          </form>
        </div>
        <div class="col-md-6">
          <div class="contact_img-box">
            <img src="images/img3.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section layout_padding-top">
    <div class="info_logo-box">
      <h2>
        Bilbao SportAir
      </h2>
    </div>
    <div class="container layout_padding2">
      <div class="row">
        <div class="col-md-3">
          <h5>
            About Us
          </h5>
          <p>
            Bilbao SportAir: Your safety, our priority. Real-time insights for a healthier community. 
        </div>
        <div class="col-md-3">
          <h5>
            Useful Link
          </h5>
          <ul>
            <li>
              <a href="https://www.apple.com/app-store/ ">
                App Store
              </a>
            </li>
            <li>
              <a href="https://play.google.com/store/games?hl=en&gl=US ">
                Play Store
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            Contact Us
          </h5>
          <p>
            Connect with IoT Active! Have questions or feedback? Reach out to us at maitane.garcia02@opendeusto.es. Your input matters!
          </p>
        </div>
        <div class="col-md-3">

          <div class="subscribe_container">
            <h5>
              Newsletter
            </h5>
            <div class="form_container">
              <form action="">
                <input type="email" placeholder="Enter your email">
                <button type="submit">
                  Subscribe
                </button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="social_container">

        <div class="social-box">
          <a href="">
            <img src="images/fb.png" alt="">
          </a>

          <a href="">
            <img src="images/twitter.png" alt="">
          </a>
          <a href="">
            <img src="images/linkedin.png" alt="">
          </a>
          <a href="">
            <img src="images/instagram.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->
  <!-- footer section -->
  <section class="container-fluid footer_section">
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!--LOGIN AND RESGITRO JS-->
  <script type="text/javascript" src="js/script.js"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }
  </script>

  <!-- Incluyendo el script JavaScript para cargar y mostrar los datos del CSV -->
  <script>
    window.onload = function() {
      fetch('bilbao_data2.csv')
        .then(response => response.text())
        .then(data => {
            let rows = data.split('\n');
            rows.forEach((row, index) => {
                let cols = row.match(/(".*?"|[^",\s]+)(?=\s*,|\s*$)/g);
                if (cols && cols.length > 0) {
                    let html = '<tr>';
                    cols.forEach((col, colIndex) => {
                        // Eliminar comillas dobles y reemplazar comas europeas por puntos en números
                        let cleanedCol = col.replace(/"/g, '').replace(/,/g, colIndex > 2 ? '.' : '');
                        if (index === 0) {
                            // Agregar encabezados en 'th' en lugar de 'td'
                            html += `<th>${cleanedCol}</th>`;
                        } else {
                            html += `<td>${cleanedCol}</td>`;
                        }
                    });
                    html += '</tr>';
                    if (index === 0) {
                        document.querySelector('#csvTable thead').innerHTML += html;
                    } else {
                        document.querySelector('#csvTable tbody').innerHTML += html;
                    }
                }
            });
        });
    };   
  </script>

</body>

</html>