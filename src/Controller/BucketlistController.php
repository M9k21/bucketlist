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
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->set('authuser', $this->Auth->user());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // 公開のuserを取得
        $public_users = $this->Users->find('all', [
            'conditions' => [
                'and' => [
                    'private' => 0,
                    'is_deleted' => 0
                ]
            ]
        ]);

        // 各ユーザーの最新達成リストを取得
        foreach ($public_users as $public_user) {
            $new_bucketlists[] = $this->Bucketlist->find('all', [
                'conditions' => [
                    'and' => [
                        'user_id' => $public_user->id,
                        'completed IS NOT NULL',
                        'Bucketlist.is_deleted' => 0
                    ]
                ],
                'contain' => ['Users'],
                'order' => ['completed' => 'desc'],
            ])->first();
        }

        $this->set(compact('new_bucketlists'));
    }

    public function collect($username = null)
    {
        // usernameの取得
        $username = $this->request->getParam('username');
        $user = $this->Users->find('all', [
            'conditions' => [
                'and' => [
                    'username' => $username,
                    'is_deleted' => 0
                ]
            ]
        ])->toArray();
        if (empty($user)) {
            $this->Flash->error(__('指定されたリストは存在しません。'));
            return $this->redirect(['action' => 'index']);
        } else {
            if ($user[0]->id !== $this->Auth->user('id') && $user[0]->private) {
                $this->Flash->error(__('指定されたリストは非公開のため表示できません。'));
                return $this->redirect(['action' => 'index']);
            }
        }
        // リストの取得
        $listitems = $this->Bucketlist->find('all', [
            'conditions' => [
                'and' => [
                    'username' => $username,
                    'Bucketlist.is_deleted' => 0
                ]
            ],
            'contain' => ['Users'],
            'order' => ['Bucketlist.created' => 'asc'],
        ]);
        // リスト項目の集計
        $listitem_count = $listitems->count();
        // リスト項目の登録
        $add_listitem = $this->Bucketlist->newEntity();
        if ($username === $this->Auth->user('username')) {
            if ($this->request->is('post')) {
                $add_listitem = $this->Bucketlist->patchEntity($add_listitem, $this->request->getData());
                if ($this->Bucketlist->save($add_listitem)) {
                    $this->Flash->success(__('リスト項目を追加しました。'));
                    return $this->redirect(['action' => 'collect', 'username' => $this->Auth->user('username')]);
                } else {
                    $this->Flash->error(__('リスト項目の追加に失敗しました。もう一度ご入力ください。'));
                }
            }
        }
        $this->set(compact('username', 'listitems', 'listitem_count', 'add_listitem',));
    }

    public function complete($id = null)
    {
        $bucketlist = $this->Bucketlist->get($id);
        if (empty($bucketlist->completed)) {
            // リストの達成
            $bucketlist->completed = new \DateTime('now');
        } else {
            // リスト達成の取り消し
            $bucketlist->completed = null;
        }
        $this->Bucketlist->save($bucketlist);
        return $this->redirect(['action' => 'collect', 'username' => $this->Auth->user('username')]);
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

        $this->set(compact('bucketlist'));
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
            'contain' => ['Users'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $bucketlist = $this->Bucketlist->patchEntity($bucketlist, $this->request->getData());
            if ($this->Bucketlist->save($bucketlist)) {
                $this->Flash->success(__('リスト項目を編集しました。'));
                return $this->redirect(['action' => 'view', $bucketlist['id']]);
            }
            $this->Flash->error(__('リスト項目の編集に失敗しました。入力内容をもう一度ご確認ください。'));
        }
        $this->set(compact('bucketlist'));
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
        $bucketlist = $this->Bucketlist->get($id);
        $bucketlist->is_deleted = 1;
        $bucketlist = $this->Bucketlist->patchEntity($bucketlist, $this->request->getData());
        if ($this->Bucketlist->save($bucketlist)) {
            $this->Flash->success(__('リスト項目を削除しました。'));
            return $this->redirect(['action' => 'collect', 'username' => $this->Auth->user('username')]);
        }
        $this->Flash->error(__('リスト項目の削除に失敗しました。'));
    }
}
