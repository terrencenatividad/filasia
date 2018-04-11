	<div class = "container">
		<div class = "row">
			<?php foreach($projects_list as $proj) : ?>
				<div class = "col-md-4 col-md-offset-1">
					<?php echo '<img id = "prod1" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$proj->image.'">' ?>
				</div>
				<div class = "col-md-5 col-md-offset-1">
					<h3 id = "three-d"><?php echo $proj->title; ?></h3>
					<hr class = "divider">
					<h4 class = "textMargin"><?php echo $proj->title; ?></h4>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class = "container">
		<h3>Similar Items</h3>
		<hr style = "border-color: black; border-width: 3px;">
		<?php foreach ($projects as $key => $row) :  ?>
			<?php if($key % 3 == 1)  { ?>
			<div class = "row">
				<div class = "col-md-4">
					<h3 id = "two-d">
						<?php echo $row->title; ?>
					</h3>
					<a href="<?= BASE_URL ?>projects/view/<?= $row->id ?>">
						<?php 
						echo '<img id = "pic2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image.'">'
						?></a>
					</div>

					<?php } else { ?>
					<div class = "col-md-4">
						<h3 id = "two-d">
							<?php echo $row->title; ?>
						</h3>
						<a href="<?= BASE_URL ?>projects/view/<?= $row->id ?>">
							<?php 
							echo '<img id = "pic2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image.'">'
							?></a>
							<?php } ?>
						</div>
					<?php endforeach; ?>
				</div>

				<div class = "container">
				<hr style = "border-color: black; border-width: 3px;">
				</div>
			</div>
			<br>
			<br>
			<br>