<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Criteria cell
 */
class CriteriaCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {$this->loadModel('Criteria');
	
    	$criterialist = $this->Criteria->find()->all();
		$this->set('criterialist', $criterialist);
		
		
    }
}
