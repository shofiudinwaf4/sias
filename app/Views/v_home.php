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
                     <h3 class="mb-10">Sambutan Kepala Sekolah</h3>
                     <?= $web['sambutan']; ?>
                 </div> <!-- section title -->
             </div>
             <div class="col-lg-4 offset-lg-1">
                 <div class="category-form">
                     <div class="form-title text-center">
                         <h3>Selamat Datang</h3>
                         <span><?= $web['nama_sekolah']; ?> </span>
                     </div>
                     <div class="main-form text-center">
                         <img src="<?= base_url('fotoguru/' . $web['foto_kepsek']); ?>" width="60%">
                         <h4><?= $web['kepsek']; ?></h4>
                         <p>Kepala Sekolah</p>
                     </div>
                 </div>
             </div>
         </div> <!-- row -->
     </div> <!-- container -->
 </section>

 <!--====== CATEGORY PART ENDS ======-->

 <!--====== COURSE PART START ======-->
 <section id="course-part" class="pt-25">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="section-title pb-25">
                     <h5>Prestasi</h5>
                 </div> <!-- section title -->
             </div>
         </div> <!-- row -->
         <div class="row course-slied ">
             <?php foreach ($prestasi as $key => $p) { ?>
                 <div class="col-lg-4">
                     <div class="singel-course-2">
                         <div class="thum">
                             <div class="image bg-light">
                                 <img src="<?= base_url('gambar/' . $p['gambar']); ?>" alt="Course">
                             </div>
                             <div class="course-teacher">
                                 <div class="thum">
                                     <a href="<?= base_url('home/viewberita/' . $p['slug_berita']); ?>">
                                         <h6 class="text-light"><?= $p['judul_berita']; ?></h6>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div> <!-- singel course -->
                 </div>
             <?php } ?>
         </div> <!-- course slied -->
     </div> <!-- container -->
 </section>

 <!--====== COURSE PART ENDS ======-->

 <!--====== NEWS PART START ======-->

 <section id="news-part" class="pt-25 pb-60">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="section-title pb-10">
                     <h5>Berita Baru</h5>
                 </div> <!-- section title -->
             </div>
         </div> <!-- row -->
         <div class="row">
             <?php
                foreach ($berita as $key => $value) {
                    $db = \Config\Database::connect();
                    $user = $db->table('tbl_user')
                        ->where('id_user', $value['id_user'])
                        ->get()->getRowArray();
                ?>
                 <div class="col-lg-8 mt-10">
                     <div class="singel-news">
                         <div class="news-thum pb-25">
                             <img src="<?= base_url('gambar/' . $value['gambar']); ?>" alt="News">
                         </div>
                         <div class="news-cont">
                             <ul>
                                 <li><i class="fa fa-calendar"></i><?= date('d-M-Y', strtotime($value['tgl_berita'])); ?></li>
                                 <li><?= 'By ' . $user['nama_user']; ?></li>
                             </ul>
                             <a href="<?= base_url('home/viewberita/' . $value['slug_berita']); ?>">
                                 <h3><?= $value['judul_berita']; ?></h3>
                             </a>
                         </div>
                     </div> <!-- singel news -->
                 </div>
             <?php
                }  ?>

             <div class="col-lg-4">
                 <div class="saidbar">
                     <div class="row">
                         <div class="col-lg-12 col-md-6">
                             <div class="saidbar-search mt-10">
                                 <form action="#">
                                     <input type="text" placeholder="Search">
                                     <button type="button"><i class="fa fa-search"></i></button>
                                 </form>
                             </div> <!-- saidbar search -->
                             <div class="categories mt-30">
                                 <h4>Kategori</h4>
                                 <ul>
                                     <?php foreach ($kategoriBerita as $key => $k) {
                                        ?>
                                         <li>
                                             <a href="<?= base_url('home/viewKategori/' . $k['id_kategoriBerita']); ?>">
                                                 <?= $k['nama_kategori']; ?>
                                             </a>
                                         </li>
                                     <?php } ?>
                                 </ul>
                             </div>
                         </div> <!-- categories -->
                         <div class="col-lg-12 col-md-6">
                             <div class="saidbar-post mt-30">
                                 <h4>Berita Terbaru</h4>
                                 <ul>
                                     <?php foreach ($beritabaru as $key => $baru) {
                                        ?>
                                         <li>
                                             <a href="<?= base_url('home/viewberita/' . $baru['slug_berita']); ?>">
                                                 <div class="singel-post">
                                                     <div class="thum">
                                                         <img src="<?= base_url('gambar/' . $baru['gambar']); ?>" alt="Blog">
                                                     </div>
                                                     <div class="cont">
                                                         <h6><?= $baru['judul_berita']; ?></h6>
                                                         <span><?= date('d-M-Y', strtotime($value['tgl_berita'])); ?></span>
                                                     </div>
                                                 </div> <!-- singel post -->
                                             </a>
                                         </li>
                                     <?php } ?>
                                 </ul>
                             </div> <!-- saidbar post -->
                         </div>
                     </div> <!-- row -->
                 </div> <!-- saidbar -->
             </div>
         </div>
     </div> <!-- container -->
 </section>

 <!--====== NEWS PART ENDS ======-->