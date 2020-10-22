
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Rent</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user')?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Rent</li>
        </ol>
    </nav>    
    <div class="row">
        <?php foreach ($car as $row) { ?>
        <div class="p-4 col-md-6 col-lg-6 col-xl-4">
            <div class="card p-2">
                <div class="row no-gutters">
                    <?php $foto = base_url('assets/img/car/').$row->img_car;?>
                    <div class="p-3 col-md-12 col-lg-4" style="
                        background-image:url('<?= $foto;?>');
                        background-size: 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                        " id="wasingsong">
                    </div>
                    <div class="col-md-12 col-lg-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->car_name?></h5>
                        <p class="card-text"><?= $row->description?></p>
                        <p class="card-text"><small class="text-muted"><?= $row->datepick; ?> - <?= $row->datepick; ?></small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>