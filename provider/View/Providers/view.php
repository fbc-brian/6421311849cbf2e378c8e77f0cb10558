 <div class="container pad-vertical">
	<div class="row">
	    <div class="col-lg-6 col-md-10 mx-auto">

		<div class="users view">
			<h1><?php echo __('User Profile'); ?></h1>
			<?php echo $this->Flash->render(); ?>
			<div class="row info-main">
		    	<div class="col-lg-4 col-md-10">
		    		<div class="user-image">
		    			<?php //if ($Provider['Provider']['image'] != null): ?>
		    			<?php if (false): ?>
	                    <?php echo $this->Html->image('uploads/'.$Provider['Provider']['image'], array('alt' => 'Profile', 'id' => 'profile')); ?>
	                    <?php else: ?>
	                    <?php echo $this->Html->image('avatar.jpg', array('alt' => 'Profile', 'id' => 'profile')); ?>
	                    <?php endif; ?>
	                </div>
		    	</div>
		    	<div class="col-lg-8 col-md-10">
		    		<h3><?php echo h($Provider['Provider']['fname']).' ' .h($Provider['Provider']['lname']); ?></h3>
		    		<ul>
		    			<li><?php echo __('Gender'); ?>: <?php echo h($Provider['Provider']['gender']); ?></li>
		    			<li><?php echo __('Joined'); ?>: <?php echo h($Provider['Provider']['created']); ?></li>
		    			<li><?php echo __('Last Login'); ?>: <?php echo h($Provider['Provider']['last_login_time']); ?></li>
		    		</ul>
		    	</div>
		    </div>

	    	<div class="row margin-top-two border-top">
	    		<div class="col-md-6">
	    			<?php echo $this->Html->link(__('Change Password'), array('action' => 'changepass', AuthComponent::user('id'))); ?>
	    		</div>
	    		<div class="col-md-6">
	    			<?php echo $this->Html->link(__('Update Profile'), array('action' => 'edit', AuthComponent::user('id'))); ?>
	    		</div>
	    	</div>
		</div>

		</div>
	</div>
</div>
