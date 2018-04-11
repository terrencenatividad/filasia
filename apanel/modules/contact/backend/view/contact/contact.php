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
									echo $ui->formField('text')
									->setLabel('Email')
									->setSplit('col-md-3', 'col-md-9')
									->setName('email')
									->setId('email')
									->setValidation('required')
									->setValue($email)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('text')
									->setLabel('Number')
									->setSplit('col-md-3', 'col-md-9')
									->setName('number')
									->setId('number')
									->setValidation('required')
									->setValue($number)
									->draw($show_input);
									?>
								</div>

								<div class="col-md-9" style = "color: white;">
									<?php
									echo $ui->formField('text')
									->setLabel('Subject')
									->setSplit('col-md-4', 'col-md-7')
									->setName('subject')
									->setId('subject')
									->setValidation('required')
									->draw($show_input);
									?>
								</div>

								<div class="col-md-6">
									<?php
									echo $ui->formField('textarea')
									->setLabel('Message')
									->setSplit('col-md-4', 'col-md-8')
									->setName('message')
									->setId('message')
									->setValidation('required')
									->setValue($message)
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
			formData.append('item_image', $('#image')[0].files[0]);
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
