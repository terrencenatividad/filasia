	<div class = "container">
		<div class = "row">
			<?php $count = 0; ?>
			<?php foreach($search_product as $prod) : ?>
				<?php $count++; ?>
				<div class = "col-md-4">
					<div class="panel">
						<div class="panel-heading"><h3><?php echo $prod->name ?></h3></div>
						<div class="panel-body">
							<?php 
							echo '<img style = "margin-left : 10px;" id = "prod2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$prod->image_1.'">'
							?>
							<br>
							<br>
							<div class = "text-right">
								<a href="<?= BASE_URL ?>product/view/<?= $prod->id ?>" class = "btn btn-success">
									<i class="fa fa-eye" aria-hidden="true"></i> See more</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class = "row">
				<?php foreach($search_project as $proj) : ?>
					<?php $count++; ?>
					<div class = "col-md-4">
						<div class="panel">
							<div class="panel-heading"><h3><?php echo $proj->title ?></h3></div>
							<div class="panel-body">
								<?php 
								echo '<img style = "margin-left : 10px;" id = "prod2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$proj->image_1.'">'
								?>
								<br>
								<br>
								<div class = "text-right">
									<a href="<?= BASE_URL ?>projects/view/<?= $proj->id ?>" class = "btn btn-success">
										<i class="fa fa-eye" aria-hidden="true"></i> See more</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class = "row">
					<?php foreach($search_highlight as $high) : ?>
						<?php $count++; ?>
						<div class = "col-md-4">
							<div class="panel">
								<div class="panel-heading"><h3><?php echo $high->title ?></h3></div>
								<div class="panel-body">
									<?php 
									echo '<img style = "margin-left : 10px;" id = "prod2" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$high->image.'">'
									?>
									<br>
									<br>
									<div class = "text-right">
										<a href="<?= BASE_URL ?>highlights/view/<?= $high->id ?>" class = "btn btn-success">
											<i class="fa fa-eye" aria-hidden="true"></i> See more</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<?php if($count == 0)  { ?>
					<h2 class = "text-center">*No Results Found*</h2>
					<?php	} ?>

					<br>
					<br>

					<style>
						html {
							font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
							font-size: 14px;
						}

						h5 {
							font-size: 1.28571429em;
							font-weight: 700;
							line-height: 1.2857em;
							margin: 0;
						}

						.card {
							font-size: 1em;
							overflow: hidden;
							padding: 0;
							border: none;
							border-radius: .28571429rem;
							box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
						}

						.card-block {
							font-size: 1em;
							position: relative;
							margin: 0;
							padding: 1em;
							border: none;
							border-top: 1px solid rgba(34, 36, 38, .1);
							box-shadow: none;
						}

						.card-img-top {
							display: block;
							width: 100%;
							height: auto;
						}

						.card-title {
							font-size: 1.28571429em;
							font-weight: 700;
							line-height: 1.2857em;
						}

						.card-text {
							clear: both;
							margin-top: .5em;
							color: rgba(0, 0, 0, .68);
						}

						.card-footer {
							font-size: 1em;
							position: static;
							top: 0;
							left: 0;
							max-width: 100%;
							padding: .75em 1em;
							color: rgba(0, 0, 0, .4);
							border-top: 1px solid rgba(0, 0, 0, .05) !important;
							background: #fff;
						}

						.card-inverse .btn {
							border: 1px solid rgba(0, 0, 0, .05);
						}

						.profile {
							position: absolute;
							top: -12px;
							display: inline-block;
							overflow: hidden;
							box-sizing: border-box;
							width: 25px;
							height: 25px;
							margin: 0;
							border: 1px solid #fff;
							border-radius: 50%;
						}

						.profile-avatar {
							display: block;
							width: 100%;
							height: auto;
							border-radius: 50%;
						}

						.profile-inline {
							position: relative;
							top: 0;
							display: inline-block;
						}

						.profile-inline ~ .card-title {
							display: inline-block;
							margin-left: 4px;
							vertical-align: top;
						}

						.text-bold {
							font-weight: 700;
						}

						.meta {
							font-size: 1em;
							color: rgba(0, 0, 0, .4);
						}

						.meta a {
							text-decoration: none;
							color: rgba(0, 0, 0, .4);
						}

						.meta a:hover {
							color: rgba(0, 0, 0, .87);
						}
					</style>