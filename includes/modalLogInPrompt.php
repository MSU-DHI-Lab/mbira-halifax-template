<div id='modalLogInPrompt' class='modal'>
	<div>
		<div class="modalHeader">
			<div class="modalTitle">You need to sign in first...</div>
		</div>
		<div class='modal-x-btn '>
			<img src='assets/svgs/close.svg' class='closeModalLogInPrompt' />
		</div>
		<form id="loginPrompt" name="loginPrompt" action="login-post.php" method="post">
			<div class='modalContent'>
				<div class="rightLinkCont">
					<input type="email" name="usermail" placeholder="Your Email">
					<a href="signUp.php" class="rightLink" id="signUpLink">Or Sign Up</a>
				</div>
				<div class="rightLinkCont">
					<input type="password" name="password" placeholder="Your Password">
					<a href="#" class="rightLink" id="forgotPasswordLink">Forgot Password?</a>
				</div>
			</div>
			<a href="placeSingle-Conversation.php?id=<?php $_GET['id']?>&type=<?php echo $_GET['type']?>&convo=<?php echo $_GET['convo']?>" onclick="this.parentNode.submit(); return false;" class="modalBottomButton">SIGN IN</a>
		</form>
	</div>
</div>
