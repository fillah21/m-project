<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-PROJECT|Mahasiswa</title>
    <link rel="stylesheet" href="folder_css/mhs.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <!--SIDEBAR MAHASISWA-->
    <div class="container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header justify-content-between">
                <a href="#">
                    <img class="mb-4" src="image/Logo.png" alt="" style="width: 50px;">
                    <span class="text">M-PROJECT</span>
                </a>
            </div>

            <ul class="list-unstyled">
                <li class="active">
                    <a href="#" class="py-2 d-block"><i class="bi bi-house-door-fill"></i>
                        <span class="text"> Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="font py-2 d-block"><i class="bi bi-bookmark-star-fill"></i> 
                        <span class="text"> Akademik</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="font py-2 d-block"><i class="bi bi-person-lines-fill"></i> 
                        <span class="text"> Biodata</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="font py-2 d-block"><i class="bi bi-gear-wide"></i> 
                        <span class="text"> About</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--CONTENT MAHASISWA-->
        <div class="content">
            <!--HAMBURGER-->
            <div id="menu-button">
                <input type="checkbox" id="menu-checkbox">
                    <label for="menu-checkbox" id="m-label">
                        <div id="hamburger"></div>
                    </label>
            </div>
        </div>
    </div>

    <!--Javascript-->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="folder_js/script-mhs.js"></script>
</body>
</html>