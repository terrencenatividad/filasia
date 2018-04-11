<body style="background-image: url('<?= BASE_URL ?>assets/images/metal.jpg');">

	<div class = "container">
		<div class = "row">
			<div class = "col-md-4 col-md-offset-3">
				<?php foreach($highlights_list as $high) : ?>
					<h1 class = "hstyle"><?php echo $high->title; ?></h1>
					<?php echo '<img id = "pic1" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$high->image.'">' ?>
					<h4 class = "textStyle"><?php echo $high->content; ?></h4>
				<?php endforeach; ?>
			</div>
		</div>

		<div class container>
			<?php foreach ($highlights as $key => $row) :  ?>
				<?php if($key % 2 == 1) { ?>
				<div class = "row">
					<div class = "col-md-4">
						<h3 class = "hstyle">
							<?php echo $row->title; ?>
						</h3>
						<a href="<?= BASE_URL ?>highlights/view/<?= $row->id ?>">
							<?php 
							echo '<img id = "pic2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image.'">' 
							?></a>
						</div>
					
					<?php } else { ?>
					<div class = "col-md-4">
						<h3 class = "hstyle">
							<?php echo $row->title; ?>
						</h3>
						<a href="<?= BASE_URL ?>highlights/view/<?= $row->id ?>">
							<?php 
							echo '<img id = "pic2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image.'">' 
							?></a>
							<?php } ?>
						</div>
					<?php endforeach; ?>
				</div>
				</div>
				<br>
			</body>