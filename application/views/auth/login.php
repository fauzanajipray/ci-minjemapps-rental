<div class="container first">
    
    <div class="box">
        <div class="row">
            <div class="col-xs">
                <div id="corouselLogin" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators" style="position: fixed; bottom: -8vh;">
                        <li data-target="#corouselLogin" data-slide-to="0" class="active"></li>
                        <li data-target="#corouselLogin" data-slide-to="1"></li>
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class ="corousell">RENT A VEHICLE ANYWARE</div>
                            <p class="pcorousel">FIND YOUR <span style="color: #ff5353;font-weight: 800;">PERFECT CAR</span></p>
                        </div>
                        <div class="carousel-item">
                            <div class ="corousell">RENT A VEHICLE ANYWARE</div>
                            <p class="pcorousel">FIND YOUR <span style="color: #ff5353;font-weight: 800;">PERFECT MOTORCYCLE</span></p>
                        </div>
                    </div>                    
                </div>  
                <form class="" method="post" action="
                <?= base_url('auth');?>">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" id="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email address" type="text">
                        </div>
                        <small class="text-danger" ><?= form_error('email'); ?> </small>
                    </div>
                    <div class="form-group mb-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" id="password" class="form-control" placeholder="Password" type="password">
                        </div>
                        <small class="text-danger" ><?= form_error('password'); ?> </small>
                    </div> 
                    <a href="<?=base_url(); ?>auth/reset"><p class="text-right text-light" style="font-size: 16px;">Forgot Password?</p></a>

                    <button type="submit" class="btn bg-merah text-light mt-1 mb-1 j" style="width:100%;">Login</button>
                    <a href="<?=base_url(); ?>auth/registration"><p class="text-left text-light" style="font-size: 16px;">Don't have an account?</p></a>
                </form>
            </div>
        </div>
    </div>
</div>