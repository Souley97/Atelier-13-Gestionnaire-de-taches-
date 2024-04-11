<?php   
// class Tache implement ICRUD interface 
/** id INT AUTO_INCREMENT PRIMARY KEY,
  *  project_id INT,
   * name VARCHAR(255) NOT NULL,
   * description TEXT,
   * due_date DATE,
   * priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
   * status_id INT,
   * assigned_to INT,
   * created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   * FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
   * FOREIGN KEY (status_id) REFERENCES status(id),
   * FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
**/
require_once 'Database.php';


class Tache implements ICrud {
    
    private $id;
    private $project_id;
    private $name;
    private $description;
    private $due_date;
    private $priority;
    private $status_id;
    private $assigned_to;
    private $created_at;
    private $project;
    private $status;
    private $assigned_to_name;
    private $assigned_to_email;
    public function __construct(){
        $this->id = null;
        $this->project_id = null;
        $this->name = null;
        $this->description = null;
        $this->due_date = null;
        $this->priority = null;
        $this->status_id = null;
        $this->assigned_to = null;
        $this->created_at = null;
        $this->project = null;
        $this->status = null;
        $this->assigned_to_name = null;
        $this->assigned_to_email = null;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getProject_id(){
        return $this->project_id;
    }
    public function setProject_id($project_id){
        $this->project_id = $project_id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getDue_date(){
        return $this->due_date;
    }
    public function setDue_date($due_date){
        $this->due_date = $due_date;
    }
    public function getPriority(){
        return $this->priority;
    }
    public function setPriority($priority){
        $this->priority = $priority;
    }
    public function getStatus_id(){
        return $this->status_id;
    }
    public function setStatus_id($status_id){
        $this->status_id = $status_id;
    }
    public function getAssigned_to(){
        return $this->assigned_to;
    }
    public function setAssigned_to($assigned_to){
        $this->assigned_to = $assigned_to;
    }
    public function getCreated_at(){
        return $this->created_at;
    }
   
    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }
    public function getProject(){
        return $this->project;
    }
    public function setProject($project){
        $this->project = $project;
    }

    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getAssigned_to_name(){
        return $this->assigned_to_name;
    }
    public function setAssigned_to_name($assigned_to_name){
        $this->assigned_to_name = $assigned_to_name;
    }
    public function getAssigned_to_email(){
        return $this->assigned_to_email;
    }
    public function setAssigned_to_email($assigned_to_email){
        $this->assigned_to_email = $assigned_to_email;
    }
    
    // heritage function Implementation ICRUD
    // public function getAll(){
    //     $db = Database::getInstance();
    //     return $db->getALL();
    // }
    // public function getById($id){
    //     $db = Database::getInstance();
    //     return $db->getTacheById($id);
    // }
    static public function create($tache){
        $db = Database::getInstance();
        return $db->create($tache);
    }

    public function read(){
        $db = Database::getInstance();
        return $db->read();
    }
        // public function update($tache){
    //     $db = Database::getInstance();
    //     return $db->update($tache);
    // }
    // public function delete($id){
    //     $db = Database::getInstance();
    //     return $db->delete($id);
    // }
    // public function getTachesByProject($id){
    //     $db = Database::getInstance();
    //     return $db->getTachesByProject($id);
    // }
    // public function getTachesByUser($id){
    //     $db = Database::getInstance();
    //     return $db->getTachesByUser($id);
    // }
    // public function getTachesByStatus($id){
    //     $db = Database::getInstance();
    //     return $db->getTachesByStatus($id);
    // }
    // public function getTachesByPriority($id){
    //     $db = Database::getInstance();
    //     return $db->getTachesByPriority($id);
    // }
    // public function getTachesByDueDate($id){
    //     $db = Database::getInstance();
    //     return $db->getTachesByDueDate($id);
    // }
}


