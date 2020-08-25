<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @method \App\Model\Entity\Customer newEmptyEntity()
 * @method \App\Model\Entity\Customer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('CustomerID');
        $this->setPrimaryKey('CustomerID');
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
            ->scalar('CustomerID')
            ->maxLength('CustomerID', 5)
            ->allowEmptyString('CustomerID', null, 'create');

        $validator
            ->scalar('CompanyName')
            ->maxLength('CompanyName', 40)
            ->requirePresence('CompanyName', 'create')
            ->notEmptyString('CompanyName');

        $validator
            ->scalar('ContactName')
            ->maxLength('ContactName', 30)
            ->allowEmptyString('ContactName');

        $validator
            ->scalar('ContactTitle')
            ->maxLength('ContactTitle', 30)
            ->allowEmptyString('ContactTitle');

        $validator
            ->scalar('Address')
            ->maxLength('Address', 60)
            ->allowEmptyString('Address');

        $validator
            ->scalar('City')
            ->maxLength('City', 15)
            ->allowEmptyString('City');

        $validator
            ->scalar('Region')
            ->maxLength('Region', 15)
            ->allowEmptyString('Region');

        $validator
            ->scalar('PostalCode')
            ->maxLength('PostalCode', 10)
            ->allowEmptyString('PostalCode');

        $validator
            ->scalar('Country')
            ->maxLength('Country', 15)
            ->allowEmptyString('Country');

        $validator
            ->scalar('Phone')
            ->maxLength('Phone', 24)
            ->allowEmptyString('Phone');

        $validator
            ->scalar('Fax')
            ->maxLength('Fax', 24)
            ->allowEmptyString('Fax');

        return $validator;
    }
}
