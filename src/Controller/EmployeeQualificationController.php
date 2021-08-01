<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EmployeeQualification Controller
 *
 * @property \App\Model\Table\EmployeeQualificationTable $EmployeeQualification
 * @method \App\Model\Entity\EmployeeQualification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeQualificationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employee', 'Qualification'],
        ];
        $employeeQualification = $this->paginate($this->EmployeeQualification);
        $employee = $this->EmployeeQualification->Employee->find()->all();
        $employees = [];
        foreach($employees as $employee) {
            $employees[$employeeQualification->id] = $employee->first_name.' '.$employee->last_name;
        }
        $this->set('employees', $employees);
        $this->set(compact('employeeQualification'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Qualification id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeQualification = $this->EmployeeQualification->get($id, [
            'contain' => ['Employee', 'Qualification'],
        ]);

        $this->set(compact('employeeQualification'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $employeeQualification = $this->EmployeeQualification->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $employeeQualification = $this->EmployeeQualification->patchEntity($employeeQualification, $this->request->getData());
    //         if ($this->EmployeeQualification->save($employeeQualification)) {
    //             $this->Flash->success(__('The employee qualification has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The employee qualification could not be saved. Please, try again.'));
    //     }
    //     $employee = $this->EmployeeQualification->Employee->find('list', ['limit' => 200]);
    //     $qualification = $this->EmployeeQualification->Qualification->find('list', ['limit' => 200]);
    //     $this->set(compact('employeeQualification', 'employee', 'qualification'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Employee Qualification id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeQualification = $this->EmployeeQualification->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeQualification = $this->EmployeeQualification->patchEntity($employeeQualification, $this->request->getData());
            if ($this->EmployeeQualification->save($employeeQualification)) {
                $this->Flash->success(__('The employee qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee qualification could not be saved. Please, try again.'));
        }
        $employee = $this->EmployeeQualification->Employee->find('list', ['limit' => 200]);
        $qualification = $this->EmployeeQualification->Qualification->find('list', ['limit' => 200]);
        $this->set(compact('employeeQualification', 'employee', 'qualification'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Qualification id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeQualification = $this->EmployeeQualification->get($id);
        if ($this->EmployeeQualification->delete($employeeQualification)) {
            $this->Flash->success(__('The employee qualification has been deleted.'));
        } else {
            $this->Flash->error(__('The employee qualification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
