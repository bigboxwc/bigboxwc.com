/* global BigBox */

/**
 * External dependencies.
 */
import axios from 'axios';
import { debounce } from 'lodash';

window.wp = window.wp || {};
const $searchField = $( '#docs-search-keywords' );
const $searchResults = $( '#docs-search-results' );
const $recordedTerm = $( '.docs-recorded-search-term [type="text"]' );
let hasSearched = false;
let searchResults = null;

/**
 * Perform search.
 *
 * We cannot use wp.ajax as it expects a specifically structured response.
 *
 * @Param   {string} searchTerm Term to seasrch for.
 * @return {Promise} Promise Search results.
 */
const searchDocs = function( searchTerm ) {
	// User has searched -- let Gravity Forms know.
	hasSearched = true;
	$( document ).trigger( 'gform_hasSearched' );

	return axios.get( `${ BigBox.support.apiRoot }?query=${ searchTerm }` )
		.then( function( response ) {
			searchResults = response.data.articles.results;
		} )
		.catch( function() {
			searchResults = null;
		} );
};

/**
 * Display found items or relevant message.
 *
 * @param {string} searchTerm Term to search.
 */
const displaySuggestions = function( searchTerm ) {
	const tmpl = wp.template( 'docsSearchResult' );

	// Clear existing.
	$searchResults.html( '' );

	if ( ! searchResults ) {
		return;
	}

	// Results and term.
	if ( searchResults.length > 0 && '' !== searchTerm ) {
		$searchResults.fadeIn();

		_.each( searchResults, function( result ) {
			$searchResults.append( tmpl( result ) );
		} );

		// No results and term.
	} else if ( 0 === searchResults.length && '' !== searchTerm ) {
		$searchResults.fadeIn();

		// @todo use a template.
		$searchResults.append( '<li>Nothing found. Please adjust your search terms or submit a ticket below.</li>' );

		// Catch all.
	} else {
		$searchResults.fadeOut();
	}
};

/**
 * Watch for DOM input.
 *
 * @since 1.0.0
 */
$searchField.on( 'keyup', debounce( function() {
	const searchTerm = $( this ).val();
	const results = searchDocs( searchTerm );
  
	results.then( function() {
		displaySuggestions( searchTerm );
		logInput( searchTerm );
	} );
}, 300 ) );

/**
 * Log the input in the form.
 *
 * @since 1.0.0
 */
const logInput = ( searchTerm ) => {
	$recordedTerm.val( searchTerm );
};

/**
 * Close results clicking elsewhere.
 *
 * @since 1.0.0
 */
$searchResults.click( function( e ) {
	e.stopPropagation();
} );

$( window ).on( 'click', function() {
	$searchResults.fadeOut();
} );

/**
 * Connect to Gravity Forms.
 *
 * Only enable the first "Reproduction Steps" checkbox after a search.
 *
 * @since 1.0.0
 */
$( document ).on( 'gform_post_render gform_hasSearched', function() {
	const $item = $( '.gfield_checkbox li:first-child' );
  
	$item
		.find( 'input' )
		.attr( 'disabled', ! hasSearched )
		.end()
		.toggleClass( 'docs-search__needs-search', ! hasSearched );
} );
