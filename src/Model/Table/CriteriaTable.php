<?php
namespace App\Model\Table;

use App\Model\Entity\Criterion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Criteria Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Demos
 */
class CriteriaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('criteria');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsToMany('Demos', [
            'foreignKey' => 'criterion_id',
            'targetForeignKey' => 'demo_id',
            'joinTable' => 'criteria_demos'
        ]);
		
		$this->belongsToMany('Artists', [
            'foreignKey' => 'criterion_id',
            'targetForeignKey' => 'artist_id',
            'joinTable' => 'criteria_demos'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('title_fr');

        $validator
            ->allowEmpty('title_en');

        $validator
            ->allowEmpty('title_es');

        $validator
            ->allowEmpty('title_it');

        return $validator;
    }
}
