<head>
    <meta charset="UTF-8">
    <title>Login del Sistema</title>
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_login.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor-login">
        <h2 class="titulo">Iniciar Sesión</h2>
        <form id="formaLogin">
            <label>Correo electrónico:</label><br>
            <input type="email" id="correo" name="correo"><br><br>
            
            <label>Contraseña:</label><br>
            <input type="password" id="pass" name="pass"><br><br>
            
            <button type="button" onclick="validarLogin()" class="btn-enter">Entrar</button>
        </form>
        <div id="mensaje" class="mensaje"></div>
    </div>
    
</body>
</html>