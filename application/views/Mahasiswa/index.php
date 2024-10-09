<div class="container">
	<div class="row mt-5">
		<div class="col mt-4">

			<!-- awal validasi error -->
			<!-- <?php if(validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<?= validation_errors (); ?>
				</div>
			<?php endif; ?> -->
			<!-- akhir validasi error --> 

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			  Tambah Data
			</button>

			<!-- awal flash data -->
			<?php if($this->session->flashdata('flash')) : ?>
					<div class="row mt-3">
						<div class="col-md-8">
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  Data Mahasiswa<strong> Berhasil </strong><?= $this->session->flashdata('flash');  ?>
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<!-- akhir flash data -->

			<div class="row mt-3">
				<div class="col-md-12">
					<form action="" method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="cari data mahasiswa..." name="keyword">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit">cari</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <form action="<?= base_url('mahasiswa') ?>" method="post">

			        <div class="form group">
			        	<label for="kode">Kode</label>
			        	<input type="numeric" name="kode" class="form-control" id="kode" placeholder="Masukan Kode">
			        	<small class="form-text text-danger"><?= form_error('kode') ?></small>
			        </div>

			        <div class="form group">
			        	<label for="matakuliah">Mata kuliah</label>
			        	<input type="text" name="matakuliah"class="form-control" id="matakuliah" placeholder="Masukan mata kuliah">
			        	<small class="form-text text-danger"><?= form_error('matakuliah') ?></small>
			        </div>

			        <div class="form group">
			        	<label for="sks">SKS</label>
			        	<input type="numeric" name="sks" class="form-control" id="sks" placeholder="Masukan SKS">
			        	<small class="form-text text-danger"><?= form_error('sks') ?></small>
			        </div>

			        <div class="form group">
			        	<label for="semester">Semester</label>
			        	<input type="numeric" name="semester"class="form-control" id="semester" placeholder="Masukan Semester">
			        	<small class="form-text text-danger"><?= form_error('semester') ?></small>
			        </div>

			        <div class="form group">
			        	<label for="jurusan">Jurusan</label>
			        	<select class="form-select" id="jurusan" name="jurusan">
			        		<option value="">Pilihan</option>
			        		<!-- untuk memanggil database jurusan -->
			        		<?php foreach($jurusan as $j): ?>
			        			<option><?php echo $j['namajurusan']; ?></option>
			        		<?php endforeach; ?>
			        	</select>
			        	<small class="form-text text-danger"><?= form_error('jurusan') ?></small>
			        	<!-- <input type="text" name="jurusan"class="form-control" id="jurusan" placeholder="Masukan Jurusan"> -->
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>
			    </form>
			    </div>
			  </div>
			</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Kode</th>
      <th scope="col">Matakuliah</th>
      <th scope="col">SKS</th>
      <th scope="col">Semester</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  		<!-- foreach adalah perulangan, mirip if else, if while -->
    <?php foreach ($mahasiswa as $mhs): ?>
    	<tr>
    		<th scope="row"><?=$mhs['kode']; ?></th>
    		<td><?=$mhs['matakuliah']; ?></td>
    		<td><?=$mhs['sks']; ?></td>
    		<td><?=$mhs['semester']; ?></td>
    		<td><?=$mhs['jurusan']; ?></td>
    		<td>
    			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $mhs ['id']; ?>">
			  	Ubah
				</button>
    			<a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin');">Hapus</a>
    		</td>
    	</tr>
        <?php endforeach;?>
  </tbody>
</table>
		</div>
	</div>
</div>

<!-- awal modal edit -->
<?php $no = 0 ; foreach ($mahasiswa as $mhs): $no++; ?>
			<div class="modal fade" id="editModal<?= $mhs['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <div class="modal-header">
			        <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      
			      			<!-- formopenmultipart(hidden) fungsinya untuk menyembunyikan id -->
			      <?= form_open_multipart('mahasiswa/ubah'); ?>
			      <input type="hidden" name="id" value="<?= $mhs['id']; ?>"> 
			        <div class="form group">
			        	<label for="kode">Kode</label>
			        	<input type="numeric" name="kode" class="form-control" value="<?= $mhs ['kode']; ?>" id="kode" placeholder="Masukan Kode" readonly>
			        </div>

			        <div class="form group">
			        	<label for="matakuliah">Mata kuliah</label>
			        	<input type="text" name="matakuliah"class="form-control" value="<?= $mhs ['matakuliah']; ?>" id="matakuliah" placeholder="Masukan mata kuliah">
			        </div>

			        <div class="form group">
			        	<label for="sks">SKS</label>
			        	<input type="numeric" name="sks" class="form-control" value="<?= $mhs ['sks']; ?>" id="sks" placeholder="Masukan SKS">
			        </div>

			        <div class="form group">
			        	<label for="semester">Semester</label>
			        	<input type="numeric" name="semester"class="form-control" value="<?= $mhs ['semester']; ?>" id="semester" placeholder="Masukan Semester">
			        </div>

			        <div class="form group">
			        	<label for="jurusan">Jurusan</label>
			        	<select class="form-select" id="jurusan" name="jurusan">
			        		<option value="">Pilihan</option>
			        				<!-- untuk memanggil database jurusan -->
			        		<?php foreach($jurusan as $j): ?>
			        			<option><?php echo $j['namajurusan']; ?></option>
			        		<?php endforeach; ?>
			        	</select>
			        	<!-- <input type="text" name="jurusan"class="form-control" value="<?= $mhs ['jurusan']; ?>" id="jurusan" placeholder="Masukan Jurusan"> -->
			        </div>
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Ubah</button>
			      </div>
			   </form>
			    </div>
			  </div>
			</div>
			 
 <?php endforeach;?>

<!-- akhir modal edit -->