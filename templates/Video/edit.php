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
                    echo $this->Form->textarea('short_desc', ['rows' => '5', 'cols' => '15']);
                    echo $this->Form->hidden('url', ['readonly' => true]);
                    echo $this->Form->hidden('videoId', ['readonly' => true]);
                    echo $this->Form->hidden('type', ['readonly' => true]);
                    echo $this->Form->hidden('quality', ['readonly' => true]);
                    echo $this->Form->hidden('thumbnail', ['readonly' => true]);
                    echo $this->Form->hidden('channelId', ['readonly' => true]);
                    echo $this->Form->hidden('userid', ['readonly' => true]);
/*                     echo $this->Form->select('date of transfer', [
                        'label' => 'Date of birth',
                        'min' => date('Y') -100  ,
                        'max' => date('Y')  ,
                    ]); */
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
