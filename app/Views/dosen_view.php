<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dosen</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h3>Data Dosen</h3>
    
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
    <a href="/mahasiswa" type="button" class="btn btn-success mb-2" >Data Mahasiswa</a>
    <a href="/login" type="button" class="btn btn-success mb-2" >Logout</a>
   

    <hr>
    <form method="GET" action="" class="form-group">
    <div class="row">
    	<div class="col-lg-12">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" name="cari" placeholder="Mencari Data Berdasarkan Nama">
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" type="Submit">CARI DATA</button>
			  </div>
			</div>
		</div>
    </div>
    </form>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Dosen</th>
                    <th>No Telpon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($dosen as $row):?>
                <tr>
                    <td><?=$row['nama_dosen'];?></td>
                    <td><?=$row['no_telp'];?></td>
                    <td><?=$row['alamat'];?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-nip="<?=$row['nip'];?>" data-nama="<?=$row['nama_dosen'];?>" data-telp="<?=$row['no_telp'];?>" data-alamat="<?=$row['alamat'];;?>">Edit</a>
                        <a href="<?= base_url('dosen/delete/'.$row['nip']);?>" onclick="javascript:return confirm('Apakah ingin menghapus data barang ?')"class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?= $pager->Links() ?>
 
    </div>
    
    <form action="/dosen/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama Dosen</label>
                    <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen">
                </div>
                 
                <div class="form-group">
                    <label>No Telpon</label>
                    <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telpon">
                </div>
 
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
   
    <form action="/dosen/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label>Nama Dosen</label>
                    <input type="text" class="form-control nama_dosen" name="nama_dosen" placeholder="Nama Dosen">
                </div>
                 
                <div class="form-group">
                    <label>No Telpon</label>
                    <input type="text" class="form-control no_telp" name="no_telp" placeholder="Nomor Telpon">
                </div>
 
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat">
                </div>
        
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="nip" class="nip">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h2">Are you sure?</h2>
        <p>The data will be deleted and lost forever</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
 
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
 
        $('.btn-edit').on('click',function(){

            const nip = $(this).data('nip');
            const nama = $(this).data('nama_dosen');
            const telp = $(this).data('no_telp');
            const alamat = $(this).data('alamat');

            $('.nip').val(nip);
            $('.nama_dosen').val(nama);
            $('.no_telp').val(telp);
            $('.alamat').val(alamat).trigger('change');
            $('#editModal').modal('show');
        });

        $('.btn-delete').on('click',function(){
       
            const id = $(this).data('nip');
        
            $('.nip').val(nip);
          
            $('#deleteModal').modal('show');
        });
       
    });
</script>
</body>
</html>