<?php

class Reminders extends Controller {

  
   public function index() {
     $reminder = $this->model('Reminder');
     $list_of_reminders = $reminder->get_all_reminders();
     $this->view('reminders/index', ['reminders' => $list_of_reminders]); 
   } 

  // This will display the create form
    public function create() {
      $reminder = $this->model('Reminder');
      $this->view('reminders/create');
    }
// This will store the new reminder
   public function store() {
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subject'])) {
       $subject = trim($_POST['subject']);
       if (!empty($subject)) {
         $reminder = $this->model('Reminder');
         $reminder->create_reminder($subject,);
       }
       }
         header('Location: /reminders');
     exit;
   }
  // This will delete the reminder
     public function delete() {
       if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
         $id = intval($_POST['id']);
         $reminder = $this->model('Reminder');
         $reminder->delete_reminder($id);
       }
       header('Location: /reminders');
       exit;
   }
  // This will update the reminder
    public function update() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['subject'])) {
        $id = intval($_POST['id']);
        $subject = trim($_POST['subject']);
        if (!empty($subject)) {
          $reminder = $this->model('Reminder');
          $reminder->update_reminder($id, $subject);
        }
      }
      header('Location: /reminders');
      exit;
    }
}