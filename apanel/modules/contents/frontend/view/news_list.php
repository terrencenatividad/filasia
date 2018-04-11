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
		<?php foreach ($news_id as $row) :	?>
			<p class = "pstyle">
				<br>
				<b><?php echo $row->title; ?> </b>
				<br>
				<b>Date:</b> <font color = "red"><?php echo $row->entereddate; ?></font>
			</p>

			<p class ="pstyle">
				<br>
				<?php echo $row->content; ?>
				<br>
			</p>

			<a href="<?= BASE_URL ?>news#news"><font color = "blue">back</font></a>
			
			<br>
		<?php endforeach; ?>
		<br>
	</div>
</div>
<br>
