 <div class="container pad-vertical">
	<div class="row">
	    <div class="col-lg-10 col-md-10 mx-auto">

		<div class="messages index">
			<h2><?php echo __('Messages List'); ?></h2>
			<div class="clearfix pad-vertical">
				<?php echo $this->HTML->link(__('New Message'), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'float:right')); ?>
			</div>
			<div class="clearfix notify">
			<?php echo $this->Flash->render(); ?>
			</div>	
			<?php echo $this->Form->create('Post', array(
						'url'   => array(
			               'controller' => 'messages',
			               'action' => 'search'
			           	), 
						'id' => 'search')); 
			?>
			<div class="input-group mb-3">
			  <?php echo $this->Form->input('search', array('class' => 'form-control', 'placeholder' => 'Search', 'label' => false)); ?>
			  <div class="input-group-append">
			    <?php echo $this->Form->button('Submit', array('class' => 'btn btn-success')); ?> 
			   </div>
			</div>		
			<?php echo $this->Form->end(); ?>

			<table cellpadding="0" cellspacing="0" class="table table-bordred table-striped">
				<thead>
				<tr>
						<th colspan="5"><?php echo __('Messages'); ?></th>
				</tr>
				</thead>
				<tbody id="tbody" <?php echo $this->Paginator->counter(array('format' => __('data-total="{:pages}'))); ?>">
				<?php 
				$ctr = 0;
				foreach ($posts as $post): 
				?>
				<tr>
					<td>
						<div class="user-image inbox">
							<img src="/img/avatar.jpg" alt="profile" id="profile">
						</div>
					</td>
					<td>
						<?php echo $this->Html->link(h($post['Post']['title']), array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
					</td>
					<td>
						<?php echo h($post['Post']['details']); ?>
					 </td>
					<td><?php //echo $this->My->timeElapsed(h($post['Post']['created'])); ?>&nbsp;</td>
					<td>
						<?php
						echo $this->Form->postLink(
							'Delete',
							array('action' => 'delete', $post['Post']['id']),
							array('confirm' => 'Are you sure?')
						);
						?>
						
					</td>
					
				</tr>
			<?php endforeach; ?>
				</tbody>
			</table>


			<div class="paging text-center">
				<a href="/messageboard/messages/index/page" class="btn" data-search="false" data-current="<?php echo $this->Paginator->counter(array('format' => __('{:page}'))); ?>" id="loadmore">Show more...</a>
			</div>
		</div>

		</div>
	</div>
</div>
