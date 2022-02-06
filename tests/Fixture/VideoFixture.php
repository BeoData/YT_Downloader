<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VideoFixture
 */
class VideoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'video';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'short_desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'url' => 'Lorem ipsum dolor sit amet',
                'videoId' => 'Lorem ip',
                'type' => 'Lorem ip',
                'quality' => 'Lorem ipsum dolor sit amet',
                'thumbnail' => 'Lorem ipsum dolor sit amet',
                'channelId' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
