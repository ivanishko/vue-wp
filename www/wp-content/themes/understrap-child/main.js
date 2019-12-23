const app = new Vue({
	el: '#app',
	data: {
		matches: [],
		bookmakers : [],
		selectBookmaker: "winline",
		bets:[],
		text: '',
	},
	created () {
		fetch('./../matches_new.json')
			.then(response => response.json())
			.then(json => {
				this.matches = json.matches;
				this.bookmakers = json.bookmakers
			})
	},
	methods: {

	}



});


Vue.component('ratio',{
	data: function () {
			return {
				bets: []
			}
	},
	props : ['bet', 'eventbet'],
	methods: {
		addBet(bet) {
			console.log(bet);
			this.bets.push(bet);
		}
	},
	template:
	`<div class="col-1 block-bets" v-on:click="addBet(bet)">{{bet}}</div>`,

});




Vue.component('button-counter', {
	data: function () {
		return {
			count: 0
		}
	},
	props: ['title'],
	template: '<button v-on:click="count++">{{title}}Счётчик кликов — {{ count }}</button>'
});


Vue.component('coupon', {
	data: function () {
		return {
			count: 0
		}
	},
	props: ['bets'],
	template: '<div>' +
		'<h3>Купон</h3>' +
		'<table class="table table-bordered">' +
		'<tr><td>Bet</td></tr>' +
		'</table>' +
		'</div>'
});


