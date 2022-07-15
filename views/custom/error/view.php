<?php $this->title = $error['code'] . " - Error" ?>


<div class="container">
    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <h1><?= $error['code'] ?></h1>
                <br />
                <p><?= $error['message'] ?></p>
            </div>
            <?php
            $debug = "false";
            if (isset($_ENV["DEBUG"])) {
                $debug = $_ENV["DEBUG"];
            }
            if (strtolower($debug) == 'true') {
                echo "<hr />";
                foreach ($error['trace'] as $rs) {
                    $file = $rs['file'];
                    $line = $rs['line'];
                    $func = $rs['function'];
                    $class = $rs['class'];
                    $args = $rs['args'];
            ?>
                    <div class="row">
                        <div class="col-12">
                            <p><strong>File : </strong> <?= $file ?></p>
                        </div>
                        <div class="col-12">
                            <p><strong>Line : </strong> <?= $line ?></p>
                        </div>
                        <div class="col-12">
                            <p><strong>Function : </strong> <?= $func ?></p>
                        </div>
                        <div class="col-12">
                            <p><strong>Class : </strong> <?= $class ?></p>
                        </div>
                        <div class="col-12">
                            <p><strong>Args </strong></p>
                            <?php print_r($args); ?>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                    </div>

            <?php
                }
            }
            ?>



        </div>


        <div class="col-12">
            <a class="btn btn-primary" href="/">Back to home</a>
        </div>




    </section>
</div>