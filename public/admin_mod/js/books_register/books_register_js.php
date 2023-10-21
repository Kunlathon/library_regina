	<!-- Theme JS files form_validation.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/demo_pages/form_validation.js"></script>
	<!-- /theme JS files End-->
	
	<!-- Theme JS files colors_success.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/core/libraries/jquery_ui/core.min.js"></script>

	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>

	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/selectboxit.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/noty.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/demo_pages/colors_success.js"></script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files form_select2.html-->
	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/core/libraries/jquery_ui/interactions.min.js"></script>

	<script>
		$(document).ready(function(){
	// Menu border and text color
			$('.select-border-color').select2({
				dropdownCssClass: 'border-warning',
				containerCssClass: 'border-warning text-warning-700'
			});
		})
	</script>
	<!-- /theme JS files -->	
	
	<script>
		$(document).ready(function(){
			var count_text = 1;
        
				$("#AddText").click(function () {
                
					if(count_text>=10){
						new PNotify({
							title: 'กำจัดกล่องข้อความ',
							text: 'สามารถเพิ่มข้อมูลได้ไม่เกิน 10 ข้อความ',
							icon: 'icon-warning22'
						});
					}else{
						var newTextBoxDiv = $(document.createElement('div'))
							 .attr("id", 'TextBoxDiv' + count_text);
							newTextBoxDiv.after().html('<input type="text" name="Isu_Txt[]" id="subject_txt" class="form-control border-blue" placeholder="หัวข้อเรื่อง">');
									
							newTextBoxDiv.appendTo("#TextBoxesGroup");	
							count_text=count_text+1;	
					}   
			});

				$("#DelectText").click(function () {
					if(count_text==1){
					new PNotify({
						title: 'กำจัดกล่องข้อความ',
						text: 'ไม่สามารถลบกล่องข้อความ ได้อย่างน้อย 1 กล่องข้อความ',
						icon: 'icon-blocked',
						type: 'error'						
					})					
					}else{
						count_text=count_text-1;
						$("#TextBoxDiv" + count_text).remove();
					}   
				});
				
				
		})		
	</script>

	<script>
		$(document).ready(function(){
			$("#DDCA_No").change(function(){
				var DDCA_No=$("#DDCA_No").val();
					if(DDCA_No!=""){
						$.post("<?php echo base_url();?>/BookRegister",{
							DDCB_NO:DDCA_No
						},function(ddca_data){
							if(ddca_data!=""){
								$("#DDCB_No").html(ddca_data)
							}else{}
						})
					}else{}
			})
		})
	</script>