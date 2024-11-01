<?php
/*
Plugin Name: View Category
Plugin URI: http://blog.aizatto.com/view-category
Description: Adds a "View" button to the top of an 'edit category'
Author: Ezwan Aizat Bin Abdullah Faiz
Author URI: http://aizatto.com
Version: 0.1
License: LGPLv2
*/

add_action('edit_tag_form_pre', 'edit_tag_form_pre');
add_action('edit_category_form_pre', 'edit_tag_form_pre');

function edit_tag_form($tag) {
	global $tax;

	printf('<a href="%s" class="button">%s</a>', get_term_link($tag, $_GET['taxonomy']), sprintf(_x('View %s', '%s: singular taxonomy name'), $tax->singular_label));
}

function edit_tag_form_pre($tag) {
?>
<script type="text/javascript">
jQuery(function($) {
	$("h2, p.submit").append(' <?php edit_tag_form($tag); ?>');
});
</script>
<?php
}
