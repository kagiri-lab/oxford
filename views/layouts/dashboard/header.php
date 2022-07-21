<?php

if (!$this->title) {
    $this->title = "{{site-name}}";
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?= $this->title ?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/default/img/apple-touch-icon.png">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="/assets/default/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/default/img/favicons/favicon-16x16.png"> -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/default/img/favicon.png">
    <link rel="manifest" href="/assets/dashboard/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/assets/dashboard/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/dashboard/js/config.js"></script>
    <script src="/assets/dashboard/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="/assets/dashboard/vendors/choices/choices.min.js"></script>




    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->


    <link href="/assets/dashboard/vendors/choices/choices.min.css" rel="stylesheet" />

    <link href="/assets/dashboard/vendors/choices/choices.min.css" rel="stylesheet">
    <link href="/assets/dashboard/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="/assets/dashboard/vendors/dropzone/dropzone.min.css" rel="stylesheet">

    <link href="/assets/dashboard/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/assets/dashboard/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/dashboard/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/dashboard/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/dashboard/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/dashboard/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>