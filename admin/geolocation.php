<?php 

session_start(); 

// Si solicite la ubicación la guardo tanto en la sesión como en la cookie
if (!empty($_POST['saveButton'])) {
    $_SESSION['location_user'] = $_POST['location_user'];
    setcookie('location_user', $_POST['location_user']);
}

// Si la sesión está vacío intento traer los datos de la cookie
if ( empty( $_SESSION['location_user'] ) ) {

    // Si la cookie está vacía solicito los datos al navegador
    if( empty( $_COOKIE["location_user"] ) ) {
        ?>

        <script>
        // Obtenemos las coordenadas de la ubicación
            if (navigator.geolocation) {
              var timeoutVal = 10 * 1000 * 1000;
              navigator.geolocation.getCurrentPosition(
                displayPosition, 
                displayError,
                { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0 }
              );
            }
            else {
              alert("Tu navegador no puede determinar tu ubicación.");
            }

            // Asigno las coordenadas a un input para luego guardarlo
            function displayPosition(position) {
                document.getElementById('locationUser').value = position.coords.latitude + "," + position.coords.longitude;
                if(document.getElementById("locationUser").value == ""){
                    document.getElementById("permissionText").style.display = "inline";
                    setTimeout(arguments.callee, 1000);
                } else {
                    document.getElementById("permissionText").style.display = "none";
                    document.getElementById("saveButton").style.display = "inline";
                }                  
            }

            function displayError(error) {
              var errors = { 
                1: 'Has denegeado el acceso a que el diario conozca tu ubicación.',
                2: 'No hemos podido determinar tu ubicación.',
                3: 'La operación tardó demasiado tiempo.'
              };
              alert("Error: " + errors[error.code]);

        }
        </script>
        <form method="post" id="getLocation">
            <input type="text" name="location_user" id="locationUser" />
            <span id="permissionText">Permite que Porven accesa a tu localizacion aproximada</span>
            <input type="submit" name="saveButton" id="saveButton" value="Guardar" style="display: none;" />
        </form>

    <?php } else {

        // Si el cookie existe creo el session con ese valor
        $_SESSION['location_user'] = $_COOKIE["location_user"];

    }

}

    echo $_SESSION['location_user'];

 ?>