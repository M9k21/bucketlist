<?php

namespace App\Controller;

use App\Controller\AppController;

use App\Form\CustomForm;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Bucketlist');
        $this->set('authuser', $this->Auth->user());
    }

    // ログイン処理
    public function login()
    {
        // POST時の処理
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            // Authのidentifyをユーザーに設定
            if (!empty($user)) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('メールアドレスかパスワードが間違っています。');
        }
    }

    // ログアウト処理
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('bucketlist');

        $user = $this->Users->get($this->Auth->user('id'));

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('アカウントの登録が完了しました'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('入力内容をもう一度ご確認ください。'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('bucketlist');

        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('設定の変更が完了しました'));

                return $this->redirect(['controller' => 'Bucketlist', 'action' => 'index']);
            }
            $this->Flash->error(__('入力内容をもう一度ご確認ください。'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function setpassword($id = null)
    {
        $this->viewBuilder()->setLayout('bucketlist');

        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('設定の変更が完了しました'));

                return $this->redirect(['controller' => 'Bucketlist', 'action' => 'index']);
            }
            $this->Flash->error(__('入力内容をもう一度ご確認ください。'));
        }
        $this->set(compact('user'));
    }

    public function setimage($id = null)
    {
        $this->viewBuilder()->setLayout('bucketlist');

        $user = $this->Users->get($this->Auth->user('id'));
        $file_upload = new CustomForm();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request_data = $this->request->getData();
            $request_file = $this->request->getData('image');
            if (!empty($request_file['name'])) {
                if ($file_upload->execute($request_data)) {
                    // ファイル名変更
                    $request_data['image'] = date('YmdHis') . $request_file['name'];
                    // ファイル保存
                    $filePath = WWW_ROOT . DS . 'img' . DS . 'userimage' . DS . $request_data['image'];
                    move_uploaded_file($request_file['tmp_name'], $filePath);
                } else {
                    $errors = $file_upload->getErrors();
                }
            }
            if (empty($errors)) {
                // ユーザー情報の更新
                $user = $this->Users->patchEntity($user, $request_data);
                $this->Users->save($user);
                $this->Flash->success(__('画像を変更しました。'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view']);
            } else {
                $this->Flash->error('正しい画像を指定してください。');
            }
        }
        $this->set(compact('user'));
    }
}
