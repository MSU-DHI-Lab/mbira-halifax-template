<div id='modalStartConversation' class='modal'>
	<div>
		<div class="modalHeader">
			<div class="modalTitle">Start Conversation</div>
		</div>
		<div class='modal-x-btn'>
			<img src='assets/svgs/close.svg' class='closeModalStartConversation'>
		</div>
<!-- 		<div class="modalContent">
			<textarea id="enterConversation" class="textAdjust" name="enterConversation" placeholder="Enter Your Conversation Here" class="common" form="startConversationForm"></textarea>
		</div> -->

		<div class="modalContent">
			<form id="contributeForm" action="conversation-post.php" method="post">
				<textarea id="enterConversation" class="textAdjust" name="convo" placeholder="Enter Your Conversation Here" class="common"></textarea>
				<input type="hidden" name="user" value="<?php echo $user->getId() ?>">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="hidden" name="type" value="<?php echo $type ?>">
				<a href="conversation-post.php?id=<?php echo $_GET['id']; ?>&type=<?php echo $_GET['type']?>" onclick="this.parentNode.submit(); return false;" class="modalBottomButton">ADD CONVERSATION</a>
			</form>
		</div>
	</div>

</div>
