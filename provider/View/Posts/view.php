 <div class="container pad-vertical">
	<div class="row">
	    <div class="col-lg-10 col-md-10 mx-auto">

		<div class="messages view">
		<h1><?php echo __('Message Details'); ?></h1>

			<dl>
				<dt><?php echo __('Title'); ?></dt>
				<dd>
					<?php echo h($post['Post']['title']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Details'); ?></dt>
				<dd>
					<?php echo h($post['Post']['details']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo h($post['Post']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo h($post['Post']['modified']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Posted by'); ?></dt>
				<dd>
					<?php echo h($post['Provider']['fname']).' '.h($post['Provider']['lname']); ?>
					&nbsp;
				</dd>

			</dl>
		</div>
		

		</div>
	</div>
</div>
