<?php

$this->title = 'All Users - {{site-name}}';


?>

<div class="pagetitle">
  <h1>All Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/user">Home</a>
      </li>
      <li class="breadcrumb-item active">All Users</li>
    </ol>
  </nav>
</div>

<section class="section">

  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="card">

        <div class="card-body">

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($model as $md) {
              ?>
                <tr>
                  <th scope="row"><a href="all/<?= $md['id'] ?>">#<?= $md['id'] ?></a></th>
                  <td><?= $md['firstname'] . ' ' . $md['lastname'] ?></td>
                  <td><?= $md['email'] ?></td>
                  <td><span class="badge bg-<?= ($md['status']) ? 'success' : 'warning' ?>"><?= ($md['status'] == 0) ? 'In-active' : 'Active' ?></span></td>
                </tr>

              <?php } ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>
</section>