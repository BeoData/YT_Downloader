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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $video->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $video->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Video'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="video form content">
            <?= $this->Form->create($video) ?>
            <fieldset>
                <legend><?= __('Edit Video') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('short_desc');
                    echo $this->Form->control('url');
                    echo $this->Form->control('videoId');
                    echo $this->Form->control('type');
                    echo $this->Form->control('quality');
                    echo $this->Form->control('thumbnail');
                    echo $this->Form->control('channelId');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
