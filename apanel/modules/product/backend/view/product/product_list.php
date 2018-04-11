	<section class="content">
		<div class="box box-primary">
			<div class="box-header pb-none">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="btn-group">
										<a href="<?= MODULE_URL ?>create" class="btn btn-primary">Create News</a>
									</div>
									<button type="button" id="item_multiple_delete" class="btn btn-danger delete_button">Delete<span></span></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
								<input id="table_search" class="form-control pull-right" placeholder="Search" type="text">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-body table-responsive no-padding">
				<table id="tableList" class="table table-hover table-sidepad">
					<?php
					echo $ui->loadElement('table')
					->setHeaderClass('info')
					->addHeader(
						'<input type="checkbox" class="checkall">',
						array(
							'class' => 'text-center',
							'style' => 'width: 15px'
							)
						)
					->addHeader('Image 1', array('class' => 'col-md-3'), 'sort', 'image_1')
					->addHeader('Image 2', array('class' => 'col-md-3'), 'sort', 'image_2')
					->addHeader('Image 3', array('class' => 'col-md-3'), 'sort', 'image_3')
					->addHeader('Product Name', array('class' => 'col-md-3'), 'sort', 'name')
					->addHeader('Product Description', array('class' => 'col-md-3'), 'sort', 'description')
					->addHeader('Product Price', array('class' => 'col-md-3'), 'sort', 'price')
					->draw();
					?>
					
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<div id="pagination"></div>
	</section>
	<div class="delete-modal">
		<div class="modal modal-danger">
			<div class="modal-dialog" style = "width: 300px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete this record?</p>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-outline btn-flat" id = "delete-yes">Yes</button>
							<button type="button" class="btn btn-outline btn-flat" data-dismiss="modal">No</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			var ajax = filterFromURL();
			var ajax_call = '';
			ajaxToFilter(ajax, { search : '#table_search', limit : '#items' });
			function changeExportLink() {
				var url = '<?= MODULE_URL ?>get_export/';
				$('#export_table').attr('href', url + btoa(ajax.search || '') + '/' + btoa(ajax.sort || ''));
			}
			tableSort('#tableList', function(value, getlist) {
				ajax.sort = value;
				ajax.page = 1;
				if (getlist) {
					getList();
				}
			});
			$('#table_search').on('input', function () {
				ajax.page = 1;
				ajax.search = $(this).val();
				getList();
			});
			$('#items').on('change', function() {
				ajax.limit = $(this).val();
				ajax.page = 1;
				getList();
			});
			$('#pagination').on('click', 'a', function(e) {
				e.preventDefault();
				ajax.page = $(this).attr('data-page');
				getList();
			});
			$('#import-modal').on('show.bs.modal', function() {
				var form_csv = $('#import_csv').val('').closest('.form-group').find('.form-control').html('').closest('.form-group').html();
				$('#import_csv').closest('.form-group').html(form_csv);
			});
			$('#importForm').on('change', '#import_csv', function() {
				var filename = $(this).val().split("\\");
				$(this).closest('.input-group').find('.form-control').html(filename[filename.length - 1]);
			});
			function addError(error, clean) {
				if (clean) {
					$('#warning_modal .modal-body').html(error);
				} else {
					$('#warning_modal .modal-body').append(error);
				}
			}
			$('#importForm').submit(function(e) {
				e.preventDefault();
				var form_element = $(this);
				form_element.find('.form-group').find('input').trigger('blur');
				if (form_element.find('.form-group.has-error').length == 0) {
					form_element.find('[type="submit"]').addClass('disabled');
					var formData =	new FormData();
					formData.append('file',$('#import_csv')[0].files[0]);
					$.ajax({
						url : 			'<?=MODULE_URL?>ajax/ajax_save_import',
						data:			formData,
						cache: 			false,
						processData:	false, 
						contentType:	false,
						type: 			'POST',
						success: 		function(data){
							form_element.find('[type="submit"]').removeClass('disabled');
							form_element.closest('.modal').modal('hide');
							if (data.success) {
								getList();
								$('#import-modal').modal('hide');
							} else {
								addError('<p>' + data.error + '</p>', true);
								try {
									data.duplicate['Item Type'].forEach(function(item_type) {
										addError('<p><b>Duplicate Value</b>: "' + item_type + '"</p>');
									});
								} catch(e) {}
								try {
									data.exist['Item Type'].forEach(function(item_type) {
										addError('<p><b>Exist Value</b>: "' + item_type + '"</p>');
									});
								} catch(e) {}
								try {
									let invalid = data.invalid;
									for (var key in invalid) {
										if (invalid.hasOwnProperty(key)) {
											let invalid2 = invalid[key];
											for (var key2 in invalid2) {
												if (invalid2.hasOwnProperty(key2)) {
													addError('<p><b>Invalid ' + key + '</b>: ' + invalid2[key2] + '</p>');
												}
											}
										}
									}
								} catch(e) {}
								try {
									let validity = data.validity;
									for (var key in validity) {
										if (validity.hasOwnProperty(key)) {
											let validity2 = validity[key];
											for (var key2 in validity2) {
												if (validity2.hasOwnProperty(key2)) {
													addError('<p><b>' + key + ' Field</b>: ' + key2 + '</p>');
												}
											}
										}
									}
								} catch(e) {}
								$('#warning_modal').modal('show');
							}
						}
					});
				}
			});
			function getList() {
				filterToURL();
				changeExportLink();
				if (ajax_call != '') {
					ajax_call.abort();
				}
				ajax_call = $.post('<?=MODULE_URL?>ajax/ajax_list', ajax, function(data) {
					$('#tableList tbody').html(data.table);
					$('#pagination').html(data.pagination);
					if (ajax.page > data.page_limit && data.page_limit > 0) {
						ajax.page = data.page_limit;
						getList();
					}
				});
			}
			getList();
			function ajaxCallback(id) {
				var ids = getDeleteId(id);
				$.post('<?=MODULE_URL?>ajax/ajax_delete', ids, function(data) {
					if ( ! data.success) {
						$('#warning_modal #warning_message').html('<p>Unable to delete User: User in Use</p>');
						data.error_id.forEach(function(id) {
							$('#warning_modal #warning_message').append('<p>Username: ' + id + '</p>');
						});
						$('#warning_modal').modal('show');
					}
					getList();
				});
			}
			$(function() {
				linkButtonToTable('#item_multiple_delete', '#tableList');
				linkDeleteToModal('#tableList .delete', 'ajaxCallback');
				linkDeleteMultipleToModal('#item_multiple_delete', '#tableList', 'ajaxCallback');
			});
		</script>