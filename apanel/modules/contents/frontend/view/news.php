<div class = "container-fluid" align="center" style="width: 100%">
	<div class = "col-md-4">
		<ul class = "sidebar-nav">
			<font color = "#FA8072"><h3 class = "firstletter hthree">Find Us At</h3></font>
			<hr class = "divider">
			<div class = "margin">
				<div style = "font-size : 16px;">
					<a href="#" style = "color : #696969;">June 2017
					</a>
				</div>
				<div style = "font-size : 16px;">
					<a href="#" style = "color : #696969;">July 2016</a>
				</div>
				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">October 2015</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">August 2015</a>
				</div>

				<div style = "font-size : 16px;">
					<a href="#" style = "color : #696969;">May 2015</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">July 2014</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">August 2013</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">September 2012</a>
				</div>

				<div style = "font-size : 16px;">
					<a href="#" style = "color : #696969;">July 2011</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">May 2010</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">June 2009</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">May 2009</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">January 2009</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">September 2008</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">May 2008</a>
				</div>

				<div style = " font-size : 16px;">
					<a href="#" style = "color : #696969;">April 2008</a>
				</div>
			</div>
		</ul>
	</div>

	<div class = "col-md-8" id = "news">
		<h2 style = "text-align: left;"  class = "hthree">News & Updates</h2>
		<br><br>

		<div id="right_sub_content" class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="content"></div>
			<div id="pagination"></div>
		</div>
		<br>
	</div>
</div>
<br>

<script>
	var ajax = {};
	var ajax_call = '';
	function  getList() {
		if (ajax_call != '') {
			ajax_call.abort();
		}
		
		ajax_call = $.post('<?php echo MODULE_URL ?>ajax/ajax_get_list', ajax, function(data) {
			$('#right_sub_content #content').html(data.table);
			$('#right_sub_content #pagination').html(data.pagination);
		});
	}
	$('#pagination').on('click', '.pagination li a', function() {
		ajax.page = $(this).attr('data-page');
		getList();
	});
	getList();
</script>