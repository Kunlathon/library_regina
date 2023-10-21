	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<span class="text-semibold">ข้อมูลพื้นฐานหนังสือ</span>&nbsp;-&nbsp; รายงานข้อมูลหนังสือ
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
<form name="books_library">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="panel">
				<div class="panel-heading bg-teal">
					<div class="row">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-sm-2 col-md-2 col-lg-2" style="font-family: surafont_sanukchang; font-size: 18px;">ค้นหารหัสประจำตัวหนังสือ <span class="text-danger">*</span></label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input type="text" name="BL_Key" id="BL_Key" class="form-control border-teal border-lg" style="font-family: surafont_sanukchang; font-size: 20px; font-weight: bold;" placeholder="รหัสประจำตัวหนังสือ..." required="required" minlength="3" maxlength="20">
								</div>
								<div class="col-sm-3 col-md-3 col-lg-3">
									<button type="button" class="btn btn-info" name="EnterRL" id="EnterRL" style="font-family: surafont_sanukchang; font-size: 16px;" data-popup="tooltip-custom" title="ค้นหารหัสประจำตัวหนังสือ" data-placement="bottom" data-container="body">ค้นหาหนังสือ...</button>
									<button type="reset" class="btn btn-success" name="ResetRL" id="ResetRL"  style="font-family: surafont_sanukchang; font-size: 16px;" data-popup="tooltip-custom" title="ล้างค่ารายการ" data-placement="bottom" data-container="body">ล้างค่ารายการ...</button>
								</div>
								<div class="col-sm-3 col-md-3 col-lg-3"></div>
							</div>
						</fieldset>
					</div>
				</div>

				<div class="panel-body">
					<div id="Run_BL_Data">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12" style="font-weight: bold; text-align: center; font-size: 20px;" >
								<content>~~~~พื้นที่แสดง----ข้อมูลหนังสือ~~~~ </content>
							</div>
						</div>					
					</div>					
				</div>
			</div>
		</div>	
	</div>
</form>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->


