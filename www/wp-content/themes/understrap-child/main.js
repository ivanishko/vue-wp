const app = new Vue({
	el: '#app',
	data: {
		matches: [],
		bookmakers : [],
		selectBookmaker: "winline",
		bets:[],
		text: '',
		cash: 100,
	},

	created () {
		fetch('./../matches_new.json')
			.then(response => response.json())
			.then(json => {
				this.matches = json.matches;
				this.bookmakers = json.bookmakers
			})
	},
	mounted(){
		this.bets =  JSON.parse(localStorage.getItem('bets') || []);
		this.cash =  JSON.parse(localStorage.getItem('userCash') || 100);
	},

	methods: {
		couponEnabled(){
			return this.bets.length;
		},
		initEvent(eventBet){
			switch(eventBet) {
				case "1" : return "Победа 1";
				case "2" : return "Победа 2";
				case "X" : return "Ничья";
				default: return 0;
			}
		},
		addBet(matchID, team1, team2, bet, eventBet, book){
			let idBet = Math.round(Math.random() * 10000)
			let betUser = {
				idBet,
				matchID,
				team1,
				team2,
				bet,
				eventBet,
				book
			};
			let userCash = this.cash;
			this.bets.push(betUser);

			localStorage.setItem('bets', JSON.stringify(this.bets));
			localStorage.setItem('userCash', userCash);
			console.log(this.bets);
		},
		deleteBet(index){
			this.bets.splice(index,1);
			console.log("delete");
			localStorage.setItem('bets', JSON.stringify(this.bets));
		},
		clearCoupon(){
			this.bets = [];
			localStorage.setItem('bets',[]);
			this.cash = 100;
			localStorage.setItem('userCash',this.cash);

		},
		getPossible(){
			if (this.bets) {

				return this.cash * this.getTotalRatio();
			}
			return 0;
		},
		getTotalRatio(){
			if (this.bets) {
				let kef = this.bets.reduce((kef, current) => current.bet * kef, 1);
				return kef;
			}
			return 1;
		},
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


