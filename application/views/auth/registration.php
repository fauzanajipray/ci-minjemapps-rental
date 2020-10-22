<div class="container box">
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 500px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <p>
            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
        <form  action="<?= base_url(); ?>auth/registration" method="POST">
            <div class="form-group ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" id="name" value="<?= set_value('name');?>" class="form-control" placeholder="Full name" type="text" value >
                </div>
                <small class="text-danger"> <?= form_error('name'); ?> </small>
            </div>
            <div class="form-group ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" id="email" value="<?= set_value('email');?>" class="form-control" placeholder="Email address" type="text" >
                </div>
                <small class="text-danger"><?= form_error('email'); ?> </small>
            </div>
            <div class="form-group ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 90px;" name="code_region">
                        <option selected value="+62">+62</option>
                        <option value="+972">+972</option>
                        <option value="+198">+198</option>
                        <option value="+701">+701</option>
                        <option value="+701">+1</option>
                    </select>
                    <input name="no_telp" id="no_telp" value="<?= set_value('no_telp');?>"class="form-control" placeholder="Phone number" type="text" >
                </div> 
                <small class="text-danger"><?= form_error('no_telp'); ?> </small>
            </div>
            <div class="form-group">
                <div class="row" style="margin-bottom: -15px;">
                    <div class="form-group input-group col-sm-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password1" id="password1" class="form-control" placeholder="Create password" type="password" >
                    </div>
                    <div class="form-group input-group col-sm-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password2" id="password2" class="form-control" placeholder="Repeat password" type="password" >
                    </div>
                </div>
                <small class="text-danger"><?= form_error('password1'); ?> </small>
            </div>
            <div class="form-group input-group" hidden>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="Repeat password" type="password">
            </div>                                       
            <div class="form-group">
                <button type="submit" class="btn bg-merah btn-block"> Create Account  </button>
            </div>       
            <p class="text-center">Have an account? <a href="<?= base_url();?>auth">Log In</a> </p>                                                                 
        </form>
    </article>
    </div> 
</div> 