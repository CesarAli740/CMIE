<!doctype html>
<html lang="es">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <style>
        div.botones-navbar{
            align-items: flex-end;
            background-color: #32383e;
            padding: 10px;
        }
      </style>
      <div class="botones-navbar"> 
        <!-- <a href="http://localhost/CMIE/vista_admin/principal.php"><img src="./img/ejercito_logo.png" alt="ejercito_logo"></a> -->
        <a class="btn btn-success" href="http://localhost/CMIE/vista_admin/principal.php">Inicio</a>
        <a class="btn btn-success" href="http://localhost/CMIE/views/user.php">Usuarios</a>
        <a class="btn btn-success" href="http://localhost/CMIE/includes/_sesion/cerrarSesion.php">Salir</a>
      </div>
</body>
<style>
    body {
      background-image: url('../img/FondoMulti.svg');
    }
    a{
      text-decoration: none;
    }
  </style>
<!-- <style>
  
body { 
    font-family: 'Lato', sans-serif;
    font-size: 18px;
}
.nav{
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 100;
    width: 100%;
    margin: 0;
    padding: 10px 20px;
    background-color: black;
}
.nav li,
.nav a{
    display: inline-block;
    margin: 10px;
    text-decoration: none;
    text-transform: uppercase;
    font-family: 'Oswald', sans-serif;
    font-size: 19px;
    color: #c2c2c2;
    transition: .5s ease;
}
nav a img{
    border-radius: 50%;
}
.menu li a{
    transition: .5s ease;
    margin: 0;
    padding: 0;
}
</style>


<body>
  <nav class="nav">
		<a href="#" class="marca"><img src="./img/ejercito_logo.svg" width="60px" alt="Logo militar"></a>
			<ul id="menu" class="menu">
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Log out</a></li>
			</ul>
	</nav>
</body> -->