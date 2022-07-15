<?php

use kilyte\form\Form;

$this->title = "{{site-name}}"

?>

<div class="row g-3 mb-3">
    <div class="col-12">
        <div class="row g-3">
            <div class="col-12">
                <div class="card bg-transparent-50 overflow-hidden">
                    <div class="card-header position-relative">

                        <div class="position-relative z-index-2">
                            <div>
                                <h3 class="text-primary mb-1">Register Agent</h3>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="row g-3">
                    <?php
                    $registerForm = Form::begin('', 'POST', ['class' => 'row g-3 needs-validation']);
                    ?>
                    <div class="col-md-6">
                        <div class="card h-md-100 ecommerce-card-min-width">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">Personal Infomation</h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'firstname')->isRequired()->show(); ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'midname')->show(); ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'lastname')->isRequired()->show(); ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'nationalid')->show(); ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'user')->isRequired()->show(); ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'station')->show(); ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">County</label>
                                        <select name="county" class="form-select">
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Constituency</label>
                                        <select name="constituency" class="form-select">
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Ward</label>
                                        <select name="ward" class="form-select">
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mt-4">
                                        <input class="btn btn-primary" type="submit" value="Submit" />
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $registerForm->end(); ?>

                </div>
            </div>
        </div>
    </div>

</div>