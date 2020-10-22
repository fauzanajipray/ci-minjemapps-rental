<div class="container box">
  <div class="card bg-light">
    <article class="card-body mx-auto text-center" style="max-width: 400px;">
      <h3><i class="fa fa-lock fa-4x"></i></h3>
      <h2 class="text-center">Forgot Password?</h2>
      <p>You can reset your password here.</p>
      
        <form id="register-form" role="form" autocomplete="off" class="form" method="post">
          <div class="form-group">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input name="" class="form-control" placeholder="Email address" type="email">
            </div> 
            
          </div>
          <div class="form-group">
            <a href="<?= base_url('auth')?>">
              <span  class="btn btn-lg btn-danger " >Cancel</span>
            </a>
            <input name="recover-submit" class="btn btn-lg btn-primary " value="Reset Password" type="submit">
          </div>
          <input type="hidden" class="hide" name="token" id="token" value=""> 
        </form>
    </article>
  </div> 
</div> 
