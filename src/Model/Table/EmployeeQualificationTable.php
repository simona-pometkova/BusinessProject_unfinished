<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeQualification Model
 *
 * @property \App\Model\Table\EmployeeTable&\Cake\ORM\Association\BelongsTo $Employee
 * @property \App\Model\Table\QualificationTable&\Cake\ORM\Association\BelongsTo $Qualification
 *
 * @method \App\Model\Entity\EmployeeQualification newEmptyEntity()
 * @method \App\Model\Entity\EmployeeQualification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeQualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeQualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeQualification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EmployeeQualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeQualification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeQualification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeQualification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeQualification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmployeeQualification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmployeeQualification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmployeeQualification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EmployeeQualificationTable extends Table
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

        $this->setTable('employee_qualification');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employee', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Qualification', [
            'foreignKey' => 'qualification_id',
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
        $rules->add($rules->existsIn(['employee_id'], 'Employee'), ['errorField' => 'employee_id']);
        $rules->add($rules->existsIn(['qualification_id'], 'Qualification'), ['errorField' => 'qualification_id']);

        return $rules;
    }
}
