<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login del Sistema</title>
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_login.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Iniciar Sesión</h2> 
    <form id="formaLogin">
        <label>Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo"><br><br>
        
        <label>Contraseña:</label><br>
        <input type="password" id="pass" name="pass"><br><br>
        
        <button type="button" onclick="validarLogin()">Entrar</button>
    </form>
    
    <div id="mensaje" style="color: red; font-weight: bold; margin-top: 15px;"></div>
</body>
</html>