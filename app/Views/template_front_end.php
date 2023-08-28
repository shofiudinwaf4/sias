<!doctype html>
<html lang="en">

<head>
    <?php $db = \Config\Database::connect();
    $head = $db->table('tbl_sekolah')->where('id_sekolah', 1)->get()->getRowArray(); ?>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title><?= $head['nama_sekolah']; ?> | <?= $judul; ?></title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= base_url('Gambar'); ?>/<?= $head['logo_sekolah']; ?>" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/animate.css">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/nice-select.css">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/font-awesome.min.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/style.css">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin'); ?>/css/responsive.css">


</head>

<body>
    <?php
    $db = \Config\Database::connect();
    $web = $db->table('tbl_sekolah')->where('id_sekolah', 1)->get()
        ->getRowArray();

    $jurusan = $db->table('tbl_jurusan')
        ->where('id_jurusan<>0')->get()
        ->getResultArray();

    ?>
    <!--====== PRELOADER PART START ======-->

    <!-- <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div> -->

    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->

    <header id="header-part">

        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="<?= base_url('edubin'); ?>/images/all-icon/map.png" alt="icon"><span><?= $web['alamat_sekolah']; ?></span></li>
                                <li><img src="<?= base_url('edubin'); ?>/images/all-icon/email.png" alt="icon"><span><?= $web['email']; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-opening-time text-lg-right text-center">
                            <p>Jam Kerja: Senin s/d Sabtu: 07.00-15.00 </p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->

        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="<?= base_url('gambar'); ?>/<?= $web['logo_header']; ?>" height="60px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="<?= base_url('edubin'); ?>/images/all-icon/support.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <p>Hubungi Kami</p>
                                    <span><?= $web['no_telp']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->

        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="active" href="<?= base_url(''); ?>"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Jurusan</a>
                                        <ul class="sub-menu">
                                            <?php foreach ($jurusan as $key => $jur) { ?>
                                                <li><a href="<?= base_url('home/detailjurusan/' . $jur['id_jurusan']); ?>"><?= $jur['jurusan']; ?></a></li>
                                            <?php } ?>
                                            <!-- <li><a href="courses-singel.html">Course Singel</a></li> -->
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="events.html">Profil Sekolah</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= base_url('home/sejarah'); ?>">Sejarah</a></li>
                                            <li><a href="<?= base_url('home/visimisi'); ?>">Visi dan Misi</a></li>
                                            <li><a href="<?= base_url('home/sambutan'); ?>">Sambutan</a></li>

                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('home/guru'); ?>">Guru</a>
                                        <ul class="sub-menu">
                                            <li><a href="teachers.html">teachers</a></li>
                                            <li><a href="teachers-singel.html">teacher Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="teachers.html">Siswa</a>
                                        <ul class="sub-menu">
                                            <li><a href="teachers.html">teachers</a></li>
                                            <li><a href="teachers-singel.html">teacher Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('home/berita'); ?>">Berita</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="shop.html">Event</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('home/download'); ?>">Download</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html">Gallery</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact.html">Gallery Foto</a></li>
                                            <li><a href="contact-2.html">Gallery Vidio</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a class="btn btn-outline-primary" href="<?= base_url('login'); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> login</a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!-- content -->
    <?php if ($page) {
        echo view($page);
    } ?>
    <!-- end content -->

    <!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="<?= base_url('gambar'); ?>/<?= $web['logo_header']; ?>" alt="Logo"></a>
                            </div>
                            <p>Bangga Sekolah di <?= $web['nama_sekolah']; ?></p>
                            <ul class="mt-20">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="index-2.html"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="about.html"><i class="fa fa-angle-right"></i>Profil Sekolah</a></li>
                                <li><a href="courses.html"><i class="fa fa-angle-right"></i>Guru</a></li>
                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>Berita</a></li>
                                <li><a href="events.html"><i class="fa fa-angle-right"></i>Event</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Siswa</a></li>
                                <li><a href="shop.html"><i class="fa fa-angle-right"></i>Download</a></li>
                                <li><a href="teachers.html"><i class="fa fa-angle-right"></i>Jurusan</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Gallery</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?= $web['alamat_sekolah']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?= $web['no_telp']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?= $web['email']; ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->








    <!--====== jquery js ======-->
    <script src="<?= base_url('edubin'); ?>/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url('edubin'); ?>/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?= base_url('edubin'); ?>/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="<?= base_url('edubin'); ?>/js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="<?= base_url('edubin'); ?>/js/jquery.magnific-popup.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="<?= base_url('edubin'); ?>/js/waypoints.min.js"></script>
    <script src="<?= base_url('edubin'); ?>/js/jquery.counterup.min.js"></script>

    <!--====== Nice Select js ======-->
    <script src="<?= base_url('edubin'); ?>/js/jquery.nice-select.min.js"></script>

    <!--====== Nice Number js ======-->
    <script src="<?= base_url('edubin'); ?>/js/jquery.nice-number.min.js"></script>

    <!--====== Count Down js ======-->
    <script src="<?= base_url('edubin'); ?>/js/jquery.countdown.min.js"></script>

    <!--====== Validator js ======-->
    <script src="<?= base_url('edubin'); ?>/js/validator.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="<?= base_url('edubin'); ?>/js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="<?= base_url('edubin'); ?>/js/main.js"></script>

    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?= base_url('edubin'); ?>/js/map-script.js"></script>

</body>

</html>