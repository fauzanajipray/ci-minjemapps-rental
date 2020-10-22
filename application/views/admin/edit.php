<div class="container-fluid">
    
    <h3 class="text-dark mb-3">Edit Profile</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('admin/myprofile')?>">My Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
    </nav>
    <div class="card mb-5" style="max-width: 600px;">
        <div class="div row card-body">
            <div class="div col-lg">
                <?= form_open_multipart('admin/edit') ?>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input readonly type="email" name="email" class="form-control" id="email" value="<?= $user['email'];?>">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full name</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" name="name" id="name" value="<?= $user['name'];?>">
                        <small class="text-danger"><?= form_error('name'); ?> </small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $user['image'];?>"  class="img-thumbnail" >
                            </div>
                            <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    

</div>
<script >
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $('.custom-file-label').addClass("selected").html(fileName);
    })
</script>