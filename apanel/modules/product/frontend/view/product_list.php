	<div class = "container">
		<div class = "row">
			<?php foreach($products_list as $prod) : ?>
				<div class = "col-md-1">
					<?php echo '<img id = "liit" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$prod->image_2.'" class="image_thumb img-responsive">' ?>
					<br>
					<?php echo '<img id = "liit" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$prod->image_3.'" class="image_thumb img-responsive">' ?>
					<br>
					<?php echo '<img id = "liit" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$prod->image_1.'" class="image_thumb img-responsive">' ?>
				</div>
				<div class="col-md-1 v-divider"></div>
				<div class = "col-md-5" style="margin-left: -40px;">
					<?php echo '<img id = "prod1" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$prod->image_1.'" class="image_large img-responsive">' ?>
				</div>

				<div class = "col-md-5">
					<h3 id = "three-d"><?php echo $prod->name; ?></h3>
					<hr class = "divider">
					<h4 class = "textMargin"><?php echo $prod->description; ?></h4>
					<h4 class = "textStyle"><b>&#8369;</b> <?php echo number_format($prod->price, 2); ?></h4>
				</div>
			<?php endforeach; ?>
		</div>
		<br>

		<div class = "container-fluid">
			<h3>Similar Items</h3>
			<hr style = "border-color: black; border-width: 3px;">
			<?php foreach ($products as $key => $row) :  ?>
				<?php if($key % 3 == 1)  { ?>
				<div class = "row">
					<div class = "col-md-4">
						<h3 id = "two-d">
							<?php echo $row->name; ?>
						</h3>
						<a href="<?= BASE_URL ?>product/view/<?= $row->id ?>">
							<?php 
							echo '<img id = "prod2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_1.'">'
							?></a>
						</div>

						<?php } else { ?>
						<div class = "col-md-4">
							<h3 id = "two-d">
								<?php echo $row->name; ?>
							</h3>
							<a href="<?= BASE_URL ?>product/view/<?= $row->id ?>">
								<?php 
								echo '<img id = "prod2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_1.'">' 
								?></a>
								<?php } ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class = "container">
					<hr style = "border-color: black; border-width: 3px;">
				</div>
			</div>
			<br>
			<br>
			<br>
			<script type="text/javascript">
				$('.image_thumb').on('click', function() {
					$('.image_large').attr('src', $(this).attr('src'));
				});
			</script>
			<style>
				.image_thumb {
					cursor: pointer;
				}
			</style>