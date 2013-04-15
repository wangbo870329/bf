<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Test of Comment</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                function loading_show(){
 //                   $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
  //                  $('#loading').fadeOut('fast');
                }         
				
                function loadData(page){
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "load_data.php",
                        data: "page="+page,
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
				
				function loadFather(fid){
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "load_father.php",
                        data: "id="+fid,
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
//                                loading_hide();
                                $("#fid").after(html(msg));
                            });
//						(id);
                        }
                    });
                }
				
/*				$("#username").keyup(function(){
					$username = $("#username").val();
				});
				
				$("#comment").keyup(function(){
					$comment = $("#comment").val();
				});
*/				
				function upload(){
//                    loading_show();  
					var $username = $("#username").val(); 
					var $comment = $("#comment").val(); 
					$("#username").val("");
					$("#comment").val("");
                    $.ajax
                    ({
                        type: "POST",
                        url: "upload.php",
                        data: "username="+$username+"&comment="+$comment,
                       success: function(msg){ 
							alert("posted successfully!");
	 /*						if(msg==1){ 
								var str = "<p><strong>"+username+"</strong>��"+comment+"<span>just</span></p>"; 
								comments.append(str); 
								$("#message").show().html("posted successfully!").fadeOut(1000); 
								$("#comment").attr("value",""); 
				/*			}else{ 
								$("#message").show().html(msg);//.fadeOut(1000); 
							} */
						 }
                    });
					
                }
				
                loadData(1);  // For first time page load default results
				
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                });           
				
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });
				
				$("#post").live('click',function(){     //post a comment
//					alert($username+$comment);
					upload();
					setTimeout(function() {
					loadData(1);
					}, 1000);	//delay
				})
				
/*				$(#container .data ).live('click',function(){
				alert("aaa");
				});
*/
				$(".origin").live('click',function(){
//				$c = $(this).parent();
//				alert("aaa");
//				alert($(this).attr("id")); 
				loadFather($(this).attr("id"));
				});

            });
			
        </script>

<style type="text/css">
body {
	width: 800px;
	margin: 0 auto;
	padding: 0;
}

#loading {
	width: 100%;
	position: absolute;
	top: 100px;
	left: 100px;
	margin-top: 200px;
}

#container .pagination ul li.inactive,#container .pagination ul li.inactive:hover
	{
	background-color: #ededed;
	color: #bababa;
	border: 1px solid #bababa;
	cursor: default;
}

#container .data p {
	list-style: square;
	font-family: Lucida Sans Unicode;
	margin: 15px 0px;
	color: #000;
	font-size: 13px;
}

#container .pagination {
	width: 800px;
	height: 25px;
}

#container .pagination ul li {
	list-style: none;
	float: left;
	border: 1px solid #006699;
	padding: 2px 6px 2px 6px;
	margin: 0 3px 0 3px;
	font-family: arial;
	font-size: 14px;
	color: #006699;
	font-weight: bold;
	background-color: #f2f2f2;
}

#container .pagination ul li:hover {
	color: #fff;
	background-color: #006699;
	cursor: pointer;
}

.go_button {
	background-color: #f2f2f2;
	border: 1px solid #006699;
	color: #cc0000;
	padding: 2px 6px 2px 6px;
	cursor: pointer;
	position: absolute;
	margin-top: -1px;
}

.total {
	float: right;
	font-family: arial;
	color: #999;
}
</style>

</head>
<body>

	</div>
	<div align="center"
		style="font-size: 24px; color: #cc0000; font-weight: bold">Test of
		Comment</div>
	<div id="loading"></div>
	<div id="container">
		<div class="data"></div>
		<div class="pagination"></div>
	</div>
	<fieldset>
		<form>
			<p>
				<input type="text" id="comment" size="60" />
			
			
			<p>
			
			
			<p>
				<input type="text" id="username" size="10" /> username
			
			
			<p>

				<button type="button" id="post">comment</button>
			
			
			<div id="message"></div>
	
	</fieldset>
</body>
</html>
