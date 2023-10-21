<?php
	include("public/database/pdo_library.php");
	include("public/database/class_library.php");
?>
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<span class="text-semibold">ข้อมูลพื้นฐานหนังสือ</span> - Dewey Decimal Classification System
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

                <div id="Run_ddcb">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php
		$list=filter_input(INPUT_POST,'list');
			if(($list=="UpDate")){ ?>
	<?php
		@$DDCB_Key=filter_input(INPUT_POST,"DDCB_Key");
		
		$DataDDCB_RowId=new ManagementDDCB("-",$DDCB_Key,"-","-","RowBId");
		foreach($DataDDCB_RowId->RowIdManagementDDCB() as $books=>$DDCB_Row){
			if((is_array($DDCB_Row) && count($DDCB_Row))){
				$copy_TxtTh=$DDCB_Row["DDCB_TxtTh"];
				$copy_TxtEh=$DDCB_Row["DDCB_TxtEh"];
				$copy_DDCA_No=$DDCB_Row["DDCA_No"];
			}else{
				$copy_TxtTh="-";
				$copy_TxtEh="-";
				$copy_DDCA_No="-";
			}
		}
	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-body border-top-pink">
				<div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="content-group text-semibold">
                            แก้ไขข้อมูล เลขหมวดหมู่ย่อย : <?php echo $DDCB_Key;?>
					        <small class="display-block"></small>
				        </h3>
                 	</div>
                </div>

				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6">
						<fieldset class="content-group">
							<div class="form-group form-group-xlg">
								<label class="control-label col-lg-3">หมวดหมู่ย่อยภาษาไทย</label>
								<div class="col-lg-9">
									<div id="DDCB_TxtTh-up">
										<input type="text" name="DDCB_TxtTh" id="DDCB_TxtTh" class="form-control" maxlength="100" value="<?php echo $copy_TxtTh;?>">
									</div>
								</div>
							</div>
						</fieldset>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-6">
						<fieldset class="content-group">
							<div class="form-group form-group-xlg">
								<label class="control-label col-lg-4">หมวดหมู่ย่อยภาษาอังกฤษ</label>
								<div class="col-lg-8">
									<input type="text" name="DDCB_TxtEh" id="DDCB_TxtEh" class="form-control"  maxlength="100" value="<?php echo $copy_TxtEh;?>">
								</div>
							</div>
						</fieldset>
					</div>	

				</div>

				<div class="row">
					<div class="col-sm-12">
						<fieldset class="content-group">	
							<div class="form-group form-group-xlg">
								<button type="button" name="DDC_UP" id="DDC_UP" class="btn btn-success" value="<?php echo $DDCB_Key;?>">บันทึก</button>
								<button type="button" class="btn btn-info">ยกเลิก</button>
							</div>
						</fieldset>
					</div>
				</div>


			</div>
		</div>
	</div>
	<input type="hidden" name="DDCA_No" id="DDCA_No" value="<?php echo $copy_DDCA_No;?>"/>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php
			/*@$JS_DDCA_No=filter_input(INPUT_POST,"JS_DDCA_No");
				if(($JS_DDCA_No==null)){*/ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        	<div class="panel panel-body border-top-pink">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="content-group text-semibold">หมวดหมู่ใหญ่<small class="display-block"></small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="DDCA_No" id="DDCA_No" class="select-menu-color" data-placeholder="Select a State...">
							<option></option>                                        
								<optgroup label="ข้อมูล หมวดใหญ่">

	<?php
            $CallDDCA=new ManagementDDCA("-","-","-","RowAll");
            foreach($CallDDCA->RowAllManagementDDCA() as $books=>$DDCARow){ ?>
                                <option value="<?php echo $DDCARow["DDCA_No"];?>"><?php echo $DDCARow["DDCA_TxtTh"];?></option>
    <?php    } ?>

                            	</optgroup>
                        </select>
                    </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <button type="button" name="button_ddc" id="button_ddc" class="btn btn-success">เรียกดู ข้อมูลหมวดหมู่ย่อย</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php		/*}else{ ?>
		<input type="hidden" name="JS_DDCA_No" id="JS_DDCA_No" value="<?php echo $JS_DDCA_No;?>"/>
		
	<?php	    } */?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php  } ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				</div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->


