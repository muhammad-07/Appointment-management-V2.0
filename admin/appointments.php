<?php
include('includes/sess.php');include('includes/config.php');
include('includes/header.php');

if (isset($_REQUEST['delete']))  {
	
	$delete="delete from country where cid=".$_REQUEST['delete'];
	
	if (!mysqli_query($connect, $delete))
  	{
  	die('Error: ' . mysqli_error($connect));
  	}else{
		echo "<script>window.location.replace('country.php')</script>";
	}
}
 ?>

			<!-- mobile navigation -->
<style type="text/css">
textarea, input[type="text"], input[type="submit"] {
    text-transform: none;
}
table th:hover{background-color:#c1c1c1; cursor:pointer}
</style>


                            
<nav id="mobile_navigation"></nav>

<section id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><span>Appointments</span></li>						
        </ul>
    </div>
</section>
<?php require('../includes/chkmsgs.php'); ?>
<section class="container clearfix main_section">
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">

            <!-- main content -->
            <div class="row">
                <div class="col-sm-12">
                    <!--<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add Country List</h4>
                        </div>
                        <div class="panel_controls">
                            <div class="row">
							 <form method="post" name="cv_filter_form" id="country" method="post">
										<div class="col-sm-4">
                                        <label for="table_search">Country Name</label>
                                        <input type="text" class="form-control" name="cname" id="cname" placeholder="Country Name"  value="<?php if(isset($_REQUEST['edit'])){ echo $cate['countryname']; } ?>" required >
										<p class="error text-danger" id="err_country" required></p>
                                        </div>
                                       <div class="col-sm-4">
									     <label for="un_member">&nbsp;</label>
										 <button type="button" name="Add" class="btn btn-success add_btn"> Add  </button> 
											<button type="button" class="btn btn-danger" onclick="window.location.replace('country.php')">Cancel</button>
											
										</div>
                                  </form>     
							</div>
						 </div>
						 
                    </div>-->
					<div class="panel panel-success table-responsive">
									<div class="panel-heading">
										<h4 class="panel-title">Appointment List</h4>
									</div>
									<div class="panel_controls">
										<div class="row">
											<div class="col-sm-4">
												<label for="table_search">Search:</label>
												<input type="text" id="table_search" class="form-control" placeholder="Type a word to search">
											</div>
											
										</div>
									</div>
								<table id="resp_table" class="table toggle-square table-striped" data-filter="#table_search" data-page-size="20">
								<thead>
								<tr>
								<th data-hide="phone,tablet">#</th>
                                <th data-toggle="true">Appointment No.</th>
                                <th data-toggle="true">Type</th>
                                <th data-toggle="true" width="9%">Date &amp; Time</th>
                                <th data-toggle="true">Description</th>
                                <th data-toggle="true">Applicant</th>
                                <th data-toggle="true">Email</th>
                                <th data-toggle="true">Melli No.</th>
                                <th data-toggle="true">DC No.</th>
                               
                        		<!--<th>Action</th>-->
                               

                                </tr>

                                </thead>
										 <tbody id="filter_data">

                                    <?php
									$query = "SELECT * FROM appointment ap
									Left join applicants a ON ap.ulink = a.link
									Order BY ap.appid DESC";
									$no=1;
                                    $result = mysqli_query($connect,$query);
									if(mysqli_num_rows($result)>0)
									{
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if (isset($row)) {
											if($row['atype'] == '1')
												$typ = 'Passport';
											if($row['atype'] == '2')
												$typ = 'Birth Certificate';
											if($row['atype'] == '3')
												$typ = 'Power of Attorney';
											if($row['atype'] == '4')
												$typ = 'Marriage Certificate';
											if($row['atype'] == '5')
												$typ = 'Devorce Certificate';
											if($row['atype'] == '6')
												$typ = 'Student Affairs';
											if($row['atype'] == '7')
												$typ = 'Others';
											//$new=$row['cid'];
												?>
														
                                  <tr><td><?php echo $no;
                                        $no++; ?></td>
                                      <td id="<?php echo $row['appid']; ?>"><?php echo '<a href="../applicants/incs/'.$row['ulink'].'/al/appointment-'.$row['alink'].'.pdf" target="_blank">'.$row['alink'].'</a>';?></td>
                                      <td contenteditable="true"><?php echo $typ;?></td>
                                      <td align="center"><?php echo date('m/d/Y', strtotime($row['adate'])).'<br><b>'.$row['atime'].'</b>';?></td>
                                      <td><?php echo $row['descr'];?></td>
										<td><?php echo $row['fnm'].' '.$row['mnm'].' '.$row['lnm'].'<br/><span style="color:gray; font-size:10px">('.$row['ulink'].')</span>';?></td>
									  <td><?php echo '<a href="mailto:'.$row['eml'].'" target="_blank">'.$row['eml'].'</a>';?></td>
									  <td><?php echo $row['melli'];?></td>
									  <td><?php echo $row['bc'];?></td>
                                      <!--<td id="<?php echo $row['appid']; ?>" contenteditable="true"><?php echo '';?></td>
                                      <td>
									<button  <?php echo ($row['status'] == 0) ? "style='display:none;'" : ""; ?> class="change_status_category btn btn-success btn-xs active<?php echo $row['cid']; ?>" status_type="active" data_id="<?php echo $row['cid']; ?>" >Active</button>

                                                <button <?php echo ($row['status'] == 1) ? "style='display:none;'" : ""; ?> class="change_status_category btn btn-danger btn-xs deactive<?php echo $row['cid']; ?>" status_type="deactive" data_id="<?php echo $row['cid']; ?>" >Deactive</button>
												
												<a href="country.php?delete=<?php echo $row['cid']; ?>" class="btn btn-danger btn-xs category_delete">
                                        Delete</a>
										</td>-->
										
                                            </tr>
                                            <?php
                                        } else {
                                            ?>
                                            <tr><td colspan="5">Data not available</td></tr>
                                        <?php
                                        }
                                    } }
                                    ?>

                                </tbody>
										<tfoot class="hide-if-no-paging">
											
									<tr>
                                        <td colspan="8" class="text-center">
                                            <ul class="pagination pagination-sm">
												
												
                                            </ul>
                                        </td>
                                    </tr>
        
										</tfoot>
									</table>
                    </div>
               </div>
							
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<div id="footer_space"></div>
		</div>
				<?php
		
include("includes/footer.php");
include("includes/sidebar.php");

 ?>
<!--[[ page specific plugins ]]-->
<!-- responsive table -->
<script src="js/lib/FooTable/js/footable.js"></script>
<script src="js/lib/FooTable/js/footable.sort.js"></script>
<script src="js/lib/FooTable/js/footable.filter.js"></script>
<script src="js/lib/FooTable/js/footable.paginate.js"></script>
<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/pages/ebro_responsive_table.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	 $('.category_delete').click(function() {
            if (confirm("Are you sure want to delete this")) {
                 return true;
            } else {
                return false;
            }
        });
    
		var message_status = $("#status");
		$("td[contenteditable=true]").blur(function(){
				
			var field_userid = $(this).attr("id") ;
			var values = $(this).text();
			var value =$.trim(values);
			var string="id="+field_userid+"&&values="+value;
			$.ajax({
			type: "POST",
			url: "includes/ajax_country.php",
			data: "id="+field_userid+"&&values="+value,
			cache: false,
			success: function(data){
				if(data != ''){
					
					message_status.show();
					message_status.text(data);
					setTimeout(function(){message_status.hide()},3000);	
					}
				
			}
			});
			
		});

	  $('.add_btn').on('click',function(e){
				
				e.preventDefault();
				$('.error').html('');
				$.ajax({
					url:"includes/ajax_country.php",
					data: $('#country').serialize(),
					datatype:'json',
					method:"post",
					success:function(result){
						
						if(result.status=="fail"){
						$.each(result.errors, function(index,value){	    				
							$("#err_" + index).html(value);
						});
					}
					else if(result.status == "success"){
						 window.location = 'country.php';
					} else {
						alert('Something went wrong...');
					}
					}
				});
		});
			
	  $('.change_status_category').click(function() {
        var obj = $(this);
        var mid = $(this).attr("data_id");
        var r_type = $(this).attr("status_type");
        $.ajax({
            type: "POST",
            url: "includes/active_country.php",
            data: "member_id=" + mid + "&r_types=" + r_type,
            cache: false,
            async: false,
            success: function(result) {
			
                if (r_type == "active") {
                    $(".active"+mid).fadeOut(400);
                    $(".deactive"+mid).fadeIn(400);
                } else {
                    $(".deactive"+mid).fadeOut(400);
                    $(".active"+mid).fadeIn(400);
                }
            }
        });
        return false;
    });

});
</script>			

</body>
</html>
