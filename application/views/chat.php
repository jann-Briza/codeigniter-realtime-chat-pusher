<!DOCTYPE html>
<html>
<head>
	<title>Chat MoTo</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>css/chat.css">

</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<div class="main_section">
			   <div>
			      <div class="chat_container">
			         <div class="col-sm-3 chat_sidebar">
			    	 <div class="row">
			            <div id="custom-search-input">
			            	<p>Welcome <b><?php echo $this->session->userdata('user_name');?></b></p>
			            </div>
			            <div class="dropdown all_conversation">
			               <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			               <i class="fa fa-weixin" aria-hidden="true"></i>
			               Online
			               </button>
			            </div>
			            <div class="member_list">
			               <ul class="list-unstyled" id="appendponline">
			               	  <?php foreach($active_members as $value){?>
			                  <li class="left clearfix">
			                     <span class="chat-img pull-left">
			                     <img src="https://devci.gabbyville.com/public/img/avatar/p3.jpg" class="img-circle">
			                     </span>
			                     <div class="chat-body clearfix">
			                        <div class="header_sec">
			                           <strong class="primary-font"><?php echo $value->username?></strong>
			                        </div>
			                     </div>
			                  </li>
			                  <?php }?>
			               </ul>
			            </div>
		            </div>
		         </div>
			         <!--chat_sidebar-->
					 
					 
			         <div class="col-sm-9 message_section">
						 <div class="row">
							 <div class="new_message_head">
								 <div class="pull-left"><button>Chat Mo To</button></div><div class="pull-right"><div class="dropdown">
								  <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <i class="fa fa-cogs" aria-hidden="true"></i>  Setting
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
								    <li><a href="#" data-toggle="modal" data-target="#myModal">Profile</a></li>
								    <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
								  </ul>
								</div></div>
							 </div><!--new_message_head-->
							 
							 <div class="chat_area">
								 <ul id="appendchat" class="list-unstyled">
								 </ul>
							 </div><!--chat_area-->
						         <div class="message_write">
						    	 <textarea class="form-control" id="message" placeholder="type a message"></textarea>
								 <div class="clearfix"></div>
								 <div class="chat_bottom"><a id="sendchat" href="#" class="pull-right btn btn-success">Send</a></div>
							 </div>
						 </div>
			         </div> <!--message_section-->
			      </div>
			   </div>
			</div>
		</div>
		  <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Edit Your Profile</h4>
		        </div>
		        <div class="modal-body">
				    <div class="form-group">
				      <label for="usr">Username:</label>
				      <input type="text" value="<?php echo $myprofile->username;?>" class="form-control" id="username">
				    </div>
				    <div class="form-group">
				      <label for="usr">Email:</label>
				      <input type="text" value="<?php echo $myprofile->email;?>" class="form-control" id="email">
				    </div>
				    <div class="form-group">
				      <label for="usr">Password:</label>
				      <input type="text" class="form-control" id="password">
				    </div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-success" id="updateuser">Submit</button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
	</div>
</body>
</html>
<!-- Scripts -->
<script src="https://use.fontawesome.com/45e03a14ce.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
<script type="text/javascript">
	// Enable pusher logging - don't include this in production
	$(document).ready(function(){
		Pusher.log = function(message) {
			if (window.console && window.console.log) {
				window.console.log(message);
			}
		};

		var pusher = new Pusher('191dbef1780135573650');
		var channel = pusher.subscribe('chatglobal');

		channel.bind('my_event', function(data) {
			sendmessage(data);
		});
		channel.bind('appendponline', function(data) {
			appendponline(data);
		});
		function appendponline(data){
			html = '';
			html += '<li class="left clearfix">';
			html += ' <span class="chat-img pull-left">';
			html += ' <img src="https://devci.gabbyville.com/public/img/avatar/p3.jpg" class="img-circle">';
			html += ' </span>';
			html += '<div class="chat-body clearfix">';
			html += '<div class="header_sec">';
			html += ' <strong class="primary-font">'+data.username+'</strong>';
			html += '</div>';
			html += '</div>';
			html += '</li>';
			$('#appendponline').append(html);
		}
		function sendmessage(data){
			var ses_id = <?php echo $this->session->userdata('id');?>;
			if(data.id == ses_id){
				html = '';
				html += '<li class="left clearfix">'; 
				html += ' <span class="chat-img1 pull-left">'; 
				html += '<img src="https://devci.gabbyville.com/public/img/avatar/p3.jpg" alt="User Avatar" class="img-circle">'; 
				html += '</span>'; 
				html += '<div class="chat-body1 clearfix">'; 
				html += '<p class="font-else">'+data.message+'</p>'; 
				html += '<div class="chat_time pull-right">'+data.date+'</div>'; 
				html += '</div>'; 
				html += '</li>'; 
				$("html, body .chat_area").animate({ scrollTop: $(document).height() }, 1000);
				$('#appendchat').append(html);
				$('#message').val("");
			}else{
				html = '';
				html += '<li class="left clearfix admin_chat">'; 
				html += '<span class="chat-img1 pull-right">'; 
				html += '<img src="https://devci.gabbyville.com/public/img/avatar/p3.jpg" alt="User Avatar" class="img-circle">'; 
				html += '</span>'; 
				html += '<div class="chat-body1 clearfix">'; 
				html += '<p class="font-me"><b>'+data.username+'</b>:'+data.message+'</p>'; 
				html += '<div class="chat_time pull-right">'+data.date+'</div>'; 
				html += '</div>'; 
				html += '</li>'; 
				$("html, body .chat_area").animate({ scrollTop: $(document).height() }, 1000);
				$('#appendchat').append(html);
			}
		}

		$('#sendchat').click(function(){
	        message = $('#message').val();
	        $.ajax({
	          url: "<?php echo base_url(); ?>chat/chatsend/",
	          type: 'POST',
	          data:{
	          message : message, 
	           },
	          success:function()
	          { 
	          }    
          	});
		});
		$('#updateuser').click(function(){
	        email    = $('#email').val();
	        password = $('#password').val();
	        username = $('#username').val();
	        $.ajax({
	          url: "<?php echo base_url(); ?>chat/update_user/",
	          type: 'POST',
	          data:{
	          email    : email, 
	          password : password, 
	          username : username, 
	           },
	          success:function()
	          { 
	          	location.reload();
	          }    
          	});
		});
	});
	
</script>
