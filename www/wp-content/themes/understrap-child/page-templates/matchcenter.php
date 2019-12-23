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
		<div class="col-lg-8 col-sm-12">
				<h1>Матч центр</h1>
				<div class="">
					<label for="rating">Bookmaker:</label>
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
					<table>
						<thead>
							<th scope="col">#</th>
							<th scope="col">Teams</th>
							<th scope="col">1</th>
							<th scope="col">X</th>
							<th scope="col">2</th>
							</thead>
						<tr v-for="(match,index) in matches" class="table table-bordered">
							<td>{{index + 1 }}</td>
							<td class="col-6 text-center">{{match.team1}} - {{match.team2}}</td>
							<td class="td_kef"  @click="addBet(match.id, match.team1, match.team2, match[selectBookmaker].bet1.ratio, match[selectBookmaker].bet1.eventBet, match[selectBookmaker].bookName)"> {{match[selectBookmaker].bet1.ratio.toFixed(2)}}</td>
							<td class="td_kef"  @click="addBet(match.id, match.team1, match.team2, match[selectBookmaker].betX.ratio, match[selectBookmaker].betX.eventBet, match[selectBookmaker].bookName)"> {{match[selectBookmaker].betX.ratio.toFixed(2)}}</td>
							<td class="td_kef"  @click="addBet(match.id, match.team1, match.team2, match[selectBookmaker].bet2.ratio, match[selectBookmaker].bet2.eventBet, match[selectBookmaker].bookName)"> {{match[selectBookmaker].bet2.ratio.toFixed(2)}}</td>
						</tr>
					</table>

				</div>

			</div>

		<div class="col-lg-4 col-sm-12">
			<div v-show="couponEnabled()">


			<h2>Coupon</h2>
				<button class="btn btn-danger" @click="clearCoupon">Clear coupon</button>
			<table class="table table-bordered">
				<tr v-for="(bet, key, index) in bets" :key="key">
					<td>{{key + 1}}</td>
					<td>{{bet.bet.toFixed(2)}}</td>
					<td>{{bet.team1}} - {{bet.team2}}</td>
					<td>{{bet.book}}</td>
					<td>{{initEvent(bet.eventBet)}}</td>
				</tr>
			</table>
			<div>
				<span>Total ratio: </span><strong>{{getTotalRatio().toFixed(2)}}</strong>
			</div>
			<label for="cash">Your cash: </label> <input id="cash" v-model="cash" type="text" value="100">
			<div>
				<span>You possible winniings: </span><strong>{{getPossible().toFixed(2)}}</strong>
			</div>


		</div>
			<?php get_template_part( 'sidebar-templates/sidebar', 'banner-right' ); ?>
		</div>

	</div>
</div>

</div>



<?php wp_footer(); ?>
</body>
</html>
