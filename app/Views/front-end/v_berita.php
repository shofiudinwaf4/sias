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

 <section id="blog-page" class="pt-90 pb-120 gray-bg">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">

                 <?php
                    foreach ($berita as $key => $value) {
                        $db = \Config\Database::connect();
                        $user = $db->table('tbl_user')
                            ->where('id_user', $value['id_user'])
                            ->get()->getRowArray();

                    ?>
                     <div class="singel-blog mt-30">
                         <div class="blog-thum">
                             <img src="<?= base_url('gambar/' . $value['gambar']); ?>" alt="Blog">
                         </div>
                         <div class="blog-cont">
                             <a href="<?= base_url('home/viewberita/' . $value['slug_berita']); ?>">
                                 <h3><?= $value['judul_berita']; ?></h3>
                             </a>
                             <ul>
                                 <li><a href="#"><i class="fa fa-calendar"></i><?= date('d-M-Y', strtotime($value['tgl_berita'])); ?></a></li>
                                 <li><a href="#"><i class="fa fa-clock-o"></i><?= $value['jam_berita']; ?></a></li>
                                 <li><a href="#"><i class="fa fa-user"></i><?= $user['nama_user']; ?></a></li>
                             </ul>
                         </div>
                     </div> <!-- singel blog -->
                 <?php
                    }  ?>

                 <?= $pager->links('berita', 'custom_pager'); ?>

             </div>
             <div class="col-lg-4">
                 <div class="saidbar">
                     <div class="row">
                         <div class="col-lg-12 col-md-6">
                             <div class="saidbar-search mt-30">
                                 <form action="#">
                                     <input type="text" placeholder="Search">
                                     <button type="button"><i class="fa fa-search"></i></button>
                                 </form>
                             </div> <!-- saidbar search -->
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
                                                         <span><?= date('d-M-Y', strtotime($baru['tgl_berita'])); ?></span>
                                                     </div>
                                                 </div> <!-- singel post -->
                                             </a>
                                         </li>
                                     <?php } ?>
                                 </ul>
                                 </ul>
                             </div> <!-- saidbar post -->
                         </div>
                     </div> <!-- row -->
                 </div> <!-- saidbar -->
             </div>
         </div> <!-- row -->
     </div> <!-- container -->
 </section>