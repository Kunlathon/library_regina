<?php
    include(APPPATH."Database-pdo/pdo_data.php");
    include(APPPATH."Database-pdo/pdo_conndatastu.php");
    include(APPPATH."Database-pdo/class_data.php");
            
    include(APPPATH."Database-pdo/pdo_library.php");
    include(APPPATH."Database-pdo/class_library.php");
    include(APPPATH."Database-pdo/class_data_library.php");
    include(APPPATH."Database-pdo/class_borrow_book.php");
?>



<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold">ระบบยืมคืนหนังสือ</span> คืนหนังสือ
				<small class="display-block">Management Information System Regina Library</small>
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

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">ช่องรายการคืนหนังสือ</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-<?php echo $grid;?>-6">
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <label class="control-label col-<?php echo $grid;?>-4 text-semibold" style="font-size: 18px;">เลขทะเบียนหนังสือ</label>
                                            <div class="col-<?php echo $grid;?>-8">
                                                <input type="text" class="form-control" name="book_key" id="book_key" style="font-size: 22px;" placeholder="เลขทะเบียนหนังสือ">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-<?php echo $grid;?>-6">
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <button type="button" name="but_return_book" id="but_return_book" style="font-size: 18px;" class="btn btn-success">ดำเนินการคืน</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="RunReturnBook"></div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        </div>
<!-- /main content -->
	</div>
<!-- /page content -->
</div>
<!-- /page container -->