      <?php
      $servername = "localhost";
      $username = "root";
      $password = ""; // Deja esto en blanco si estás usando la contraseña por defecto
      $database = "olimpiadas";
      
      $conn = new mysqli($servername, $username, $password, $database);
      
      if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
      }
      
      // Recopila los datos del formulario
      $zona = $_POST["nombreZona"];
      $descripcion = $_POST["descripcionCorta"];
      
      
      
      // Inserta los datos en la tabla
      $sql = "INSERT INTO AreasZonas (NombreArea, Descripcion)
              VALUES ('$zona', '$descripcion')";
      
      if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Location: maszonas.html"); // Redirige a la página principal
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>