jQuery(document).ready(function() {

	jQuery('body').on('click','.jm-post-like',function(event){
		event.preventDefault();
		heart = jQuery(this);
		post_id = heart.data("post_id");
		jQuery.ajax({
			type: "post",
			url: ajax_var.url,
			data: "action=jm-post-like&nonce="+ajax_var.nonce+"&jm_post_like=&post_id="+post_id,
			success: function(count){
				if( count.indexOf( "already" ) !== -1 )
				{
					var lecount = count.replace("already","");
					heart.removeClass("liked");
					document.getElementById('like-count-'+post_id).innerHTML=lecount;
				}
				else
				{
					heart.addClass("liked");
					document.getElementById('like-count-'+post_id).innerHTML=count;
				}
			}
		});
	});
});
