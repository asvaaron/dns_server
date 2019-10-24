<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DnsName Entity
 *
 * @property int $id
 * @property string|null $dns_domain_name
 * @property string|null $dns_ip_address
 * @property \Cake\I18n\FrozenTime|null $date_created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 */
class DnsName extends Entity
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
        'dns_domain_name' => true,
        'dns_ip_address' => true,
        'date_created' => true,
        'last_updated' => true
    ];
}
