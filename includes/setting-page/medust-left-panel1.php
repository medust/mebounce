<?php
/**
 * @author Medust.com
 * Plugin: meBounce
 */
?>

<div class="postbox">
	<div class="medust">
		<h3>Modal Info Settings</h3>

		<div>
			<table class="form-table">

				<tr valign="top" class="alternate">
					<th class="mb" scope="row" style="width: 29%;"><label>Modal Title</label></th>
					<td><input id="meStyled" name="as_mebounce_modal_title" value="<?php echo get_option('as_mebounce_modal_title'); ?>">
                    </td>
				</tr>

				<tr valign="top">
					<th class="mb" scope="row" style="width: 29%;"><label>Modal Paragraph</label></th>
					<td><textarea id="meStyled" name="as_mebounce_modal_paragraph"><?php echo get_option('as_mebounce_modal_paragraph'); ?></textarea>
                	</td>
				</tr>
                
                <tr valign="top" class="alternate">
					<th class="mb" scope="row" style="width: 29%;"><label>Submit Button Text</label></th>
					<td><input id="meStyled" name="as_mebounce_modal_submit_btn" value="<?php echo get_option('as_mebounce_modal_submit_btn'); ?>">
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
