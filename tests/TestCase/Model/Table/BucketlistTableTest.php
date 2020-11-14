<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BucketlistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BucketlistTable Test Case
 */
class BucketlistTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BucketlistTable
     */
    public $Bucketlist;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Bucketlist',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bucketlist') ? [] : ['className' => BucketlistTable::class];
        $this->Bucketlist = TableRegistry::getTableLocator()->get('Bucketlist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bucketlist);

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
