<div class="container-fluid">
    <div class="row">
        <div class="pr-4 pl-4 col-md-12">
            <div class="card content-header">
                <div class="container text-center p-3 ">
                    <h3><?= $city[0]->province_name?></h3>
                </div>

            </div>
        </div>
        <?php
        
        if($car == "0"){?>
            <div class="pr-4 pl-4 mt-4
            mb-4 col-md-12">
                <div class="alert alert-danger text-center" role="alert">
                    <p>Sorry, cars in the area are now unavailable :( </p>    
                    <p>Please search again.</p>
                    <p><a href="<?= base_url('user')?>">Back</a></p>
                </div>
            </div>
        <?php
        }else{
        foreach ($car as $row) { ?>
            <div class="p-4 col-md-6 col-lg-4 col-xl-3">
                <div class="card ">
                    <img src="<?php echo base_url('assets/img/car/').$row->img_car; ?>" class="card-img-top car-img" alt="...">
                    <div class="card-body pb-5">
                        <h5 class="card-title"><?= $row->car_name?></h5>
                        <p class="card-text mb-5"><?= $row->description?></p>
                        <div class="card-footer mt-3" style="position: absolute; bottom: 0px; left:0px; width: 100%; background-color: #f4f4f4;">
                            <div class="row">
                                <div class="col-6 ">
                                    <h7>Rp.</h7>
                                    <h5><?= $row->price?><span class="font-weight-normal" style="font-size: 11px;">/day</span></h5>
                                    
                                </div>
                                <div class="col-6 ">
                                    <a href="<?= base_url('user/');?>rent_confirm/<?= $row->idcar;?>" class="float-right btn bg-merah btn-lg btn-block 
                                    text-center text-uppercase align-items-center justify-content-center" id="btn-rent">Rent</a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        <?php }} ?>
    </div>
</div>

