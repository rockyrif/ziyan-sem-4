<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>

    <style>
        .nav-group {
            position: fixed;
            top: 0%;
            width: 100%;
            z-index: 3;
            background-color: transparent;

        }

        .responsive-brand-item {
            color: #000066;
            font-family: "PF Din Stencil W01 Bold";
        }


        .nav-link,
        .outer-button,
        .offcanvas-button {
            font-family: "PF Din Stencil W01 Bold";
        }

        .nav-link-home {
            color: #000066;
        }

        .nav-link-about {
            color: #91CC00;
        }

        .kalmunai{
            color: #91CC00;
        }

        .nav-link-contact {
            color: #000066;
        }

        .tennis {
            color: #91CC00;
        }

        @media only screen and (min-width: 992px) {


            .navbar-nav-outer {
                list-style: none;
                display: flex;
                align-items: center;
                margin-left: auto;
            }

            .nav-item-outer {
                padding: 10px;
            }

            .carousel-content {
                width: 65%;
            }

        }

        @media only screen and (max-width: 992px) {


            .navbar-nav-outer {
                display: none;
            }

        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        @media only screen and (max-width: 480px) {
            .brand-br {
                display: block;
            }
        }

        .navbar-toggler {
            background-color: #198754;
        }

        .change-navbg-onScroll-in {
            background-color: white;
            transition: all 1s ease-in;
        }

        .change-navbg-onScroll-out {
            background-color: transparent;
            transition: all 1s ease-in-out;
        }

        .navbar-nav {
            align-items: center;
        }
    </style>


</head>

<body>

    <!-- Navbar start -->
    <div class="nav-group navbar-dark" id="navbar">

        <nav class="navbar">
            <div class="container">
                <a href="" class="navbar-brand fs-4">
                    <img src="/ziyan-sem-4/images/logo.png" alt="" width="70">
                    <span class="container responsive-brand-item">
                        Zahira college<span class="brand-br"><span class="kalmunai"> Kalmunai </span> 
                </a>

                <!-- <div class="navbar-nav-outer ">

                    <div class="nav-item-outer">
                        <a href=""
                            class="nav-link nav-link-about">ABOUT SCHOOL</a>
                    </div>


                </div> -->

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#myNavBar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end offcan" tabindex="-1" id="myNavBar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">


                        <ul class="navbar-nav justify-content-end flex-grow-1">

                           
                        <?php if (isset($_SESSION["username"]) && $_SESSION["privilage"] === "teacher") : ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ADMIN DASHBORD
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/ziyan-sem-4/pages/admin-manager/admin-manager.php">Admin manager</a></li>
                                    </ul>

                                </li>
                            <?php endif; ?>
                            

                           
                            <li class="nav-item">
                                <a href="/ziyan-sem-4/page/about-school/about-school.php"
                                    class="nav-link nav-link-about">ABOUT SCHOOL</a>
                            </li>

                            <?php if (isset ($_SESSION['username'])): ?>
                                <li class="nav-item ">
                                    <button type="button" class="btn btn-danger offcanvas-button"
                                        onclick="window.location.href='/ziyan-sem-4/pages/login-and-signup-page/log-out.php'">LOG
                                        OUT</button>
                                </li>
                            <?php endif; ?>


                        </ul>

                    </div>
                </div>
            </div>
        </nav>
           <!-- Aleart start -->
           <?php
        if (isset($_SESSION['response'])) {
            echo '<div id="alertContainer" class="alert alert-warning container alert-dismissible fade show" role="alert">
            ' . $_SESSION['response'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            unset($_SESSION['response']);
        }
        ?>
        <script>
            // Automatically remove the alert after 4 seconds
            setTimeout(function() {
                var alertContainer = document.getElementById('alertContainer');
                if (alertContainer) {
                    alertContainer.remove();
                }
            }, 4000);
        </script>

        <!-- Aleart end -->
    </div>

<script src="/ziyan-sem-4/components/navbar/navbar.js"></script>

    <!-- Navbar end -->
</body>

</html>