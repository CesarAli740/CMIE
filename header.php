<!doctype html>
<html lang="es">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background: #3b3d43;
  }

  button {
    border: 0;
    padding: 0;
    font-family: inherit;
    background: transparent;
    color: inherit;
    cursor: pointer;
  }

  .navbar {
    position: relative;
    z-index: 1;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 64px;
    background: #19191c;
    color: #f9f9f9;
    font-family: "Poppins";
    box-sizing: border-box;
  }

  @media only screen and (min-width: 600px) {
    .navbar {
      justify-content: space-between;
      padding: 0 0 0 16px;
    }
  }

  .navbar-overlay {
    position: fixed;
    z-index: 2;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    visibility: hidden;
    opacity: 0;
    transition: 0.3s;
  }

  body.open .navbar-overlay {
    visibility: visible;
    opacity: 1;
  }

  @media only screen and (min-width: 600px) {
    .navbar-overlay {
      display: none;
    }
  }

  .navbar-burger {
    position: absolute;
    top: 0;
    left: 0;
    display: grid;
    place-items: center;
    width: 64px;
    height: 64px;
    padding: 0;
  }

  @media only screen and (min-width: 600px) {
    .navbar-burger {
      display: none;
    }
  }

  .navbar-title {
    margin: 0;
    font-size: 16px;
  }

  .navbar-menu {
    position: fixed;
    z-index: 3;
    top: 0;
    left: 0;
    translate: -100% 0;
    width: 270px;
    height: 100%;
    padding: 20px;
    display: flex;
    gap: 8px;
    flex-direction: column;
    align-items: flex-start;
    background: #000000;
    visibility: hidden;
    transition: translate 0.3s;
  }

  body.open .navbar-menu {
    translate: 0 0;
    visibility: visible;
  }

  @media only screen and (min-width: 600px) {
    .navbar-menu {
      position: static;
      translate: 0 0;
      width: auto;
      background: transparent;
      flex-direction: row;
      visibility: visible;
    }
  }

  .navbar-menu>button {
    color: rgba(255, 255, 255, 0.5);
    background: transparent;
    padding: 0 8px;
  }

  .navbar-menu>button.active {
    color: inherit;
  }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

<body>
  <nav class="navbar">
    <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

    <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
      <span class="material-icons">menu</span>
    </button>
    <h1 class="navbar-title">Awards</h1>
    <nav class="navbar-menu">
      <button type="button">Skills</button>
      <button type="button" class="active">Awards</button>
      <button type="button">Projects</button>
    </nav>
  </nav>
  <script type="text/javascript">const toggleMenuOpen = () => document.body.classList.toggle("open");</script>
</body>
<style>
  body {
    background-image: url('../img/FondoMulti.svg');
  }

  a {
    text-decoration: none;
  }
</style>