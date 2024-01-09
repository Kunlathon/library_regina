<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
	$session=session();
	$InputSDL=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_data_library.php");

                include(APPPATH."Database-pdo/class_library.php");
				$manage=$InputSDL->getPost('manage'); ?>
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

            var date1=new Date();
            var year1 = date1.getFullYear().toString().slice(-4);
            var month1 = ('0' + (date1.getMonth() + 1)).slice(-2); 
            var day1 = ('0' + date1.getDate()).slice(-2);
            var datetime = year1 + '-' + month1 + '-' + day1;
                datetime=datetime.trim();

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
					filename: 'ข้อมูลพื้นฐานหนังสือ -  ข้อมูลหนังสือ-ทั้งหมด ณ '+datetime,
					title: 'ข้อมูลพื้นฐานหนังสือ -  ข้อมูลหนังสือ-ทั้งหมด ณ '+datetime,
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
            if(($manage=="show")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="content-group">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="table-responsive">
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th><div>ลำดับ</div></th>
                                <th><div>รหัสหนังสือ</div></th>
                                <th><div>ชื่อหนังสือ (ไทย)</div></th>
                                <th><div>ชื่อหนังสือ (อังกฤษ)</div></th>
                                <th><div>ISBN</div></th>
                                <th><div>สำนักพิมพ์</div></th>
                                <th><div>จำนวนเล่ม</div></th>
                                <th><div>การจัดการ</div></th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
        $count_book=0;
        $Print_Data_Library=new MD_Library_Listbooks("RowAll","-","-","-","-","-");
            foreach($Print_Data_Library->CallArrayMDLL() as $book=>$Data_Library_Row){ 
                $count_book=$count_book+1;
                if((isset($Data_Library_Row["Books_Key"]))){
                    $txt_Books_Key=$Data_Library_Row["Books_Key"];
                    $sum_books=new Int_Library_Books("count",$txt_Books_Key);
                    $sum_books=$sum_books->CallCountBooks();
                }else{
                    $txt_Books_Key=null;
                    $sum_books=0;
                }
                if((isset($Data_Library_Row["Books_ISBN"]))){
                    $txt_Books_ISBN=$Data_Library_Row["Books_ISBN"];
                }else{
                    $txt_Books_ISBN=null;
                }
                if((isset($Data_Library_Row["Books_NameTh"]))){
                    $txt_Books_NameTh=$Data_Library_Row["Books_NameTh"];
                }else{
                    $txt_Books_NameTh=null;
                }
                if((isset($Data_Library_Row["Books_NameEn"]))){
                    $txt_Books_NameEn=$Data_Library_Row["Books_NameEn"];
                }else{
                    $txt_Books_NameEn=null;
                }
                if((isset($Data_Library_Row["LP_Key"]))){
                    $txt_LP_Key=$Data_Library_Row["LP_Key"];
                    $publisher_name=new ManagementPublisher($txt_LP_Key,"-","read_txt");
                    $publisher_name=$publisher_name->CallMP_PublisherTxt();
                }else{
                    $txt_LP_Key=null;
                    $publisher_name=null;
                }


                ?>
                            <tr>
                                <td align="center" style=" vertical-align: text-top;"><div><?php echo $count_book;?></div></td>
                                <td align="left" style=" vertical-align: text-top;"><div><?php echo $txt_Books_Key;?></div></td>
                                <td align="left" style=" vertical-align: text-top;"><div><?php echo $txt_Books_NameTh;?></div></td>
                                <td align="left" style=" vertical-align: text-top;"><div><?php echo $txt_Books_NameEn;?></div></td>
                                <td align="left" style=" vertical-align: text-top;"><div><span class="label bg-danger"><?php echo $txt_Books_ISBN;?></span></div></td>
                                <td align="left" style=" vertical-align: text-top;"><div><?php echo $publisher_name;?></div></td>
                                <td align="center" style=" vertical-align: text-top;"><div><span class="badge bg-violet"><?php echo $sum_books;?></span></div></td>
                                <td align="center" style=" vertical-align: text-top;">
<form name="form_list_sdl<?php echo $count_book;?>" id="form_list_sdl<?php echo $count_book;?>" accept-charset="utf-8" method="post" action="<?php echo base_url();?>admin?library_mod=data_library">
                                    <div><button type="submit" name="but_title_<?php echo $count_book;?>" id="but_title_<?php echo $count_book;?>" class="btn btn-success" data-popup="tooltip-custom" title="รายการ"><i class="icon-search4"></i></button></div>
<input type="hidden" name="manage" id="manage" value="title">
<input type="hidden" name="books_key" id="books_key" value="<?php echo $txt_Books_Key;?>">
<input type="hidden" name="books_name" id="books_name" value="<?php echo $txt_Books_NameTh;?>">
</form>
                                </td>
                            </tr>
    <?php   }?>


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
