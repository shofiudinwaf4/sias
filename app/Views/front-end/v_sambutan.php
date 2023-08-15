<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-10 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-6.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Sambutan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil Sekolah</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sambutan</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== CONTACT PART START ======-->

<section id="contact-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-from mt-30">
                    <div class="section-title">
                        <h5><?= $judul; ?></h5>
                        <center>
                            <img src="<?= base_url('fotoguru/' . $sambutan['foto_kepsek']); ?>" width="300px">
                            <b>
                                <h4>
                                    <?= $sambutan['kepsek']; ?>
                                </h4>
                            </b>
                        </center>
                        <p><?= $sambutan['sambutan']; ?></p>
                    </div> <!-- section title -->
                </div> <!--  contact from -->
            </div>

        </div> <!-- row -->
    </div> <!-- container -->
</section>