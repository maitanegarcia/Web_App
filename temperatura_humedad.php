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
                <a href="Pagina_principal.php">PAGINA PRINCIPAL</a>
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

<!------------------------------------------------------------------------------------------------------------------------------------------>
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
 <!--END HOME -->                                                   
<!----------------------------------------------------------------------------------------------------------------------------------------->



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

<!----------------------------------------------------------------------------------------------------------------------------------------->
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