<?php
use Migrations\AbstractSeed;

/**
 * DnsNamesIp4Seeder seed.
 */
class DnsNamesIp4Seed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'domain_name' => 'google.com',
                'ip_address'=>'172.217.1.100',
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'domain_name' => 'github.com',
                'ip_address'=>'140.82.114.3',
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('dns_names_ipv4s');
        $table->insert($data)->save();
    }
}
