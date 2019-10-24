<?php
use Migrations\AbstractMigration;

class DnsNamesIpv4 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('dns_names_ipv4s');
//            [
//                'id' => true,
//                'primary_key' => ['id']
//            ]
//        );
//        $table ->addColumn('id', 'uuid');
        $table->addColumn('domain_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('ip_address', 'text', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('created_at', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified_at', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex(
            [
                'ip_address',
                'domain_name'
            ],
            ['unique' => true]
        );
        $table->create();
    }
}
