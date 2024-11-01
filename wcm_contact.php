<div class="wrap">
    <h2>Custom Manager Admin - Contact</h2>
 	<p>In here all your correspondance to customers will be recorded. You can setup scheduled emails and newsletters for specific customers, groups or all customers.</p>
   
    <?php
    wcm_saveversionemail();
	
	$wcm = get_option('wcm_optionsarray');
	?>
   
   <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox">
            <div class="handlediv" title="Click to toggle"><br /></div>
            <h3>New Version E-mail Template</h3>
            <div class="inside">
            <p>This e-mail is sent to customers to notify them when a new version is available for a download product Please use the
            tokens to contruct a template which is automatically personalised for individual customers.</p>
            	<form method="post" action="">
                    <table class="widefat post fixed">                   	
                        <tr>
                        	<td width='100'>E-mail Subject:</td>
                        	<td><input name="wcm_emailsubject_submit" type="text" size="73" maxlength="100" value="<?php echo $wcm['settings']['emailversionupdate']['subject']; ?>" /></td>
                    	</tr>                     	
                        <tr>
                        	<td>E-mail Content:</td>
                        	<td><textarea name="wcm_emailcontent_submit" cols="60" rows="8"><?php echo $wcm['settings']['emailversionupdate']['content']; ?></textarea></td>
                    	</tr> 
                        <tr>
                        	<td></td>
                        	<td><input class="button-primary" name="wcm_newversionemail_submit" type="submit" value="Save" /></td>
                    	</tr>
                    </table>
                </form>
            </div>
        </div>
    </div>   
   
    <!--    
        <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
            <div class="postbox closed">
                
                <div class="handlediv" title="Click to toggle"><br />
                </div>
                
                <h3>Newsletters</h3>
                
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
                 <h3>Mass Email</h3>
                <div class="inside">
                <p>This feature will be added at a later date, development of this plugin is still ongoing. Please support it by donating to <a href="http://www.webtechglobal.co.uk/blog/wordpress/wordpress-customer-manager">www.webtechglobal.co.uk</a> or 
                pre-order the premium edition for only &pound;9.99 by sending payment too <a href="mailto:paypal@webtechglobal.co.uk">paypal@webtechglobal.co.uk</a> with instructions to pre-order Wordpress Customer Manager.</p>
                </div>
                </div>
                </div>
    -->

     <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox">
            <div class="handlediv" title="Click to toggle"><br />
            </div>
             <h3>Premium Edition Example Functions</h3>
             
            <div class="inside">
              <ol>
                <li>WYSIWYG editor for creating e-mail templates.</li>
                <li>Tokens for placing customers name etc within template for mass campaigns.</li>
                <li>More templates for different response responses.</li>
                <li>Settings for submitting correspondance updates via url without need to login.</li>
              </ol>
            </div>

        </div>
    </div>  
    
<?php wcm_footer(); ?>

   