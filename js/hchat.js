$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

msg = '';
$(document).ready(function() { 
	
	if(msg)
	clearInterval(msg);

	msg = setInterval(
	
		function (){
			//alert(lmsg);
			if(getmsg == false)
			{
				getmsg = true;
			$.ajax({
                            type: "POST",
                            url: "../includes-common/fmsg.php",
                            cache: false,
			    dataType : 'html',
			    data:{cn:token, lmsg:lmsg},
                            success: function(m){
				    //alert(m);
					if (m!='0'){
					
					var mresult = m.split('**M_S_G_E_X_P**');
					$('.msg_container_base').append(mresult[0]).animate({scrollTop:20000}, 2000);
					lmsg = mresult[1];
					
					}
					getmsg = false;
					
                            }
                        });
			
			}
			
	}, 2000);


var sandingmsg = false;
$("textarea#message").unbind('keypress').bind('keypress', function(event) {
       
var keycode = (event.keyCode ? event.keyCode : event.which);

if(keycode == '13' && event.shiftKey == 0){
	/*var txt =  $(this).val();
	txt = txt.replace(/<script>.*<\/script>/g, "").replace(/</g, "&lt;").replace(/>/g, "&gt;") .replace(/\s{5,}/g, ' ').trim();
		
		if(txt!=''){
			if(sandingmsg == false)
			{
				sandingmsg = true;
				$.ajax({
				    type: "POST",
				    url: "../includes-common/sendmsg.php",
				    data:{rc:token, msg:txt},
				    cache: false,
				    success: function(e){
					   // alert(e);
					$('textarea#message').val('');
					sandingmsg = false;
				    }
				});
			}
		}*/
		sendmsg();
}

});


$("#btn-chat").unbind('click').bind('click', function() {

	sendmsg();

});
function sendmsg(){
	var txt =  $('textarea#message').val();
	txt = txt.replace(/<script>.*<\/script>/g, "").replace(/</g, "&lt;").replace(/>/g, "&gt;") .replace(/\s{5,}/g, ' ').trim();
		
		if(txt!=''){
			if(sandingmsg == false)
			{
				sandingmsg = true;
				$('textarea#message, #btn-chat').prop('disabled','disabled');
				$.ajax({
				    type: "POST",
				    url: "../includes-common/sendmsg.php",
				    data:{rc:token, msg:txt},
				    cache: false,
				    success: function(e){
					 if(e == '1'){
						$('textarea#message').val('');
						sandingmsg = false;
					 }
					 else
						 alert(e);
					$('textarea#message, #btn-chat').prop('disabled',false);
					
				    }
				});
			}
		}
}


$("#filemsg-btn").unbind('click').bind('click',function() {
	$("#filemsg").slideUp('hide');
	$("#textmsg").slideDown();
});
$("#textmsg-btn").unbind('click').bind('click',function() {

	$("#textmsg").slideUp('hide');
	$("#filemsg").slideDown();
});

						

});
function chkfile(input) {
	
			if (input.files && input.files[0]) {
				
				
				//ftype = input.files[0].type;
				fsize = input.files[0].size;
				
				if(fsize > 5 && fsize < 25971520) {
					$('#showvfile').html(input.files[0].name);
				}
				else{
					$("#FileInput").replaceWith( $("#FileInput").val('').clone( true ) );
					$("#output").html('File should not be larger than 25Mb');
				}
			}

		}