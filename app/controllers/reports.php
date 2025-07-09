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

  $this->view('reports/index');
    }
}