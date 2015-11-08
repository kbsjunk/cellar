<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
	<style>
		.open {

		}
		.closed {
			background: #ddd;
		}
		.ui-selecting {
			background: #eee;
		}
		.dropped {
			background: #bbb;
		}
		.ui-state-hover {

		}
		.ui-draggable-dragging {
			background: #fff;
			border: 1px solid #ddd;
			padding: 4px;
			display: block;
			width: 32px;
			height: 32px;
			border-radius: 100px;
			position: relative;
		}
		.rack, .wine-list {
			user-select: none;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		.rack {
			overflow: auto;
			white-space: nowrap;
			line-height: 0;
		}
		.rack .rack-row li {
			display: inline-block;
			/*float: left;*/
		}
		.rack .rack-cell {
			width: 40px;
			height: 40px;
		}
		.rack .rack-column-header {
			height: 20px;
			width: 40px;
		}
		.rack .rack-row-header {
			width: 20px;
			height: 40px;
			line-height: 70px;
			/*height: 28px;*/
			/*padding-top: 8px;*/
		}
		.rack .rack-intersect {
			width: 20px;
			height: 20px;
		}
		.rack-row {
			display: block;
		}
		.rack .rack-cell {
			border: 1px solid #ddd;
			border-radius: 100px;
		}
		.rack .rack-column-header,
		.rack .rack-row-header {
			text-align: center;
			font-weight: bold;
		}
		.drag-wine .bottle {
			width: 16px;
			height: 16px;
			display: inline-block;
			border: 1px solid #ddd;
			border-radius: 100px;
			margin-top: 4px;
			margin-bottom: -4px;
			margin-right: 6px;
			cursor: -webkit-grab;
			cursor: -moz-grab;
		}
	</style>
</head>
<body>

	<div class="container">
		<div id="racks" class="row">
			<div class="col-md-6">
				<h3>Wine Rack</h3>
{{-- 				<table id="rack" class="table table-bordered rack" style="width:auto;">
					<thead>
						<tr>
							<th style="width:40px"></th>
							<th style="width:40px;height:40px" v-for="(c, col) in rack.columns">
								@{{ spreadsheetColumnLabel(c) }}
							</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(r, row) in rack.rows">
							<th>
								@{{ r + 1 }}
							</th>
							<td v-for="(c, col) in row.columns" class="@{{ col.status }}">

							</td>
						</tr>
					</tbody>
				</table> --}}
				<ul id="rack" class="rack list-unstyled clearfix">
					<li>
						<ul class="list-unstyled rack-row clearfix">
							<li class="rack-intersect"></li>
							<li class="rack-column-header" v-for="(c, col) in rack.columns">
								@{{ spreadsheetColumnLabel(c) }}
							</li>
						</ul>
					</li>
					<li>
						<ul class="list-unstyled rack-row clearfix" v-for="(r, row) in rack.rows">
							<li class="rack-row-header">
								@{{ r + 1 }}
							</li>
							<li v-for="(c, col) in row.columns" v-droppable class="rack-cell @{{ col.status }}">

							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<h3>Wines</h3>
				<ul id="wines" class="list-unstyled wine-list">
					<li v-for="wine in wines | filterBy noAddress" v-draggable class="drag-wine" data-wine="@{{ wine.id }}"><span class="bottle"></span>@{{ wine.wine }}</li>
				</ul>
				<h3>Placed Wines</h3>
				<ul id="wines" class="list-unstyled wine-list">
					<li v-for="wine in wines | filterBy hasAddress" class="drag-wine"><span class="bottle"></span>@{{ wine.wine }}</li>
				</ul>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.4/vue.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.16/vue-resource.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="{{ asset('racks.js') }}" type="text/javascript" charset="utf-8"></script>

</body>
</html>
{{-- https://scotch.io/tutorials/build-an-app-with-vue-js-a-lightweight-alternative-to-angularjs --}}