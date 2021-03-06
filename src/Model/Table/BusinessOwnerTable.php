<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusinessOwner Model
 *
 * @method \App\Model\Entity\BusinessOwner newEmptyEntity()
 * @method \App\Model\Entity\BusinessOwner newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessOwner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessOwner get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessOwner findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BusinessOwner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessOwner[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessOwner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessOwner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessOwner[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BusinessOwner[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BusinessOwner[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BusinessOwner[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BusinessOwnerTable extends Table
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

        $this->setTable('business_owner');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');
            //?????????? ???? ?????????????? ????????, ???? ???????? ???????????? ???? ?????????????? ??????????, ?????????? ?? @ + ?????????? ???? ????-???????????????????? ?????????????? (com, gmail, co.uk ?? ??.??.)

        $validator
            ->scalar('first_name')
            ->minLength('first_name', 2)
            ->maxLength('first_name', 32)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');
            //?????????????? ???? ???? ?????????????? ????????, ???? ?????????? ???? ?????????????? ???????? ?????????? A-Z (?? a-z). ???????? ???? ???? ???????? ???????????? ?? ???????????? ???? ?????????????? ????????????????.
            //->add('first_name', 'characters', ['rule' => array('custom', '[a-zA-Z]')])

        $validator
            ->scalar('last_name')
            ->minLength('last_name', 2)
            ->maxLength('last_name', 32)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->integer('num_of_businesses')
            ->allowEmptyString('num_of_businesses', null, 'create');

        return $validator;
    }
}
