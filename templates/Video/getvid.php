<?php
error_reporting(1);
$video_link = null;
$thumbnails = $getData->videoDetails->thumbnail->thumbnails;


var_dump($thumbnail);
$title = $getData->videoDetails->title;
$short_description = $getData->videoDetails->shortDescription;
$formats = $getData->streamingData->formats;
$frmt = "mp4";
$videoId = $getData->videoDetails->videoId;
if (isset($thumbnails)) {
    $thumbnail = end($thumbnails)->url;
}

?>

<div class="row">
    <div class="column-responsive column-100">
        <div class="video form content">
            <?= $this->Form->create($video_link) ?>
            <fieldset>
            <?php  echo $this->Form->control('video_link', [
                'label' => [
                'class' => 'thingy',
                'text' => 'YouTube Video Link']
]);?>

            </fieldset>
            <?= $this->Form->button(__("Submit")) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

</div>
<br>
<div class="container">
    <table style="width:100%">
        <tr>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td><img src="<?php echo $thumbnail; ?>" style="max-width:100%"></td>
            <td>
                <h2><?php echo $title; ?> </h2>
                <p><?php echo str_split($short_description, 100)[0]; ?></p>
            </td>
        </tr>
    </table>

    <br></br>

    <?php if (!empty($formats)) : ?>
    <div class="card-body">
        <table class="table ">
            <thead>
                <tr>
                    <td style="width:20%"><strong>URL</strong></td>
                    <td style="width:20%"><strong>Type</strong></td>
                    <td style="width:20%"><strong>Quality</strong></td>

                    <td style="width:40%"><strong>Actions</strong></td>

                </tr>
            </thead>
            <?php foreach ($formats as $format) :?>
                <?php if (@$format->url == "") {
                    $signature = "https://example.com?" . $format->signatureCipher;
                    parse_str(parse_url($signature, PHP_URL_QUERY), $parse_signature);
                    $url = $parse_signature["url"] . "&sig=" . $parse_signature["s"];
                } else {
                    $url = $format->url;
                } ?>
            <tr>
            <tbody>
                <td><a href="<?php echo $url; ?>">Play</a></td>
                <td>
                    <?php if ($format->mimeType) {
                            echo explode(
                                ";",
                                explode("/", $format->mimeType)[1]
                            )[0];
                    } else {
                        echo "Unknown";
                    } ?>
                </td>
                <td>
                    <?php if ($format->qualityLabel) {
                            echo $format->qualityLabel;
                    } else {
                        echo "Unknown";
                    } ?>
                </td>

                <td style="width:40%">
                <?php $newUri = urlencode($url) . '&title=' . $videoId;?>
                <?= $this->Html->link('Download', urldecode($newUri), ['class' => 'button', 'target' => '_blank']); ?>

                <?= $this->Html->link('Save', ['controller' => 'video', 'action' => 'savevd',$url], ['class' => 'button']); ?>

                </td>
            </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>

    <?php endif; ?>

    <br></br>
    <br></br>
    <br></br>
</div>
</div>




