<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DnsNamesIpsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\DnsNamesIpsController Test Case
 *
 * @uses \App\Controller\DnsNamesIpsController
 */
class DnsNamesIpsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
//    public $fixtures = [
//        'app.DnsNamesIps'
//    ];

    /**
     * Test addMultipleDns method
     *
     * @return void
     */
    public function testAddMultipleDns()
    {
        $this->markTestIncomplete('Not implemented yet.');
        $data = [
            'dns_list' => [
                [
                    'domain'=> 'lero.com',
                    'ip_address' => '178.45.12.44'
                ],
                [
                    'domain'=> 'lero',
                    'ip_address' => '178.888.12.44'
                ]
            ]
        ];
        $this->post('/api/v1/add-dns', $data);

        $this->assertResponseSuccess();
    }
}
