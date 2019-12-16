<?php
/**
 * Template Name: Match Center Template
 *
 * Template for displaying matchcenter.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col col-9">
			<div id="app">
				<h1>Матч центр</h1>
				<table class="table">
					<tr v-for="match in matches">
						<td>{{match.id}}</td>
						<td>{{match.team1}} - {{match.team2}}</td>
						<td>{{match.bet1.toFixed(2)}}</td>
						<td>{{match.betX.toFixed(2)}}</td>
						<td>{{match.bet2.toFixed(2)}}</td>
					</tr>

				</table>

			</div>
		</div>
		<div class="col col-3">

		</div>
	</div>
</div>





<?php wp_footer(); ?>
</body>
</html>
