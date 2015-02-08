  <?php include 'global/trads/bas_' . LANG . '.php'; ?>
   </div>

   
    <div class="bas">
        <ul class="bas_centrer">
            <li><a class="liste_aide" href="index.php?module=contact_admin&amp;action=aide"><?= TXT_aide; ?></a></li>
            <li><a class="liste_contactus" href="index.php?module=contact_admin&amp;action=contacter_admin"><?= TXT_contact; ?></a></li>
            <li class="liste_logos">
                <a href="https://www.facebook.com/homidays?skip_nax_wizard=true&ref_type=logout_gear"><img src="images/site/logo_fb.png" height="110" width="150"></a>
                <a href="https://twitter.com/Homidays"><img src="images/site/logo_twitter.png" height="110" width="150"></a>
                <a href="https://linkedin.com/Homidays"><img src="images/site/logo_linkedin.png" height="110" width="150"></a>
            </li>
        </ul>
   </div>
   <script src="style/jquery.js"></script>
   <script src="style/supersized.3.2.7.min.js"></script>
   <script>
        jQuery(function($){
            $.supersized({
                // Functionality
                // Length between transitions
                slide_interval:5000,
                // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition:1, 
                // Speed of transition
                transition_speed:700,
                // Components
                // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                slide_links:'blank',
                // Slideshow Images
                slides:[ 
                            {image : 'images/site/supersized/supersized1.jpg', thumb : 'images/site/supersized/supersized1.jpg'},
                            {image : 'images/site/supersized/supersized2.jpg', thumb : 'images/site/supersized/supersized2.jpg'},  
                            {image : 'images/site/supersized/supersized3.png', thumb : 'images/site/supersized/supersized3.png'},  
                            {image : 'images/site/supersized/supersized4.jpg', thumb : 'images/site/supersized/supersized4.jpg'},  
                            {image : 'images/site/supersized/supersized5.jpg', thumb : 'images/site/supersized/supersized5.jpg'},  
                            {image : 'images/site/supersized/supersized6.jpg', thumb : 'images/site/supersized/supersized6.jpg'},  
                            {image : 'images/site/supersized/supersized7.jpg', thumb : 'images/site/supersized/supersized7.jpg'},  
                            {image : 'images/site/supersized/supersized8.jpg', thumb : 'images/site/supersized/supersized8.jpg'}    
                        ]
            });
        });
    </script>
   <script src="style/carrousel.js"></script>
</body>

</html>
