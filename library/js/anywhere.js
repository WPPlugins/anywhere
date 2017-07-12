jQuery(document).ready(
	function() {
			
	// Setting the tabs in the sidebar hide and show, setting the current tab
	jQuery('.tab-content').hide();
	jQuery('.t1').show();
	
	jQuery('ul.tabs li.t1 a').addClass('tab-current');
	jQuery('ul li a').css('cursor','pointer');
	
	jQuery('#tab ul.tabs li.t1 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t1').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	jQuery('#tab ul.tabs li.t2 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t2').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	jQuery('#tab ul.tabs li.t3 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t3').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	
	// #right Uninstall script toggle
	jQuery('#uninstall .inside, #uninstall h3 span.watchingyou').hide();
	jQuery('#uninstall h3').click(function() {
		jQuery(this).next().toggle(280);
		jQuery(this).find('span.watchingyou').toggle().prev().toggleClass('hide');
	});
	
	// #left h3 toggle
	jQuery('#left .postbox h3').append('<span><abbr title="Click here to hide the box below">click to toggle</abbr></span>');
	jQuery('#left .postbox h3').click(function() {

		jQuery(this).next().toggle(280);

	});
	
	// .ad Block
	jQuery('#left .postbox.ad h3 span').css('display','none');
	
	// #left a.question toggle span.hide
	jQuery('#left  span.hide').hide();
	jQuery('#left a.question').click(function() {
		jQuery(this).next().next().toggleClass('hide').toggleClass('show').toggle(380);
	});
	
	// External window!
	jQuery('a.external').attr('target','_blank');
	if ( jQuery('a.external').attr('title') !== undefined )
		null;
	else
		jQuery(this).attr('title','opens in a new tab');
		
	
	// If the API is entered and is greater than said characters
	jQuery('input#api').keyup(function() {
		var charLength = jQuery(this).val().length;
		//console.log(charLength);
		if ( jQuery(this).val().length >= 18 ) {
			jQuery(this).css({
				background: '#fff',
				border: '1px solid #aaa'
			});
			jQuery('#twitter-handle,#linkifyuser,#hovercard,#use-tweetbox').show(); //show the hidden boxes
			jQuery('#linkifyuser,#use-tweetbox').parent().parent().parent().removeClass('addAPI'); //remove a class
			jQuery('.inside').removeClass('addAPI').find('.please-add').hide(); //hide the 'h4' tag
		} else {
			jQuery(this).css({
				background: '#FFA5A5',
				border: '1px solid #FF0000'
			});
			jQuery('#twitter-handle,#linkifyuser,#hovercard,#use-tweetbox').hide(); //hide the boxes
			jQuery('#linkifyuser,#use-tweetbox').parent().parent().parent().addClass('addAPI'); //add a class
			jQuery('div.inside.addAPI').find('.please-add').show(); //show the 'h4' tag
		}
	});
	
	
	// If tweetbox is checked
	jQuery('input#tweetbox').change(function() {
		var checked = jQuery('input#tweetbox:checked').val();
		var check = jQuery('input#use_tweetbox_content:checked').val();
		//console.log(charLength);
		if ( checked ) {
			jQuery('#tweetbox-placement,#tweetbox-label,#tweetbox-height,#tweetbox-width,#use-content').show();
				if ( check ) {
					jQuery('#tweetbox-content').show();
				}
		} else {
			jQuery('#tweetbox-placement,#tweetbox-label,#tweetbox-height,#tweetbox-width,#use-content,#tweetbox-content').hide();
				if ( !check ) {
					jQuery('#tweetbox-content').hide();
				}
		}
	});
	
	// If tweetbox is checked
	jQuery('input#use_tweetbox_content').change(function() {
		var checked = jQuery('input#use_tweetbox_content:checked').val();
		//console.log(charLength);
		if ( checked ) {
			jQuery('#tweetbox-content').show();
		} else {
			jQuery('#tweetbox-content').hide();
		}
	});
	
	jQuery('div.inside').append('<h4 class="please-add" style="text-align:center;">Please add your API key to begin</h4>');
	
});
