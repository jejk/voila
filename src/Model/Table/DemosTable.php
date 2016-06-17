<?php
namespace App\Model\Table;

use App\Model\Entity\Demo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Demos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Artists
 * @property \Cake\ORM\Association\BelongsToMany $Criteria
 */
class DemosTable extends Table
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

        $this->table('demos');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Criteria', [
            'foreignKey' => 'demo_id',
            'targetForeignKey' => 'criterion_id',
            'joinTable' => 'criteria_demos'
        ]);
	/*	 $this->hasMany('CriteriaDemos', [
        	'foreignKey' => 'demo_id'
    	]);*/
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
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmpty('sort_order');

        $validator
            ->allowEmpty('title');

        $validator
            ->requirePresence('customer', 'create')
            ->notEmpty('customer');

        $validator
            ->allowEmpty('url');

        $validator
            ->date('expiration')
            ->allowEmpty('expiration');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));
        return $rules;
    }
}
