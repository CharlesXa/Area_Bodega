<?php
//error_reporting(0);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];
$correo = $_SESSION['email'];

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="Materialize/js/funciones.js"></script>


        <title>Menu Administrador</title>

    </head>
    <body style="background-color: #E4E9F7" >
        <!-- Modal cambio de pass -->
        <div id="modal_pass" class="modal" style="margin-top: 100px">
            <div class="modal-content">
                <form class="col s2" action="controller/controllerUpdatepass.php" method="post">
                    <div class="modal-content">
                        <h4 style="font-size: 50px">Cambiar contraseña</h4>
                        <p style="font: bold; font-size: 20px">Tu contraseña es temporal, reestablecela</p>
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="txt_pass" id="pass" type="password" class="validate" required>
                                    <label for="pass">Nueva contraseña</label>
                                </div>
                            </div>
                            <div class="row right">
                                <img style="width: 350px; height: 350px; margin-right: 100px; margin-top:-150px" src="img/iconPass.png"/>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="txt_pass2" id="pass2" type="password" class="validate" required>
                                    <label for="pass">Confirmar nueva contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left:170px; background-color: #1d1b31; width: 200px; height: 50px">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <section>
            <nav class="nav-extended" style="background-color: #1d1b31;">
                <div class="nav-wrapper">
                    <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 30px">menu</i></a>
                    <img src="img/iconAdmin.png">
                    <span class="brand-logo">Menu Admin</span>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="#user"><img class="circle" src="img/iconPerfil.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Database<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content' style="background-color: #1d1b31;">
                    <li><a href="backup.php">Respaldo</a></li>
                    <li><a href="VistaAdmin/vistaDB.php">Visualizar tablas</a></li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
            </ul>
            <div>
                <!--Modal Structure-->
                <div id="modal_1" class="modal" style="position: absolute; margin-top: 150px">
                    <form class="col s12" action="controller/controllerUpdatepass.php" method="post">
                        <div class="modal-content">
                            <h4>Cambiar contraseña</h4>
                            <p>Tu contraseña es temporal, reestablecela</p>
                            <div class="row">

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="txt_pass" id="pass" type="password" required>
                                        <label for="pass">Nueva contraseña</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="txt_pass2" id="pass2" type="password" required>
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
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div id="modalAgregar" class="modal">
                        <div class="modal-content">
                            <h4>Agregar nuevo usuario</h4>
                            <div class="row">
                                <form class="col s12 grey lighten-3" style="padding: 20px; border-radius: 10px">
                                    <div class="row">
                                        <div class="input-field col s12 m5 l6">
                                            <input id="rut" type="text" name="txt_rut" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_rut">Rut</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m5 l6">
                                            <input id="nombre" type="text" name="txt_nombre" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col s12 m5 l6">
                                            <input id="apellido" type="text" name="txt_apellido" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_apellido">Apellido</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m5 l6">
                                            <input id="email" type="text" name="txt_email" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_email">Email</label>
                                        </div>
                                        <div class="input-field col s12 m5 l6">
                                            <input id="telefono" type="text" name="txt_telefono" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_telefono">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
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
                                        <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
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
                        <div class="modal-footer center">
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
                                <form class="col s12 grey lighten-3" style="padding: 20px; border-radius: 10px">
                                    <div class="row">
                                        <div class="input-field col s12 m5 l6">
                                            <input placeholder="" id="rutEdite" type="text" name="txt_rut" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" readonly>
                                            <label for="txt_rut">Rut</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m5 l6" >
                                            <input placeholder="" id="nombreE" type="text" name="txt_nombre" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" readonly>
                                            <label for="txt_nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col s12 m5 l6">
                                            <input placeholder="" id="apellidoE" type="text" name="txt_apellido" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" readonly>
                                            <label for="txt_apellido">Apellido</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m5 l6">
                                            <input placeholder="" id="emailE" type="text" name="txt_email" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_email">Email</label>
                                        </div>
                                        <div class="input-field col s12 m5 l6">
                                            <input placeholder="" id="telefonoE" type="text" name="txt_telefono" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                            <label for="txt_telefono">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
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
                                        <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
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
                        <div class="modal-footer center">
                            <button id="actualizar" type="button" class="modal-close waves-effect waves-light btn blue darken-3">Actualizar Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="table_Tit center" style="display: block; margin-bottom: 40px">Listado de usuarios</span>
        <table class="table centered responsive-table container" id="datos" border="1">
            <thead align="center">
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
                        <td><button data-target="modalEditar" class="btn modal-trigger" onclick="cargarDatos('<?php echo $datos; ?>');" style="background-color: #fbc02d; "><i class="material-icons">create</i></button></td>
                    </tr>
                    <?php
                    '';
                }
                ?>
            </tbody>
        </table>
        <div class="container center" style="margin-top: 40px">
            <button data-target="modalAgregar" class="btn modal-trigger center blue darken-3">Agregar Nuevo Usuario</button>
        </div>
    </section>
    <footer class="page-footer" style="background-color: transparent">
        <div class="footer-copyright" style="background-color: #1d1b31">
            <div class="container center">
                SGV © Derechos Reservados - 2022
            </div>
        </div>
    </footer>

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
            document.getElementById('modal_pass').style.display = 'block';
            document.getElementById('menu').style.visibility = "hidden";
        }

        function CloseModal() {
            document.getElementById('modal_pass').style.display = 'none';
            document.getElementById('menu').style.visibility = "visible";

        }
    </script>
    <script src="js/script.js"></script>
</body>
</html>

