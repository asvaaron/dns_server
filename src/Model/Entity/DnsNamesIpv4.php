<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DnsNamesIpv4 Entity
 *
 * @property int $id
 * @property string|null $domain_name
 * @property string|null $ip_address
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $modified_at
 */
class DnsNamesIpv4 extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'domain_name' => true,
        'ip_address' => true,
        'created_at' => true,
        'modified_at' => true
    ];
}
