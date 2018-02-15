<?php
/**
 * Doc search results template to be used with Underscores.js templating.
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

<script id="tmpl-docsSearchResult" type="text/template">
	<li id="{{data.id}}" class="docs-search__results-item">
		<a href="{{data.url}}" class="docs-search__results-link" target="_blank" rel="noopener noreferrer">
			{{data.name}}
		</a>
	</li>
</script>
