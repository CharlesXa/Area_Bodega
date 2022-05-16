<?php
//error_reporting(0);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];

if ($rut == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

$data = new Data();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link rel="icon" href="img/iconAdmin.png"/>
        <link rel="stylesheet" href="Materialize/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="Materialize/js/funciones.js"></script>


        <title>Menu Administrador</title>

    </head>
    <body style="background-color: #E4E9F7" >
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

        <div class="sidebar active">
            <div class="logo-details">
                <a href="menuBodega.php" style="padding:15px; padding-top: 25px">
                    <img src="img/iconAdmin.png" width="50px" height="50px"/>
                </a>
                <span class="logo_name">Admin S.G.V</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <span class="link_name"></span>
                    </a>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-collection' ></i>
                            <span class="link_name">Database</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow' ></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Stock</a></li>
                        <li><a href="backup.php">Respaldo</a></li>
                        <li><a href="VistaAdmin/vistaDB.php">Visualizar tablas</a></li>
                    </ul>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <img src="img/iconPerfil.png" alt="profileImg">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">Bienvenido:</div>
                            <div class="job"><?php echo $nombre . ' ' . $apellido ?></div>
                        </div>
                        <a href="Controller/controllerLogOut.php"><i class='bx bx-log-out'></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <div class="home-content">
                <div class="navbar-fixed">
                    <nav  style="background-color: #1d1b31;">
                        <div class="nav-wrapper">
                            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="bx bx-menu white-text" ></i></a>
                        </div>
                    </nav>
                </div>
                <div>
                    <!-- Modal Structure -->
                    <div id="modal_1" class="modal" style="position: absolute; margin-top: 150px">
                        <form class="col s12" action="controller/controllerUpdatepass.php" method="post">
                            <div class="modal-content">
                                <h4>Cambiar contraseña</h4>
                                <p>Tu contraseña es temporal, reestablecela</p>
                                <div class="row">

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="txt_pass" id="pass" type="password" class="validate" required>
                                            <label for="pass">Nueva contraseña</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="txt_pass2" id="pass2" type="password" class="validate" required>
                                            <label for="pass">Confirmar nueva contraseña</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Aceptar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div id="modalAgregar" class="modal">
                        <div class="modal-content">
                            <h4>Agregar nuevo usuario</h4>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="11.111.111-1" id="rut" type="text" name="txt_rut" class="validate">
                                            <label for="txt_rut">Rut</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="Juan" id="nombre" type="text" name="txt_nombre" class="validate">
                                            <label for="txt_nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input placeholder="Pinilla" id="apellido" type="text" name="txt_apellido" class="validate">
                                            <label for="txt_apellido">Apellido</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="email@mail.com" id="email" type="text" name="txt_email" class="validate">
                                            <label for="txt_email">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input placeholder="Pinilla" id="telefono" type="text" name="txt_telefono" class="validate">
                                            <label for="txt_telefono">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <select name="cbo_area" id="area" required>
                                                <option value="0">-- Seleccionar --</option>
                                                <?php
                                                $area = $data->getArea();

                                                foreach ($area as $key) {
                                                    echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s6">
                                            <select name="cbo_tipo" id="tipo" required>
                                                <option value="0">-- Seleccionar --</option>
                                                <?php
                                                $tipo = $data->getTypeUser();

                                                foreach ($tipo as $key) {
                                                    echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="agregarUsuario" type="button" class="modal-close waves-effect waves-light btn blue darken-3">Agregar Nuevo Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div id="modalEditar" class="modal">
                        <div class="modal-content">
                            <h4>Editar Datos</h4>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="11.111.111-1" id="rutEdite" type="text" name="txt_rut" class="validate" readonly>
                                            <label for="txt_rut">Rut</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="Juan" id="nombreE" type="text" name="txt_nombre" class="validate" readonly>
                                            <label for="txt_nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input placeholder="Pinilla" id="apellidoE" type="text" name="txt_apellido" class="validate" readonly>
                                            <label for="txt_apellido">Apellido</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="email@mail.com" id="emailE" type="text" name="txt_email" class="validate">
                                            <label for="txt_email">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input placeholder="Pinilla" id="telefonoE" type="text" name="txt_telefono" class="validate">
                                            <label for="txt_telefono">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <select name="cbo_area" id="areaE" required>
                                                <option value="0">-- Seleccionar --</option>
                                                <?php
                                                $area = $data->getArea();

                                                foreach ($area as $key) {
                                                    echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s6">
                                            <select name="cbo_tipo" id="tipoE" required readonly>
                                                <option value="0">-- Seleccionar --</option>
                                                <?php
                                                $tipo = $data->getTypeUser();

                                                foreach ($tipo as $key) {
                                                    echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="actualizar" type="button" class="modal-close waves-effect waves-light btn blue darken-3">Actualizar Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table centered" id="datos" border="1">
            <thead align="center">
                <tr>
                    <th colspan="4" style="font-size: 25px; text-align: center">Listado de usuarios</th>
                </tr>
                <tr>
                    <td colspan="3">
                        <button data-target="modalAgregar" class="btn modal-trigger" style="background-color: #1d1b31;">Agregar Nuevo Usuario</button>
                    </td>
                </tr>
                <tr>
                    <th>R.U.T</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Area</th>
                    <th>Tipo de usuario</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $users = $data->getAllusers();
                foreach ($users as $key) {
                    $datos = $key['rut'] . "||" .
                            $key['nombre'] . "||" .
                            $key['apellido'] . "||" .
                            $key['email'] . "||" .
                            $key['telefono'] . "||" .
                            $key['area'] . "||" .
                            $key['tipo'];
                    echo ''
                    ?>

                    <tr>
                        <td><?php echo $key['rut'] ?></td>
                        <td><?php echo $key['nombre'] ?></td>
                        <td><?php echo $key['apellido'] ?></td>
                        <td><?php echo $key['email'] ?></td>
                        <td><?php echo $key['telefono'] ?></td>
                        <td><?php echo $key['area'] ?></td>
                        <td><?php echo $key['tipo'] ?></td>
                        <td><button data-target="modalEditar" class="btn modal-trigger" onclick="cargarDatos('<?php echo $datos; ?>');" style="background-color:#1d1b31; "><i class="material-icons">create</i></button></td>
                    </tr>
                    <?php
                    '';
                }
                ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <footer class="page-footer" style="background-color: transparent">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#agregarUsuario').click(function () {
                rut = $('#rut').val();
                nombre = $('#nombre').val();
                apellido = $('#apellido').val();
                email = $('#email').val();
                telefono = $('#telefono').val();
                area = $('#area').val();
                tipo = $('#tipo').val();
                passwT = rut.substring(0, 6) + nombre.substring(0, 3);

                agregarUsuario(rut, nombre, apellido, email, telefono, area, tipo, passwT);
                location.reload(true);
            });

            $('#actualizar').click(function () {

                actualizarUsuario();
                location.reload(true);
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            M.AutoInit();
        });
        var temporal = "<?php echo $passwd_t ?>";

        if (temporal == 1) {
            showModal();
            console.log(temporal);
        } else {
            CloseModal();
        }
        function showModal() {
            document.getElementById('modal_1').style.display = 'block';
        }

        function CloseModal() {
            document.getElementById('modal_1').style.display = 'none';
        }
    </script>
    <script src="js/script.js"></script>
</body>
</html>

