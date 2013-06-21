<?php 
add_action("wp_head", "theme_scripts"); 

function theme_scripts() { ?>

	<script type='text/javascript'>
	(function($) {
		$(document).ready(function() { 
			
			$('a[href=#top]').click(function(){
				$('html, body').animate({scrollTop:0}, 'slow');
				return false;
			});

			$("span[rel]").overlay({effect: 'apple'});
			$("ul.tabs").tabs("div.panes > div");
			$(".scrollable").scrollable({ mousewheel: true });	

		});
	})(jQuery);
	</script>
<?php } ?>