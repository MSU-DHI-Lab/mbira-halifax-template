<?php if($pgType == 'exp') { ?>
    <div id='modalExpForgotPasswordPrompt' class='modal'>
<?php } ?>
<?php if($pgType != 'exp') { ?>
    <div id='modalForgotPasswordPrompt' class='modal'>
<?php } ?>

<div>
		<div class="modalHeader">
			<div class="modalTitle">Forgot Password</div>
		</div>
		<div class='modal-x-btn '>
			<img src='assets/svgs/close.svg' class='closeModalPwdPrompt' />
		</div>
		<form id="forgotPasswordPrompt" name="forgotPasswordPrompt" action="newpasswordrequest-post.php" method="post">
			<div class='modalContentForgot'>
				<div class="rightLinkCont">
					<input type="email" name="email" placeholder="Your Email">
				</div>
      <?php if($pgType == 'exp') { ?>
				<div class="rightLinkCont">
					<input type="password" name="newpassword" placeholder="New Password">
				</div>
      <?php } ?>
                <input type="hidden" name="page" value="<?php echo $redirectLocation; ?>">
<!--                <div class="rightLinkCont">
					<input type="password" name="repeatpassword" placeholder="Repeat Password">
				</div>-->
			</div>
            <?php if($pgType == 'exp') { ?>
    			<a href="" onclick="this.parentNode.submit(); return false;" class="modalBottomButton">SIGN IN</a>
            <?php } ?>

            <?php if($pgType != 'exp') { ?>
    			<a href="" onclick="this.parentNode.submit(); return false;" class="modalBottomButton">SUBMIT</a>
            <?php } ?>
		</form>
	</div>
</div>
