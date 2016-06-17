

<?php 
//CHoosen tyle fields
$this->Html->css('chosen', ['block' => true]); ?>
<?= $this->Html->script('chosen.jquery', ['block' => true]); ?>
<?php $this->Html->scriptStart(['block' => true]); ?>
    (function($){
        $('select').chosen({'search_contains':true});
    })(jQuery);
$(document).ready(function(){
              $("#datepicker_img img").click(function(){
                     $("#datepicker").datepicker(
                    {
                           dateFormat: 'mm-dd-yy',
                            onSelect: function(dateText, inst){
                                 $('#select_date').val(dateText);
                                 $("#datepicker").datepicker("destroy");
                          }
                     }
                     );
               });
        });
        
         $(document).ready(function() {
            /* grab important elements */
            var sortInput = jQuery('#sort_order');
            console.log(sortInput);
            var submit = jQuery('#autoSubmit');
            var messageBox = jQuery('#message-box');
            var list = jQuery('#sortable-list');
            /* create requesting function to avoid duplicate code */
            var request = function() {
                $.ajax({
                    beforeSend: function() {
                        messageBox.text('Updating the sort order in the database.');
                    },
                    headers: { 'X-CSRF-TOKEN' : this.csrfToken },
                     beforeSend: function (xhr) {
		                xhr.setRequestHeader('X-CSRF-Token', '<?= $this->request->params['_csrfToken'] ?>');
		            },
                    complete: function() {
                        messageBox.text('Database has been updated.');
                    },
            data: 'order=' + sortInput[0].value + '&ajax=' + submit[0].checked + '&do_submit=1&byajax=1', //need [0]?
            type: 'post',
            url: '/admin/demos/saveorder'
        });
            };
            /* worker function */
            var fnSubmit = function(save) {
        //alert(save);
        var sortOrder = [];
        list.children('li').each(function(){
            sortOrder.push(jQuery(this).data('id'));
        });
        sortInput.val(sortOrder.join(','));
        console.log(sortInput.val());
        if(save) {
            request();
        }
    };
    /* store values */
    list.children('li').each(function() {
        var li = jQuery(this);
        li.data('id',li.attr('title')).attr('title','');
    });
    /* sortables */
    list.sortable({
        opacity: 0.7,
        update: function() {
            fnSubmit(submit[0].checked);
        }
    });
    list.disableSelection();
    /* ajax form submission */
    jQuery('#dd-form').bind('submit',function(e) {
        if(e) e.preventDefault();
        fnSubmit(true);
    });
});
<?php $this->Html->scriptEnd(); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Agencies'), ['controller' => 'Agencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agency'), ['controller' => 'Agencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artists form large-9 medium-8 columns content">
    <?= $this->Form->create($artist) ?>
    <fieldset>
        <legend><?= __('Edit Artist') ?></legend>
        <?php 
        //$ggg= $demos->toArray();
        //pr($ggg); 
        //debug($demos->toArray());
            echo $this->Form->input('agency_id', ['options' => $agencies, 'empty' => true, 'class' => 'chosen-select']);
            echo $this->Form->input('email');
            echo $this->Form->input('password1');
			echo $this->Form->input('password2');
            echo $this->Form->input('active');
            echo $this->Form->input('expiration', array('label' => "Date : ", 'type' => 'text', 'class' => 'fl tal vat w300p', 'error' => false , 'id' => 'select_date')); 
			echo $this->Html->div('datepicker_img w100p fl pl460p pa', $this->Html->image('/debug_kit/img/cake.icon.png'),array('id' => 'datepicker_img'));
			 echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker'));			
           
		   
		    $options = ['0' => 'Male', '1' => 'Female'];
			$attributes = ['legend' => false];
			echo $this->Form->radio('criteriartist.159', $options, $attributes);
			
			
            echo $this->Form->input('nbrdemo');
            echo $this->Form->input('slug');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('description');
            echo $this->Form->input('facebook');
            echo $this->Form->input('twitter');
            echo $this->Form->input('linkedin');
            echo $this->Form->input('accept_agence_edit');
            echo $this->Form->input('criteria._ids', ['options' => $criteria, 'empty' => true, 'class' => 'chosen-select']);
			echo $this->Form->input('demos._ids', ['options' => $demos, 'empty' => true, 'class' => 'chosen-select']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
     <p>Drag and drop the elements below.  The database gets updated on every drop.</p>
    <div id="message-box"><?php echo @$message; ?> Waiting for sortation submission...</div>
    <?php echo $this->Form->create(null, array('url'=>array('lang'=>'fr','prefix'=>'admin','controller'=>'demos','action'=>'saveorder'),'id'=>'dd-form')); ?>
    
        <p>
            <input type="checkbox" value="1" name="autoSubmit" id="autoSubmit" <?php if (@$_POST['autoSubmit']) {echo 'checked="checked"';}?> 
            <label for="autoSubmit">Automatically submit on drop event</label>
        </p>
        
        <ul id="sortable-list">
            <?php
          //  $demoarray = $demos->toArray();
           // pr($demoarray);die();
            $order = array();
            foreach ($demos as $demo) {
                echo '<li title="', $demo['id'], '">', $demo['title'], '</li>';
                $order[] = $demo['id'];
            }
            
            ?>
        </ul>
        <br />
        <input type="hidden" name="order" id="sort_order" value="<?php echo implode(',', $order); ?>" />
        <input type="submit" name="do_submit" value="Submit Sortation" class="button" />
    <?php echo $this->Form->end(); ?>
   
    <?php
    
    ?>

</div>


