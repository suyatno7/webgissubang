<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>


	<div class="row">
        <div class="col-lg-12 mt-3">
            <div class="ms-1">
                <h2>CRUD BERITA ARTIKEL</h2>
            </div>
        </div>
    </div>
    <hr>
    <a href="/blog/form" class="btn btn-primary"><span class="fa fa-plus"></span> Input Artikel Baru</a>
    <hr>
            <?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil');?>
                </div>
            <?php } ?>
            
            <?php 
                $errors = $validation->getErrors();
                if(!empty($errors))
                {
                    echo $validation->listErrors();
                }
            ?>
    <div class="row mx-auto">
    	<div class="col-lg-12">
    		<div class="row">
                <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                    <?php foreach($artikel as $row):?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['judul'];?></td>
                    <td><?php
                        if (!empty($row["gambar"])) {
                            echo '<img src="'.base_url("assets/blog/images/$row[gambar]").'" width="250">';
                        }
                    ?></td>
                    <td><a href="view/<?=$row['id'];?>" class="btn btn-success">View</a> | <a href="form_edit/<?=$row['id'];?>" class="btn btn-primary">Edit</a> | <a href="hapus/<?=$row['id'];?>" class="btn btn-danger">Hapus</a> </td>
                </tr>
                <?php endforeach;?>
            </table>
    		</div>
    	</div>
    </div>

    
    


<?= $this->endSection(); ?>