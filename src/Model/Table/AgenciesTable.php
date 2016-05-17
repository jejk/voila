<?php
namespace App\Model\Table;

use App\Model\Entity\Agency;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agencies Model
 *
 * @property \Cake\ORM\Association\HasMany $Artists
 */
class AgenciesTable extends Table
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

        $this->table('agencies');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
		
		// $this->addBehavior('Translate', ['fields' => ['title']]);

        $this->hasMany('Artists', [
            'foreignKey' => 'agency_id'
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
            ->allowEmpty('title');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        return $validator;
    }
}
