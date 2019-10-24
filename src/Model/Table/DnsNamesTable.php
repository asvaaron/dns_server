<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DnsNames Model
 *
 * @method \App\Model\Entity\DnsName get($primaryKey, $options = [])
 * @method \App\Model\Entity\DnsName newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DnsName[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DnsName|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DnsName saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DnsName patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DnsName[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DnsName findOrCreate($search, callable $callback = null, $options = [])
 */
class DnsNamesTable extends Table
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

        $this->setTable('dns_names');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('dns_domain_name')
            ->allowEmptyString('dns_domain_name');

        $validator
            ->scalar('dns_ip_address')
            ->maxLength('dns_ip_address', 15)
            ->allowEmptyString('dns_ip_address');

        $validator
            ->dateTime('date_created')
            ->allowEmptyDateTime('date_created');

        $validator
            ->dateTime('last_updated')
            ->allowEmptyDateTime('last_updated');

        return $validator;
    }
}
