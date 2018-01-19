<?php
/**
 * The footer partial -- daisy information
 *
 * @since 0.2.0
 * @package DD
 */
 ?>
 <div class="flex-div daisy-footer" id="daisy-footer-info">
   <div class="flex-item" id="copyright">Copyright &copy
      <?php echo date("Y") ?>
      <span class="DRD">Dame Ranch Designs</span> - Dopey Daisy
   </div>
   <div class="flex-item" id="claims">
     <a href="<?php echo get_permalink(get_page_by_path("claim-of-respect"))   ?>">Claim of Respect (a.k.a. Terms of Use)</a>
     <a href="<?php echo get_permalink(get_page_by_path("clai-of-confidentiality"))   ?>">Claim of Confidentiality (a.k.a. Privacy Policy)</a>
     <a href="https://dameranchdesigns.com#about-us" target="_blank">Learn more about us at <span class="DRD">Dame Ranch Designs</span></a>
   </div>
   <div class="flex-item" id="web-design">
    Website divinely inspired by <a class="DRD" href="https://dameranchdesigns.com" target="_blank">Dame Ranch Designs</a>
   </div>


 </div>
