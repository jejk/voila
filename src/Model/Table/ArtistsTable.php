<?php
namespace App\Model\Table;

use App\Model\Entity\Artist;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Agencies
 * @property \Cake\ORM\Association\HasMany $CriteriaDemos
 * @property \Cake\ORM\Association\HasMany $Demos
 */
class ArtistsTable extends Table
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

        $this->table('artists');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp'); 

        $this->belongsTo('Agencies', [
            'foreignKey' => 'agency_id'
        ]);
		
  		$this->belongsToMany('Criteria', [
            'foreignKey' => 'artist_id',
            'targetForeignKey' => 'criterion_id',
            'joinTable' => 'criteria_demos'
        ]);
        $this->hasMany('Demos', [
            'foreignKey' => 'artist_id'
        ]);
		
		$this->addBehavior('ChrisShick/CakePHP3HtmlPurifier.HtmlPurifier', [
	        'fields'=>["description"]
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
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');
			


     /*   $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

       

        $validator
            ->integer('nbrdemo')
            ->requirePresence('nbrdemo', 'create')
            ->notEmpty('nbrdemo');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('facebook', 'create')
            ->notEmpty('facebook');

        $validator
            ->requirePresence('twitter', 'create')
            ->notEmpty('twitter');

        $validator
            ->requirePresence('linkedin', 'create')
            ->notEmpty('linkedin');

        $validator
            ->boolean('accept_agence_edit')
            ->requirePresence('accept_agence_edit', 'create')
            ->notEmpty('accept_agence_edit');*/

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['agency_id'], 'Agencies'));
        return $rules;
    }
}
