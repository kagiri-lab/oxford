<?php

use kilyte\form\Form;

$this->title = "Edit User - {{site-name}}";

?>

<div class="pagetitle">
    <h1>Edit</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/user">Home</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit User</h5>
                    <?php $form = Form::begin('', 'post', ['class' => 'row g-3 needs-validation']) ?>
                    <div class="col-6">
                        <?php $form->field($model, 'firstname')->isRequired()->show() ?>
                    </div>
                    <div class="col-6">
                        <?php $form->field($model, 'lastname')->isRequired()->show() ?>
                    </div>
                    <?php $form->field($model, 'email')->emailField()->isRequired()->show() ?>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">
                            Submit
                        </button>
                    </div>
                    <?php Form::end() ?>
                </div>
            </div>
        </div>

    </div>
</section>