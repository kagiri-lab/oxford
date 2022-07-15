<?php

if (!$this->title) {
    $this->title = "{{site-name}}";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?= $this->title ?></title>
    <meta content="" name="description" />

    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="/assets/default/img/favicon.png" rel="icon" />
    <link href="/assets/default/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets/site/vendor/aos/aos.css" rel="stylesheet" />
    <link href="/assets/site/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/site/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/site/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/assets/site/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="/assets/site/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/assets/site/css/style.css" rel="stylesheet" />
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets/default/img/logo.png" alt="" />
                <span>{{site-name}}</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/votes">Submit Votes</a></li>

                    <?php

                    use kilyte\Application;

                    if (Application::isGuest()) : ?>
                        <li><a class="nav-link" href="/login">Login</a></li>
                    <?php else : ?>
                        <li>
                            <a class="nav-link" href="/logout">
                                <?php echo Application::$app->user->getDisplayName() ?> (Logout)
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>

    {{content}}



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/site/vendor/purecounter/purecounter.js"></script>
    <script src="/assets/site/vendor/aos/aos.js"></script>
    <script src="/assets/site/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/site/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/site/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/site/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/site/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/site/js/main.js"></script>
</body>

</html>