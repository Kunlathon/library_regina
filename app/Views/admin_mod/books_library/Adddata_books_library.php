<meta charset="utf-8">
<?php
	$session=session();
	$InputADBL=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");	
				include(APPPATH."Database-pdo/class_library.php");
				include(APPPATH."Database-pdo/class_data_library.php");					
				
				$PostCountBooks=$InputADBL->getPost('PostCountBooks');
				$PostBooksKey=$InputADBL->getPost('PostBooksKey');
				$PostBooks=$InputADBL->getPost('PostBooks');
				$PostLAd_No=$InputADBL->getPost('PostLAd_No');
				
				$count_ABL=0;
				$count_save=0;
				$KeepBooksNo=array();
				while($count_ABL<$PostCountBooks){
					$AddListbooks=new MD_Library_Listbooks("Add","-","-",$PostBooksKey,$PostLAd_No,$PostBooks);
						if(($AddListbooks->CallMLLError()=="NotError")){
							$KeepBooksNo[$count_save]=$AddListbooks->CallMLLLlb();
							$count_save=$count_save+1;
						}elseif(($AddListbooks->CallMLLError()=="Error")){
							$count_save=$count_save+0;
						}else{
							$count_save=$count_save+0;
						}
					$count_ABL=$count_ABL+1;
				}	?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
	<script>
		$(document).ready(function(){

			var percent = 0;
			var notice = new PNotify({
				text: "ดำเนินการลงข้อมูลหนังสือเข้าห้องสมุด",
				addclass: 'bg-primary',
				type: 'info',
				icon: 'icon-spinner4 spinner',
				hide: false,
				buttons: {
					closer: false,
					sticker: false
				},
				opacity: .9,
				width: "200px"
			});

			setTimeout(function() {
			notice.update({
				title: false
			});
			
				var interval = setInterval(function(){
					percent += 2;
						var options = {
							text: percent + "%"
						};
						
						if(percent == 80){
							options.title = "กำลังอัพโหลดข้อมูล...";
						}else{}
						
						if(percent >= 100){
							window.clearInterval(interval);
							options.title = "สำเร็จ";
							options.text="จำนวนข้อมูลที่อัพโหลด : <?php echo $count_save;?> เล่ม <br>"+
										 "ข้อมูลเลขทะเบียน<br>"+
								
				<?php
						$count_print=0;
						while($count_print<$count_save){ ?>
										"<?php echo $KeepBooksNo[$count_print];?><br>"+
				<?php	
						$count_print=$count_print+1;
						} ?>
										 "";
							options.addclass = "bg-success";
							options.type = "success";
							options.hide = true;
								options.buttons = {
									closer: true,
									sticker: true
								};
							options.icon = 'icon-checkmark3';
							options.opacity = 1;
							options.width = PNotify.prototype.options.width;
						}else{}
					notice.update(options);	
				},120);

			}, 2000);

		})	
	</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<?php		}else{
				exit("<script>window.location='Admin?library_mod=books_library';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=books_library';</script>");
		}
?>