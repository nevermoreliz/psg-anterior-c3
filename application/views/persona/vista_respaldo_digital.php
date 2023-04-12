   <!-- Popup CSS -->
   <link href="<?= base_url('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') ?>" rel="stylesheet">





   <div class="zoom-gallery row m-t-0">
       <?php foreach ($respaldos_digitales as $respaldo_digitale) { ?>

           <div class="col-md-4">
               <a href="<?= base_url('/img/respaldo_grado_academico_persona/' . $respaldo_digitale['nombre_archivo']) ?>">
                   <img src="<?= base_url('img/respaldo_grado_academico_persona/' . $respaldo_digitale['nombre_archivo']) ?>" class="img-responsive" />
               </a>
           </div>
       <?php } ?>

   </div>

   <!-- Magnific popup JavaScript -->
   <script src="<?= base_url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') ?>"></script>
   <script src="<?= base_url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') ?>"></script>