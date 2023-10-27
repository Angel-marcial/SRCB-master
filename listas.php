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
            <a href="#" style="color: white; text-decoration: none;"><i class="zmdi zmdi-account"></i> Ingresar</a>
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
                    <tr>
                        <td>1</td>
                        <td>Ciencias</td>
                        <td>Física</td>
                        <td>No</td>
                        <td>1</td>
                        <td>Investigación en Física Cuántica</td>
                        <td>101</td>
                        <td>Dr. Alejandro Gómez</td>
                        <td>Universidad XYZ</td>
                        <td>Dr. Alejandro Gómez</td>
                        <td>2023-10-13</td>
                        <td>Miércoles</td>
                        <td>Mañana</td>
                        <td>Bloque 1</td>
                        <td>Sala A</td>
                        <td>Campus Central</td>
                        <td>Sede Principal</td>
                        <td><button class="botonP">Editar</button></td>
                        <td><button class="botonP">Borrar</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tecnología</td>
                        <td>Inteligencia Artificial</td>
                        <td>Sí</td>
                        <td>3</td>
                        <td>Avances en IA y Robótica</td>
                        <td>102, 103, 104</td>
                        <td>Dr. María López, Dr. Juan Pérez, Dr. Laura Torres</td>
                        <td>Instituto ABC, Universidad XYZ, Empresa ABC</td>
                        <td>Dr. María López, Dr. Juan Pérez, Dr. Laura Torres</td>
                        <td>2023-10-14</td>
                        <td>Jueves</td>
                        <td>Tarde</td>
                        <td>Bloque 2</td>
                        <td>Sala B</td>
                        <td>Campus Norte</td>
                        <td>Sede Secundaria</td>
                        <td><button class="botonP">Editar</button></td>
                        <td><button class="botonP">Borrar</button></td>
                    </tr>
                </tbody>
            </table>
            <a href="altas.php" class="botonP">Agregar uno nuevo</a>


            <!-- Botón "Cargar lista" -->
            <button class="botonP" id="cargarListaButton">Cargar lista</button>
            <!-- Elemento de entrada de tipo "file" oculto -->
            <input type="file" id="fileInput" accept=".txt, .csv, application/vnd.ms-excel" style="display: none">

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
</body>
<script>
    $(document).ready(function () {
        $("#cargarListaButton").click(function () {
            $("#fileInput").click();
        });
    });
</script>

</html>
