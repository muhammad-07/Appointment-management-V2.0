<?php session_start(); define('PATH',''); require_once('template/header.php'); ?>
<style>
label{margin-top:30px}
</style>
<link rel="stylesheet" href="css/jquery-ui.min.css">
</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            
	<?php require_once('template/sideNav.php'); ?>	
	<?php require_once('template/menu.php'); ?>	
            

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <!--<div class="page-title">
                        <div class="title_left">
                            <h3>User Profile</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>-->

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Register Application <small>(DEMO MODE)</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<div class="row">
										<?php require_once( PATH . 'includes/chkmsgs.php');?>
			
										<div class="col-md-12 col-sm-12 col-xs-12">
											<form class="center-block" id="demo-form" style="max-width:800px; display:block;" method="post" action="applicants/incs/app">
					<!--<div class="page-title text-center">
                        <h3 class="ff_cocon"><i class = "fa fa-external-link"></i> Invite candidates to test</h3>
                    </div> 
		    <hr>
		     <div class="clearfix"></div>-->
												<div class="col-md-4">
													<label for="email"><i class = "fa fa-user"></i>&nbsp; First Name:</label>
													<input type="text" class="form-control" name="fname" id="fname" required/>
												</div>
												<div class="col-md-4">
													<label for="email"><i class = "fa fa-user"></i>&nbsp; Last Name:</label>
													<input type="text" class="form-control" name="lname" id="lname" required/>
												</div>
												<div class="col-md-4">
													<label for="mname"><i class = "fa fa-user"></i>&nbsp; Father Name:</label>
													<input type="text" class="form-control" name="mname" id="mname" required/>
												</div>
												<div class="col-md-4">
													<label for="eml"><i class = "fa fa-envelope"></i>&nbsp; Email:</label>
													<input type="email" class="form-control" name="eml" id="eml" required/>
												</div>
												<div class="col-md-4">
													<label for="bc"><i class = "fa fa-newspaper-o"></i>&nbsp; BC Number:</label>
													<input type="text" class="form-control" name="bc" id="bc" required/>
												</div>
												<div class="col-md-4">
													<label for="melli"><i class = "fa fa-keyboard-o"></i>&nbsp; Melli Number:</label>
													<input type="text" class="form-control" name="melli" id="melli" required/>
												</div>
												<div class="col-md-12 apptype">
													<label for="type"><i class = "fa fa-copy"></i>&nbsp; Application type:</label><br/>
													<!--
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="Passport" value="1" class="flat" style="position: absolute; opacity: 0;"> Passport
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="BirthCertificate" value="2" class="flat" style="position: absolute; opacity: 0;"/> Birth Certificate
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="Power of Attorney" value="3" class="flat" style="position: absolute; opacity: 0;"/> Power of Attorney
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="MarriageCertificate" value="4" class="flat" style="position: absolute; opacity: 0;"/> Marriage Certificate
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="DevorceCertificate" value="5" class="flat" style="position: absolute; opacity: 0;"/> Devorce Certificate
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="StudentAffairs" value="6" class="flat" style="position: absolute; opacity: 0;"/> Student Affairs
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="Others" value="7" class="flat" style="position: absolute; opacity: 0;"/> Others
													</div>
													
													-->
													
													
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="Passport" value="1"  > Passport
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="BirthCertificate" value="2"  /> Birth Certificate
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="Power of Attorney" value="3"  /> Power of Attorney
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="MarriageCertificate" value="4"  /> Marriage Certificate
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="DevorceCertificate" value="5"  /> Devorce Certificate
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="StudentAffairs" value="6"  /> Student Affairs
													</div>
													<div class="col-md-3 col-sm-6 col-xs-12">
														<input type="checkbox" name="type[]" id="Others" value="7"  /> Others
													</div>
													
													
													
													
													<!--<select class="form-control" name="type" id="type" required>
														<option value="">Select type</option>	
														<option value="1">Passport</option>	
														<option value="2">Birth Certificate</option>	
														<option value="3">Power of Attorney</option>	
														<option value="4">Marriage Certificate</option>	
														<option value="5">Devorce Certificate</option>	
														<option value="6">Student Affairs</option>	
														<option value="7">Others</option>	
													</select>-->
												</div>
												<div class="col-md-4">
													<label for="adt"><i class = "fa fa-calendar"></i>&nbsp; Appointment date:</label>
													<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="adt" name="adt" placeholder="Select date" aria-describedby="inputSuccess2Status4">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
												</div>
												<div class="col-md-4">
													<label for="avltime"><i class = "fa fa-mortar-board"></i>&nbsp; Select available time:</label>
													<select class="form-control" name="avltime" id="avltime" required>
														<option value="">Select time</option>
														
													</select>
												</div>
												<div class="col-md-12">
													<label for="desc"><i class = "fa fa-envelope"></i>&nbsp; Description:</label>
													<textarea class="resizable_textarea form-control" name="desc" placeholder="Please describe your application in detail for faster communtcation." style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" required></textarea>
												</div>
												<div class="col-md-12 center-block">
													<div class="text-center">
													<input type="submit" class="btn btn-primary" style="width:200px; margin: 20px auto" value="GET APPOINTMENT" />
													</div>
												</div>
			

                                </form>
				
                            </br>
                            </br>
                            </br>
			    
                        </div>
                    </div>
				    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php require_once('template/footer.php'); ?>	
<?php require_once('template/js.php'); ?>	


  <script src="js/jquery-ui.min.js"></script>
    <script>
		$(document).ready(function () {
			
			$('.apptype input[type=checkbox]').change(function (){
				
				getAvailableTime();
		
			
			});
			
			
			$( "#adt" ).datepicker({
				//beforeShowDay: $.datepicker.noWeekends
				onSelect: function(dateText) {
					//alert("Selected date: " + dateText + "; input's current value: " + this.value);
					getAvailableTime();
				}
 
			});
			
			function getAvailableTime()
			{
				
				//alert($(".apptype input[type=checkbox]:checked").length);
				//$.each($(".apptype input[type=checkbox]:checked").length);
				
				//typ = $('input[name=type]').val();
				
				var typ = $('.apptype input[type=checkbox]:checked').map(function(){
					return $(this).val();
				}).get();

	
				//alert(typ);
				adt = $('#adt').val();
				//alert(adt);
				if($(".apptype input[type=checkbox]:checked").length < 1)
				{
					alert('Please select application type.');
					$('#avltime').empty();
				}
				else if(adt == 0 || adt == '')
				{
					alert('Please select appointment date.');
					$('#avltime').empty();
				}			
				else{
				$.ajax({
					type: "POST",
					url: "includes/selectboxget.php",
					data: {typ:typ,adt:adt},
					//dataType: 'json',
					cache: false,
					success:function(result){	
					
						if(result != '')
						{
							//alert('\n'+result+'\n\n\n');
							
							res = result.split(',');
							
							$('#avltime').empty();
							for(i=0; i<res.length-1;i++)
							{
								
								r = res[i].split('.');
								//alert(r);
								if(r[0].length < 2)
									r[0] = '0'+r[0];
								if(r[1]==undefined || r[1]=='' || r[1].length == 0)
									r[1] = '00';
								if(r[1].length == 1)
									r[1] = r[1]+'0';
								
								//alert(r[0]+'.'+r[1]+' AM');
								t = r[0]+'.'+r[1]+' AM';
								$('#avltime').append('<option value="'+t+'">'+t+'</option>');
							}
							
							/*max = 12.00;
							if(typ <= 3)
								max = 10.00;
							$('#avltime').empty();
							for(t=8; t<max; t += 0.05)
							{
								t = t.toFixed(2);
								$('#avltime').append('<option value="'+t+'">'+t+'</option>');
								//v = t.split('.')[1];
								//alert(v);
								//if(v == '55')
									//$('#avltime').append('<option value="'+t+'">break</option>');
								 var x = 1;

    
							}
							*/
							
								
						}
					}
				});
				}
			}
			/*$('#adt').daterangepicker({
                singleDatePicker: true,
                startDate: moment(),
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });*/
			
			
        });
   </script>
</body>

</html>