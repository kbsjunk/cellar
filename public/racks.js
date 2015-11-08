Vue.config.debug = true;

new Vue({

	el: '#racks',

	ready: function() {
		this.getRack();
		this.getWines();
		// $( "li.dragwine" ).draggable();
	},

	data: {
		rack: [],
		wines: [],
		selected: []
	},

	methods: {
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

			this.$set('selected', []);

			console.log(this.data.selected);

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
			$( "#wines li" ).draggable({
				handle: '.bottle',
				helper: function() { return $('<div class="ui-draggable-dragging" />'); },
				cursorAt: { top: 16, left: 16 },
				revert: 'invalid',
				cursor: '-webkit-grabbing'
			});
			$( "#rack li.rack-cell.open" ).droppable({
				accept: "#wines li",
				// activeClass: "ui-state-hover",
				// hoverClass: "ui-state-active",
				drop: function( event, ui ) {
					$(this).addClass( "dropped" );
				}
			});
		}
	}

});