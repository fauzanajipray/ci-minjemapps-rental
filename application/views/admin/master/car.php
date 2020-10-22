<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $subtitle; ?></h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $subtitle; ?></li>
        </ol>
    </nav>
    <div class="mb-3">
          <?= $this->session->flashdata('message'); ?>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <button data-toggle="modal" data-target="#myModal" class="btn btn-success
                    btn-sm mb-2"><span class="fa fa-plus"></span> Add Car</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Car Name</th>
                            <th>Brand</th>
                            <th>License Plat</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot hidden>
                        <tr>
                            <th>Car Name</th>
                            <th>Brand</th>
                            <th>License Plat</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                   
                    foreach ($car as $rec) { ?>
                        <tr>
                            <td><?= $rec->car_name; ?></td>
                            <td><?= $rec->merk; ?></td>
                            <td><?= $rec->no_pol; ?></td>
                            <td><?= $rec->img_car; ?></td>
                            <td><?= $rec->price; ?></td>
                            <td><?php if($rec->status == 1){ echo "IN Rental";}else{echo "Available";} ?></td>
                            <td class="text-center"><a class="btn btn-sm btn-info" href="#" title="Edit Data"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('admin/delete_car/') . $rec->idcar; ?>" onclick="return confirm(' Data Yakin Mau dihapus ?');" title="Hapus Data"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label text-center">Picture</div>
                        <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Car Name">
                        <small class="text-danger"><?= form_error('name'); ?> </small>
                    </div>
                    <div class="form-group">
                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand">
                        <small class="text-danger"><?= form_error('brand'); ?> </small>
                    </div>
                    <div class="form-group">
                        <input type="text" name="license" class="form-control" id="license" placeholder="License Plat">
                        <small class="text-danger"><?= form_error('license'); ?> </small>
                    </div>
                    <div class="form-group">
                        <input type="text" name="colour" class="form-control" id="colour" placeholder="Colour">
                        <small class="text-danger"><?= form_error('colour'); ?> </small>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                        <small class="text-danger"><?= form_error('price'); ?> </small>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="description" rows="3">Deskription</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
            