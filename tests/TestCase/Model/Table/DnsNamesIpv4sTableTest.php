<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DnsNamesIpv4sTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DnsNamesIpv4sTable Test Case
 */
class DnsNamesIpv4sTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DnsNamesIpv4sTable
     */
    public $DnsNamesIpv4s;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DnsNamesIpv4s'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DnsNamesIpv4s') ? [] : ['className' => DnsNamesIpv4sTable::class];
        $this->DnsNamesIpv4s = TableRegistry::getTableLocator()->get('DnsNamesIpv4s', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DnsNamesIpv4s);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
