<!--****************************************************************************-->
<script type="text/javascript">
    function setScreenHWCookie() {
        $.cookie('sw', screen.width);
        //$.cookie('sh',screen.height);
        return true;
    }
    setScreenHWCookie();
    </script>
 
    <?php
		$width_system=filter_input(INPUT_COOKIE,'sw');
		if(($width_system>=1200)){
			$grid="lg";
		}elseif(($width_system<=992)){
			$grid="md";
		}elseif(($width_system<=768)){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>
<!--****************************************************************************-->
	
	<!-- Theme JS files form_validation.html-->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<!-- /theme JS files End-->
	
	<!-- Theme JS files datable_basic.html-->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	
	<!-- Theme JS files components_notifications_pnotify.html-->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
	<!-- /theme JS files -->



<!--form-add-->
	<script>
		$(document).ready(function(){
			$('#save_add').on('click', function() {
				var manage="process_add";
				var LP_Name=$("#LP_Name").val();

					if(LP_Name!=""){

						if(LP_Name.length >=501){
							document.getElementById("LP_Name-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
							+'	<div class="col-lg-10">'
							+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำกัดจำนวนตัวอักษร 500 ตัวอักษร</span>';
							LP_Name="";							
						}else if(LP_Name.length <=3){
							document.getElementById("LP_Name-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
							+'	<div class="col-lg-10">'
							+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำนวนตัวอักษร 3 ตัวอักษรขึ้นไป</span>';	
							LP_Name="";
						}else{
							document.getElementById("LP_Name-null").innerHTML=
							'<div class="form-group has-success has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-checkmark-circle"></i>'
							+'</div>';						
						}

					}else{
						document.getElementById("LP_Name-null").innerHTML=
						'<div class="form-group has-error has-feedback">'
						+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
						+'	<div class="col-<?php echo $grid;?>-10">'
						+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
						+'	<div class="form-control-feedback">'
						+'	<i class="icon-cancel-circle2"></i>'
						+'</div>'
						+'<span class="help-block">กรุณากรอกข้อมูลในช่องนี้</span>';
					}

					if(LP_Name!=""){
						$.post("<?php echo base_url();?>publisher/processing",{
							manage:manage,
							LP_Name:LP_Name
						},function(data_process){
							var txt_process=data_process.trim();

							var percent = 0;
							var notice = new PNotify({
								text: "ดำเนินการ",
								addclass: 'bg-primary',
								type: 'info',
								icon: 'icon-spinner4 spinner',
								hide: false,
								buttons: {
									closer: false,
									sticker: false
								},
								opacity: .9,
								width: "170px"
							});

							setTimeout(function() {
							notice.update({
								title: false
							});
							var interval = setInterval(function() {
								percent += 2;
								var options = {
									text: percent + "% "
								};
								if (percent == 80) options.title = "ประมวลผล";
								if (percent >= 100) {

									if(txt_process==="succeed"){
										document.location="<?php echo base_url();?>admin?library_mod=publisher";
									}else if(txt_process==="failed"){
										window.clearInterval(interval);
										options.title = "บันทึกไม่สำเร็จ";
										options.addclass = "bg-danger";
										options.type = "error";
										options.hide = true;
										options.buttons = {
											closer: true,
											sticker: true
										};
										options.icon = 'icon-checkmark3';
										options.opacity = 1;
										options.width = PNotify.prototype.options.width;
									}else{
										window.clearInterval(interval);
										options.title = "พบข้อผิดพลาด";
										options.addclass = "bg-warning";
										options.type = "warning";
										options.hide = true;
										options.buttons = {
											closer: true,
											sticker: true
										};
										options.icon = 'icon-checkmark3';
										options.opacity = 1;
										options.width = PNotify.prototype.options.width;
									}

								}
								notice.update(options);
								}, 120);
							}, 1000);

						})
					}else{
					
					}
			});
		})
	</script>
<!--form-add end-->


<!--form-update-->
	<script>
		$(document).ready(function(){
			$('#save_up').on('click', function() {
				var manage="process_up";
				var LP_Name=$("#LP_Name").val();
				var publisher_key=$("#publisher_key").val();

					if(LP_Name!=""){

						if(LP_Name.length >=501){
							document.getElementById("LP_Name-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำกัดจำนวนตัวอักษร 500 ตัวอักษร</span>';
							LP_Name="";							
						}else if(LP_Name.length <=3){
							document.getElementById("LP_Name-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำนวนตัวอักษร 3 ตัวอักษรขึ้นไป</span>';	
							LP_Name="";
						}else{
							document.getElementById("LP_Name-null").innerHTML=
							'<div class="form-group has-success has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-checkmark-circle"></i>'
							+'</div>';						
						}

					}else{
						document.getElementById("LP_Name-null").innerHTML=
						'<div class="form-group has-error has-feedback">'
						+'	<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์ <span class="text-danger">*</span></label>'
						+'	<div class="col-<?php echo $grid;?>-10">'
						+'		<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ สำนักพิมพ์..." minlength="3" maxlength="500" value="'+LP_Name+'">'
						+'	<div class="form-control-feedback">'
						+'	<i class="icon-cancel-circle2"></i>'
						+'</div>'
						+'<span class="help-block">กรุณากรอกข้อมูลในช่องนี้</span>';
					}

					if(LP_Name!=""){
						$.post("<?php echo base_url();?>publisher/processing",{
							manage:manage,
							LP_Name:LP_Name,
							publisher_key:publisher_key
						},function(data_process){
							var txt_process=data_process.trim();

							var percent = 0;
							var notice = new PNotify({
								text: "ดำเนินการ",
								addclass: 'bg-primary',
								type: 'info',
								icon: 'icon-spinner4 spinner',
								hide: false,
								buttons: {
									closer: false,
									sticker: false
								},
								opacity: .9,
								width: "170px"
							});

							setTimeout(function() {
							notice.update({
								title: false
							});
							var interval = setInterval(function() {
								percent += 2;
								var options = {
									text: percent + "% "
								};
								if (percent == 80) options.title = "ประมวลผล";
								if (percent >= 100) {

									if(txt_process==="succeed"){
										document.location="<?php echo base_url();?>admin?library_mod=publisher";
									}else if(txt_process==="failed"){
										window.clearInterval(interval);
										options.title = "บันทึกไม่สำเร็จ";
										options.addclass = "bg-danger";
										options.type = "error";
										options.hide = true;
										options.buttons = {
											closer: true,
											sticker: true
										};
										options.icon = 'icon-checkmark3';
										options.opacity = 1;
										options.width = PNotify.prototype.options.width;
									}else{
										window.clearInterval(interval);
										options.title = "พบข้อผิดพลาด";
										options.addclass = "bg-warning";
										options.type = "warning";
										options.hide = true;
										options.buttons = {
											closer: true,
											sticker: true
										};
										options.icon = 'icon-checkmark3';
										options.opacity = 1;
										options.width = PNotify.prototype.options.width;
									}

								}
								notice.update(options);
								}, 120);
							}, 1000);

						})
					}else{
					
					}
			});
		})
	</script>
<!--form-update end-->
	
	<script>
		$(document).ready(function(){
			$("#Btnpublisher").click(function(){
				$("#Modapublisher").modal({backdrop: false});
			});			
		})
	</script>
	
<!--show-data-->
	<script>
		$(document).ready(function(){
			$.post("<?php echo base_url();?>publisher",{

			},function(publisher_data){
				$("#publisher_show").html(publisher_data)
			})
		})
	</script>
<!--show-data-->	