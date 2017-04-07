<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComprovanteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComprovanteTable Test Case
 */
class ComprovanteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComprovanteTable
     */
    public $Comprovante;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.comprovante',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Comprovante') ? [] : ['className' => 'App\Model\Table\ComprovanteTable'];
        $this->Comprovante = TableRegistry::get('Comprovante', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comprovante);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
