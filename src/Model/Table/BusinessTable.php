<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Business Model
 *
 * @property \App\Model\Table\BusinessOwnerTable&\Cake\ORM\Association\BelongsTo $BusinessOwner
 *
 * @method \App\Model\Entity\Busines newEmptyEntity()
 * @method \App\Model\Entity\Busines newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Busines[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Busines get($primaryKey, $options = [])
 * @method \App\Model\Entity\Busines findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Busines patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Busines[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Busines|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Busines saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BusinessTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('business');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('BusinessOwner', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            //Как да ми излизат тези ерър съобщения, а не default-ния флаш, който е в контролера?
            ->scalar('name')
            ->minLength('name', 2, 'Name is too short!')
            ->maxLength('name', 50, 'Name is too long!')
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->ascii('name', 'Please enter a valid name'); 

        $validator
            ->date('founding_date')
            ->requirePresence('founding_date', 'create')
            ->notEmptyDate('founding_date')
            //Тук искам да добавя валидейшън посочената дата да не е някаква бъдеща. Опитах с add('rule' => 'custom).. etc, но не се получи.
            //Пак session overwrite error??
            ->add('founding_date', 'custom', ['rule' => function ($value, $context) {
                $today = date('d/m/Y');
                if ($value > $today) {
                    return false;
                } else {
                    return true;
                }
            }, 'message' => 'You have selected a future date!']);

        $validator
            //->scalar('address')
            ->maxLength('address', 50)
            ->requirePresence('address', 'create')
            ->notEmptyString('address')
            //->ascii('address', 'Please enter a valid address')
            //по някаква причина, след като сложа preg_match, ми дава ерър със session overwrite????
            ->add('address', 'custom', ['rule' => function ($value, $context) { 
                if (preg_match('[0-9]{4}', $value)) {
                    return true;
                } else {
                    return false;
                }
            }, 'message' => 'Please enter a valid address']);

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['owner_id'], 'BusinessOwner'), ['errorField' => 'owner_id']);

        return $rules;
    }

    // public function includePostoce($value, $context) {
    //     return false;
    //     if (is_numeric($value) && strlen($value) === 4) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
