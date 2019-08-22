<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Exercises Controller
 *
 * @property \App\Model\Table\ExercisesTable $Exercises
 *
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExercisesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id)
    {
        
        //$id = $_SESSION['userid'];
        //$id = 14;
        $exercises = $this->Exercises->listar($id);
        
        //json_encode($exercises);
        //$exercises = $this->paginate($this->Exercises);

        $this->set(compact('exercises'));
        $this->set('_serialize', 'exercises');
    
        //return $this->response->withType("application/json")->withStringBody(json_encode($exercises));
        
    }

    /**
     * View method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exercise = $this->Exercises->get($id, [
            'contain' => ['Users', 'Series']
        ]);

        $this->set('exercise', $exercise);
        return $this->response->withType("application/json")->withStringBody(json_encode($exercise));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exercise = $this->Exercises->newEntity();
        if ($this->request->is('post')) {
            $exercise = $this->Exercises->patchEntity($exercise, $this->request->getData());
            if ($this->Exercises->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $users = $this->Exercises->Users->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercise = $this->Exercises->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercise = $this->Exercises->patchEntity($exercise, $this->request->getData());
            if ($this->Exercises->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $users = $this->Exercises->Users->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercises->get($id);
        if ($this->Exercises->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
