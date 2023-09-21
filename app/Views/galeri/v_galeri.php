 <!-- Main content -->
 <div class="col-12">
     <div class="card card-primary">
         <div class="card-body">
             <div class="row">
                 <?php foreach ($galeri as $key => $value) { ?>
                     <div class="col-lg-3 col-md-6 col-sm-8">
                         <div class="singel-publication mt-30">
                             <div class="image">
                                 <img src="<?= base_url('gambar/' . $value['foto_galeri']); ?>" alt="Publication">
                                 <div class="add-cart">
                                     <ul>
                                         <li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
                                         <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div> <!-- singel publication -->
                     </div>
                 <?php }; ?>
             </div>
         </div>
     </div>
 </div>
 <!-- /.content -->