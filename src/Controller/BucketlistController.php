<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bucketlist Controller
 *
 * @property \App\Model\Table\BucketlistTable $Bucketlist
 *
 * @method \App\Model\Entity\Bucketlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BucketlistController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $bucketlist = $this->paginate($this->Bucketlist);

        $this->set(compact('bucketlist'));
    }

    /**
     * View method
     *
     * @param string|null $id Bucketlist id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bucketlist = $this->Bucketlist->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('bucketlist', $bucketlist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bucketlist = $this->Bucketlist->newEntity();
        if ($this->request->is('post')) {
            $bucketlist = $this->Bucketlist->patchEntity($bucketlist, $this->request->getData());
            if ($this->Bucketlist->save($bucketlist)) {
                $this->Flash->success(__('The bucketlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bucketlist could not be saved. Please, try again.'));
        }
        $users = $this->Bucketlist->Users->find('list', ['limit' => 200]);
        $this->set(compact('bucketlist', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bucketlist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bucketlist = $this->Bucketlist->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bucketlist = $this->Bucketlist->patchEntity($bucketlist, $this->request->getData());
            if ($this->Bucketlist->save($bucketlist)) {
                $this->Flash->success(__('The bucketlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bucketlist could not be saved. Please, try again.'));
        }
        $users = $this->Bucketlist->Users->find('list', ['limit' => 200]);
        $this->set(compact('bucketlist', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bucketlist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bucketlist = $this->Bucketlist->get($id);
        if ($this->Bucketlist->delete($bucketlist)) {
            $this->Flash->success(__('The bucketlist has been deleted.'));
        } else {
            $this->Flash->error(__('The bucketlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
