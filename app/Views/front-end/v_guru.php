<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(<?= base_url('edubin'); ?>/images/page-banner-4.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= $judul; ?></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $judul; ?></li>
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
                        <h5>Guru Sekolah</h5>
                    </div> <!-- section title -->
                    <div class="row">
                        <?php foreach ($guru as $key => $value) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="<?= base_url('fotoguru/' . $value['foto_guru']); ?>" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="#">
                                            <h6><?= $value['nama_guru']; ?></h6>
                                        </a>
                                        <span><?= $value['prodi']; ?></span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                        <?php } ?>
                    </div> <!-- row -->
                </div> <!--  contact from -->
                <?= $pager->links('guru', 'custom_pager'); ?>
            </div>

        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== CONTACT PART ENDS ======-->