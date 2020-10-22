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
                    btn-sm mb-2"><span class="fa fa-plus"></span> Add User</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No.Telp</th>
                            <th>Image</th>
                            <th>Date Created</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot hidden>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No.Telp</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Date Created</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                   
                    foreach ($users as $rec) { ?>
                        <tr>
                            <td><?= $rec->name; ?></td>
                            <td><?= $rec->email; ?></td>
                            <td><?= $rec->no_telp; ?></td>
                            <td><?= $rec->image; ?></td>
                            <td><?= date('d F Y',$rec->date_created); ?></td>
                            <td class="text-center"><a class="btn btn-sm btn-info" href="#" title="Edit Data"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('admin/delete_user/') . $rec->id?>" onclick="return confirm(' Data Yakin Mau dihapus ?');" title="Hapus Data"><span class="fa fa-trash"></span></a>
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
                <h5 class="modal-title" id="myModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Understood</button>
                </div>
            </form>
        </div>
    </div>
    </div>
            