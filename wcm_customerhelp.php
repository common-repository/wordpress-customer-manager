<div class="wrap">
    <h2>Your Help Area</h2>
 	<p>Please use this area to create support tickets, search the FAQ or organise a meeting using the chat room.</p>

	<?php
		global $wpdb;
		
		if( isset( $_POST['wcm_viewticket_submit'] ) && isset( $_POST['wcm_viewticket_id'] ) )// view existing ticket
		{
			wcm_viewticket();// outputs single ticket view if submitted
    	}
        elseif( isset( $_POST['wcm_insertticket_submit'] ) )// insert a new ticket
		{
			wcm_insertticket();
		}		        
        elseif( isset( $_POST['wcm_editticket_submit'] ) && isset( $_POST['wcm_viewticket_id'] ) )// open wysiwyg editor to edit existing ticket
		{
			wcm_editticket();
		}		        
		elseif( isset( $_POST['wcm_saveticket_submit'] ) && isset( $_POST['wcm_viewticket_id'] ) )// save edited ticket
		{
			wcm_saveticket();
		}	
		elseif( isset( $_POST['wcm_resolvedticket_submit'] ) && isset( $_POST['wcm_viewticket_id'] ) )// set ticket to resolved status
		{
			wcm_resolvedticket();
		}				
		elseif( isset( $_POST['wcm_saveupdateform_submit'] ) && isset( $_POST['wcm_saveupdateform_ID'] ) )// save commented update submission
		{
			wcm_saveupdateform();
		}			
	?>
    <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
        <div class="postbox">
            
            <div class="handlediv" title="Click to toggle"><br />
            </div>
            
            <h3>Tickets</h3>
            
            <div class="inside">
                <!-- TICKETS CREATE START -->
                <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
                    <div class="postbox closed">
                        <div class="handlediv" title="Click to toggle"><br />
                        </div>
                        <h3>Create Ticket - Make A New Ticket Here</h3>
                        <div class="inside">
                        
                            <form method="post" action="http://localhost/testing/wordpress/wp-admin/admin.php?page=wcm_helpcustomers">
                                <input type="hidden" name="wcm_insertticket_submit" value="1" />
                                 <div id="titlediv">
                                    <div id="titlewrap">
                                        <h4><a href="#" title="Please enter a short title to help describe the purpose of your new ticket">Ticket Title</a></h4>
                                      <input type="text" name="wcm_tickettitle" size="30" id="title" />
                                   </div>
                                </div>     
                                 <div id="postdivrich" class="postarea">
                                 		<p>You can use the Upload/Insert buttons to attach ZIP files or display screenshots</p>
                                        <?php		
                                            the_editor('', 'wmc_ticketcontent'); 
                                        ?>
                                    <div id="post-status-info">
                                        <span id="wp-word-count" class="alignleft"></span>
                                    </div>
                                </div> 
                                <input class="button-primary" type="submit" value="Submit Ticket" />
                            </form>
                            
                        </div>
                    </div>
                </div>   
                <!-- TICKETS CREATE END -->   
                <!-- TICKETS NEW START -->
                <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
                    <div class="postbox closed">
                        <div class="handlediv" title="Click to toggle"><br />
                        </div>
                        <h3>New Tickets - Not Yet Had A Response</h3>
                        <div class="inside">
                        
           				 <?php wcm_listtickets('new'); ?>
                        
                        </div>
                    </div>
                </div>   
                <!-- TICKETS NEW END -->                       
                <!-- TICKETS OPEN START -->
                <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
                    <div class="postbox closed">
                        <div class="handlediv" title="Click to toggle"><br />
                        </div>
                        <h3>Ongoing Tickets - These Have Had A Response</h3>
                        <div class="inside">
                        
           				 <?php wcm_listtickets('ongoing'); ?>
                        
                        </div>
                    </div>
                </div>   
                <!-- TICKETS OPEN END -->     
                <!-- TICKETS CLOSED START -->
                <div id="poststuff" class="meta-box-sortables" style="position: relative; margin-top:10px;">
                    <div class="postbox closed">
                        <div class="handlediv" title="Click to toggle"><br />
                        </div>
                        <h3>Closed Tickets - Ticket Issue Has Been Resolved</h3>
                        
                        <div class="inside">
            				<?php wcm_listtickets('closed');?>                       
            			 </div>
                    </div>
                </div>   
                <!-- TICKETS CLOSED END -->     
              </div>
        </div>
    </div>
                                
<?php wcm_footer(); ?>

   