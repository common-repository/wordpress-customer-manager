<div class="wrap">
    <h2>Your Products and Services</h2>
	<p>Read information about products purchase. Updates, addons, changes and delivery information can be found here.
    
    <?php
	wcm_purchasedownload();
	?>
    
    <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox">
            <div class="handlediv" title="Click to toggle"><br />
            </div>
            <h3>Digital Downloads</h3>
            <div class="inside">
            
				<?php wcm_listproducts_customer('download'); ?>
                
                <br />
                
                <div class="postbox">
                    <div class="handlediv" title="Click to toggle"><br />
                    </div>
                    <h3>Purchase Downloads</h3>
                    <div class="inside">
                    
                        <?php wcm_listproductsforsale(); ?>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
<!--
    <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox closed">
            <div class="handlediv" title="Click to toggle"><br />
            </div>
             <h3>Physical Good Delivery</h3>
            <div class="inside">
            <p>This feature will be added at a later date, development of this plugin is still ongoing. Please support it by donating to <a href="http://www.webtechglobal.co.uk/blog/wordpress/wordpress-customer-manager">www.webtechglobal.co.uk</a> or 
            pre-order the premium edition for only &pound;9.99 by sending payment too <a href="mailto:paypal@webtechglobal.co.uk">paypal@webtechglobal.co.uk</a> with instructions to pre-order Wordpress Customer Manager.</p>
            </div>
            </div>
            </div>

    <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox closed">
            <div class="handlediv" title="Click to toggle"><br />
            </div>
             <h3>Services Hired</h3>
            <div class="inside">
            <p>This feature will be added at a later date, development of this plugin is still ongoing. Please support it by donating to <a href="http://www.webtechglobal.co.uk/blog/wordpress/wordpress-customer-manager">www.webtechglobal.co.uk</a> or 
            pre-order the premium edition for only &pound;9.99 by sending payment too <a href="mailto:paypal@webtechglobal.co.uk">paypal@webtechglobal.co.uk</a> with instructions to pre-order Wordpress Customer Manager.</p>
            </div>
            </div>
            </div>
 
     <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox closed">
            <div class="handlediv" title="Click to toggle"><br />
            </div>
             <h3>Active Subscriptions</h3>
            <div class="inside">
            <p>This feature will be added at a later date, development of this plugin is still ongoing. Please support it by donating to <a href="http://www.webtechglobal.co.uk/blog/wordpress/wordpress-customer-manager">www.webtechglobal.co.uk</a> or 
            pre-order the premium edition for only &pound;9.99 by sending payment too <a href="mailto:paypal@webtechglobal.co.uk">paypal@webtechglobal.co.uk</a> with instructions to pre-order Wordpress Customer Manager.</p>
            </div>
            </div>
            </div>
                     -->         
<?php wcm_footer(); ?>

   