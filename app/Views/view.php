<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<body>
	<div class="row mx-auto">
        <div class="col-lg-12 margin-tb mt-3 ms-3">
            <div class="pull-left">
                <h2><?php echo $artikel->judul; ?></h2>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
    	<div class="col-lg-12">
    		<div class="row p-3">
                <?php
                        if (!empty($artikel->gambar)) {
                            echo '<img src="'.base_url("assets/blog/images/$artikel->gambar").'"width="90%">';
                        }
                ?>
                <div class="mt-5 px-5" style="font-size:2vw"><?php echo $artikel->isi; ?></div>
                
    		</div>
    	</div>
    </div>
    
</body>

<?= $this->endSection(); ?>