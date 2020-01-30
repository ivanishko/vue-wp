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
<div id="app">
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-sm-12" v-if="!couponScreenOnly">
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
							<td class="td_kef">
								<div
									v-bind:class="initClass(match[selectBookmaker].bet1.idBet)"
									@click="addBet(match.id, match.team1, match.team2, match[selectBookmaker].bet1.ratio, match[selectBookmaker].bet1.eventBet, match[selectBookmaker].bookName, match[selectBookmaker].bet1.idBet)"
								>{{match[selectBookmaker].bet1.ratio.toFixed(2)}}</div>
							</td>
							<td class="td_kef">
								<div
									v-bind:class="initClass(match[selectBookmaker].betX.idBet)"
									@click="addBet(match.id, match.team1, match.team2, match[selectBookmaker].betX.ratio, match[selectBookmaker].betX.eventBet, match[selectBookmaker].bookName, match[selectBookmaker].betX.idBet)"
									>{{match[selectBookmaker].betX.ratio.toFixed(2)}}</div>
							</td>
							<td class="td_kef">
								<div
									v-bind:class="initClass(match[selectBookmaker].bet2.idBet)"
									@click="addBet(match.id, match.team1, match.team2, match[selectBookmaker].bet2.ratio, match[selectBookmaker].bet2.eventBet, match[selectBookmaker].bookName, match[selectBookmaker].bet2.idBet)"
								 >{{match[selectBookmaker].bet2.ratio.toFixed(2)}}</div>
							</td>
						</tr>
					</table>

				</div>
				<img src="/wp-content/uploads/2020/01/Снимок-экрана-2020-01-30-в-13.12.50.png" />
				 <p><a href="https://github.com/ivanishko/vue-wp/blob/master/www/wp-content/themes/understrap-child/main.js" target=_blank>Код страницы</a></p>
			</div>

		<div class="col-lg-4 col-sm-12">
			<div v-show="couponEnabled()">
				<h2>Coupon</h2>
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>#</th>
						<th>Ratio</th>
						<th>Match</th>
						<th>Book.</th>
						<th>Event</th>
						<th>Del</th>
					</tr>
					</thead>
					<tbody>
					<tr v-for="(bet, key, index) in bets" :key="key">
						<td>{{key + 1}}</td>
						<td>{{bet.bet.toFixed(2)}}</td>
						<td>{{bet.team1}} - {{bet.team2}}</td>
						<td>{{bet.book}}</td>
						<td>{{initEvent(bet.eventBet)}}</td>
						<td><button class="btn btn-light" @click="deleteBet(key)">X</button></td>
					</tr>
					</tbody>
				</table>
				<div>
					<span>Total ratio: </span><strong>{{getTotalRatio().toFixed(2)}}</strong>
				</div>
				<label for="cash">Your cash: </label>
				<input
					id="cash"
					v-model="cash"
					type="text"
					oninput="this.value = this.value.replace(/[A-zА-яЁё\s]$/, '')"

				>
				<div>
					<span>You possible winnings: </span><strong>{{getPossible().toFixed(2)}}</strong>
				</div>
				<button class="btn btn-danger" @click="clearCoupon">Clear coupon</button>
			</div>
			<?php get_template_part( 'sidebar-templates/sidebar', 'banner-right' ); ?>
		</div>

	</div>

</div>
	<div v-show="initMobileScreen()" class="nav_container footer_nav_menu">
		<ul>
			<li>Point 1</li>
			<li>Point 2</li>
			<li v-bind:class="enableClassCoupon()" @click="clickNavPanel()" >Купон <span v-show="this.bets.length" class="enabled-coupon">{{this.bets.length}}</span></li>
			<li>Point 4</li>
			<li>Point 5</li>
		</ul>
	</div>
</div>

<?php wp_footer(); ?>

