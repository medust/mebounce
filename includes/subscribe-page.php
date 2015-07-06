<?php
/**
 * @author Medust.com
 * Plugin: meBounce
 */
?>

<?php 
global $wpdb;

$mb_table = $wpdb->prefix . "mebounce_user";

$result = $wpdb->get_results( "SELECT * FROM $mb_table"); //mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result 

//echo "<pre>"; print_r($result); echo "</pre>";
?>

    <div class="wrap">

            <u><h2>meBounce Plugin by Medust</h2></u>

            <div align="left">
                <br>

                <a href="https://twitter.com/Medusts" class="twitter-follow-button" data-show-count="false"
                   data-size="large">Follow @Medusts</a>
                <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>

                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fmedustdotcom&amp;width=292&amp;height=62&amp;show_faces=false&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=false&amp;appId=390019957675094"
                        scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:62px;"
                        allowTransparency="true"></iframe>

            </div>
            <div id="poststuff" class="metabox-holder has-right-sidebar">


                <div style="float:left;width:70%;">

                    <br>
					<table class="mb-list-table">
                    
                    <thead>
                    	<tr>
                        	<th>Email</th>
                            <th>Date &amp; Time</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php if($result!=true) {?>
                    	<tr>
                        	<td colspan="2" style="padding:30px; text-align:center;">Sorry! No Subscriber Here to Display.</td>
                        </tr>
                    <?php } else {?>
                    <?php foreach($result as $row) {?>
                    	<tr>
                        	<td><?php echo $row->email; ?></td>
                            <td><?php echo $row->time; ?></td>
                        </tr>
                    <?php }
					}
					?>
                    </tbody>
                </table>
                </div>
                
                
                    <?php
                    //require_once 'setting-page/medust-left-column.php';
                    require_once 'setting-page/medust-right-column.php';
                    require_once 'setting-page/medust-footer.php';

                    ?>
