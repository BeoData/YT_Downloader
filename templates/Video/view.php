<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Video'), ['action' => 'edit', $video->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Video'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Video'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Video'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="video view content">
            <h3><?= h($video->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($video->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($video->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('VideoId') ?></th>
                    <td><?= h($video->videoId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($video->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quality') ?></th>
                    <td><?= h($video->quality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Thumbnail') ?></th>
                    <td><?= h($video->thumbnail) ?></td>
                </tr>
                <tr>
                    <th><?= __('ChannelId') ?></th>
                    <td><?= h($video->channelId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Userid') ?></th>
                    <td><?= h($video->userid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($video->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Short Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($video->short_desc)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
