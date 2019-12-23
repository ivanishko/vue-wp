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
<div id="app">
<div class="container">
	<div class="row">
		<div class="col col-9">
				<h1>Матч центр</h1>
				<div class="">
					<label for="rating">Bookmaker:</label>
					<input type="text" v-model="text">
					<div>{{text}}</div>
					<select v-model="selectBookmaker">
						<option selected disabled>Выберете букмекера</option>

						<option
							v-for="bookmaker in bookmakers"
							v-bind:value="bookmaker.name">
							{{bookmaker.translate}}
						</option>
					</select>
				</div>
				<div  class="d-flex flex-column bd-light mb-3">
					<div class="d-flex p-2 bd-light justify-content-md-between  text-center">
						<div>#</div>
						<div class="col-6">Teams</div>
						<div class="col-1">1</div>
						<div class="col-1">X</div>
						<div class="col-1">2</div>
					</div>
					<div  v-for="match in matches" class="d-flex p-2 bd-light justify-content-md-between">
						<div>{{match.id}}</div>
						<div class="col-6 text-center">{{match.team1}} - {{match.team2}}</div>
						<ratio :bet="match[selectBookmaker].bet1.toFixed(2)"></ratio>
						<ratio :bet="match[selectBookmaker].betX.toFixed(2)"></ratio>
						<ratio :bet="match[selectBookmaker].bet2.toFixed(2)"></ratio>
					</div>

				</div>

			</div>

		<div class="col col-3">
		<coupon v-show="true"></coupon>
			<?php get_template_part( 'sidebar-templates/sidebar', 'banner-right' ); ?>
		</div>

	</div>
</div>

</div>



<?php wp_footer(); ?>
</body>
</html>
