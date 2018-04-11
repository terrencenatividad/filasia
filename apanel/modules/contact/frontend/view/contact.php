	<div class = "container">
		<div class="row">
			<div class = "col-md-4">
				<h3>Find us at</h3>
				<hr class = "divider">
				<h1>Address</h1>
				<div class = "col-md-10">
					<h4><?php echo $address->street . ' ' .  $address->barangay; ?></h4>
					<h4><?php echo $address->city; ?></h4>
					<h4><?php echo $address->email; ?></h4>
					<h4><?php echo $address->cel_no; ?></h4>
					<h4><?php echo $address->tel_no; ?></h4>
					<h4><?php echo $address->fax_no; ?></h4>
				</div>
			</div>
			<div class = "col-md-5 col-md-offset-1" style = "text-align: left; background-color: #EDEAEA;">
				<h2>Get in touch!</h2>
				<br><br>
				<form action = "" method = "POST" class="form-horizontal" id = "contact">
					<div class = "container-fluid">
						<div class = "col-md-12">
							<div class = "row">
								<div class = "form-group">
									<label>Name</label>
									<div class="input-group">
										<input type="text" class = "form-control" name="name" id = "name" required="required"
										placeholder="Enter name...">
										<span class="input-group-addon"><i class="fa fa-user-circle fa-fw"></i></span>
									</div>
								</div>

								<div class = "form-group">
									<label>Email</label>
									<div class="input-group">
										<input type="text" class = "form-control" name="email" id = "email" required="required"
										placeholder="Enter email...">
										<span class="input-group-addon"><i class="fa fa-address-card fa-fw"></i></span>
									</div>
								</div>

								<div class = "form-group">
									<label>Number</label>
									<div class="input-group">
										<input type="text" class = "form-control" name="number" id = "number" required="required" placeholder="Enter number...">
										<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
									</div>
								</div>

								<div class = "form-group">
									<label>Subject</label>
									<div class="input-group">
										<input type="text" class = "form-control" name="subject" id = "subject" required="required" placeholder="Enter subject...">
										<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
									</div>
								</div>

								<div class = "form-group">
									<label>Message</label>
									<textarea name = "message" class = "form-control" required="required" id = "message"
									style = "resize: none; height: 150px;" placeholder="Enter message..."></textarea>
								</div>
							</div>

							<div id = "html_element" class = "captcha"></div>
							<div id = "error"></div>

							<br>
							<div class="form-group">
								<input type="submit" name="submit" value = "SEND" class = "form-control btn btn-info">
							</div>
							<br>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>

	<script>
		var onloadCallback = function() {
			grecaptcha.render('html_element', {
				'sitekey' : '6LeI9DUUAAAAACd_dR1MnrGrCuakUQXHeS_n9FEh'
			});
			$('#contact').submit(function(e) {
				e.preventDefault();
				$(this).find('.form-group').find('input, textarea, select, captcha').trigger('blur');
				if ($(this).find('.form-group.has-error').length == 0) {
					if (grecaptcha && grecaptcha.getResponse().length > 0) { 
						$.post('<?=MODULE_URL?>ajax/<?=$ajax_task?>', $(this).serialize() + '<?=$ajax_post?>', function(data) {
							if(data.success) {
								console.log("checked");
								window.location = data.redirect;
							}
						})
					} else {
						document.getElementById('error').innerHTML="<span style='color: red;'>*Check if you're not a robot.</span>";
						return false;
					};
				} else {
					$(this).find('.form-group.has-error').first().find('input, textarea, select, captcha').focus();
				}
			});
		};
	</script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
	</script>