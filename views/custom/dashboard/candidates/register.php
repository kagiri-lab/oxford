<?php

use app\controllers\valiables\LocationsController;
use kilyte\form\Form;

$this->title = "Register Candindate - {{site-name}}"

?>

<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">

        <div class="d-flex mb-1"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">

                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">
                        Register Candindate
                    </span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>

            </div>
        </div>

        <div class="col-lg-12">
            <div class="row g-3">
                <?php
                $registerForm = Form::begin('', 'POST', ['class' => 'row g-3 needs-validation']);
                ?>
                <div class="col-12">
                    <div class="card h-md-100 ecommerce-card-min-width">
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
                                    <label class="form-label">Position</label>
                                    <select name="position" id="positionSelect" onselect="checkthh" class="form-select">
                                        <option value="1">President</option>
                                        <option value="2">Governor</option>
                                        <option value="3">Senetor</option>
                                        <option value="4">Women Rep</option>
                                        <option value="5">MP</option>
                                        <option value="6">MCA</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3"><label for="county">County</label>
                                        <select class="form-select js-choice" id="selectCounty" size="1" required="required" name="county" data-options='{"removeItemButton":true,"placeholder":true}'>
                                            <option value="">Select County...</option>
                                            <?php
                                            $counties = LocationsController::getCounties();
                                            foreach ($counties as $countyID => $countyName)
                                                echo "<option value='$countyID'>$countyName</option>";
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">Please select one</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3"><label for="county">Constituency</label>
                                        <select id="selectConstituency" class="form-select" required="required" name="constituency">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3"><label for="county">Ward</label>
                                        <select id="selectWard" class="form-select" required="required" name="ward">
                                        </select>
                                    </div>
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