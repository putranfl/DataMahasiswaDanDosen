<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h3>Data Mahasiswa</h3>
    
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
    <a href="/dosen" type="button" class="btn btn-success mb-2" >Data Dosen</a>
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
                    <th>Nama Mahasiswa</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>No Telpon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($mahasiswa as $row):?>
                <tr>
                    <td><?=$row['nama_mahasiswa'];?></td>
                    <td><?=$row['jurusan'];?></td>
                    <td><?=$row['kelas'];?></td>
                    <td><?=$row['no_telp'];?></td>
                    <td><?=$row['alamat'];?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-nim="<?=$row['nim'];?>" data-nama="<?=$row['nama_mahasiswa'];?>" data-jurusan="<?=$row['jurusan'];?>" data-kelas="<?=$row['kelas'];?>" data-telp="<?=$row['no_telp'];?>" data-alamat="<?=$row['alamat'];;?>">Edit</a>
                        <a href="<?= base_url('mahasiswa/delete/'.$row['nim']);?>" onclick="javascript:return confirm('Apakah ingin menghapus data?')"class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?= $pager->Links() ?>
 
    </div>
     

    <form action="/mahasiswa/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Nama Mahasiswa">
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" class="form-control" name="jurusan" placeholder="Jurusan">
                </div>
 
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" class="form-control" name="kelas" placeholder="Kelas">
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
   
    <form action="/mahasiswa/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" class="form-control nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Mahasiswa">
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" class="form-control jurusan" name="jurusan" placeholder="Jurusan">
                </div>
 
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" class="form-control kelas" name="kelas" placeholder="Kelas">
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
                <input type="hidden" name="nim" class="nim">
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
            
            const nim = $(this).data('nim');
            const mahasiswa = $(this).data('nama_mahasiswa');
            const jurusan = $(this).data('jurusan');
            const kelas = $(this).data('kelas');
            const telp = $(this).data('no_telp');
            const alamat = $(this).data('alamat');
           
            $('.nim').val(nim);
            $('.nama_mahasiswa').val(mahasiswa);
            $('.jurusan').val(jurusan);
            $('.kelas').val(kelas);
            $('.no_telp').val(telp);
            $('.alamat').val(alamat).trigger('change');
            
            $('#editModal').modal('show');
        });
 
      
        $('.btn-delete').on('click',function(){
          
            const id = $(this).data('nim');
           
            $('.nim').val(nim);
         
            $('#deleteModal').modal('show');
        });
       
    });
</script>
</body>
</html>