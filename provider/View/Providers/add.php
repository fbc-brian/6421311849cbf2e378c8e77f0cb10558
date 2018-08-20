 <div class="container pad-vertical">
	<div class="row">
	    <div class="col-lg-4 col-md-10 mx-auto">
		<div class="users form">
		<h1><?php echo __('Registration'); ?></h1>
		<?php echo $this->Flash->render(); 
		echo $this->Form->create('Provider', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'control-label'),
				'class' => 'form-control',
				'error' => array('attributes' => array('wrap' => 'div', 'class' => 'alert alert-error'))
				) 
			));

			echo $this->Form->input('fname', array('label' => 'Firstname'));
			echo $this->Form->input('lname', array('label' => 'Lastname'));
			$options = array('1' => 'Male', '2' => 'Female');
			$attributes = array('legend' => false);
			echo '<label>Gender</label><br/>';
			echo $this->Form->radio('gender', $options, $attributes);
			echo $this->Form->input('email');
			echo $this->Form->input('password'); 
			echo $this->Form->input('confirm_password', array('type' => 'password')); 
			echo $this->Form->button('Register', array('class' => 'btn btn-primary')); 
		echo $this->Form->end(); ?>
		</div>

		</div>
	</div>
</div>

<?php echo $this->element('sql_dump'); ?>