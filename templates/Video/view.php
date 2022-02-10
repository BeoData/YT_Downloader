<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<style>
.flex-container {
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-align-content: stretch;
    -ms-flex-line-pack: stretch;
    align-content: stretch;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    }

.flex-item:nth-child(1) {
    -webkit-order: 1;
    -ms-flex-order: 1;
    order: 1;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -webkit-align-self: auto;
    -ms-flex-item-align: auto;
    align-self: auto;
    }

.flex-item:nth-child(2) {
    -webkit-order: 2;
    -ms-flex-order: 2;
    order: 2;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -webkit-align-self: auto;
    -ms-flex-item-align: auto;
    align-self: auto;
    }

.flex-item:nth-child(3) {
    -webkit-order: 3;
    -ms-flex-order: 3;
    order: 3;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -webkit-align-self: auto;
    -ms-flex-item-align: auto;
    align-self: auto;
    }
.flex-item span {
    font-style: italic;
    font-size: large;
    color:#343222;
    font-weight: bold;
    }
.flex-item hr {
margin-top: -5px;
    }
.thumbnails {
    position: relative;
    top: 0;
    left: 0;
    }
.thumbnail {
    position: relative;
    top: 0;
    left: 0;
    }
.playbutton {
    position: absolute;
    top: 30px;
    left: 30px;
    width: 100px;
}
</style>
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
            <h2><?= h($video->title) ?></h2>
            <div class="flex-container">
                <div class="thumbnails">
            <div class="flex-item"><img class="thumbnail" src="<?= h($video->thumbnail) ?>"> <hr><?= $this->Html->image('play.png', ['alt' => 'play','class'=>'playbutton','url'=>'https://www.youtube.com/watch?v='. $video->videoId]) ?></div>
    
        </div>
            <div class="flex-item"><span><?= __('Description:') ?></span></div>
            <div class="flex-item"><h5><?= $this->Text->autoParagraph(h($video->short_desc)); ?></h5></div>
        </div>
<table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($video->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quality') ?></th>
                    <td><?= h($video->quality) ?></td>
                </tr>
                <tr>
                    <th><?= __('ChannelId') ?></th>
                    <td><?= h($video->channelId) ?></td>
                </tr>
            </div>
        </table>
        
        </div>
    </div>
</div>
<div class="flex-container">&nbsp;</div>