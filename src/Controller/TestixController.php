<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Testix Controller
 *
 * @method \App\Model\Entity\Testix[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestixController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $uploadData = '';
        if ($this->request->is('post')) {
            if (!empty($this->request->data['file']['name'])) {
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath . $fileName;
                if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadFile)) {
                    $uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($uploadData)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }
        $this->set('uploadData', $uploadData);

        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files', $files);
        $this->set('filesRowNum', $filesRowNum);
    }

    /**
     * View method
     *
     * @param string|null $id Testix id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testix = $this->Testix->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('testix'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testix = $this->Testix->newEmptyEntity();
        if ($this->request->is('post')) {
            $testix = $this->Testix->patchEntity($testix, $this->request->getData());
            if ($this->Testix->save($testix)) {
                $this->Flash->success(__('The testix has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testix could not be saved. Please, try again.'));
        }
        $this->set(compact('testix'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Testix id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testix = $this->Testix->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testix = $this->Testix->patchEntity($testix, $this->request->getData());
            if ($this->Testix->save($testix)) {
                $this->Flash->success(__('The testix has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testix could not be saved. Please, try again.'));
        }
        $this->set(compact('testix'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Testix id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testix = $this->Testix->get($id);
        if ($this->Testix->delete($testix)) {
            $this->Flash->success(__('The testix has been deleted.'));
        } else {
            $this->Flash->error(__('The testix could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
