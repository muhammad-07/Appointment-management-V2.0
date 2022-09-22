<?php
	function get_email_headers($f='From: codbuddy.com <contact@codbuddy.com> \r\n', $rep='Reply-To: contact@codbuddy.com \r\n')
	{
		$headers = $f;
		//$headers .= "No-Reply: info@needsxchange.com \r\n";
		$headers .= $rep;
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		return $headers;
	}
	function get_email_head()
	{
		return '
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <title>codbuddy Email updates</title>
		  <style type="text/css">
			 /* Client-specific Styles */
			 #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
			 body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
			 /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
			 .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
			 .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
			 #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
			 img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
			 a img {border:none;}
			 .image_fix {display:block;}
			 p {margin: 0px 0px !important;}
			 
			 table td {border-collapse: collapse;}
			 table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
			 /*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
			 /*STYLES*/
			 table[class=full] { width: 100%; clear: both; }
			 
			 /*################################################*/
			 /*IPAD STYLES*/
			 /*################################################*/
			 @media only screen and (max-width: 640px) {
			 a[href^="tel"], a[href^="sms"] {
			 text-decoration: none;
			 color: #ffffff; /* or whatever your want */
			 pointer-events: none;
			 cursor: default;
			 }
			 .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
			 text-decoration: default;
			 color: #ffffff !important;
			 pointer-events: auto;
			 cursor: default;
			 }
			 table[class=devicewidth] {width: 440px!important;text-align:center!important;}
			 table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
			 table[class="sthide"]{display: none!important;}
			 img[class="bigimage"]{width: 420px!important;height:219px!important;}
			 img[class="col2img"]{width: 420px!important;height:258px!important;}
			 img[class="image-banner"]{width: 440px!important;height:106px!important;}
			 td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
			 td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
			 img[class="logo"]{padding:0!important;margin: 0 auto !important;}

			 }
			 /*##############################################*/
			 /*IPHONE STYLES*/
			 /*##############################################*/
			 @media only screen and (max-width: 480px) {
			 a[href^="tel"], a[href^="sms"] {
			 text-decoration: none;
			 color: #ffffff; /* or whatever your want */
			 pointer-events: none;
			 cursor: default;
			 }
			 .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
			 text-decoration: default;
			 color: #ffffff !important; 
			 pointer-events: auto;
			 cursor: default;
			 }
			 table[class=devicewidth] {width: 280px!important;text-align:center!important;}
			 table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
			 table[class="sthide"]{display: none!important;}
			 img[class="bigimage"]{width: 260px!important;height:136px!important;}
			 img[class="col2img"]{width: 260px!important;height:160px!important;}
			 img[class="image-banner"]{width: 280px!important;height:68px!important;}
			 
			 }
		  </style>

		  
		</head>
		<body>';
	}
	
	
	function get_email_webviewpart()
	{
		return '
		<div class="block">
		   <!-- Start of preheader -->
		   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="preheader">
			  <tbody>
				 <tr>
					<td width="100%">
					   <table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
						  <tbody>
							 <!-- Spacing -->
							 <tr>
								<td width="100%" height="5"></td>
							 </tr>
							 <!-- Spacing -->
							 <tr>
								<td align="right" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999" st-content="preheader">
								   If you cannot read this email, please  <a class="hlite" href="#" style="text-decoration: none; color: #0db9ea">click here</a> 
								</td>
							 </tr>
							 <!-- Spacing -->
							 <tr>
								<td width="100%" height="5"></td>
							 </tr>
							 <!-- Spacing -->
						  </tbody>
					   </table>
					</td>
				 </tr>
			  </tbody>
		   </table>
		   <!-- End of preheader -->
		</div>';
	}
	
	function get_email_menu()
	{
		return '
			<div class="block">
			<!-- start of header -->
			<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
			  <tbody>
				 <tr>
					<td>
					   <table width="580" bgcolor="#0db9ea" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">
						  <tbody>
							 <tr>
								<td>
								   <!-- logo -->
								   <table width="70" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
									  <tbody>
										 <tr>
											<td valign="middle" width="70" style="padding: 3px 0 3px 0px;" class="logo">
											   <div class="imgpop">
												  <a href="#"><img src="http://codbuddy.com/demo/Appointment-management/email/Minty/img/logo.png" alt="logo" border="0" style="display:block; border:none; outline:none; text-decoration:none; width:100%; max-width:100px" st-image="edit" class="logo"></a>
											   </div>
											</td>
										 </tr>
									  </tbody>
								   </table>
								   <!-- End of logo -->
								   <!-- menu -->
								   <table width="460" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth">
									  <tbody>
										 <tr>
											<td width="270" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 50px; padding: 10px 0;" align="right" class="menu" st-content="menu">
											   <a href="http://codbuddy.com" style="text-decoration: none; color: #ffffff;">HOME</a>
											   &nbsp;|&nbsp;
											   <a href="http://codbuddy.com/about" style="text-decoration: none; color: #ffffff;">ABOUT</a>
											   &nbsp;|&nbsp;
											   <a href="http://codbuddy.com/contact" style="text-decoration: none; color: #ffffff;">CONTACT</a>
											</td>
											<td width="20"></td>
										 </tr>
									  </tbody>
								   </table>
								   <!-- End of Menu -->
								</td>
							 </tr>
						  </tbody>
					   </table>
					</td>
				 </tr>
			  </tbody>
			</table>
			<!-- end of header -->
			</div>';
	}
	
	function get_email_fullwidth_img($img='http://codbuddy.com/email/Minty/img/bigimage.jpg')
	{
		return '
		<div class="block">
			<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
				<tbody>
					<tr>
						<td>           
                           <table width="580" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
                              <tbody>
                                 <tr>
                                    <td align="center" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 34px; color: #000;line-height: 50px; padding: 1px 0;" align="center">	
                                       <a target="_blank" href="#"><img  border="0"  alt="" style="display:block; border:none; outline:none; text-decoration:none; max-width:100%" src="'.$img.'" class="bigimage"></a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>                  
						</td>
					</tr>
				</tbody>
			</table>
		</div>';
	}
	
	function get_email_center_HSB($H='',$S='',$Blnk='',$Btxt='')
	{
		return '
		<div class="block">
   <!-- start textbox-with-title -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="fulltext">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
                  <tbody>
                     <!-- Spacing -->
                     <tr>
                        <td width="100%" height="30"></td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td>
                           <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                              <tbody>
                                 <!-- Title -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:center;line-height: 20px;" st-title="fulltext-title">
                                       '.$H.'
                                    </td>
                                 </tr>
                                 <!-- End of Title -->
                                 <!-- spacing -->
                                 <tr>
                                    <td height="5"></td>
                                 </tr>
                                 <!-- End of spacing -->
                                 <!-- content -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; color: #95a5a6; text-align:center;line-height: 30px;" st-content="fulltext-paragraph">
                                       '.$S.'
                                    </td>
                                 </tr>
                                 <!-- End of content -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 <!-- Spacing -->
                                 <!-- button -->
                                 <tr>
                                    <td>

                                       <table height="36" align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="36" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:25px; padding-right:25px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="'.$Blnk.'">'.$Btxt.'</a>
                                                                           </span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>


                                       
                                    </td>
                                 </tr>
                                 <!-- /button -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="30"></td>
                                 </tr>
                                 <!-- Spacing -->
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- end of textbox-with-title -->
</div>
		';
	}
	
	
	
	
	function get_email_LR_IHSB($H='',$S='', $Img,  $ImgAlign='left', $cntntAlign='right', $Btxt='', $Blnk='')
	{
		return '
	<div class="block">
   <!-- start of left image -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="leftimage">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" style="background:url(http://codbuddy.com/email/Minty/img/bigimage.jpg)" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
                  <tbody>
                     <!-- Spacing -->
                     <tr>
                        <td height="20"></td>
                     </tr>
                     <!-- Spacing -->
					 
                     <tr>
                        <td>
                           <table width="540" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                              <tbody>
                                 <tr>
                                    <td>
                                       <!-- start of text content table -->
                                       <table width="200" align="'.$ImgAlign.'" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- image -->
                                             <tr>
                                                <td width="200" height="180" align="center">
                                                   <img src="'.$Img.'" alt="'.$H.'" border="0" width="180" height="180" style="display:block; border:none; outline:none; text-decoration:none;">
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- mobile spacing -->
                                       <table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
                                          <tbody>
                                             <tr>
                                                <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- mobile spacing -->
                                       <!-- start of right column -->
                                       <table width="330" align="'.$cntntAlign.'" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- title -->
                                             <tr>
                                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="leftimage-title">
                                                   '.$H.'
                                                </td>
                                             </tr>
                                             <!-- end of title -->
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="20"></td>
                                             </tr>
                                             <!-- Spacing -->
                                             <!-- content -->
                                             <tr>
                                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="leftimage-paragraph">
                                                  '.$S.'
                                                </td>
                                             </tr>
                                             <!-- end of content -->
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="10"></td>
                                             </tr>
                                             <!-- button -->
                                             <tr>
                                                <td>
													<table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
													  <tbody>
														 <tr>
															<td width="auto" align="center" valign="middle" height="36" >
															
															   <span style="color: #ffffff; font-weight: 300;">
																  <a style="text-decoration: none;background-color:#0db9ea; border-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding:8px 25px;" href="'.$Blnk.'">'.$Btxt.'</a>
															   </span>
															</td>
														 </tr>
													  </tbody>
												   </table>
                                                </td>
                                             </tr>
                                             <!-- /button -->
                                          </tbody>
                                       </table>
                                       <!-- end of right column -->
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td height="20"></td>
                     </tr>
                     <!-- Spacing -->
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- end of left image -->
</div>';
}

	function get_email_2_col_todo($H='',$S='',$Blnk='',$Btxt='')
	{
		return '
	<div class="block">
   <!-- Start of 2-columns -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="2columns">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
                  <tbody>
                     <tr>
                        <td width="100%" height="20"></td>
                     </tr>
                     <tr>
                        <td>
                           <table width="540" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                              <tbody>
                                 <tr>
                                    <td>
                                       <table width="260" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
                                          <tbody>
                                             <!-- image -->
                                             <tr>
                                                <td width="260" height="140" align="center" class="devicewidth">
                                                   <img src="img/2col-image1.png" alt="" border="0" width="260" height="140" style="display:block; border:none; outline:none; text-decoration:none;" class="col2img">
                                                </td>
                                             </tr>
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                             </tr>
                                             <!-- Spacing -->
                                             <tr>
                                                <td>
                                                   <!-- start of text content table -->
                                                   <table width="260" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                                      <tbody>
                                                         <!-- title -->
                                                         <tr>
                                                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="2col-title1">
                                                               LOREM IPSUM
                                                            </td>
                                                         </tr>
                                                         <!-- end of title -->
                                                         <!-- Spacing -->
                                                         <tr>
                                                            <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                         </tr>
                                                         <!-- /Spacing -->
                                                         <!-- content -->
                                                         <tr>
                                                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 20px;" st-content="2col-para1">
                                                               Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempam et justo duo dolores et ea rebum.
                                                            </td>
                                                         </tr>
                                                         <!-- end of content -->
                                                         <!-- Spacing -->
                                                         <tr>
                                                            <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                         </tr>
                                                         <!-- /Spacing -->
                                                         <!-- button -->
                                                         <tr>
                                                            <td>
                                                               <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="#">Read More</a>
                                                                           </span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <!-- /button -->
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                             <!-- end of text content table -->
                                          </tbody>
                                       </table>
                                       <!-- end of left column -->
                                       <!-- spacing for mobile devices-->
                                       <table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
                                          <tbody>
                                             <tr>
                                                <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- end of for mobile devices-->
                                       <!-- start of right column -->
                                       <table width="260" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
                                          <tbody>
                                             <!-- image -->
                                             <tr>
                                                <td width="260" height="140" align="center" class="devicewidth">
                                                   <img src="img/2col-image2.png" alt="" border="0" width="260" height="140" style="display:block; border:none; outline:none; text-decoration:none;" class="col2img">
                                                </td>
                                             </tr>
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                             </tr>
                                             <!-- Spacing -->
                                             <tr>
                                                <td>
                                                   <!-- start of text content table -->
                                                   <table width="260" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                                      <tbody>
                                                         <!-- title -->
                                                         <tr>
                                                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="2col-title2">
                                                               LOREM IPSUM
                                                            </td>
                                                         </tr>
                                                         <!-- end of title -->
                                                         <!-- Spacing -->
                                                         <tr>
                                                            <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                         </tr>
                                                         <!-- /Spacing -->
                                                         <!-- content -->
                                                         <tr>
                                                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 20px;" st-content="2col-para2">
                                                               Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempam et justo duo dolores et ea rebum.
                                                            </td>
                                                         </tr>
                                                         <!-- end of content -->
                                                         <!-- Spacing -->
                                                         <tr>
                                                            <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                         </tr>
                                                         <!-- /Spacing -->
                                                         <!-- button -->
                                                         <tr>
                                                            <td>
                                                               <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="#">Read More</a>
                                                                           </span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <!-- /button -->
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                             <!-- end of text content table -->
                                          </tbody>
                                       </table>
                                       <!-- end of right column -->
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td width="100%" height="20"></td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- End of 2-columns -->   
</div>';
}

function get_email_left_HSB($H='',$S='',$Blnk='',$Btxt='')
	{
		return '
<div class="block">
   <!-- Full + text -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="fullimage">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
                  <tbody>
                     <tr>
                        <td width="100%" height="20"></td>
                     </tr>
                     <tr>
                        <td>
                           <table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
                              <tbody>
							  
							  <!-- title -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="rightimage-title">
                                       LOREM IPSUM
                                    </td>
                                 </tr>
                                 <!-- end of title -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 <!-- Spacing -->
                                 <!-- content -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #666666; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">
                                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </td>
                                 </tr>
                                 <!-- end of content -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 <!-- button -->
                                 <tr>
                                    <td>
                                       <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="#">Read More</a>
                                                                           </span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                    </td>
                                 </tr>
                                 <!-- /button -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="20"></td>
                                 </tr>
                                 <!-- Spacing -->
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
</div>';
							  
	}
function email_headtxt($t, $align='center', $padding='0 15px')
{
		return '
		<div class="block" style="background:#f6f4f5">
			<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="background:#fff">
                <tbody>
                    <!-- Spacing -->
                    <tr>
						<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:'.$align.'; padding:'.$padding.'; line-height: 20px;" st-title="rightimage-title">
                             '.$t.'
                        </td>			
                     </tr>
				</tbody>
			</table>
		</div>';
}
function email_txt($t, $align='center', $padding='0 15px')
{
		return '
		<div class="block" style="background:#f6f4f5">
			<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="background:#fff">
                <tbody>
                    <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:'.$align.'; padding:'.$padding.';line-height: 24px;" st-content="rightimage-paragraph">
                                       '.$t.'
                                    </td>
                                 </tr>
				</tbody>
			</table>
		</div>';
}
function email_btn($Btxt, $Blnk, $align='center', $padding='0 15px')
{
		return '
		<div class="block" style="background:#f6f4f5">
			<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="background:#fff">
                <tbody>
                    <tr>
                                    <td>

                                       <table height="36" align="'.$align.'" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
										  <tbody>
											 <tr>
												<td width="auto" align="center" valign="middle" height="36" style="padding:'.$padding.'">
												
												   <span style="color: #ffffff; font-weight: 300;">
													  <a style="text-decoration: none;background-color:#0db9ea; border-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding:8px 25px;" href="'.$Blnk.'">'.$Btxt.'</a>
												   </span>
												</td>
											 </tr>
										  </tbody>
									   </table>

                                    </td>
                                 </tr>
				</tbody>
			</table>
			
			
			
		</div>';
}

function get_email_footer()
	{
		return '	
	<div class="block">
						 
   <!-- Start of preheader -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
      <tbody>
         <tr>
            <td width="100%">
               <table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                  <tbody>
                     <!-- Spacing -->
                     <tr>
                        <td width="100%" height="5"></td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td align="center" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999" st-content="preheader">
                           If you don\'t want to receive updates. please  <a class="hlite" href="#" style="text-decoration: none; color: #0db9ea">unsubscribe</a> 
                        </td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td width="100%" height="5"></td>
                     </tr>
                     <!-- Spacing -->
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- End of preheader -->
</div>


</body></html>';
}


//echo get_email_head().get_email_webviewpart().get_email_menu().get_email_fullwidth_img().get_email_center_HSB('asd','asd','dd','adad').email_headtxt('muhammad').email_txt('HELLO', $align='left', $padding='0 15px').email_btn('HELLO', 'asdsad', 'center', $padding='0 15px').get_email_LR_IHSB('HEAD','dsada','left','right','btxt','blink').get_email_footer();
?>