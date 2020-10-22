<? print_r($count_user); ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('admin/user');?>" style="text-decoration: none;">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">User</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user[0]->jml; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('admin/car');?>" style="text-decoration: none;">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-success text-uppercase mb-1">Car</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_car[0]->jml; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-car fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('admin/city');?>" style="text-decoration: none;">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-info text-uppercase mb-1">City</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_city[0]->jml; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-city fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('admin/location');?>" style="text-decoration: none;">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Location</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_location[0]->jml; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-map-marker fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        

</div>