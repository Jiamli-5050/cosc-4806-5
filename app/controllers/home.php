<?php

class Home extends Controller {

    public function index() {
      $user = $this->model('User');
      $data = $user->test();
			
      $reminderModel = $this->model('Reminder');
      $lastReminder = $reminderModel->get_last_reminder();
      $this->view('home/index', ['lastReminder' => $lastReminder]);
    }
}
