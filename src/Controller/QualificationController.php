<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Qualification Controller
 *
 * @property \App\Model\Table\QualificationTable $Qualification
 * @method \App\Model\Entity\Qualification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QualificationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $qualification = $this->paginate($this->Qualification);

        $this->set(compact('qualification'));
    }

    /**
     * View method
     *
     * @param string|null $id Qualification id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qualification = $this->Qualification->get($id, [
            'contain' => ['Employee', 'Service'],
        ]);

        $this->set(compact('qualification'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qualification = $this->Qualification->newEmptyEntity();
        if ($this->request->is('post')) {
            $qualification = $this->Qualification->patchEntity($qualification, $this->request->getData());
            if ($this->Qualification->save($qualification)) {
                $this->Flash->success(__('The qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qualification could not be saved. Please, try again.'));
        }
        $employee = $this->Qualification->Employee->find('list', ['limit' => 200]);
        $service = $this->Qualification->Service->find('list', ['limit' => 200]);
        $this->set(compact('qualification', 'employee', 'service'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Qualification id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qualification = $this->Qualification->get($id, [
            'contain' => ['Employee', 'Service'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qualification = $this->Qualification->patchEntity($qualification, $this->request->getData());
            if ($this->Qualification->save($qualification)) {
                $this->Flash->success(__('The qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qualification could not be saved. Please, try again.'));
        }
        $employee = $this->Qualification->Employee->find('list', ['limit' => 200]);
        $service = $this->Qualification->Service->find('list', ['limit' => 200]);
        $this->set(compact('qualification', 'employee', 'service'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Qualification id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qualification = $this->Qualification->get($id);
        if ($this->Qualification->delete($qualification)) {
            $this->Flash->success(__('The qualification has been deleted.'));
        } else {
            $this->Flash->error(__('The qualification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
