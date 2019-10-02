 <!-- Footer -->
 <footer class="page-footer font-small bg-dark text-white">
     <!-- Footer Links -->
     <div class="container text-center text-md-left">
         <!-- Grid row -->
         <div class="row mt-4 pt-5">
             <!-- Grid column -->
             <div class="col-md-4 mb-4">
                 <!-- Content -->
                 <h6 class="text-uppercase font-weight-bold">Dinas PPKBP3A Kota Tasikmalaya</h6>
                 <hr class="bg-primary accent-2 mb-3 mt-0 d-inline-block mx-auto" style="width: 100%;">
                 <p>“Mewujudkan Keluarga Berkualitas Menuju Masyarakat Madani”</p>
             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-4 mb-md-0 mb-4">
                 <!-- Links -->
                 <h6 class="text-uppercase font-weight-bold">Lokasi</h6>
                 <hr class="bg-primary accent-2 mb-3 mt-0 d-inline-block mx-auto" style="width: 100%;">
                 <p>
                     <i class="fas fa-map-marker-alt mr-3"></i>Jl. Yudanegara No. 75A Kec. Cihideung Kota Tasikmalaya</p>
                 <p>
                     <i class="fas fa-phone mr-3"></i>(0265) 340212</p>
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2476087345635!2d108.21400261420493!3d-7.326061874079172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f574868b319fd%3A0xb7088c4c09d1778f!2sBadan%20Keluarga%20Berencana%2C%20Pemberdayaan%20Masyarakat%20Dan%20Pemberdayaan%20Perempuan%20Dan%20Perlindungan%20Anak!5e0!3m2!1sen!2sid!4v1569947395111!5m2!1sen!2sid" width="300" height="150" frameborder="0" style="border:0;" allowfullscreen="">
                 </iframe>
             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-4 mb-4">

                 <!-- Links -->
                 <h6 class="text-uppercase font-weight-bold">Kirim Pesan</h6>
                 <hr class="bg-primary accent-2 mb-3 mt-0 d-inline-block mx-auto" style="width: 100%;">
                 <!-- Form -->
                 <form action="<?= base_url('blog/landing/pesan') ?>" method="post" id="formpesan">
                     <div class="form-group">
                         <!-- <label for="exampleInputEmail1">Email</label> -->
                         <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email Anda">
                     </div>
                     <div class="form-group">
                         <!-- <label for="exampleInputPassword1">Pesan</label> -->
                         <textarea name="pesan" class="form-control" id="pesan" cols="30" rows="5" placeholder="Masukan Pesan"></textarea>
                     </div>
                     <button class="btn btn-info btnpesan" type="submit"><i class="fas fa-paper-plane mr-1"></i>Kirim</button>
                 </form>
                 <!-- Form -->
             </div>
             <!-- Grid column -->
         </div>
         <!-- Grid row -->
     </div>
     <!-- Footer Links -->

     <!-- Copyright -->
     <div class="footer-copyright text-center py-3 mt-3 bg-primary font-weight-normal">
         Copyright © 2019 DPPKBP3A
     </div>
     <!-- Copyright -->

 </footer>
 <!-- Footer -->