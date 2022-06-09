<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once '../Model_Data.php';
session_start();
$idU=$_SESSION['id'];
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];
$correo = $_SESSION['email'];
$area = $_SESSION['area_usuario'];

$data = new Data();
$array = [];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu General</title>
        <link rel="icon" href="../img/iconGeneral.png"/>
        <link rel="stylesheet" href="../Materialize/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../Materialize/js/materialize.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="../Materialize/js/funciones.js"></script>
    </head>
    <body style="background-color: #E4E9F7" >
        <div id="modal_pass" class="modal" style="margin-top: 100px">
            <div class="modal-content">
                <form class="col s2" action="../controller/controllerUpdatepass.php" method="post">
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
                                <img style="width: 350px; height: 350px; margin-right: 100px; margin-top:-150px" src="../img/iconPass.png"/>
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
        <style>
            .icon-wrapper{
                width: 50px;
                height: 50px;
                position: relative;
            }

            .icon-wrapper::after{
                content: attr(data-number);
                width: 20px;
                height: 20px;
                background-color: #d32b2b;
                color: #FFF;
                display: grid;
                place-content: center;
                border-radius: 50%;
                position: absolute;
                top: 5px;
                right: 0;
                opacity: 0;
                transform: translateY(3px);
            }

            .icon-wrapper::after{
                opacity: 1;
                transform: translateY(0);
                transition: opacity 0.25s;
                transform: 0.25s;
            }

            .cart-icon{
                max-width: 100%;

            }

            /*.icon-wrapper .cart-icon{
                animation: shake 1s forwards;
            }

            @keyframes shake{
                10%{
                    transform: rotate(15deg);
                }
                20%{
                    transform: rotate(-15deg);
                }
                30%{
                    transform: rotate(15deg);
                }
                50%{
                    transform: rotate(0deg);
                }
            }*/

            $main-color: #6394F8;
            $light-text: #ABB0BE;

            @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);

            @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);

            *, *:before, *:after {
                box-sizing: border-box;
            }

            body {
                font: 14px/22px "Lato", Arial, sans-serif;
                background: #6394F8;
            }

            .lighter-text {
                color: #ABB0BE;
            }

            .main-color-text {
                color: $main-color;
            }

            /*nav {
                padding: 20px 0 40px 0;
                background: #F8F8F8;
                font-size: 16px;

                .navbar-left {
                    float: left;
                }

                .navbar-right {
                    float: right;
                }
                ul {

                    li {
                        display: inline;
                        padding-left: 20px;
                        a {
                            color: #777777;
                            text-decoration: none;

                            &:hover {
                                color: black;
                            }
                        }
                    }
                }
            }*/

            /*.container {
                margin: auto;
                width: 80%;
            }*/

            /*.badge {
                background-color: #6394F8;
                border-radius: 10px;
                color: white;
                display: inline-block;
                font-size: 12px;
                line-height: 1;
                padding: 3px 7px;
                text-align: center;
                vertical-align: middle;
                white-space: nowrap;
            }*/

            .shopping-cart {
                margin: 20px 0;
                overflow-y: scroll;
                float: right;
                background: white;
                width: 400px;
                height: 300px;
                position: relative auto;
                display: none;
                border-radius: 3px;
                padding: 20px;


                /*.shopping-cart-header {
                    border-bottom: 1px solid #E8E8E8;
                    padding-bottom: 15px;

                    .shopping-cart-total {
                        float: right;
                    }
                }

                .shopping-cart-items {

                    padding-top: 20px;

                    li {
                        margin-bottom: 18px;
                    }

                    img {
                        float: left;
                        margin-right: 12px;
                    }

                    .item-name {
                        display: block;
                        padding-top: 10px;
                        font-size: 16px;
                    }

                    .item-price {
                        color: $main-color;
                        margin-right: 8px;
                    }

                    .item-quantity {
                        color: $light-text;
                    }
                }*/

            }

            .shopping-cart:after {
                bottom: 100%;
                left: 89%;
                overflow-y: scroll;
                border: solid transparent;
                content: " ";
                height: 10px;
                width: 10px;
                position: absolute;
                pointer-events: none;
                border-bottom-color: white;
                border-width: 8px;
                margin-left: -8px;
            }

            .cart-icon {
                color: #515783;
                font-size: 24px;
                margin-right: 7px;
                float: left;
            }

            .button {
                background: $main-color;
                color:white;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                display: block;
                border-radius: 3px;
                font-size: 16px;
                margin: 25px 0 15px 0;

                &:hover {
                    background: lighten($main-color, 3%);
                }
            }

            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
        <section>
            <nav class="nav-extended" style="background-color: #1d1b31;">
                <div class="nav-wrapper">
                    <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 30px">menu</i></a>
                    <img src="../img/iconGeneral.png">
                    <span class="brand-logo">Menu General</span>
                    <div class="right icon-wrapper" id="carro" data-number="0" style="margin-right: 50px">
                        <!--<a><i style="font-size: 35px;" class="material-icons cart-icon">shopping_cart</i></a>-->
                        <!-- comment <img  src="../img/shopping-cart.svg" alt="" class="cart-icon">-->
                        <a href="#" id="cart"><i class="small material-icons red-text">add_shopping_cart</i></a>
                    </div>
                </div>

            </nav>
            <div class="shopping-cart">
                <button>Hola</button>
                <table class="shopping-cart-items" id="carrito-compra">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Elemento</th>
                            <th>Cantidad</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="bodyT">

                    </tbody>
                </table>


                <a href="#" class="button">Checkout</a>
            </div>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="../menuGeneral.php"><img class="circle" src="../img/iconPerfil.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Solicitudes<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content' style="background-color: #1d1b31;">
                    <li><a href="../menuGeneral.php">Ingresar</a></li>
                    <li><a href="historialSolicitud.php">Historial</a></li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="../Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
            </ul>


            <div class="container_menu_seg">
                <div class="row">
                    <div class="col s12 m8 l8">
                        <div class="card">
                            <div class="card-content">
                                <span class="table_Tit center" style="display: block; margin: 40px 0">Seleccione el stock que necesita</span>
                                <table class="table centered responsive-table container" id="datos" border="1">
                                    <form method="post">
                                        <thead align="center">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Activo</th>
                                                <th>Cantidad</th>
                                                <th>Descripcion</th>
                                                <th colspan="2">Añadir al carro</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $stock = $data->getStockByArea($area);
                                            foreach ($stock as $key) {
                                                $activo = '';
                                                switch ($key['activo']) {
                                                    case 1:
                                                        $activo = 'SI';
                                                        break;
                                                    case 0:
                                                        $activo = 'NO';
                                                    default:
                                                        break;
                                                }
                                                echo '
                                        '
                                                ?>

                                                <tr>
                                                    <td><input name="txt_id" value="<?php echo $key['id']; ?>" id="idBD" style="width: 60px;" class="center-align" readonly></td>
                                                    <td><input name="txt_nombBD" value="<?php echo $key['nombre']; ?>" id="nomBdS" style="width: 150px;" class="center-align" readonly></td>
                                                    <td><?php echo $activo; ?></td>
                                                    <td><input name="txt_cantBD" value="<?php echo $key['cantidad_t']; ?>" id="cant" style="width: 70px;" class="center-align" readonly></td>
                                                    <td><?php echo $key['descripcion']; ?></td>
                                                    <td><input class="hola"  type = "number" min="0"  name="cantidad[]" max="<?php echo $key['cantidad_t'] - 1; ?>" onkeypress = "return (event.charCode >= 48 && event.charCode <= 57)" style = "width: 70px; border: 1px solid grey; border-radius: 5px; text-indent: 10px"></td>
                                                    <td><label><input  name = "stock[]"value="<?php echo $key['id']; ?>"  type = "checkbox"/><span><i class="material-icons">add_shopping_cart</i></span></label></td>

                                                </tr>

                                                <?php
                                                '';
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <button class="btn waves-effect waves-light"  type="submit" name="action">Submit
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['action'])) {
                        echo '<div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-content">
                                    <form method="post">
                                        <table>
                                            <thead>
                                                <tr>
                                                        <th>Detalle:</th>
                                                </tr>
                                                <tr>
                                                        <th>#</th>
                                                        <th colspan="2">Producto</th>
                                                        <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        ';
                        if (!empty($_POST['cantidad'])) {
                            foreach ($_POST['cantidad'] as $check) {
                                array_push($array, $check);
                            }
                        }

                        $i = 0;
                        if (!empty($_POST['stock'])) {
                            foreach ($_POST['stock'] as $selected1) {
                                $array = array_values($array);

                                $stockS = $data->getStockById($selected1);

                                foreach ($stockS as $key1) {

                                    //echo $array[$i];
                                    if (empty($array[$i]) || $array[$i] == 0) {
                                        $i++;
                                    }
                                    echo '

                                        <tr>
                                            <td>' . $key1['id'] . '</td>
                                            <td><input  name = "stockS[]" id="agregarS" value="' . $key1['id'] . '" checked type = "checkbox"/><span><i class="material-icons">add_shopping_cart</i></span></label></td>
                                            <td>' . $key1['nombre'] . '</td>
                                            <td>' . $array[$i] . '</td>
                                            <td><input type="hidden" value="' . $array[$i] . '" name="nuevo[]"></td>
                                        </tr>        
                                                
                                        ';
                                    $i++;
                                }
                            }
                        }
                        echo '              </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>
                                                            <button class="btn waves-effect waves-light"  type="submit" name="solicitar">Submit
                                                                <i class="material-icons right">send</i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                    }

                    if (isset($_POST['solicitar'])) {
                        $arrayn = [];
                        if (!empty($_POST['nuevo'])) {
                            foreach ($_POST['nuevo'] as $checki) {
                                array_push($arrayn, $checki);
                                echo $checki;
                            }
                        }
                        $a=0;
                        if (!empty($_POST['stockS'])) {
                            foreach ($_POST['stockS'] as $selected2){
                                echo '<br>'.$selected2." ".$arrayn[$a];
                                
                                $stockA=$data->getStockById($selected2);
                                
                                foreach ($stockA as $keyF){
                                    $id=$keyF['id'];
                                    $nom=$keyF['nombre'];
                                    $des=$keyF['descripcion'];
                                    $descripcion=$id." ".$nom;
                                    echo "<br>".$descripcion;
                                    $data->instSoli($descripcion, $idU);
                                    $data->updStockSoli($id, $arrayn[$a]);
                                    $a++;
                                    
                                }
                            }
                            echo '<script language="javascript">alert("Reserva Exitosa'.$arrayn[$a].'");window.location.href="ingresoSolicitud.php"</script>';
                        }
                    }
                    ?>

                </div>
            </div>
        </section>
        <footer class="page-footer" style="background-color: transparent">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>

        <script>
            (function () {

                $("#cart").on("click", function () {
                    $(".shopping-cart").fadeToggle("fast");
                });

                /*$("#agregar").on("click", function () {
                 agregarCarrito();
                 })*/



            })();

            function eliminarCarrito(id) {
                console.log(id);
            }

            function agregarCarrito() {

                rut = $('#idBD').val();
                //rut1=$('.hola'+rut).val();




                //rut=$('#form'+rut).val();

                var id = document.getElementById("idBD").value;
                var cant = document.getElementById("cant").value;
                var nombre = document.getElementById("nomBdS").value;
                var cant_S = document.getElementById("cant_S").value;
                var data = document.getElementById("carro");
                //const b=docume1nt.querySelector("agregar");
                console.log(rut);
                if (cant_S != 0) {
                    var numberC = data.getAttribute('data-number');

                    data.setAttribute('data-number', parseInt(numberC) + 1);



                    console.log(id + " Hola " + numberC + " " + cant_S);

                    const lista = document.querySelector('#bodyT');

                    const row = document.createElement('tr');

                    row.innerHTML = '<td>' + id + '</td><td>' + nombre + '</td><td>' + cant_S + '</td><button class = "btn white-text waves-effect waves-light indigo darken-3 col s12 m6" name = "btn_eliminar" onclick="eliminarCarrito(' + id + ')" id="eliminar" type = "button" style = " height: 50px; border-radius: 6px; font-weight: 600;"><i class = "material-icons">delete</i></button><td></td>';

                    lista.appendChild(row);

                    //b.disabled=true;
                } else {
                    alert("puto");
                }
            }


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
        <script src="../js/script.js"></script>
        <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
        <!-- <script src="SweetAlerts/AlertLogBodega.js"></script>-->
    </body>
</html>
