<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DnsNamesIpv4s Model
 *
 * @method \App\Model\Entity\DnsNamesIpv4 get($primaryKey, $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4 saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DnsNamesIpv4 findOrCreate($search, callable $callback = null, $options = [])
 */
class DnsNamesIpv4sTable extends Table
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

        $this->setTable('dns_names_ipv4s');
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
            ->scalar('domain_name')
            ->maxLength('domain_name', 255)
            ->allowEmptyString('domain_name');

        $validator
            ->scalar('ip_address')
            ->allowEmptyString('ip_address');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('modified_at')
            ->allowEmptyDateTime('modified_at');

        return $validator;
    }
}
