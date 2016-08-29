<div id='modalParticipateInConversation' class='modal'>
	<div>
		<div class="modalHeader">
			<div class="modalTitle">Participate in Conversation</div>
		</div>
		<div class='modal-x-btn'>
			<img src='assets/svgs/close.svg' class='closeModalParticipateInConversation'>
		</div>
<!-- 		<div class="modalContent">
			<textarea id="enterReply" class="textAdjust" name="enterReply" placeholder="Enter Your Reply Here" class="common" form="participateConversationForm"></textarea>
		</div>
		<a href="#" class="modalBottomButton">ADD REPLY</a> -->

		<div class="modalContent">
			<form id="contributeForm" action="conversation-comment-post.php" method="post">
				<textarea id="enterReply" class="textAdjust" name="comment" placeholder="Enter Your Reply Here" class="common"></textarea>
				<input type="hidden" name="convo_id" value="<?php echo $convo ?>">
				<input type="hidden" name="user" value="<?php echo $user->getId() ?>">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="hidden" name="type" value="<?php echo $type ?>">
				<a href="conversation-comment-post.php" onclick="this.parentNode.submit(); return false;" class="modalBottomButton">ADD REPLY</a>
			</form>
		</div>

	</div>

</div>
