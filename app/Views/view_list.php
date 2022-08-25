<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-3 mt-4">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Artikel Objek Wisata" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php foreach ($artikel as $post) : ?>
            <div class="col-md-4 col-lg-4 mb-1 d-flex">
                <div class="shadow p-2 mb-2 mt-2 rounded bg-white">
                    <img class="card-img mb-2 lazyload rounded lazyload" src="/assets/blog/images/<?= $post['gambar']; ?>">
                    <div class="card-body p-2">
                        <h5 class="card-title h5"><?= $post['judul']; ?></h5>
                        <p class="ql-align-justify"><?php echo html_entity_decode(substr($post['isi'], 0, 160) . '...'); ?></p>
                        <p><a class="btn btn-success btn-sm" href="blog/view/<?= $post['id']; ?>">Read More</a></p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>
<?= $pager->links('artikel', 'blogpage') ?>
<?= $this->endSection(); ?>