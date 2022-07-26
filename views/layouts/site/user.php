<?php

if (!$this->title) {
    $this->title = "{{site-name}}";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $this->title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/default/img/favicon.png" rel="icon">
    <link href="/assets/default/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/user/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/user/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/user/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/user/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/user/css/style.css" rel="stylesheet">

</head>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/votes" class="logo d-flex align-items-center">
                <img src="/assets/default/img/logo.png" alt="" />
                <span class="d-none d-lg-block">{{site-name}}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <?php

                use kilyte\Application;

                if (Application::isGuest()) : ?>
                    <li><a class="nav-link" href="/login">Login</a></li>
                    <li><a class="nav-link" href="/register">Register</a></li>
                <?php else : ?>
                    <li><a class="nav-link" href="/votes"><?php echo Application::$app->user->getDisplayName() ?></a></li>
                    <li><a class="nav-link" href="/logout">Logout</a></li>
                <?php endif; ?>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/votes">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item"> <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#" aria-expanded="false"> <i class="bi bi-journal-text"></i><span>Submit Votes</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li> <a href="/votes/candidates/1"> <i class="bi bi-circle"></i><span>President</span> </a></li>
                    <li> <a href="/votes/candidates/2"> <i class="bi bi-circle"></i><span>Governor</span> </a></li>
                    <li> <a href="/votes/candidates/3"> <i class="bi bi-circle"></i><span>Senator</span> </a></li>
                    <li> <a href="/votes/candidates/4"> <i class="bi bi-circle"></i><span>Women Rep</span> </a></li>
                    <li> <a href="/votes/candidates/5"> <i class="bi bi-circle"></i><span>MP</span> </a></li>
                    <li> <a href="/votes/candidates/6"> <i class="bi bi-circle"></i><span>MCA</span> </a></li>
                </ul>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        {{content}}
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/user/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/user/vendor/chart.js/chart.min.js"></script>
    <script src="/assets/user/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/user/vendor/quill/quill.min.js"></script>
    <script src="/assets/user/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/user/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/user/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/user/js/main.js"></script>

</body>

</html>