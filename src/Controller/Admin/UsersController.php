<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Session;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', 'users');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        return $this->response->withType("application/json")->withStringBody(json_encode($user));
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
                $this->Flash->success(__('Usuário cadastrado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('Erro: Usuário não foi cadastrado com sucesso'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Usuário não foi editado com sucesso'));
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
            $this->Flash->success(__('Usuário apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Usuário não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
       if($this->request->is('post')){

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $username = $dados['username'];
            $password = $dados['password'];
            
            $perfilUser = $this->Users->getUserDados($username, $password);
            
            if($perfilUser == null) {
                $user = array(
                    'id' => 0,
                    'username'=> null,
                    'password'=> null
                );
                return $this->response->withType("application/json")->withStringBody(json_encode($user));
            } else {
            
            $id = $perfilUser['id']; 
            
            $user = array(
            'id' => $id,
            'username'=> $username,
            'password'=> $password
            );
            return $this->response->withType("application/json")->withStringBody(json_encode($user));
            }
       }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }   
}
