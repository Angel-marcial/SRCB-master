<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/sweet-alert.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>

</head>

<body>
    <header
        style="background-color: #1E71A7; color: white; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <!-- Logo o título -->
            <h1></h1>
        </div>
        <div>
            <!-- Redes Sociales y Contacto -->
            <a href="#" style="color: white; text-decoration: none; margin-right: 1rem;"><i
                    class="zmdi zmdi-facebook"></i></a>
            <a href="#" style="color: white; text-decoration: none; margin-right: 1rem;"><i
                    class="zmdi zmdi-youtube"></i></a>
            <a href="mailto:correo@example.com" style="color: white; text-decoration: none; margin-right: 1rem;"><i
                    class="zmdi zmdi-email"></i> Contacto</a>
            <span style="margin-left: 1rem; margin-right: 1rem;">|</span>
            <a class="vent2-button" style="color: white; text-decoration: none;"><i class="zmdi zmdi-account"></i>
                Ingresar</a>
        </div>
    </header>

    <div class="container">
        <div class="page-header">
            <h1 class="all-tittles"><small></small></h1>
            <div class="content-container">
                <div class="logo-contenedor">
                    <a href="https://programadelfin.org.mx/" target="_blank"> <!-- Agregamos el enlace -->
                        <img src="assets/img/logo2.png" alt="Logo 2" style="text-align: left;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="full-reset text-center" style="padding: 40px 0;">
        <h1>Administrador</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID_Tra</th>
                        <th>Area</th>
                        <th>Linea</th>
                        <th>Compartido</th>
                        <th>NoPonentes</th>
                        <th>Titulo</th>
                        <th>ID_Pon(s)</th>
                        <th>Ponente(s)</th>
                        <th>Institucion(es)</th>
                        <th>Investigador</th>
                        <th>Fecha</th>
                        <th>Dia</th>
                        <th>Turno</th>
                        <th>Bloque</th>
                        <th>Salon</th>
                        <th>Ubicacion</th>
                        <th>Sede</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>  
                    <?php
                    include("conexion.php");
                    
                    $query = "SELECT Trabajo.*, Area.*, Sala.*, Ponente.*, Investigador.*
                    FROM Trabajo
                    INNER JOIN Area ON Trabajo.ID_Trabajo = Area.ID_Trabajo
                    INNER JOIN Sala ON Trabajo.ID_Sala = Sala.ID_Sala
                    INNER JOIN Ponente ON Trabajo.ID_Trabajo = Ponente.ID_Trabajo
                    INNER JOIN Investigador ON Trabajo.ID_Trabajo = Investigador.ID_Investigador";

                    $result = mysqli_query($conn, $query); 
          
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_Trabajo'] . "</td>";  
                        echo "<td>" . $row['Nombre_Area'] . "</td>";   
                        echo "<td>" . $row['Linea'] . "</td>";   
                        echo "<td>" . $row['Compartido'] . "</td>"; 
                        echo "<td>" . "S/D" . "</td>";
                        echo "<td>" . $row['Titulo'] . "</td>"; 
                        echo "<td>" . $row['ID_Ponente'] . "</td>";
                        echo "<td>" . $row['Nombre_Ponente'] . "</td>";  
                        echo "<td>" . "S/D" . "</td>"; 
                        echo "<td>" . $row['Nombre_Investigador'] . "</td>";
                        echo "<td>" . $row['Fecha'] . "</td>";
                        echo "<td>" . "S/D" . "</td>";  
                        echo "<td>" . "S/D" . "</td>"; 
                        echo "<td>" . $row['Bloque'] . "</td>"; 
                        echo "<td>" . "S/D" . "</td>";
                        echo "<td>" . $row['Ubicacion'] . "</td>"; 
                        echo "<td>" . $row['Sede'] . "</td>";    
                        echo "</tr>";
                    }
                    
                    ?>
                </tbody> 
            </table>

            <a href="altas.html" class="botonP">Agregar uno nuevo</a>

            <form action="validaciones/cargardatos.php" method="post" enctype="multipart/form-data">
                <label>Moderadores:</label>
                <input type="file" name="archivo_excel1" accept=".xlsx, .xls">
                
                <label>Programa:</label>
                <input type="file" name="archivo_excel2" accept=".xlsx, .xls">
                
                <input type="submit" value="Cargar archivo panu ">
            </form>

                <!--
                <button class="botonP" id="cargarListaButton1">Cargar Moderadores</button>
                <input type="file" id="fileInput1" name="archivo_excel1" accept=".xlsx, .xls, application/vnd.ms-excel" style="display: none">
                
                <button class="botonP" id="cargarListaButton2">Cargar Programa</button>
                <input type="file" id="fileInput2" name="archivo_excel2" accept=".xlsx, .xls, application/vnd.ms-excel" style="display: none">
                
                Elementos para mostrar el nombre del archivo 
                <div id="fileNameDisplay1"></div>
                <div id="fileNameDisplay2"></div>
                

                <script>
                    document.getElementById("cargarListaButton1").addEventListener("click", function() {
                        document.getElementById("fileInput1").click();
                    });
                
                    document.getElementById("cargarListaButton2").addEventListener("click", function() {
                        document.getElementById("fileInput2").click();
                    });
                
                    document.getElementById("fileInput1").addEventListener("change", function() {
                        const fileNameDisplay1 = document.getElementById("fileNameDisplay1");
                        fileNameDisplay1.textContent = this.files[0] ? this.files[0].name : "No se ha seleccionado un archivo";
                    });
                
                    document.getElementById("fileInput2").addEventListener("change", function() {
                        const fileNameDisplay2 = document.getElementById("fileNameDisplay2");
                        fileNameDisplay2.textContent = this.files[0] ? this.files[0].name : "No se ha seleccionado un archivo";
                    });
                </script>
                -->


        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum
                    officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa
                    accusamus error. Animi mollitia corporis iusto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                            class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer full-reset">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h4 class="all-tittles">Acerca de</h4>
                    <p>
                        El Programa Delfín, se creó en 1995 con el objetivo fortalecer la cultura de colaboración entre
                        las Instituciones de Educación Superior y Centros de Investigación integrantes del Programa, a
                        través de la movilidad de profesores-investigadores, estudiantes y de la divulgación de
                        productos científicos y tecnológicos. En lo particular para fortalecer el desarrollo de la
                        investigación y el posgrado nacional.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h4 class="all-tittles">Desarrollado por:</h4>
                    <ul class="list-unstyled">
                        <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Equipo Onix <a href="#"
                                style="text-decoration: none; color: inherit;"><i
                                    class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i></a><a href="#"
                                style="text-decoration: none; color: inherit;"><i
                                    class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright full-reset all-tittles">

            ® Programa Delfín

            Programa Interinstitucional para el Fortalecimiento de la Investigación y el Posgrado del Pacífico
        </div>
    </footer>
    <script>
        $(document).ready(function () {
            $("#cargarListaButton").click(function () {
                $("#fileInput").click();
            });
        });
    </script>

    <!-- Ventana modal -->
    <div class="vent2" id="loginModal">
        <span class="close-modal" id="closeModal">&times;</span>
        <div class="modal-header" style="color: orange; text-align: center;">Inicio de sesión</div>
        <div style="text-align: center;">
            <input type="text" class="input-box" id="usuarioInput" placeholder="Usuario" style="margin: 10px 0;">
            <input type="password" class="input-box" id="contrasenaInput" placeholder="Contraseña"
                style="margin: 10px 0;">
            <button class="modal-button" id="entrarButton">Entrar</button>
            <p class="modal-text">Recuperar datos de sesión</p>
        </div>
    </div>

    <script>
        // Función para mostrar la ventana modal
        document.querySelector(".vent2-button").addEventListener("click", function () {
            document.querySelector(".vent2").style.display = "block";
            document.querySelector("#overlay").style.display = "block";
        });

        // Función para cerrar la ventana modal con efecto de disolución
        document.getElementById("closeModal").addEventListener("click", function () {
            var modal = document.querySelector(".vent2");
            modal.style.animation = "slideUp 0.5s";
            modal.addEventListener("animationend", function () {
                modal.style.display = "none";
                modal.style.animation = ""; // Restablece la animación
            });
            document.querySelector("#overlay").style.animation = "fadeOut 0.5s";
            document.querySelector("#overlay").addEventListener("animationend", function () {
                document.querySelector("#overlay").style.display = "none";
                document.querySelector("#overlay").style.animation = ""; // Restablece la animación
            });
        });

        // Validación de acceso
        document.getElementById("entrarButton").addEventListener("click", function () {
            var usuario = document.getElementById("usuarioInput").value;
            var contrasena = document.getElementById("contrasenaInput").value;

            if (usuario.trim() === "" || contrasena.trim() === "") {
                alert("Por favor, complete todos los campos.");
            } else {
                // Aquí puedes agregar la lógica para el acceso si los datos son válidos
                // Por ahora, simplemente mostrar un mensaje de éxito
                alert("Acceso concedido. ¡Bienvenido!");
                // Puedes agregar aquí la redirección o acción deseada después de un inicio de sesión exitoso
            }
        });
    </script>
</body>
</html>