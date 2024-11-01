<div class="wrap">
    <h2>Personal Information</h2>
 	<p>Please update your contact details here so we can provide you with the best service possible at all times.</p>
	
    <?php
	wcm_savecontactdetails();
	?>

    <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox">
            <div class="handlediv" title="Click to toggle"><br />
            </div>
             <h3>Contact Methods</h3>
            <div class="inside">
            	<form method="post" action="">
                    <table class="widefat post fixed">
                    	<tr>
                        	<td width="125">Telephone:</td>
                        	<td><input name="wcm_telephone_submit" type="text" size="53" maxlength="50" value="<?php echo wcm_getcontactmethod( 'wcm_telephone' );?>" /></td>
                    	</tr>     
                    	<tr>
                        	<td>Skype Username:</td>
                        	<td><input name="wcm_skype_submit" type="text" size="53" maxlength="50" value="<?php echo wcm_getcontactmethod( 'wcm_skype' );?>" /></td>
                    	</tr>                     	
                        <tr>
                        	<td>MSN:</td>
                        	<td><input name="wcm_msn_submit" type="text" size="53" maxlength="50" value="<?php echo wcm_getcontactmethod( 'wcm_msn' );?>" /></td>
                    	</tr> 
                        <tr>
                        	<td></td>
                        	<td><input class="button-primary" name="wcm_savecontactmethods_submit" type="submit" value="Save" /></td>
                    	</tr>
                    </table>
                </form>
             </div>
        </div>
    </div>
                                
<?php wcm_footer(); ?>

   