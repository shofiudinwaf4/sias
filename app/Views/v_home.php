 <!--====== SLIDER PART START ======-->

 <section id="slider-part" class="slider-active">
     <?php foreach ($slider as $key => $value) { ?>
         <div class="single-slider bg_cover pt-150" style="background-image: url(<?= base_url('gambar/' . $value['gambar_slider']); ?>" data-overlay="4">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-7 col-lg-9">
                         <div class="slider-cont">
                             <h1 data-animation="bounceInLeft" data-delay="1s"><?= $value['judul_slider']; ?></h1>
                             <p data-animation="fadeInUp" data-delay="1.3s"><?= $value['deskripsi_slider']; ?></p>

                         </div>
                     </div>
                 </div> <!-- row -->
             </div> <!-- container -->
         </div> <!-- single slider -->
     <?php } ?>
 </section>

 <!--====== SLIDER PART ENDS ======-->
 <!--====== CATEGORY PART START ======-->

 <section id="category-2-part">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="section-title mt-50">
                     <h3>Sambutan Kepala Sekolah</h3>
                     <?= $web['sambutan']; ?>
                 </div> <!-- section title -->
             </div>
             <div class="col-lg-5 offset-lg-1">
                 <div class="category-form">
                     <div class="form-title text-center">
                         <h3>Selamat Datang</h3>
                         <span><?= $web['nama_sekolah']; ?> </span>
                     </div>
                     <div class="main-form text-center">
                         <img src="<?= base_url('fotoguru/' . $web['foto_kepsek']); ?>" width="100%">
                         <h4><?= $web['kepsek']; ?></h4>
                         <p>Kepala Sekolah</p>
                     </div>
                 </div>
             </div>
         </div> <!-- row -->
     </div> <!-- container -->
 </section>

 <!--====== CATEGORY PART ENDS ======-->

 <!--====== ABOUT PART START ======-->

 <section id="about-part" class="pt-65">
     <div class="container">
         <div class="row">
             <div class="col-lg-5">
                 <div class="section-title mt-50">
                     <h5>About us</h5>
                     <h2>Welcome to Edubin </h2>
                 </div> <!-- section title -->
                 <div class="about-cont">
                     <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris</p>
                     <a href="#" class="main-btn mt-55">Learn More</a>
                 </div>
             </div> <!-- about cont -->
             <div class="col-lg-6 offset-lg-1">
                 <div class="about-event mt-50">
                     <div class="event-title">
                         <h3>Upcoming events</h3>
                     </div> <!-- event title -->
                     <ul>
                         <li>
                             <div class="singel-event">
                                 <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                 <a href="events-singel.html">
                                     <h4>Campus clean workshop</h4>
                                 </a>
                                 <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                 <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                             </div>
                         </li>
                         <li>
                             <div class="singel-event">
                                 <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                 <a href="events-singel.html">
                                     <h4>Tech Summit</h4>
                                 </a>
                                 <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                 <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                             </div>
                         </li>
                         <li>
                             <div class="singel-event">
                                 <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                 <a href="events-singel.html">
                                     <h4>Enviroement conference</h4>
                                 </a>
                                 <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                 <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                             </div>
                         </li>
                     </ul>
                 </div> <!-- about event -->
             </div>
         </div> <!-- row -->
     </div> <!-- container -->
     <div class="about-bg">
         <img src="<?= base_url('edubin'); ?>/images/about/bg-1.png" alt="About">
     </div>
 </section>

 <!--====== ABOUT PART ENDS ======-->

 <!--====== NEWS PART START ======-->

 <section id="news-part" class="pt-115 pb-110">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="section-title pb-50">
                     <h5>Latest News</h5>
                     <h2>From the news</h2>
                 </div> <!-- section title -->
             </div>
         </div> <!-- row -->
         <div class="row">
             <div class="col-lg-6">
                 <?php
                    foreach ($berita as $key => $value) {
                        $db = \Config\Database::connect();
                        $user = $db->table('tbl_user')
                            ->where('id_user', $value['id_user'])
                            ->get()->getRowArray();
                    ?>
                     <div class="singel-news mt-30">
                         <div class="news-thum pb-25">
                             <img src="<?= base_url('gambar/' . $value['gambar']); ?>" alt="Blog Details">
                         </div>
                         <div class="news-cont">
                             <ul>
                                 <li><a href="#"><i class="fa fa-calendar"></i><?= date('d-M-Y', strtotime($value['tgl_berita'])); ?> </a></li>
                                 <li><a href="#"><i class="fa fa-user"></i><?= $user['nama_user']; ?></a></li>
                             </ul>
                             <a href="<?= base_url('home/viewberita/' . $value['slug_berita']); ?>">
                                 <h3><?= $value['judul_berita']; ?></h3>
                             </a>
                         </div>
                     </div> <!-- singel news -->
                 <?php
                    }  ?>
             </div>
             <div class="col-lg-6">
                 <div class="singel-news news-list">
                     <div class="row">
                         <?php foreach ($beritabaru as $key => $baru) {
                            ?>
                             <div class="col-sm-4">
                                 <div class="news-thum mt-30">
                                     <img src="<?= base_url('gambar/' . $baru['gambar']); ?>" alt="News">
                                 </div>
                             </div>
                             <div class="col-sm-8">
                                 <div class="news-cont mt-30">
                                     <ul>
                                         <li><a href="#"><i class="fa fa-calendar"></i><?= date('d-M-Y', strtotime($baru['tgl_berita'])); ?></a></li>
                                     </ul>
                                     <a href="<?= base_url('home/viewberita/' . $baru['slug_berita']); ?>">
                                         <h5><?= $baru['judul_berita']; ?></h5>
                                     </a>
                                 </div>
                             </div>
                         <?php } ?>
                     </div> <!-- row -->
                 </div> <!-- singel news -->
             </div>
         </div> <!-- row -->
     </div> <!-- container -->
 </section>

 <!--====== NEWS PART ENDS ======-->