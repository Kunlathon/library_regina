<?php
	include("public/database/pdo_library.php");
	include("public/database/class_library.php");
?>
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<span class="text-semibold">ข้อมูลพื้นฐานหนังสือ</span> - ลงทะเบียนหนังสือ
					<small class="display-block">Management&nbsp;Information&nbsp;System&nbsp;Regina&nbsp;Library</small>
				</h4>
			</div>

			<!--<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>-->
		</div>
	</div>
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<form name="books_register" action="<?php echo base_url();?>/Admin?library_mod=books_register_run" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel panel-body border-top-success">
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">รหัส&nbsp;/&nbsp;เลข&nbsp;หนังสือ<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_Key" id="Books_Key" class="form-control border-success" required="required" placeholder="รหัส / เลข หนังสือ"  maxlength="20">
							</div>
						</div>										
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ชื่อหนังสือ&nbsp;ภาษาไทย<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_NameTh" id="Books_NameTh" class="form-control border-success" required="required" placeholder="ชื่อหนังสือ ภาษาไทย"  maxlength="1000">
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ชื่อหนังสือ&nbsp;ภาษาอังกฤษ&nbsp;หรือ&nbsp;ภาษาอื่นๆ<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_NameEn" id="Books_NameEn" class="form-control border-success" required="required" placeholder="ชื่อหนังสือ ภาษาอังกฤษ หรือ ภาษาอื่นๆ"  maxlength="1000">
							</div>
						</div>					
					</div>
				</div>
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">Barcode&nbsp;Code<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_Bid" id="Books_Bid" class="form-control border-success" required="required" placeholder="Barcode Code"  maxlength="20">
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ISBN&nbsp;Code<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_ISBN" id="Books_ISBN" class="form-control border-success" required="required" placeholder="ISBN Code"  maxlength="20">
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ราคาต่อเล่ม&nbsp;โดยประมาณ<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_Price" id="Books_Price" class="form-control border-success" required="required" placeholder="รหัส / เลข หนังสือ" value="0.00">
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel panel-body border-top-warning">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ผู้แต่ง<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-warning" name="LA_Key" id="LA_Key" required="required" data-placeholder="ผู้แต่ง...">
										<option>-</option>
									<optgroup label="ข้อมูล ผู้แต่ง">
	<?php
		$ReadManagementAuthor=new ManagementAuthor("-","-","read");
		foreach($ReadManagementAuthor->RunAuthor() as $rc=>$ReadManagementAuthorRow){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
										<option value="<?php echo $ReadManagementAuthorRow["LA_Key"];?>"><?php echo $ReadManagementAuthorRow["LA_Name"];?></option>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
	<?php	} ?>								
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ประเภทหนังสือ<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-warning" name="LT_No" id="LT_No" required="required" data-placeholder="ประเภทหนังสือ...">
										<option>-</option>
									<optgroup label="ข้อมูล ประเภทหนังสือ">
	<?php
		$ReadManagementType=new ManagementType("-","-","read");
		foreach($ReadManagementType->CallMLTType() as $library=>$ReadManagementTypeRow){ ?>
										<option value="<?php echo $ReadManagementTypeRow["LT_No"];?>"><?php echo $ReadManagementTypeRow["LT_Txt"];?></option>
	<?php	}?>								
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
				</div><hr>

				
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ข้อมูลสำนักพิมพ์<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-warning" name="LP_Key" id="LP_Key" required="required" data-placeholder="ข้อมูลสำนักพิมพ์...">
										<option>-</option>
									<optgroup label="ข้อมูล สำนักพิมพ์">
	<?php
		$ReadPublisher=new ManagementPublisher("-","-","read");
		foreach($ReadPublisher->CallMP_Publisher() as $library=>$ReadPublisherRow){ ?>
										<option value="<?php echo $ReadPublisherRow["LP_Key"];?>"><?php echo $ReadPublisherRow["LP_Name"];?></option>			
	<?php	} ?>								
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">วันที่ลงทะเบียนหนังสือ<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_Time" id="Books_Time" class="form-control border-warning" required="required" placeholder="วันที่ลงทะเบียนหนังสือ" value="<?php echo date("Y-m-d H:i:s");?>">
							</div>
						</div>					
					</div>
				</div><hr>	
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ทศนิยมดิวอี้หมวดใหญ่<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-warning" name="DDCA_No" id="DDCA_No" required="required" data-placeholder="ทศนิยมดิวอี้หมวดใหญ่...">
										<option></option>
									<optgroup label="ข้อมูล ทศนิยมดิวอี้หมวดใหญ่">
	<?php
		$ReadDDCA=new ManagementDDCA("-","-","-","RowAll");
		foreach($ReadDDCA->RowAllManagementDDCA() as $library=>$ReadDDCARow){ ?>
										<option value="<?php echo $ReadDDCARow["DDCA_No"];?>"><?php echo $ReadDDCARow["DDCA_TxtTh"];?></option>
	<?php	} ?>							
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ทศนิยมดิวอี้หมวดย่อย<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-warning" name="DDCB_No" id="DDCB_No" required="required" data-placeholder="ทศนิยมดิวอี้หมวดย่อย...">
										<option></option>
										<option value="-">-</option>
									<optgroup label="ข้อมูล ทศนิยมดิวอี้หมวดย่อย">
										<option></option>
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
				</div><hr>	
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">พิมพ์ครั้ง<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_print_at" id="Books_print_at" class="form-control border-warning" required="required" placeholder="พิมพ์ครั้ง"  maxlength="10">
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ปีที่พิมพ์<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="Books_year_at" id="Books_year_at" class="form-control border-warning" required="required" placeholder="ปีที่พิมพ์"  maxlength="4">
							</div>
						</div>					
					</div>
				</div><hr>
				
				<div class="row">
					<!--<div class="col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label class="control-label col-sm-3 col-md-3 col-lg-3">ข้อมูลบรรณาธิการ<span class="text-danger">*</span></label>
							<div class="col-sm-9 col-md-9 col-lg-9">
								<select class="select-border-color border-warning" name="LE_Key" id="LE_Key" required="required" data-placeholder="ข้อมูลบรรณาธิการ...">
										<option>-</option>
									<optgroup label="ข้อมูล บรรณาธิการ">
	<?php
		/*$ReadEditor=new ManagementEditor("-","-","read");
		foreach($ReadEditor->CallEditor() as $library=>$ReadEditorRow){ ?>
										<option value="<?php echo $ReadEditorRow["LE_Key"];?>"><?php echo $ReadEditorRow["LE_Txt"];?></option>		
	<?php	}*/ ?>							

									</optgroup>
								</select>								
							</div>
						</div>					
					</div>-->
					<div class="col-<?php echo $grid;?>-12">
						<input name="LE_Key" id="LE_Key" type="hidden" value="-">
					</div>
					
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ข้อมูลผู้แปล<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-warning" name="LTr_Key" id="LTr_Key" required="required" data-placeholder="ข้อมูลผู้แปล...">
										<option>-</option>
									<optgroup label="ข้อมูล ผู้แปล">
	<?php
		$ReadTranslator=new ManagementTranslator("-","-","read");
		foreach($ReadTranslator->CallMTTranslator() as $library=>$ReadTranslatorRow){ ?>
										<option value="<?php echo $ReadTranslatorRow["LTr_Key"];?>"><?php echo $ReadTranslatorRow["LTr_Txt"];?></option>
	<?php	} ?>								
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
				</div><hr>
				
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel panel-body border-top-blue">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ที่เก็บหนังสือ<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<select class="select-border-color border-blue" name="lk_ID" id="lk_ID" required="required" data-placeholder="ที่เก็บหนังสือ...">
										<option>-</option>
									<optgroup label="ข้อมูล ที่เก็บหนังสือ">
	<?php							
			$ReadKeep=new ManagementKeep("-","-","-","read");
			foreach($ReadKeep->CallMK_Keep() as $library=>$ReadKeepRow){ ?>
										<option value="<?php echo $ReadKeepRow["lk_ID"];?>"><?php echo $ReadKeepRow["lk_txtTh"];?></option>			
	<?php	} ?>								
									</optgroup>
								</select>								
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">เลขเรียกหนังสือ&nbsp;ห้องสมุด<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="abbreviation_code" id="abbreviation_code" class="form-control border-warning" required="required" placeholder="เลขเรียกหนังสือ ห้องสมุด" maxlength="20">
							</div>
						</div>					
					</div>
				</div><hr>
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-2">หัวข้อเรื่อง<span class="text-danger">*</span></label>
							<div class="col-<?php echo $grid;?>-10">
								<div id="TextBoxesGroup">
									<input type="text" name="Isu_Txt[]" id="subject_txt" class="form-control border-blue" required="required" placeholder="หัวข้อเรื่อง">
								</div>
								<hr>
								<div class="row">
									<div class="col-<?php echo $grid;?>-6">
										<button type="button" name="AddText" id="AddText" class="btn btn-warning">เพิ่มข้อความ</button>
									</div>
									<div class="col-<?php echo $grid;?>-6">
										<button type="button" name="DelectText" id="DelectText" class="btn btn-warning">ลดข้อความ</button>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div><br>
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<button type="submit" class="btn btn-success">บันทึก</button>
			<button type="reset" class="btn btn-info">Reset</button>
		</div>
	</div>
	<input type="hidden" name="TypeInput" value="Add">
</form>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->


