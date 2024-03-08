<?php
/**http://localhost/TFG/Web%20Bilbao%20SportAirV1/login_registro.php */
include("conexion_db.php");
if (isset($_POST['register'])) {
    if(
        isset($_POST['nombre']) &&
        isset($_POST['primer_apellido']) &&
        isset($_POST['segundo_apellido']) &&
        isset($_POST['correo_electronico']) &&
        isset($_POST['usuario']) &&
        isset($_POST['contrasena']) &&
        strlen($_POST['nombre']) >=1 &&
        strlen($_POST['primer_apellido']) >=1 &&
        strlen($_POST['segundo_apellido']) >=1 &&
        strlen($_POST['correo_electronico']) >=1 &&
        strlen($_POST['usuario']) >=1 &&
        strlen($_POST['contrasena']) >=1)
    {
        $nombre = trim ($_POST['nombre']);
        $primer_apellido = trim ($_POST['primer_apellido']);
        $segundo_apellido = trim ($_POST['segundo_apellido']);   
        $correo_electronico = trim ($_POST['correo_electronico']);
        $usuario = trim ($_POST['usuario']);
        $contrasena = trim ($_POST['contrasena']);
        $sql = "INSERT INTO usuarios(nombre,primer_apellido,segundo_apellido,correo_electronico,usuario,contrasena) 
        VALUES('$nombre','$primer_apellido','$segundo_apellido','$correo_electronico','$usuario','$contrasena')";

        echo "SQL: $sql<br>"; // Esto imprimirá la consulta SQL
        
        $result = mysqli_query($conexion,$sql);
        
        if($result){
         ?>
            <h3>Registro completado</h3>
         <?php
          session_start();
          $_SESSION['usuario'] = $usuario;
          /**PAGINA DE INICIO */
          header("Location: Pagina_Principal.php"); 
          exit();  
        }else{
         ?>
            <h3>Registro no completado</h3>
        <?php
        }
    } else {
     ?>
        <h3>RELLENAR</h3>
     <?php
    }
}
/**LOGIN */
if (isset($_POST['login'])) {
    if (
        isset($_POST['usuario']) && isset($_POST['contrasena']) &&
        strlen($_POST['usuario']) >= 1 && strlen($_POST['contrasena']) >= 1
    ) {
        $usuario = trim($_POST['usuario']);
        $contrasena = trim($_POST['contrasena']);

        // Consulta SQL para verificar las credenciales
        $sql_login= "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
        $login_result = mysqli_query($conexion, $sql_login);

        if ($login_result && mysqli_num_rows($login_result) > 0) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            /**PAGINA DE INICIO */
            header("Location: Pagina_principal.php"); 
            exit();  
        } else {
         ?>
            <h3>Nombre de usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.</h3>;
         <?php   
        }
    } else {
     ?>
        <h3>Por favor, introduce un nombre de usuario y contraseña.</h3>";
     <?php   
    }
}

?>