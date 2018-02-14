<?php
/**
 * Modal template to be used with Underscores.js templating.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<script id="tmpl-modal" type="text/template">
	<div class="modal fade" id="bigbox-ajax-modal" tabindex="-1" role="dialog" aria-labelledby="{{ data.id }}-label" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="{{ data.id }}-label">{{{ data.title.rendered }}}</h5>

					<button type="button" class="button button--blank modal-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					{{{ data.content.rendered }}}
				</div>
			</div>
		</div>
	</div>
</script>
