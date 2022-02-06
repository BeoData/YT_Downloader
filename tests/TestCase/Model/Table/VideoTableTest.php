<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VideoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VideoTable Test Case
 */
class VideoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VideoTable
     */
    protected $Video;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Video',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Video') ? [] : ['className' => VideoTable::class];
        $this->Video = $this->getTableLocator()->get('Video', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Video);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VideoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
