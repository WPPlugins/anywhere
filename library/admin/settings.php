<?php
/**
 * Anywhere settings page
 * This file displays all of the available settings
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package Anywhere
 */
 	global $wp_version;
	//if (version_compare($wp_version, '3.0', '< ')) {)

?>
<!-- Left Sidebar -->
<div id="left" style="float:left; width:66%;">

<div class="postbox open">

<h3>twitter API</h3>

<div class="inside">
	<table class="form-table">
    	<tr>
        	<th>
            	<label for="<?php echo $data['api']; ?>">Your twitter API:</label> 
            </th>
            <td>
                <input id="<?php echo $data['api']; ?>" name="<?php echo $data['api']; ?>" value="<?php echo $val['api']; ?>" size="21" maxlength="61"<?php if ( !$val['api'] ) echo ' style="background:#ffa5a5; border:1px solid #ff0000;"'; ?> />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Enter your twitter API key, if you don't have one, sign up <a href="http://dev.twitter.com/apps/new">here</a>.</span>
            </td>
        </tr>
        <tr>
        	<th>
            	<label for="<?php echo $data['version']; ?>">version:</label> 
            </th>
            <td>
            	<select id="<?php echo $data['version']; ?>" name="<?php echo $data['version']; ?>" style="width:60px;">
                    <option value="1" <?php if ( $val['version'] == '1' ) echo ' selected="selected"'; ?>>1</option>
                    <!--<option value="2" <?php if ( $val['version'] == '2' ) echo ' selected="selected"'; ?>>2</option>-->
                    <!--<option value="3" <?php if ( $val['version'] == '3' ) echo ' selected="selected"'; ?>>3</option>-->
                </select>
            </td>
        </tr>
        <tr id="twitter-handle"<?php if ( !$val['api'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['twitter_handle']; ?>">Your twiter handle:</label> 
            </th>
            <td>
				<input id="<?php echo $data['twitter_handle']; ?>" name="<?php echo $data['twitter_handle']; ?>" value="<?php echo $val['twitter_handle']; ?>" size="10" maxlength="32" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Enter your twitter handle, example: <code>@TheFrosty</code>.</span>
            </td>
        </tr>
    	<tr>
        	<th>
            	<label for="<?php echo $data['author']; ?>">author love:</label> 
            </th>
            <td>
                <input id="<?php echo $data['author']; ?>" name="<?php echo $data['author']; ?>" type="checkbox" <?php if ( $val['author'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Uncheck this box to <strong>hide</strong> &ldquo;@anywhere plugin by @TheFrosty&rdquo;. Please consider <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=CN9BU5LAYCXV8" title="Donate on PayPal" class="external">donating</a> first..<br />
                <strong>Note:</strong> This will only show up below the <code>tweetbox</code> (if active).</span>
            </td>
        </tr>
        
    </table>
    
</div>
</div>


<?php if ( $val['hide_ad'] ) : ''; else : ?>
<div class="postbox ad">
	<h3>
		<script type='text/javascript' src='http://wpads.net/ads/js.php?type=link&amp;align=center&amp;zone=2'></script>
    </h3>
</div>
<?php endif; ?>


<div class="postbox open">

<h3>Anywhere options</h3>

<div class="inside<?php if ( !$val['api'] ) echo ' addAPI'; ?>">
	<table class="form-table">
        <tr id="linkifyuser" <?php if ( !$val['api'] ) echo 'style="display:none;"'; ?>>
            <th>
            	<label for="<?php echo $data['linkifyusers']; ?>">linkifyUsers:</label> 
            </th>
            <td>
                <input id="<?php echo $data['linkifyusers']; ?>" name="<?php echo $data['linkifyusers']; ?>" type="checkbox" <?php if ( $val['linkifyusers'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Linkifying users will walk through the DOM and attempt to auto-link Twitter screen names. <a href="http://dev.twitter.com/anywhere/begin#auto-linkify" class="external">read more &raquo;</a></span>
            </td>
        </tr>
        <tr id="hovercard"<?php if ( !$val['api'] ) echo ' style="display:none;"'; ?>>
            <th>
            	<label for="<?php echo $data['hovercards']; ?>">hovercards:</label> 
            </th>
            <td>
                <input id="<?php echo $data['hovercards']; ?>" name="<?php echo $data['hovercards']; ?>" type="checkbox" <?php if ( $val['hovercards'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">A hovercard is a small context-aware tooltip that provides single-click access to data about a particular Twitter user. <a href="http://dev.twitter.com/anywhere/begin#hovercards" class="external">read more &raquo;</a></span>
            </td>
        </tr>    
    </table>
    
</div>
</div>

<div class="postbox open">

<h3>twitter tweetbox</h3>

<div class="inside<?php if ( !$val['api'] ) echo ' addAPI'; ?>">
	<table class="form-table">
        <tr id="use-tweetbox"<?php if ( !$val['api'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['tweetbox']; ?>">Use tweetbox:</label> 
            </th>
            <td>
                <input id="<?php echo $data['tweetbox']; ?>" name="<?php echo $data['tweetbox']; ?>" type="checkbox" <?php if ( $val['tweetbox'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Allow tweeting directly from your blog! <a href="http://dev.twitter.com/anywhere/begin#tweetbox" class="external">read more &raquo;</a></span>
            </td>
        </tr>
        <tr id="tweetbox-placement"<?php if ( !$val['tweetbox'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['tweetbox_placement']; ?>">Tweetbox placement:</label> 
            </th>
            <td>
                <label for="<?php echo $data['tweetbox_placement']; ?>_before">before content:
                <input id="<?php echo $data['tweetbox_placement']; ?>_before" name="<?php echo $data['tweetbox_placement']; ?>" value="before" type="radio" <?php if ( $val['tweetbox_placement'] == 'before' ) echo 'checked="checked"'; ?> /></label>
                
            	<label for="<?php echo $data['tweetbox_placement']; ?>_after">after content:
                <input id="<?php echo $data['tweetbox_placement']; ?>_after" name="<?php echo $data['tweetbox_placement']; ?>" value="after" type="radio" <?php if ( $val['tweetbox_placement'] == 'after' ) echo 'checked="checked"'; ?> /></label>
                
            	<label for="<?php echo $data['tweetbox_placement']; ?>_manual">manual:
                <input id="<?php echo $data['tweetbox_placement']; ?>_manual" name="<?php echo $data['tweetbox_placement']; ?>" value="manual" type="radio" <?php if ( $val['tweetbox_placement'] == 'manual' ) echo 'checked="checked"'; ?> /></label>
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Select where you'd like your tweetbox to be placed.</span>
            </td>
        </tr>
        <tr id="tweetbox-label"<?php if ( !$val['tweetbox'] || !$val['api'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['tweetbox_label']; ?>">tweetbox label:</label> 
            </th>
            <td>
				<input id="<?php echo $data['tweetbox_label']; ?>" name="<?php echo $data['tweetbox_label']; ?>" value="<?php echo $val['tweetbox_label']; ?>" size="21" maxlength="80" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Enter what you'd like the label of the tweetbox to say.</span>
            </td>
        </tr>
        <tr id="use-content"<?php if ( !$val['api'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['use_tweetbox_content']; ?>">Use custom content:</label> 
            </th>
            <td>
                <input id="<?php echo $data['use_tweetbox_content']; ?>" name="<?php echo $data['use_tweetbox_content']; ?>" type="checkbox" <?php if ( $val['use_tweetbox_content'] ) echo 'checked="checked"'; ?> value="true" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Allow custom default text inside your tweetbox!</a></span>
            </td>
        </tr>
        <tr id="tweetbox-content"<?php if ( !$val['tweetbox'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['tweetbox_content']; ?>">tweetbox content:</label> 
            </th>
            <td>
				<textarea id="<?php echo $data['tweetbox_content']; ?>" name="<?php echo $data['tweetbox_content']; ?>" cols="60" rows="3" style="width: 98%;"><?php echo wp_specialchars( stripslashes( $val['tweetbox_content'] ), 1, 0, 1 ); ?></textarea>
                Custom shorcodes: <code>[anywhere-title]</code>, <code>[anywhere-link]</code>, <code>[twitter-handle]</code>.
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Enter what you'd like the content of your tweetbox to say (the default text <em>can be changed by end users</em>). Try using some of the pre-made shortcodes! <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">More about <a href="http://codex.wordpress.org/Shortcode_API" title="Shortcodes">shortcodes</a>: 
                	<ul>
                    	<li><code>[anywhere-title]</code>: The current post's title</li>
                        <li><code>[anywhere-link]</code>: The current post's short link, example: <em>http://domain.com/?p=1234</em></li>
                    	<li><code>[twitter-handle]</code>: Your twitter username, entered above</li>
                    </li>
                </span>
                </span> 
            </td>
        </tr>
        <tr id="tweetbox-height"<?php if ( !$val['tweetbox'] || !$val['api'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['tweetbox_height']; ?>">tweetbox height:</label> 
            </th>
            <td>
				<input id="<?php echo $data['tweetbox_height']; ?>" name="<?php echo $data['tweetbox_height']; ?>" value="<?php echo $val['tweetbox_height']; ?>" size="10" maxlength="5" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Enter what you'd like the height to be, <strong>include</strong> <code>px</code><br />
                <em>example: <code>50px</code></em>.</span>
            </td>
        </tr>
        <tr id="tweetbox-width"<?php if ( !$val['tweetbox'] || !$val['api'] ) echo ' style="display:none;"'; ?>>
        	<th>
            	<label for="<?php echo $data['tweetbox_width']; ?>">tweetbox width:</label> 
            </th>
            <td>
				<input id="<?php echo $data['tweetbox_width']; ?>" name="<?php echo $data['tweetbox_width']; ?>" value="<?php echo $val['tweetbox_width']; ?>" size="10" maxlength="5" />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Enter what you'd like the width to be, <strong>include</strong> <code>px</code><br />
                <em>example: <code>450px</code></em>.</span>
            </td>
        </tr>
        
    </table>
    
</div>
</div>


</div> <!-- /float:left -->

<!-- Right Sidebar -->
<div style="float:right; width:33%;">

<div class="postbox open">

<h3>About This Plugin</h3>

<div class="inside">
	<table class="form-table">

	<tr>
		<th style="width:20%;">Description:</th>
		<td><?php echo 'Adds twitter <a href="http://dev.twitter.com/anywhere">@anywhere</a> javascript code to your blog.' //$plugin_data[ 'Description' ]; ?></td>
	</tr>
	<tr>
		<th style="width:20%;">Version:</th>
		<td><strong><?php echo $plugin_data[ 'Version' ]; ?></strong></td>
	</tr>
	<tr>
		<th style="width:20%;">Start:</th>
		<td><a class="thickbox thickbox-preview external" href="http://dev.twitter.com/anywhere/begin/?TB_iframe=true" title="Documentation">Documentation.</a></td>
	</tr>
	<tr>
		<th style="width:20%;">Support:</th>
		<td><a href="http://wordpress.org/tags/anywhere?forum_id=10" title="Get support for this plugin" class="external">WordPress support forums.</a></td>
	</tr>

	</table>
</div>
</div>

<div id="colordock" class="postbox open">

<h3>Quick Save</h3>

<div class="inside">
    
    <p class="submit" style="text-align: center;">
        <input type="submit" name="Submit"  class="button-primary" value="Save Changes" />
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
    </p>
    	
</div>
</div>


<div class="postbox open">

<h3>Support This Plugin</h3>

<div class="inside">
	<table class="form-table">

	<tr>
		<th style="width:20%;">Donate:</th>
		<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=CN9BU5LAYCXV8" title="Donate on PayPal" class="external">PayPal</a>.</td>
	</tr>
	<tr>
		<th style="width:20%;">Rate:</th>
		<td><a href="http://www.wordpress.org/extend/plugins/anywhere/" title="WordPress.org Rating" class="external">This plugin on WordPress.org</a>.</td>
	</tr>
    
	</table>
</div>
</div>

<div class="postbox open">

<h3>About The Author</h3>

<div class="inside">

	<ul>
    
		<li><?php echo $plugin_data[ 'Author' ]; ?>: Freelance web design / developer &amp; WordPress guru. Also head organizer of <a href="http://wordcamp.la">WordCamp.LA</a></li>
        
		<li><a href="http://twitter.com/TheFrosty" title="Austin Passy on Twitter" class="external">Follow me on twitter</a>.</li>
        
		<li>Need a WP expert? <a href="http://frostywebdesigns.com/" title="Frosty Web Designs" class="external">Hire me</a>.</li>
        
	</ul>
    
</div>
</div>

<div class="postbox open">

<h3><a href="http://thefrosty.net">TheFrosty Network</a> feeds</h3>

<div id="tab" class="inside">

	<ul class="tabs">
    
    	<li class="t1 t"><a>WordCampLA</a></li>
    	<li class="t2 t"><a>Me!</a></li>
    	<li class="t3 t"><a>wpWorkShop</a></li>
        
	</ul>
    
		<?php if ( function_exists( 'thefrosty_network_feed' ) ) thefrosty_network_feed( 'http://2010.wordcamp.la/feed', '1' ); ?>

		<?php if ( function_exists( 'thefrosty_network_feed' ) ) thefrosty_network_feed( 'http://austinpassy.com/feed', '2' );	?>

		<?php if ( function_exists( 'thefrosty_network_feed' ) ) thefrosty_network_feed( 'http://wpworkshop.la/feed', '3' ); ?>
    
</div>
</div>

<?php if (version_compare($wp_version, '3.0', '<')) { ?>
<div id="uninstall" class="postbox open">

<h3>Uninstaller <span><abbr title="Click here to show the box below">Don't do it!</abbr></span><span class="watchingyou">:O You did it...</span></h3>  
        
<div class="inside">
    <p style="text-align:justify;">If you really have to, use this <a href="../wp-content/plugins/anywhere/uninstall.php" title="Uninstall the Custom Login plugin with this script">script</a> to uninstall the plugin and completely remove all options from your WordPress database. <strong>Note:</strong> Will not work in WordPress 3.0+, simply deactivating the plugin will do :).</p>
    
    <p style="display:none;"><label for="<?php echo $data['hide_ad']; ?>">Hide ad?</label>
    	&nbsp;<input id="<?php echo $data['hide_ad']; ?>" name="<?php echo $data['hide_ad']; ?>" type="checkbox" <?php if ( $val['hide_ad'] ) echo 'checked="checked"'; ?> value="true" />	Please only hide the ad if you've <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=CN9BU5LAYCXV8" title="Donate on PayPal" class="external">donated</a>.
    </p>
    
</div>
</div>
<?php } ?>

</div> <!-- /float:right -->

<br style="clear:both;" />
