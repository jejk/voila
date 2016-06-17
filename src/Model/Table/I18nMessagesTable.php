<?php
namespace App\Model\Table;

use App\Model\Entity\I18nMessage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * I18nMessages Model
 *
 */
class I18nMessagesTable extends Table
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

        $this->table('i18n_messages');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('domain', 'create')
            ->notEmpty('domain');

        $validator
            ->requirePresence('locale', 'create')
            ->notEmpty('locale');

        $validator
            ->requirePresence('singular', 'create')
            ->notEmpty('singular');

        $validator
            ->requirePresence('plural', 'create')
            ->notEmpty('plural');

        $validator
            ->requirePresence('context', 'create')
            ->notEmpty('context');

        $validator
            ->requirePresence('value_0', 'create')
            ->notEmpty('value_0');

        $validator
            ->requirePresence('value_1', 'create')
            ->notEmpty('value_1');

        $validator
            ->requirePresence('value_2', 'create')
            ->notEmpty('value_2');

        return $validator;
    }
}
