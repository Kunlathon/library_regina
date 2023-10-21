<meta charset="utf-8">
<?php
	$session=session();
	$InputDCA=\Config\Services::request();
		if($session->has("IL_Key")>=1){
			if($_SESSION["IL_Status"]==1){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
				$DDCB_NO=$InputDCA->getPost('DDCB_NO');
					if(isset($DDCB_NO)){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
								<select class="select-border-color border-warning" name="DDCB_No" id="DDCB_No" required="required" data-placeholder="ทศนิยมดิวอี้หมวดย่อย...">
										<option></option>
									<optgroup label="ข้อมูล ทศนิยมดิวอี้หมวดย่อย">
	<?php
		$Call_DDCB=new ManagementDDCB($DDCB_NO,"-","-","-","RowId");
		foreach($Call_DDCB->RowIdManagementDDCB() as $library=>$Call_DDCBRow){ ?>
										<option value="<?php echo $Call_DDCBRow["DDCB_No"];?>"><?php echo $Call_DDCBRow["DDCB_TxtTh"];?></option>
	<?php	}?>								
										
									</optgroup>
								</select>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<?php	}else{
						exit("<script>window.location='/UserLogin/Logout';</script>");
					}
			}else{
				exit("<script>window.location='/UserLogin/Logout';</script>");
			}
		}else{
			exit("<script>window.location='/UserLogin/Logout';</script>");
		}
?>