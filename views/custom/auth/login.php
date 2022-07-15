<?php

use kilyte\form\Form;

$this->title = "Login - {{site-name}}";

?>

<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="/assets/default/img/logo.png" alt="" />
                                <span class="d-none d-lg-block">{{site-name}}</span>
                            </a>
                        </div>
                        <!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">
                                        Login to Your Account
                                    </h5>
                                    <p class="text-center small">
                                        Enter your email address & password to login
                                    </p>
                                </div>

                                <div class="row gy-4 align-center">
                                    <div class="d-flex justify-content-center">

                                        <?php $form = Form::begin('', 'post', ['class' => 'row g-3 needs-validation']) ?>
                                        <?php $form->field($model, 'email')->emailField()->isRequired()->show() ?>
                                        <?php $form->field($model, 'password')->passwordField()->isRequired()->show() ?>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">
                                                Login
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">
                                                Don't have account?
                                                <a href="/register">Create an account</a>
                                            </p>
                                        </div>
                                        <?php Form::end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!-- End #main -->