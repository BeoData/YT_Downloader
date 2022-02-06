<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Video Entity
 *
 * @property int $id
 * @property string $title
 * @property string $short_desc
 * @property string $url
 * @property string $videoId
 * @property string $type
 * @property string $quality
 * @property string $thumbnail
 * @property string $channelId
 */
class Video extends Entity
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
        'title' => true,
        'short_desc' => true,
        'url' => true,
        'videoId' => true,
        'type' => true,
        'quality' => true,
        'thumbnail' => true,
        'channelId' => true,
    ];
}
