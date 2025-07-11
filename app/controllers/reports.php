<?php

class Reports extends Controller {

   public function index(){
   if (session_status() === PHP_SESSION_NONE){
  session_start(); 
   }

  if (!isset($_SESSION['auth']) || $_SESSION['username'] !== 'admin') {
    header('Location: /login');
    exit;
  }

    $reminderModel = $this->model('Reminder');
    $reminders = $reminderModel->admin_report_1();
    $reminderCounts = $reminderModel->admin_report_count_reminders();

     $this->view('reports/index', [
                 'reminders' => $reminders, 
                 'reminderCounts' => $reminderCounts]);

   }
}