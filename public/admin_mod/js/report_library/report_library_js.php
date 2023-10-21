	<!-- Theme JS files components_modals.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<!-- /theme JS files -->
	<!-- Theme JS files form_input_groups.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<!-- /theme JS files -->
	<!-- Theme JS files components_notifications_pnotify.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files datatable_basic-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<!-- /theme JS files -->
	
	<script>
		$(document).ready(function(){
			$("#EnterRL").on('click',function (){
				var BL_Key=$("#BL_Key").val();
					if(BL_Key!=""){
						$.post("<?php echo base_url();?>/Report_Library",{
							BL_Key:BL_Key
						},function(BL_Data){
							if(BL_Data!=""){
								$("#Run_BL_Data").html(BL_Data)
							}else{}
						})
					}else{}
			})
		})		
	</script>