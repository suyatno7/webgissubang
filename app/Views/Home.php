<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<div class="container-fluid banner">
    <section class="jumbotron text-center">
        <img src="logosub.png" alt="Logo kab subang" width="150" class="img-fluid mt-4">
        <div class="container banner-content col-lg-6">
            <div>
                <p class="fs-3">
                    Selamat Datang di WebGIS Daya Tarik Wisata Alam Kabupaten Subang
                </p>
                <p class="float-md-start"> Website ini bertujuan untuk menampilkan informasi dan sebaran daya tarik wisata alam di Kabupaten Subang</p>
            </div>
        </div>
        <a class="btn btn-success" href="/peta" role="button">Peta Wisata</a>
        <a class="btn btn-outline-success" href="/artikel" role="button">Informasi Wisata</a>
    </section>
</div>
<hr class="mt-5 mb-2">
<section class="jumbotron mt-3 text-center">
    <div class="container col-lg-9">
        <div class="center btmspace-80">
            <p class="fw-bold fs-5">
                Deskripsi Kabupaten Subang
            </p>
        </div>
        <div class="fs-6 text-md-start lh-sm">
            <p class="text-sm-start">Subang adalah sebuah kabupaten di provinsi Jawa Barat, Indonesia. Ibu kotanya adalah Subang. Kabupaten ini berbatasan dengan Laut Jawa di utara, Kabupaten Indramayu di timur,
                Kabupaten Sumedang di tenggara, Kabupaten Bandung Barat di selatan, serta Kabupaten Purwakarta dan Kabupaten Karawang di barat.</p>
            <p> Berdasarkan Peraturan Daerah Kabupaten Subang Nomor 3 Tahun 2007, Wilayah Kabupaten Subang terbagi menjadi 30 kecamatan,
                yang dibagi lagi menjadi 245 desa dan 8 kelurahan. Subang dahulu bernama Karawang Timur.</p>

            <p> Kabupaten ini dilintasi jalur pantura, namun ibu kota Kabupaten Subang tidak terletak di jalur ini.
                Jalur pantura di Kabupaten Subang merupakan salah satu yang paling sibuk di Pulau Jawa. Kota kecamatan yang berada di jalur ini d
                iantaranya Ciasem dan Pamanukan. Selain dilintasi jalur Pantura, Kabupaten Subang dilintasi pula jalur jalan Alternatif
                Sadang Cikamurang, yang mlintas di tengah wilayah Kabupaten Subang dan menghubungkan Sadang, Kabupaten Purwakarta dengan Tomo,
                Kabupaten Sumedang, jalur ini sangat ramai terutama pada musim libur seperti lebaran. Kabupaten Subang yang berbatasan langsung
                dengan kabupaten Bandung disebelah selatan memiliki akses langsung yang sekaligus menghubungkan jalur pantura dengan kota Bandung.
                Jalur ini cukup nyaman dilalui dengan panorama alam yang amat indah berupa hamparan kebun teh yang udaranya sejuk dan melintasai kawasan
                pariwisata Air panas Ciater dan Gunung Tangkubanparahu.</p>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <h3 class="display-8 font-weight-bold mt-5">DESTINASI POPULER</h3>
            <hr class="mt-2 mb-2">
            <p>Rekomendasi Kunjungan wisata Populer untuk Kamu</p>
        </div>

        <div class="col-md-12 mt-0 mb-4">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/assets/blog/images/bukitpasirjaka.jpg" class="d-block w-100" alt="1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bukit Pasir Jaka</h5>
                            </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/blog/images/Pantai_pondok_bali.jpg" class="d-block w-100" alt="2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Pantai Pondok Bali</h5>
                             </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/blog/images/curug_luhur.jpg" class="d-block w-100" alt="3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Curug Luhur</h5>
                            </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection(); ?>