const app = new Vue({
	el: '#app',
	data: {
		matches: [],
		bookmakers: [],
		selectBookmaker: "winline",
		bets: [],
		cash: 100,
		couponScreenOnly: false
	},

	created() {
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
			if (this.bets.length && !this.initMobileScreen()) {
				console.log('var 1')
				return true
			}
			if ((this.bets.length || this.initMobileScreen()) && this.couponScreenOnly) {
				console.log('var 2')
				return true;
			}
		}
		,
		initEvent(eventBet){
			switch(eventBet) {
				case "1" : return "П1";
				case "2" : return "П2";
				case "X" : return "Н";
				default: return 0;
			}
		},
		initClass(idBet){
			if (this.bets.find(item => item.idBet === idBet)) {
				return "checkBet";
			}
		},
		existBet(id){
			if (this.bets && this.bets.find(item => item.idBet === id)) {
				 return true
			}
		},

		initIndexBet(idBet){
			return  this.bets.findIndex(item => item.idBet === idBet)
		},

		initIndexMatch(id){
			return this.bets.find(item => item.idMatch === id)
		},

		addBet(idMatch, team1, team2, bet, eventBet, book, idBet){
			const betUser = {
				idMatch,
				team1,
				team2,
				bet,
				eventBet,
				book,
				idBet
			};
			let index = this.initIndexBet(idBet);

				//Проверка на отсуствии этой ставки
			if (!this.existBet(idBet) && !this.initIndexMatch(idMatch))  {
				this.bets.push(betUser);

				//Проверка на существовании ставки на этот матч но другое событие
			}  else if (!this.existBet(idBet) && this.initIndexMatch(idMatch)) {
				this.bets = this.bets.filter(item => item.idMatch !== idMatch);
				this.bets.push(betUser);
			}
				//Действие на повторное нажатие
			else {
				this.bets.splice(index,1);
			}

			localStorage.setItem('bets', JSON.stringify(this.bets));

			},

		deleteBet(index){
			this.bets.splice(index,1);
			if (!this.bets.length && this.couponScreenOnly) {
				this.couponScreenOnly = false
			}
			localStorage.setItem('bets', JSON.stringify(this.bets));
		},
		clearCoupon(){
			this.bets = [];

			if (!this.bets.length && this.couponScreenOnly) {
				this.couponScreenOnly = false
			}

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

		initMobileScreen() {
			let width = window.innerWidth
				|| document.documentElement.clientWidth
				|| document.body.clientWidth;

			if (width <= 765) {
				return true;
			}
		},
		enableClassCoupon(){
			if (!this.bets.length){
				return "disable-coupon"
			}
		},

		clickNavPanel(){
			if (this.bets.length) {
				this.couponScreenOnly = !this.couponScreenOnly ;
			}
		}
	}
});



