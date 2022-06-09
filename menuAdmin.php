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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="img/iconAdmin.png"/>
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>

        <title>Menu Administrador</title>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>

    </head>
    <body style="background-color: white; background-image: url(img/imgAdmin.png); background-attachment: fixed" >
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
                    <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 35px">menu</i></a>
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
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-data white-text' style="font-size: 27px;"></i>Base de datos<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="backup.php"><i class='bx bx-file white-text' style="font-size: 22px;"></i>Respaldo</a></li>
                                <li><a href="VistaAdmin/vistaDB.php"><i class="uil uil-eye white-text" style="font-size: 22px; transform: translateY(14px)"></i>Visualizar tablas</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 27px;"></i></a></li>
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
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div id="modalAgregar" class="modal">
                            <div class="modal-content">
                                <h4>Agregar nuevo usuario</h4>
                                <div class="row">
                                    <form class="col s12 grey lighten-3" name="datosUser" style="padding: 20px; border-radius: 10px" method="post" >
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input id="rut" type="text" name="txt_rut" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required>
                                                <label for="txt_rut">Rut</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input id="nombre" type="text" name="txt_nombre" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                <label for="txt_nombre">Nombre</label>
                                            </div>
                                            <div class="input-field col s12 m5 l6">
                                                <input id="apellido" type="text" name="txt_apellido" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                <label for="txt_apellido">Apellido</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input id="email" type="text" name="txt_email" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                <label for="txt_email">Email</label>
                                            </div>
                                            <div class="input-field col s12 m5 l6">
                                                <input id="telefono" type="text" name="txt_telefono" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required>
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
                                            <div class="input-field col s12 m5 l6">
                                                <input placeholder="" id="areaE" type="text" name="txt_area" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                                <label for="txt_area">Area Actual</label>
                                            </div>
                                            <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                                <select name="cbo_area" id="areaN" required>Nueva Area
                                                    <option value="0">-- Seleccionar --</option>
                                                    <?php
                                                    $area = $data->getArea();

                                                    foreach ($area as $key) {
                                                        echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select><label for="areaN">Nueva Area</label>
                                            </div>
                                        </div>
                                        <div class="row">


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
            <div class="container_menu_seg">
                <div class="row">
                    <div class="col s12 m9 l9">
                        <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                            <div class="card-content" style="margin: 20px 100px; padding: 3.5% 0">
                                <span class="table_Tit center" style="display: block; margin: 30px 0">Listado de usuarios</span>
                                <table class="table centered responsive-table" id="datos">
                                    <thead align="center">
                                        <tr>
                                            <th>R.U.T</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Area</th>
                                            <th>Tipo de usuario</th>
                                            <th></th>
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
                                            echo '<tr>';
                                            echo '<td>' . $key['rut'] . '</td>';
                                            echo '<td>' . $key['nombre'] . '</td>';
                                            echo '<td>' . $key['apellido'] . '</td>';
                                            echo '<td>' . $key['email'] . '</td>';
                                            echo '<td>' . $key['telefono'] . '</td>';
                                            echo '<td>' . $key['area'] . '</td>';
                                            echo '<td>' . $key['tipo'] . '</td>';
                                            echo '<td><button data-target="modalEditar" class="btn modal-trigger" onclick="cargarDatos(' . $datos . ');" style="background-color: #fbc02d; "><i class="material-icons">create</i></button></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="container center" style="margin: 2.5% auto">
                                    <button data-target="modalAgregar" class="btn modal-trigger center blue darken-3">Agregar Nuevo Usuario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3 l3">
                        <div class="card" style="margin: 40px auto; max-width: 1280px; width: 100%; border-radius: 10px;">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="page-footer" style="background-color: transparent">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
                <select>
                    <option selected>text1</option>
                    <option value="second">text2</option>
                    <option value="third">text3</option>
                </select>

            </div>
        </footer>
        <script>
            $(document).ready(function () {
                $('#datos').DataTable({
                    responsive: true,
                    autoWidth: false,
                    "language": {
                        "lengthMenu": "Mostrar " + '<select><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select>' + " registros por página",
                        "zeroRecords": "No se han encontrado registros",
                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            'next': 'Siguiente',
                            'previous': 'Anterior',
                        },
                    }
                });

            });
        </script>
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
        <script type="text/javascript">
            $(function () {
                $("input#rut").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });
                $(document).ready(function () {
                    $('.sidenav').sidenav();
                });
                var input = document.getElementById('rut');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
            document.getElementById('correo').addEventListener('input', function () {
                campo = event.target;
                valido = document.getElementById('emailVal');
                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                //Se muestra un texto a modo de ejemplo, luego va a ser un icono

                if (emailRegex.test(campo.value)) {
                    valido.innerText = "Correo válido";
                } else {
                    valido.innerText = "Correo no válido";
                }
            }
            );
            let toggle = document.getElementById('add');
            toggle.onclick = function () {
                toggle.classList.toggle('active');
            }
        </script>
    </body>
</html>

