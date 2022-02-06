<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style>
 /* Stil ne mora biti ovde   */
.collapse {
    display: none
}
.collapse.in {
    display: block
}
tr.collapse.in {
    display: table-row
}
tbody.collapse.in {
    display: table-row-group
}
.collapsing {
    position: relative;
    height: 0;
    overflow: hidden;
    -webkit-transition-property: height, visibility;
    -o-transition-property: height, visibility;
    transition-property: height, visibility;
    -webkit-transition-duration: .35s;
    -o-transition-duration: .35s;
    transition-duration: .35s;
    -webkit-transition-timing-function: ease;
    -o-transition-timing-function: ease;
    transition-timing-function: ease
}
.videoplayer {
    float: left;
}
.videoinfo {
    float: right;
   padding-right: 130px;
}
 </style>

<div class="video index content">
    <?= $this->Html->link(__('New Video'), ['action' => 'getvid'], ['class' => 'button float-right']) ?>
    <h3><?= __('Video') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($video as $video) : ?>
                <tr>
                    <td><?= $this->Number->format($video->id) ?></td>
                       <td style="width: 170px;"><img src=<?= h($video->thumbnail) ?>></td>
                    <td style="width:300px;height: 150px; " ><?= h($video->title) ?></td>
                    <td>  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?= $this->Number->format($video->id) ?>">Play</button></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $video->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $video->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?>
                    </td>

                </tr>
                <td colspan="5">
                            <div id="<?= $this->Number->format($video->id) ?>" class="collapse">
                            <div class="vcontainer">
                            <div class="videoplayer">
                            <iframe id="ytplayer" type="text/html" width="640" height="360"
  src="https://www.youtube.com/embed/<?php echo $video->videoId ?>?autoplay=1&mute=1&origin=http://example.com"
  frameborder="0" allowfullscreen></iframe></div>
                            <div class="videoinfo">
                    <p>Video type: <?= h($video->type) ?></p>
                    <p>Video Quality: <?= h($video->quality) ?></p>
                            </div>
                            </div>
                            </div>
                </td>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<script>
    $("a[id^=show_]").click(function(event) {
    $("#extra_" + $(this).attr('id').substr(5)).slideToggle("slow");
    event.preventDefault();
});
</script>
