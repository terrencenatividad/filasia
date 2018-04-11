	<section class="content">
		<div class="box box-primary">
			<div class="box-body">
				<br>
				<form action="" method="post" class="form-horizontal">
					<div class="row">
						<div class="col-md-11">
							<div class="row">
								<div class="col-md-6">
									<?php
									echo $ui->formField('file')
									->setLabel('Image 1')
									->setSplit('col-md-4', 'col-md-8')
									->setName('image_1')
									->setId('image_1')
									->setValidation('required')
									->setValue($image_1)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('file')
									->setLabel('Image 2')
									->setSplit('col-md-4', 'col-md-8')
									->setName('image_2')
									->setId('image_2')
									->setValidation('required')
									->setValue($image_2)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('file')
									->setLabel('Image 3')
									->setSplit('col-md-4', 'col-md-8')
									->setName('image_3')
									->setId('image_3')
									->setValidation('required')
									->setValue($image_3)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('text')
									->setLabel('Name')
									->setSplit('col-md-3', 'col-md-9')
									->setName('name')
									->setId('name')
									->setValidation('required')
									->setValue($name)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('textarea')
									->setLabel('Description')
									->setSplit('col-md-4', 'col-md-8')
									->setName('description')
									->setId('description')
									->setValidation('required')
									->setValue($description)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('text')
									->setLabel('Price')
									->setSplit('col-md-3', 'col-md-9')
									->setName('price')
									->setId('price')
									->setValidation('required')
									->setValue($price)
									->draw($show_input);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 text-center">
						<?php echo $ui->drawSubmit($show_input); ?>
						<a href="<?=MODULE_URL?>" class="btn btn-default" data-toggle="back_page">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script>
	$('form').submit(function(e) {
		e.preventDefault();
		$(this).find('.form-group').find('input, textarea, select').trigger('blur');
		if ($(this).find('.form-group.has-error').length == 0) {
			var formData = new FormData($('form')[0]);
			formData.append('item_image1', $('#image_1')[0].files[0]);
			formData.append('item_image2', $('#image_2')[0].files[0]);
			formData.append('item_image3', $('#image_3')[0].files[0]);
			formData.append('id', '<?php echo $id ?>');
			$.ajax({
				url: '<?=MODULE_URL?>ajax/<?=$ajax_task?>',
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {
					window.location = data.redirect;
				}
			});

		} else {
			$(this).find('.form-group.has-error').first().find('input, textarea, select').focus();
		}
	});
</script>
