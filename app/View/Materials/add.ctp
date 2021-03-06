<div class="materials form">
<?php echo $this->Form->create(null,array(
	'url' => array('controller' => 'Materials', 'action' => 'add'),
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => ' col-sm-2 control-label'),
        'between' => '<div class="col-xs-10">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));//('Material'); ?>
	<fieldset>
		<legend><?php echo __('Add Material'); ?></legend>
	<?php
		echo $this->Form->input('material_name',array('class'=>'input-ms'));
		echo $this->Form->input('material_state',array('class'=>'input-ms'));
		echo $this->Form->input('category_id',array('type'=>'text','class'=>'input-ms'));
		echo $this->Form->input('vender_id',array('type'=>'text','class'=>'input-ms'));
		echo $this->Form->input('measuring_unit',array('class'=>'input-ms'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?></li>
	</ul>
</div>
