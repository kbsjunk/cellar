Vue.config.debug = true;

Vue.directive('draggable', {
	priority: 1000,

	bind: function () {
		var self = this;

		$(self.el).draggable({
			handle: '.bottle',
			helper: function() { return $('<div class="ui-draggable-dragging" />'); },
			cursorAt: { top: 16, left: 16 },
			revert: 'invalid',
			cursor: '-webkit-grabbing',
			stop: function() {
				console.log(self.el);
			}
		});
	},
	update: function (value) {
	},
});

Vue.directive('droppable', {
	priority: 1000,

	bind: function () {
		var self = this;

		$(self.el).droppable({
			accept: "#wines li",
			drop: function( event, ui ) {
				self.dragged = $(ui.draggable);
				$(this).addClass( "dropped" );
				// console.log(self);
				// console.log($(ui.draggable).data('wine'));
			}
		});
	},
});

new Vue({

	el: '#racks',

	ready: function() {
		this.getRack();
		this.getWines();
	},

	data: {
		rack: [],
		wines: [],
		selected: []
	},

	filters: {
	},

	methods: {
		noAddress: function(item) {
			var address = item.address;
			return (!item.address || 0 === address.length);
		},
		hasAddress: function(item) {
			var address = item.address;
			return !(!item.address || 0 === address.length);
		},
		spreadsheetColumnLabel: function(index) {
			/* http://docs.handsontable.com/0.15.0-beta3/helpers.js.html */
			var dividend = index + 1;
			var columnLabel = '';
			var modulo;
			while (dividend > 0) {
				modulo = (dividend - 1) % 26;
				columnLabel = String.fromCharCode(65 + modulo) + columnLabel;
				dividend = parseInt((dividend - modulo) / 26, 10);
			}
			return columnLabel;
		},
		selectCells: function() {


		},
		getRack: function() {
			var resource = this.$resource('/racks.json');

			resource.get(function (data, status, request) {
				this.$set('rack', data);

			}).error(function (data, status, request) {

			});
		},
		getWines: function() {
			var resource = this.$resource('/wines.json');

			resource.get(function (data, status, request) {
				this.$set('wines', data);
				this.$nextTick(function () {
					this.makeDraggable();
				});
			}).error(function (data, status, request) {

			});
		},
		makeDraggable: function() {
			// $( "#wines li" ).draggable({
			// 	handle: '.bottle',
			// 	helper: function() { return $('<div class="ui-draggable-dragging" />'); },
			// 	cursorAt: { top: 16, left: 16 },
			// 	revert: 'invalid',
			// 	cursor: '-webkit-grabbing'
			// });
			// $( "#rack li.rack-cell.open" ).droppable({
			// 	accept: "#wines li",
			// 	drop: function( event, ui ) {
			// 		$(this).addClass( "dropped" );
			// 		console.log($(ui.draggable).data('wine'));
			// 	}
			// });
}
}

});

