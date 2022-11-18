<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location: ../login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- METAS -->
        <meta charset="UTF-8" />
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <title>Bokato Sushi</title>
        <!-- lINKS CSS -->
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/home.css" />
        <link rel="stylesheet" href="../../css/quienessomos.css" />
        <link rel="stylesheet" href="../../css/contacto.css" />
        <!-- LINKS JS -->
        <script src="../../js/esconder.js"></script>
        <script src="../../js/funciones.js"></script>
        <script src="../../js/datos.js"></script>
    </head>
    <body>
        <?php // echo $_SESSION["usuario"]; ?>
        <!-- HEADER -->
        <header>
            <h1 id="logo0">Bokato Sushi</h1>
            <img
                id="logo1"
                src="../../img/sushi-solid-240.png"
                alt="logo sushi" />
        </header>

        <!-- NAV -->
        <nav class="navbar" id="myFun">
            <a href="#" onclick="ActivDiv(1)">Home</a>
            <a href="../productos/index.html">Productos</a>
            <a href="#" onclick="ActivDiv(3)">Quienes somos</a>
            <a href="#" onclick="ActivDiv(6)">Contacto</a>
            <!-- <a href="FETCH/index.html">Contacto</a> -->
            <a href="#" id="boton">Menu</a>
        </nav>

        <!-- NAV CHICO -->
        <ul class="nav-chico myFun1" id="nav-chico">
            <li><a href="#" onclick="ActivDiv(1)">Home</a></li>
            <li><a href="../productos/index.html">Productos</a></li>
            <li><a href="#" onclick="ActivDiv(3)">Quienes somos</a></li>
            <li><a href="#" onclick="ActivDiv(6)">Contacto</a></li>
        </ul>
        <!-- HOME -->
        <div class="home myFun1" id="1Div">
            <div class="div-home">
                <div class="div-img">
                    <h1>Home</h1>
                </div>
                <div class="div-contenido">
                    <div class="div-text2">
                        <a href="#"></a>
                    </div>
                    <div class="div-text">
                        <h2>Logros</h2>
                        <p
                            >Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Exercitationem laudantium quaerat fugiat non
                            alias animi, voluptatibus praesentium omnis dolorum
                            deleniti veritatis tenetur. Veritatis alias, velit
                            omnis dolore repellat cupiditate voluptas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="div-contenido2" id="2Div">
            <article>
                <h3>Partes especiales de la página</h3>
                <p
                    >Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Eum iste quia repudiandae enim! Obcaecati, fuga. Nostrum rem
                    officiis aperiam dolorum minima minus cumque corrupti in
                    perspiciatis! Repudiandae accusamus cumque delectus!
                </p>
            </article>
            <article>
                <h4>Beneficios:</h4>
                <h5>Por comprar online tienes los siguientes Beneficios.</h5>
                <p
                    >Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Eum iste quia repudiandae enim! Obcaecati, fuga. Nostrum rem
                    officiis aperiam dolorum minima minus cumque corrupti in
                    perspiciatis! Repudiandae accusamus cumque delectus!
                </p>
            </article>
            <section>
                <h4 style="color: red">Horario:</h4>
                <p>De Lunes a Jueves: 15:30 PM a 23:50 PM</p>
                <p>De Viernes a Domingo: 15:30 PM a 1:00 AM</p>
            </section>
        </div>

        <!-- QUIENES SOMOS -->
        <div class="quienessomos myFun1" id="3Div">
            <div class="div-quienessomos">
                <div class="div-historia">
                    <h1>Historia</h1>
                    <h2>Comiezo de comienzos</h2>
                    <p>
                        En la época de pandemia en chile, se juntan 2 amigos un
                        día cualquiera para ellos, con mucha hambre ellos
                        pensaron en que comer algo, ellos expresaron la idea de
                        comer sushi al mismo tiempo , quizás fue conciencia xd,
                        lo que realmente asusto a nuestros protagonistas es que
                        una persona que esperaba en el paradero del autobús
                        junto a ellos, les habla con mucha iniciativa y les
                        dijo, "Chicos, yo puedo hacer de repartidos".
                    </p>
                    <p>
                        En ese momento se formó la "La dinastía sushi", un
                        nombre verdadera mente intimidante, como queriendo decir
                        "Comprame sushi si no", así que fue cambiado muy pronto
                        a "Bokato Sushi" como se llama hoy en día.
                    </p>
                    <p
                        >Los jóvenes empezaron vendiendo a sus amigos y
                        conocidos, pero rápidamete creciron por sus calidad.
                        <br />
                        Hoy en dia, las tres personas son los jefes de 18
                        locales repartidos por todo chile.
                    </p>
                </div>
                <div class="div-equipo">
                    <h1>Equipo</h1>
                    <div id="div-present">
                        <div id="mati">
                            <h2>Matias Valenzuela</h2>
                            <img src="../../img/matifer.jpg" alt="" />
                            <p>Nació 8 de Septiembre, 2003</p>
                        </div>
                        <div id="cris">
                            <h2>Cristobal Sandoval</h2>
                            <img src="../../img/cristobal.jpeg" alt="" />
                            <p>Nació el 29 de mayo, 2002</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTACTO -->
        <div class="contacto myFun1" id="6Div">
            <div class="div-contacto">
                <h1>Contacto</h1>
                <p>Ingrese los datos pedidos para luego ser contactado.</p>
                <!-- Form conectado a php-->
                <form action="" method="post" id="formulario">
                    <label for="nombre" class="item1">Nombre:</label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        placeholder="nombre..."
                        class="grid-items item2" />
                    <label for="apellido" class="item3">Apellido:</label>
                    <input
                        type="text"
                        name="apellido"
                        id="apellido"
                        placeholder="apellido..."
                        class="grid-items item4" />
                    <label for="email" class="item5">Email:</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="email..."
                        class="grid-items item6" />
                    <label for="mensaje" class="item7">Mensaje:</label>
                    <textarea
                        name="mensaje"
                        id="mensaje"
                        cols="30"
                        rows="10"
                        class="grid-items item8"
                        placeholder="escriba aqui..."></textarea>
                    <input
                        type="submit"
                        id="submit"
                        value="Enviar"
                        class="item9" />
                </form>
                <p id="dato-nomenor">Sus datos están resguardados</p>
                <div id="respuesta"></div>
                <!-- Mostrar Datos en tabla-->
                <button onclick="llamarDatos()">Ver Datos</button>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="data"></tbody>
                    </table>
                </div>
                <div>
                    <form action="../../rsc/crud/actualizar.php" method="post">
                        <input type="text" name="nombreNew">
                        <input type="numbre" name="id">
                        <input type="submit" value="actualizar">
                    </form>
                </div>
                <div>
                    <form action="../../rsc/crud/delete.php" method="post">
                        <input type="numbre" name="id">
                        <input type="submit" value="delete">
                    </form>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer>
            <p
                >© Bokato Sushi. Todos los derechos reservados. Todas las
                imágenes utilizadas en este sitio son referenciales. | Trabajo
                Desarrollo web
            </p>
        </footer>
        <!-- LINK JS PARA EL NAV-->
        <script src="../../js/mover.js"></script>
    </body>
</html>