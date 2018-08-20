 <div class="container pad-vertical">
	<div class="row">
	    <div class="col-lg-6 col-md-10 mx-auto">

		<div class="messages form">
		<h1>New Message</h1>
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Form->create('Post'); ?>
		<div class="form-group">
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<label>Details</label>
			<?php echo $this->Form->textarea('details', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->end(__('Submit')); ?>
		</div>

		</div>
	</div>
</div>

<?php echo $this->element('sql_dump'); ?>