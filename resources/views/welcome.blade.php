<!DOCTYPE html>
	<html>
		<head>
			<title>Bootstrap Example</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"
		</head>

		<!-- Templete CSS -->
		<style>

				.auth_con {
					/* width: 50%; */
					margin: 0px auto;
					text-align: center;
					background: #f8f8f8;
					padding: 100px;
				}

				input.write_msg {
					padding: 10px;
					width: 400px;
				}

				.auth_con button {
					padding: 10px;
					width: 70px;
					background: green;
					color: #fff;
				}

			/*---------chat window---------------*/
			.container{
				max-width:900px;
			}
			.inbox_people {
				background: #fff;
				float: left;
				overflow: hidden;
				width: 30%;
				border-right: 1px solid #ddd;
			}

			.inbox_msg {
				border: 1px solid #ddd;
				clear: both;
				overflow: hidden;
			}

			.top_spac {
				margin: 20px 0 0;
			}

			.recent_heading {
				float: left;
				width: 40%;
			}

			.srch_bar {
				display: inline-block;
				text-align: right;
				width: 60%;
				padding:
			}

			.headind_srch {
				padding: 10px 29px 10px 20px;
				overflow: hidden;
				border-bottom: 1px solid #c4c4c4;
			}

			.recent_heading h4 {
				color: #0465ac;
				font-size: 16px;
				margin: auto;
				line-height: 29px;
			}

			.srch_bar input {
				outline: none;
				border: 1px solid #cdcdcd;
				border-width: 0 0 1px 0;
				width: 80%;
				padding: 2px 0 4px 6px;
				background: none;
			}

			.srch_bar .input-group-addon button {
				background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
				border: medium none;
				padding: 0;
				color: #707070;
				font-size: 18px;
			}

			.srch_bar .input-group-addon {
				margin: 0 0 0 -27px;
			}

			.chat_ib h5 {
				font-size: 15px;
				color: #464646;
				margin: 0 0 8px 0;
			}

			.chat_ib h5 span {
				font-size: 13px;
				float: right;
			}

			.chat_ib p {
				font-size: 12px;
				color: #989898;
				margin: auto;
				display: inline-block;
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
			}

			.chat_img {
				float: left;
				width: 11%;
			}

			.chat_img img {
				width: 100%
			}

			.chat_ib {
				float: left;
				padding: 0 0 0 15px;
				width: 88%;
			}

			.chat_people {
				overflow: hidden;
				clear: both;
			}

			.chat_list {
				border-bottom: 1px solid #ddd;
				margin: 0;
				padding: 18px 16px 10px;
			}

			.inbox_chat {
				height: 550px;
				overflow-y: scroll;
			}

			.active_chat {
				background: #e8f6ff;
			}

			.incoming_msg_img {
				display: inline-block;
				width: 6%;
			}

			.incoming_msg_img img {
				width: 100%;
			}

			.received_msg {
				display: inline-block;
				padding: 0 0 0 10px;
				vertical-align: top;
				width: 92%;
			}

			.received_withd_msg p {
				background: #ebebeb none repeat scroll 0 0;
				border-radius: 0 15px 15px 15px;
				color: #646464;
				font-size: 14px;
				margin: 0;
				padding: 5px 10px 5px 12px;
				width: 100%;
			}

			.time_date {
				color: #747474;
				display: block;
				font-size: 12px;
				margin: 8px 0 0;
			}

			.received_withd_msg {
				width: 57%;
			}

			.mesgs{
				float: left;
				padding: 30px 15px 0 25px;
				width:70%;
			}

			.sent_msg p {
				background:#0465ac;
				border-radius: 12px 15px 15px 0;
				font-size: 14px;
				margin: 0;
				color: #fff;
				padding: 5px 10px 5px 12px;
				width: 100%;
			}

			.outgoing_msg {
				overflow: hidden;
				margin: 26px 0 26px;
			}

			.sent_msg {
				float: right;
				width: 46%;
			}

			.input_msg_write input {
				background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
				border: medium none;
				color: #4c4c4c;
				font-size: 15px;
				min-height: 48px;
				width: 100%;
				outline:none;
			}

			.type_msg {
				border-top: 1px solid #c4c4c4;
				position: relative;
			}

			.msg_send_btn {
				background: #05728f none repeat scroll 0 0;
				border:none;
				border-radius: 50%;
				color: #fff;
				cursor: pointer;
				font-size: 15px;
				height: 33px;
				position: absolute;
				right: 0;
				top: 11px;
				width: 33px;
			}

			.messaging {
				padding: 10% 10%;
			}

			.msg_history {
				height: 516px;
				overflow-y: auto;
			}
		</style>
		
		<body>
			<div id="app">
				<chat-component></chat-component>
			</div>
			<script src="js/app.js"></script>

			<!-- Templete JS -->
			<script>
				$(document).ready(function(){
						$('#action_menu_btn').click(function(){
							$('.action_menu').toggle();
						});
				});
			</script>
		</body>
</html>
