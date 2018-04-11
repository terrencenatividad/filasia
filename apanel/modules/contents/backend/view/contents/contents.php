	<section class="content">
		<div class="box box-primary">
			<div class="box-body">
				<br>
				<form action="" method="post" class="form-horizontal">
					<div class="row">
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-9">
									<?php
									echo $ui->formField('textarea')
									->setLabel('Mission Content')
									->setSplit('col-md-4', 'col-md-8')
									->setName('mission_content')
									->setId('mission_content')
									->setValidation('required')
									->setValue($mission_content)
									->draw($show_input);
									?>
								</div>
							</div>
							<div class = "row">
								<div class="col-md-12">
									<?php
									echo $ui->formField('textarea')
									->setLabel('Vision Content')
									->setSplit('col-md-3', 'col-md-9')
									->setName('vision_content')
									->setId('vision_content')
									->setValidation('required')
									->setValue($vision_content)
									->draw($show_input);
									?>
								</div>
							</div>

							<div class = "row">
								<div class="col-md-12">
									<?php
									echo $ui->formField('textarea')
									->setLabel('Commitment Content')
									->setSplit('col-md-3', 'col-md-9')
									->setName('commitment_content')
									->setId('commitment_content')
									->setValidation('required')
									->setValue($commitment_content)
									->draw($show_input);
									?>
								</div>
							</div>
							<div class = "row">
								<div class="col-md-12">
									<?php
									echo $ui->formField('textarea')
									->setLabel('Proven Technology Content')
									->setSplit('col-md-3', 'col-md-9')
									->setName('tech_content')
									->setId('techn_content')
									->setValidation('required')
									->setValue($tech_content)
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
			$.post('<?=MODULE_URL?>ajax/<?=$ajax_task?>', $(this).serialize() + '<?=$ajax_post?>', function(data) {
				if (data.success) {
					window.location = data.redirect;
				}
			});
		} else {
			$(this).find('.form-group.has-error').first().find('input, textarea, select').focus();
		}
	});
</script>
