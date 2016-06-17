<table>
	<tr><td>
		<?= $this->Form->create(null, array('controller' => 'demos', 'id'=>'SearchFullText', 'url' => '/fr/demos/search', 'type' => 'post')); ?>
		<?php

                echo $this->Form->input('searchtxt'); ?>
                <?= $this->Form->button(__('Submit'),array('id'=>'PerformSearchText')) ?>
		<button id="PerformTextSearchText" class="pure-button pure-button-primary">Search</button>
		 <?= $this->Form->end() ?>
	</td></tr>
</table>



<?= $this->Form->create(null, array('controller' => 'demos', 'id'=>'SearchForm', 'url' => '/fr/demos/search', 'type' => 'post')); ?>
          <button id="PerformSearch" class="pure-button pure-button-primary">Search</button>
          <?= $this->Form->button(__('Submit'),array('id'=>'PerformSearch')) ?>
          
<?php 

$genre_crit = '';
$francais_crit = '';
$can_crit = '';
$us_crit = '';
$voix_crit = '';
 
foreach ($criterialist as $criterion){
	if ($criterion['group'] == 'genre') {
		$genre_crit.= "<tr><td>".__($this->Form->label($criterion->title)).$this->Number->format($criterion->id).$this->Form->checkbox($criterion->id)."</td><tr>";
	}
	if ($criterion['group'] == 'voix') {
		$voix_crit.= "<tr><td>".__($this->Form->label($criterion->title)).$this->Number->format($criterion->id).$this->Form->checkbox($criterion->id)."</td><tr>";
	}
	if ($criterion['subgroup'] == 'francais') {
		$francais_crit.="<tr><td>".__($this->Form->label($criterion->title)).$this->Number->format($criterion->id).$this->Form->checkbox($criterion->id)."</td><tr>";
	}
	if ($criterion['subgroup'] == 'anglais_can') {
			$can_crit.= "<tr><td>".__($this->Form->label($criterion->title)).$this->Number->format($criterion->id).$this->Form->checkbox($criterion->id)."</td><tr>";
	}
	if ($criterion['subgroup'] == 'anglais_us') {
			$us_crit.="<tr><td>".__($this->Form->label($criterion->title)).$this->Number->format($criterion->id).$this->Form->checkbox($criterion->id)."</td><tr>";
	}	
		
		
	
	} ?>
          
<table >
	

                       
            	<tr><td><?php echo __('genre'); ?></td><tr>
 
           
               
                 <?php
                echo $genre_crit; ?> 

            
			 
            
            
           <tr><td>LANGUE D'INTERPRÉTATION</td><tr>
           	<tr><td>FRANÇAIS </td><tr>
           
           
         
            
                 
                 <?php
                 echo $francais_crit;  ?> 

            

		 
            
            <tr><td><?php __('ANGLAIS'); ?> </td><tr>
            <tr><td>Canada </td><tr>
			 
            
            
                
               <?php
                 echo $can_crit;  ?> 

            
	 
			

            <tr><td>États-Unis</td><tr>
           
           
 
         
               
                         <?php
                 echo $us_crit;  ?> 

            
			 
            <tr><td>VOIX </td><tr>

           
         
               
                           
                          <?php            echo $voix_crit;  ?>  

 
		 

      </table>

        <?= $this->Form->end() ?>


