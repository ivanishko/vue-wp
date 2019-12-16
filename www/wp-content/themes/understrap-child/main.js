( function() {
	const app = new Vue({
		el: '#app',
		data: {
			matches: []
		},
		created () {
			fetch('./../matches.json')
				.then(response => response.json())
				.then(json => {
					this.matches = json.matches
				})
		}
		// mounted: function(){
		// 	document.write('<h1>Hello!</h1>')
		// 	console.log("WP Vue Theme!!!");
		// }
	});
})();
