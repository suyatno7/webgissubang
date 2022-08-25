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
                    echo '<img src="' . base_url("assets/blog/images/$artikel->gambar") . '" class="d-block w-75 mx-auto">';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container mt-3 px-2 px-lg-3">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-sm-start">
                            <?php echo $artikel->isi; ?>
                        </div>
                    </div>
                </div>
</body>

<?= $this->endSection(); ?>