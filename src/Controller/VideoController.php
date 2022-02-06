<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Video Controller
 *
 * @property \App\Model\Table\VideoTable $Video
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VideoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $video = $this->paginate($this->Video);

        $this->set(compact('video'));
    }

    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Video->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('video'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        return $this->redirect(['action' => 'getvid']);
    }

    /**
     * Save method
     *
     * @param null $url Video link ready for downloading.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function savevd($url)
    {
        $videosTable = $this->getTableLocator()->get('Video');
        $video = $videosTable->newEmptyEntity();
        $videoz = $this->request->getSession()->read('videoz');
        $video->title = $videoz->videoDetails->title;
        $video->short_desc = $videoz->videoDetails->shortDescription;
        $video->videoId = $videoz->videoDetails->videoId;
        $video->type = 'mp4';
        $video->quality = '720p';
        $thumbnails = $videoz->videoDetails->thumbnail->thumbnails;
        $video->thumbnail = end($thumbnails)->url;
        $video->channelId = '123456';
        $video->url = $url; //? var_dump($url);

        if ($videosTable->save($video)) {
            // The $video entity contains the id now
            $id = $video->id;
            $this->Flash->success(__('The has been saved.'));
        }

         return $this->redirect(['action' => 'index?sort=id&direction=desc']);
                //I'm sorry I didn't have time to finish this
    }

    /**
     * GetVid method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function getvid()
    {
        $video_link = null;
        if ($this->request->is('post')) {
            $video_link = $this->request->getData('video_link');

            /**
             * get_youtube_id_from_url method
             *
             * @param null $url Video id.
             * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
             * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
             */
            function get_youtube_id_from_url($url)
            {
                if (preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results)) {
                   // echo "A match was found.";

                    return $results[6];
                } else {
                    echo "A match was not found.";
                }
            }

            $video_id = get_youtube_id_from_url($video_link);

            /**
             * GetVideoInfo method
             *
             * @param null $video_id Video id.
             * @return \Cake\Http\Response|null|void Renders view
             */
            function getVideoInfo($video_id)
            {
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/youtubei/v1/player?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, '{  "context": {    "client": {      "hl": "en",      "clientName": "WEB",      "clientVersion": "2.20210721.00.00",      "clientFormFactor": "UNKNOWN_FORM_FACTOR",   "clientScreen": "WATCH",      "mainAppWebInfo": {        "graftUrl": "/watch?v=' . $video_id . '",           }    },    "user": {      "lockedSafetyMode": false    },    "request": {      "useSsl": true,      "internalExperimentFlags": [],      "consistencyTokenJars": []    }  },  "videoId": "' . $video_id . '",  "playbackContext": {    "contentPlaybackContext": {        "vis": 0,      "splay": false,      "autoCaptionsDefaultOn": false,      "autonavState": "STATE_NONE",      "html5Preference": "HTML5_PREF_WANTS",      "lactMilliseconds": "-1"    }  },  "racyCheckOk": false,  "contentCheckOk": false}');
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

                $headers = [];
                $headers[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);

                return $result;
            }

            $videoz = json_decode(getVideoInfo($video_id));
            //var_dump($videoz);

            $this->request->getSession()->write('videoz', $videoz);
            $this->set('getData', $videoz);
            $this->Flash->success(__('The video has been proceeded.'));
        }

        $this->set(compact('video_link'));
    }

   /**
    * VideoDownload method
    *
    * @param null $video Video info.
    * @return \Cake\Http\Response|null|void Renders view
    */
   /*  public function download($newUri)
    {
        echo $newUri;
        $dir = WWW_ROOT.'video';
        $slas= '\\';
        $filename = $this->data['video']['newUri']['name'];
        $dir=$dir.$slas.$filename;
        move_uploaded_file($this->data['video']['newUri']['tmp_name'],$dir);

    } */

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Video->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Video->patchEntity($video, $this->request->getData());
            if ($this->Video->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The video could not be saved. Please, try again.'));
        }
        $this->set(compact('video'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Video->get($id);
        if ($this->Video->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
