<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
	$session=session();
	$InputSDN=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_data_library.php");

                include(APPPATH."Database-pdo/class_library.php");
				$manage=$InputSDN->getPost('manage'); 
                $books_key=$InputSDN->getPost('books_key'); 
                $books_name=$InputSDN->getPost('books_name');?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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

<script>
		$(document).ready(function () {

            var books_key="<?php echo $books_key;?>";
            var books_name="<?php echo $books_name;?>";

    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>กรอง:</span> _INPUT_',
            searchPlaceholder: 'พิมพ์เพื่อกรอง...',
            lengthMenu: '<span>แสดง:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });

    var dataTable = $('.datatable-basic').DataTable();

if (dataTable) {
    dataTable.destroy();
}else{}

    // Column selectors
    $('.datatable-basic').DataTable({
        buttons: {            
            buttons: [
                {
                    extend: 'copyHtml5',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-default',
					filename: books_name+' ('+books_key+')',
					title: books_name+' ('+books_key+')',
                    exportOptions: {
                        columns: ':visible'
                    }
                },


                {
                    extend: 'colvis',
                    text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
                    className: 'btn bg-blue btn-icon'
                }
            ]
        },
                    columnDefs: [{
                                "targets": '_all',
                                "createdCell": function(td, cellData, rowData, row, col) {
                                    $(td).css('padding', '4px')
                            }
                    }],

                    "lengthMenu": [
                        [20, 40, 60, 100, -1],
                        [20, 40 ,60, 100,"All"]
                ] ,
				
							"language": {
							"sEmptyTable"      : "ไม่มีข้อมูลในตาราง",
							"sInfo"            : "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
							"sInfoEmpty"       : "แสดง 0 ถึง 0 จาก 0 แถว",
							"sInfoFiltered"    : "(กรองข้อมูล _MAX_ ทุกแถว)",
							"sInfoPostFix"     : "",
							"sInfoThousands"   : ",",
							"sLengthMenu"      : "แสดง _MENU_ แถว",
							"sLoadingRecords"  : "กำลังโหลดข้อมูล...",
							"sProcessing"      : "กำลังดำเนินการ...",
							"sSeainserth"          : "ค้นหา: ",
							"sZeroRecords"     : "ไม่พบข้อมูล",
							"oPaginate"        : {
							"sFirst"           : "หน้าแรก",
							"sPrevious"        : "ก่อนหน้า",
							"sNext"            : "ถัดไป",
							"sLast"            : "หน้าสุดท้าย"
										         }
							}
		
    });

/*		*/
			
		})
</script> 



<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
            if(($manage=="title")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="content-group">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="table-responsive">
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th><div>ลำดับ</div></th>
                                <th><div>เลขทะเบียน</div></th>
                                <th><div>แหล่งที่มา</div></th>
                                <th><div>สถานะ</div></th>
                                <th><div>วันที่</div></th>
                            </tr>
                        </thead>
                        <tbody>

    <?php
        $count_notebook=0;
        $Print_notebook=new MD_Library_Listbooks("RowArray",$books_key,"-","-","-","-");
            foreach($Print_notebook->CallArrayMDLL() as $book=>$notebook_row){
                $count_notebook=$count_notebook+1;

                    if((isset($notebook_row["LLB_Key"]))){
                        $txt_LLB_Key=$notebook_row["LLB_Key"];
                    }else{
                        $txt_LLB_Key=null;
                    }

                    if((isset($notebook_row["LLB_Time"]))){
                        $txt_LLB_Time=$td_Date_of_Birth=date("d-m-Y",strtotime($notebook_row["LLB_Time"]));
                    }else{
                        $txt_LLB_Time=$notebook_row["LLB_Time"];
                    }

                    if((isset($notebook_row["LAd_No"]))){
                        $txt_LAd_No=$notebook_row["LAd_No"];
                        $txt_Adder=new ManagementAdder($txt_LAd_No,"-","read_txt");
                        $txt_Adder=$txt_Adder->CallMAdd_AdderTxt();
                    }else{
                        $txt_LAd_No=null;
                        $txt_Adder=null;
                    }

                    if((isset($notebook_row["Li_StatusNo"]))){
                        $txt_Li_StatusNo=$notebook_row["Li_StatusNo"];
                        $txt_status=new ManagementStatus($txt_Li_StatusNo,"-","-","read_txt");
                        $txt_status=$txt_status->CallMSStatusTxt();
                    }else{
                        $txt_Li_StatusNo=null;
                        $txt_status=null;
                    }

                ?>
                            <tr>
                                <td align="center" style="vertical-align: text-top;"><div><?php echo $count_notebook;?></div></td>
                                <td align="left" style="vertical-align: text-top;"><div><?php echo $txt_LLB_Key;?></div></td>
                                <td align="center" style="vertical-align: text-top;"><div><span class="label bg-violet-400"><?php echo $txt_Adder;?></span></div></td>
                                <td align="center" style="vertical-align: text-top;"><div><span class="label bg-danger-400"><?php echo $txt_status;?></span></div></td>
                                <td align="left" style="vertical-align: text-top;"><div><?php echo $txt_LLB_Time;?></div></td>
                            </tr>
    <?php   } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{
                exit("<script>window.location='Admin?library_mod=data_library';</script>");
            }
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php		}else{
				exit("<script>window.location='Admin?library_mod=data_library';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=data_library';</script>");
		}
?>
