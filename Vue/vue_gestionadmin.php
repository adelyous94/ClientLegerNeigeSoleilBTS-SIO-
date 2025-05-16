<?php 

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("location: vue_interdictionadmin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: "Roboto", sans-serif;
            font-size: 0.925rem;
            background-color: #f4f4f9;
            color: #3c4250;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            background-color: #fff;
            padding: 1rem 1.15rem;
            border-bottom: 1px solid #eceef3;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-header {
            display: flex;
            align-items: center;
        }

        .navbar-header h4 {
            font-weight: 500;
            font-size: 1.25rem;
            font-family: "Montserrat", sans-serif;
            color: #66f;
        }

        .navbar-center {
            text-align: center;
        }

        .navbar-center a {
            font-weight: 500;
            font-size: 1rem;
            font-family: "Montserrat", sans-serif;
            color: #3c4250;
        }

        .navbar-toggler {
            cursor: pointer;
            border: none;
            background: none;
            display: none;
        }

        .navbar-toggler span {
            display: block;
            width: 22px;
            height: 2px;
            background-color: #929aad;
            margin-bottom: 5px;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
        }

        .navbar-menu .navbar-nav {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .navbar-menu .navbar-nav li {
            position: relative;
        }

        .navbar-menu .navbar-nav li a {
            padding: 0.5rem 1rem;
            color: #3c4250;
            font-family: "Montserrat", sans-serif;
        }

        .navbar-menu .navbar-nav li a:hover {
            color: #66f;
        }

        .navbar-menu .navbar-nav .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            display: none;
            z-index: 9999;
        }

        .navbar-menu .navbar-nav li:hover .dropdown {
            display: block;
        }

        .navbar-menu .navbar-nav .dropdown li a {
            padding: 0.5rem 1rem;
            display: block;
            color: #3c4250;
        }

        .navbar-menu .navbar-nav .dropdown li a:hover {
            color: #66f;
        }

        @media (max-width: 768px) {
            .navbar-toggler {
                display: block;
            }

            .navbar-menu {
                display: none;
                flex-direction: column;
                width: 100%;
                text-align: center;
            }

            .navbar-menu.active {
                display: flex;
            }

            .navbar-menu .navbar-nav {
                flex-direction: column;
                gap: 0;
            }

            .navbar-menu .navbar-nav li a {
                border-bottom: 1px solid #eceef3;
            }

            .navbar-menu .navbar-nav .dropdown {
                position: relative;
                box-shadow: none;
            }
        }

        main {
            padding: 2rem;
        }

        main h1 {
            font-family: "Montserrat", sans-serif;
            font-size: 2rem;
            color: #66f;
        }

        main p {
            font-size: 1rem;
            color: #3c4250;
        }

        .scene {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 2rem auto;
        }
        /* Additional CSS styles for scene content */
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-header">
                <h4>Admin Dashboard</h4>
                <button class="navbar-toggler" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="navbar-center">
                <a href="vue_indexadmin.php">Retourner à l'accueil</a>
            </div>
            <div class="navbar-menu" id="navbarMenu">
                <ul class="navbar-nav">
                    <li>
                        <a href="#">Locataire</a>
                        <ul class="dropdown">
                            <li><a href="../Controlleur/c_locataire.php">Insert</a></li>
            
                            <li><a href="vue_select_locataire.php">Consult</a></li>
                        </ul>
                    </li>   
                    <li>
                        <a href="">Appartements</a>
                        <ul class="dropdown">
                            <li><a href="../Controlleur/c_appartement.php">Insert</a></li>
                          
                            <li><a href="vue_select_appartements.php">Consult</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Proprietaires</a>
                        <ul class="dropdown">
                            <li><a href="#">Insert</a></li>
                            <li><a href="#">Delete</a></li>
                            <li><a href="#">Consult</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Contrat de réservation</a>
                        <ul class="dropdown">
                            <li><a href="../Controlleur/c_contratres.php">Créer</a></li>
                            <li><a href="vue_select_contratres.php">Consulter</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h1>Bienvenue sur la page Admin</h1>
        <p>Bonjour monsieur "inserer nom et prenom"</p>

       
</body>
</html>
