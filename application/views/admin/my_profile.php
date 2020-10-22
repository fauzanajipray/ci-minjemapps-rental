<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3" style="max-width: 600px; ">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url();?>assets/img/profile/<?= $user['image']; ?>" class="card-img-top" style="">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><?= $user['name']; ?></h5>
            <p class="card-text"><?= $user['email']; ?></p>
            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created'])?></small></p>
            <a href="<?= base_url('admin/edit');?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit" ></i> Edit</a>
        </div>
        </div>
    </div>
    </div>

</div>