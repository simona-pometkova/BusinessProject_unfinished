<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * JobHistory Controller
 *
 * @property \App\Model\Table\JobHistoryTable $JobHistory
 * @method \App\Model\Entity\JobHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobHistoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employee'],
        ];
        $jobHistory = $this->paginate($this->JobHistory);

        $this->set(compact('jobHistory'));
    }

    /**
     * View method
     *
     * @param string|null $id Job History id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobHistory = $this->JobHistory->get($id, [
            'contain' => ['Employee'],
        ]);

        $this->set(compact('jobHistory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobHistory = $this->JobHistory->newEmptyEntity();
        if ($this->request->is('post')) {
            $jobHistory = $this->JobHistory->patchEntity($jobHistory, $this->request->getData());
            if ($this->JobHistory->save($jobHistory)) {
                $this->Flash->success(__('The job history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job history could not be saved. Please, try again.'));
        }
        $employee = $this->JobHistory->Employee->find('list', ['limit' => 200]);
        $this->set(compact('jobHistory', 'employee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job History id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobHistory = $this->JobHistory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobHistory = $this->JobHistory->patchEntity($jobHistory, $this->request->getData());
            if ($this->JobHistory->save($jobHistory)) {
                $this->Flash->success(__('The job history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job history could not be saved. Please, try again.'));
        }
        $employee = $this->JobHistory->Employee->find('list', ['limit' => 200]);
        $this->set(compact('jobHistory', 'employee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job History id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobHistory = $this->JobHistory->get($id);
        if ($this->JobHistory->delete($jobHistory)) {
            $this->Flash->success(__('The job history has been deleted.'));
        } else {
            $this->Flash->error(__('The job history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
