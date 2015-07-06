<?php
/**
 * @author Medust.com
 * Plugin: meBounce
 */
?>

<div class="postbox">
	<div class="medust">
		<h3>
			Modal Options Settings
		</h3>

		<div>
			<table class="form-table">
            	
                <tr valign="top" class="alternate">
					<th scope="row"><label>Aggressive</label></th>
					<td>
                    <input name="as_mebounce_aggressive" type="radio" value="true" <?php checked('true', $as_mebounce_aggressive); ?> /> &nbsp;YES 
                    <input name="as_mebounce_aggressive" type="radio" value="false" <?php checked('false', $as_mebounce_aggressive); ?> /> &nbsp;NO (default)
                    
                    <p>By default, meBounce will only fire once for each visitor. When meBounce fires, a cookie is created to ensure a non obtrusive experience.</p>

					<p>There are cases, however, when you may want to be more aggressive (as in, you want the modal to be elegible to fire anytime the page is loaded/ reloaded). This could be useful when you are setting up the plugin for the first time for your blog. If you enable aggressive, the modal will fire any time the page is reloaded, for the same user. But after setting up the plugin properly we would recommend you to go with the default setting for this field.</p>
                	</td>
				</tr>
                
                <tr valign="top">
					<th scope="row" style="width: 29%;"><label>Delay</label></th>
					<td>
                    <input type="text" id="meStyled" name="as_mebounce_delay" value="<?php echo get_option('as_mebounce_delay'); ?>" placeholder="MilliSeconds">
                    <p>By default, meBounce will show the modal immediately. You could instead configure it to wait x milliseconds before showing the modal. If the user's mouse re-enters the body before delay ms have passed, the modal will not appear. This can be used to provide a "grace period" for visitors instead of immediately presenting the modal window.</p>
                    </td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row" style="width: 29%;"><label>Cookie Expiration</label></th>
					<td>
                    <input type="text" id="meStyled" name="as_mebounce_cookie_expire" value="<?php echo get_option('as_mebounce_cookie_expire'); ?>" placeholder="Days">
                    <p>meBounce sets a cookie by default to prevent the modal from appearing more than once per user. You can add a cookie expiration (in days) to adjust the time period before the modal will appear again for a user(eg. 10). By default, the cookie will expire at the end of the session, which for most browsers is when the browser is closed entirely.</p>
                    </td>
				</tr>
                				
				<tr valign="top">
					<th scope="row"><label>Cookie Domain</label></th>

					<td>
                    <input type="text" id="meStyled" name="as_mebounce_cookie_domain" value="<?php echo get_option('as_mebounce_cookie_domain'); ?>">
                    <p>meBounce sets a cookie by default to prevent the modal from appearing more than once per user. You can add a cookie domain using cookieDomain to specify the domain under which the cookie should work. By default, no extra domain information will be added. If you need a cookie to work also in your subdomain (like blog.example.com and example.com), then set a cookieDomain such as .example.com (notice the dot in front).</p>
                    </td>
				</tr>

			</table>
		</div>
	</div>
</div>

<a href="http://Medust.com/" target="_blank">Feedback</a>
|
<a href="http://twitter.com/Medusts" target="_blank">Twitter</a>
|
<a href="http://www.facebook.com/medustdotcom" target="_blank">Facebook</a>

<div class="submit">

	<input name="my_mbc_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('mbc-update-setting'); ?>" /> <input
		type="submit" name="info_update" class="button-primary"
		value="<?php _e('Update options'); ?> &raquo;" />

</div>
