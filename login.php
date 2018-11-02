<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, min-scale=1, max-scale=1, shrink-to-fit=no">
	<title>Title</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<input type="checkbox" id="close_login" checked>
	<div id="login_wrap">
		<div class="login_wrap">
			<label for="close_login" class="close_login btn_cup"></label>
			<input type="radio" name="cover_item" id="to_sigin" checked>
			<input type="radio" name="cover_item" id="to_get_Psw">
			<input type="radio" name="cover_item" id="to_sigup">
			<div class="login_mark clearfix">
				<label for="to_sigin" class="sig_in btn_cup">登入</label>
				<label for="to_sigup" class="sig_up btn_cup">註冊</label>	
			</div>

			<!-- 登入 -->
			<div class="login_mark_cetentier to_sigin clearfix">
				<form action="" method="POST">
					<div class="input_wrap longing_input">
						<input type="text" id="sigin_member_Id" class="input_mem" required>
						<label for="sigin_member_Id" class="input_pl">帳號</label>
						<label for="sigin_member_Id"><img src="images/user.svg"></label>
					</div>
					<div class="input_wrap longing_input">
						<input type="password" id="sigin_member_Psw" class="input_mem" required>
						<label for="sigin_member_Psw" class="input_pl">密碼</label>
						<label for="sigin_member_Psw"><img src="images/lock.svg"></label>
						<img src="images/eye_n.png" class="eye"></div>
					<div class="cover_run_wrap">
						<button type="submit" class="btn_cup nextBTN">登入</button>
					</div>
				</form>
				<label for="to_get_Psw" class="cover_run to_Psw btn_cup">忘記密碼?</label>
			</div>
			<!-- 註冊 -->
			<div class="login_mark_cetentier to_sigup clearfix">
				<form action="" method="POST" id="check_form" onsubmit="return checkSubmit(1)">
					<div class="input_wrap longing_input">
						<input type="text" id="sigup_member_Id" class="input_mem need_check need_check_id"required>
						<label for="sigup_member_Id" class="input_pl" maxlength="40">帳號</label>
						<label for="sigup_member_Id"><img src="images/user.svg"></label>
						<img src="images/checkN.svg" class="check"></div>
					<div class="input_wrap longing_input">
						<input type="password" id="sigup_member_Psw" class="input_mem need_check need_check_psw" maxlength="6" required>
						<label for="sigup_member_Psw" class="input_pl">密碼</label>
						<label for="sigup_member_Psw"><img src="images/lock.svg"></label>
						<img src="images/eye_n.png" class="eye"><img src="images/checkN.svg" class="check"></div>
					<div class="input_wrap longing_input">
						<input type="text" id="sigup_member_Nick" class="input_mem need_check need_check_nick" maxlength="10" required>
						<label for="sigup_member_Nick" class="input_pl">暱稱</label>
						<label for="sigup_member_Nick"><img src="images/lock.svg"></label><img src="images/checkN.svg" class="check"></div>
					<div class="input_wrap longing_input">
						<input type="text" id="sigup_email" class="input_mem need_check need_check_email" required>
						<label for="sigup_email" class="input_pl">email</label>
						<label for="sigup_email" ><img src="images/email.svg"></label>
						<img src="images/checkN.svg" class="check"></div>
					<div class="cover_run_wrap">
						<button type="submit" class="btn_cup nextBTN" >註冊</button>
					</div>
				</form>
			</div>
			<!-- 忘記密碼 -->
			<div class="login_mark_cetentier to_get_Psw clearfix">
				<form action="" method="POST" onsubmit="return checkSubmit(0)">
					<div class="input_wrap longing_input">
						<input type="text" id="get_Psw_member_Id" class="input_mem" required>
						<label for="get_Psw_member_Id" ><img src="images/user.svg"></label>
						<label for="get_Psw_member_Id" class="input_pl">帳號</label>
					</div>
					<div class="input_wrap longing_input">
						<input type="text" id="get_Psw_member_Psw" class="input_mem need_check need_check_email" required>
						<label for="get_Psw_emailmember_Psw" class="input_pl">email</label>
						<label for="get_Psw_emailmember_Psw"><img src="images/lock.svg"></label>
						<img src="images/checkN.svg" class="check"></div>
					<div class="cover_run_wrap"> 
						<button type="submit" class="btn_cup nextBTN">重設密碼</button>
					</div>
				</form>
			</div>
		</div>
				
	</div>
	

	
	<script src="js/ke.js"></script>
</body>
</html>