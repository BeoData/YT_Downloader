
<?php
//error_reporting(0);
$video_link = null;
$video_id = null;
$video = null;
$formats = null;
$title = null;
$streamingData = null;
$short_description = null;
$thumbnail  = null;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Video'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
    <div class="container">
        <?php
 // echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));
// echo $this->Html->scriptBlock(sprintf( 'var csrfToken = %s;', json_encode($this->request->getAttribute('csrfToken'))));
        ?>
        <form method="post" accept-charset="utf-8" action=""><div style="display:none;"><input type="hidden" name="_csrfToken" autocomplete="off" value="<?php $this->request->getAttribute('csrfToken') ?>"/></div>
        <?= $this->Form->create($video) ?>
            <div class="row">
                <div class="col-lg-12">
                    <h7 class="text-align"> Download YouTube Video</h7>
                </div>
                <div class="col-lg-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="video_link" placeholder="Paste link.. e.g. https://www.youtube.com/watch?v=OK_JCtrrv-c" <?php if (isset($_POST['video_link'])) {
                            echo "value='".$_POST['video_link']."'";
                                                                                                                                                              } ?>>
                        <span class="input-group-btn">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Go!</button>
                      </span>
                    </div><!-- /input-group -->
                </div>
            </div><!-- .row -->
        </form>
        <?php
        $video_link = $_POST['video_link'];
      //  echo $video_link;

        function get_youtube_id_from_url($url)
        {
            if (preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results)) {
                echo "A match was found.";
                return $results[6];
            } else {
                echo "A match was not found.";
            }
        }
        function getVideoInfo($video_id)
        {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/youtubei/v1/player?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '{  "context": {    "client": {      "hl": "en",      "clientName": "WEB",      "clientVersion": "2.20210721.00.00",      "clientFormFactor": "UNKNOWN_FORM_FACTOR",   "clientScreen": "WATCH",      "mainAppWebInfo": {        "graftUrl": "/watch?v='.$video_id.'",           }    },    "user": {      "lockedSafetyMode": false    },    "request": {      "useSsl": true,      "internalExperimentFlags": [],      "consistencyTokenJars": []    }  },  "videoId": "'.$video_id.'",  "playbackContext": {    "contentPlaybackContext": {        "vis": 0,      "splay": false,      "autoCaptionsDefaultOn": false,      "autonavState": "STATE_NONE",      "html5Preference": "HTML5_PREF_WANTS",      "lactMilliseconds": "-1"    }  },  "racyCheckOk": false,  "contentCheckOk": false}');
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

            $headers = array();
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            return $result;
        }

        $video_id = get_youtube_id_from_url($video_link);
        $video = json_decode(getVideoInfo($video_id));
       // $formats = $video->streamingData->formats;
       // $adaptiveFormats = $video->streamingData->adaptiveFormats;
        $formats = $video->streamingData->formats;
        $adaptiveFormats = $video->streamingData->adaptiveFormats;
        $thumbnails = $video->videoDetails->thumbnail->thumbnails;
        $title = $video->videoDetails->title;
        $short_description = $video->videoDetails->shortDescription;
       //$thumbnail = end($thumbnails)->url;

       // var_dump($video);
        ?>
  <div class="row formSmall">
                <div class="col-lg-3">
                    <img src="<?php echo $thumbnail; ?>" style="max-width:100%">
                </div>
                <div class="col-lg-9">
                    <h2><?php echo $title; ?> </h2>
                    <p><?php echo str_split($short_description, 100)[0]; ?></p>
                </div>
            </div>



           <div class="card formSmall">
                    <div class="card-header">
                        <strong>With Video & Sound</strong>
                    </div>

                    <div class="card-body">
                        <table class="table ">
                            <tr>
                                <td>URL</td>
                                <td>Type</td>
                                <td>Quality</td>
                                <td>Download</td>
                            </tr>
                            <?php foreach ($formats as $format) : ?>
                                <?php

                                if (@$format->url == "") {
                                    $signature = "https://example.com?".$format->signatureCipher;
                                    parse_str(parse_url($signature, PHP_URL_QUERY), $parse_signature);
                                    $url = $parse_signature['url']."&sig=".$parse_signature['s'];
                                    //var_dump($parse_signature);
                                } else {
                                    $url = $format->url;
                                }




                                ?>
                                <tr>
                                    <td><a href="<?php echo $url; ?>">Test</a></td>
                                    <td>
                                        <?php if ($format->mimeType) {
                                            echo explode(";", explode("/", $format->mimeType)[1])[0];
                                        } else {
                                            echo "Unknown";
                                        }?>
                                    </td>
                                    <td>
                                        <?php if ($format->qualityLabel) {
                                            echo $format->qualityLabel;
                                        } else {
                                            echo "Unknown";
                                        } ?>
                                    </td>
                                    <td>
                                        <a
                                            href="downloader.php?link=<?php echo urlencode($url)?>&title=<?php echo urlencode($title)?>&type=<?php if ($format->mimeType) {
                                                echo explode(";", explode("/", $format->mimeType)[1])[0];
                                                                      } else {
                                                                          echo "mp4";
                                                                      }?>"
                                        >
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
























    </div>







