<?php
/**
 * The footer partial -- daisy information
 *
 * @since 0.2.0
 * @package DD
 */
 ?>
 <div class="flex-div daisy-footer" id="daisy-footer-info">
   <div id="copyright">Copyright &copy
      <?php echo date("Y") ?>
      Dame Ranch Designs - Dopey Daisy
   </div>
   <div id="claims">
     <a href="<?php echo get_permalink(get_page_by_path("claim-of-respect"))   ?>">Claim of Respect (a.k.a. Terms of Use)</a>
     <a href="<?php echo get_permalink(get_page_by_path("clai-of-confidentiality"))   ?>">Claim of Confidentiality (a.k.a. Privacy Policy)</a>
     <a href="https://dameranchdesigns.com#about">Learn more about us at Dame Ranch Designs</a>
   </div>
   <div id="web-design">
     <a href="https://dameranchdesigns.com">Divinely inspired logo graphics and web design by <span>Dame Ranch Designs</span></a>
   </div>


 </div>
