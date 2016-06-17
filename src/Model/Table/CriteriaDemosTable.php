<?php
namespace App\Model\Table;

use App\Model\Entity\CriteriaDemo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CriteriaDemos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Demos
 * @property \Cake\ORM\Association\BelongsTo $Criteria
 * @property \Cake\ORM\Association\BelongsTo $Artists
 */
class CriteriaDemosTable extends Table
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

        $this->table('criteria_demos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Demos', [
            'foreignKey' => 'demo_id'
        ]);
        $this->belongsTo('Criteria', [
            'foreignKey' => 'criterion_id'
        ]);
        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id'
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
        $rules->add($rules->existsIn(['demo_id'], 'Demos'));
        $rules->add($rules->existsIn(['criterion_id'], 'Criteria'));
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));
        return $rules;
    }
}
