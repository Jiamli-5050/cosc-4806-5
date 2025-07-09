<?php

class Reminder {

  public function __construct() {

  }

  
  public function get_all_reminders () {
    $db = db_connect ();
    $statement = $db->prepare("select * from reminders WHERE deleted_at IS NULL ORDER BY id DESC");
    $statement->execute ();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function create_reminder ($subject) {
    $db = db_connect ();
    $statement = $db->prepare("INSERT INTO reminders (subject) VALUES (:subject)");
    $statement->execute (['subject' => $subject]);
  }
  
  public function update_reminder ($id, $subject) {
    $db = db_connect ();
    $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
    $statement->execute (['subject' => $subject, 'id' => $id]);
  }

  public function delete_reminder ($id) {
    $db = db_connect ();
    $statement = $db->prepare("UPDATE reminders set deleted_at = NOW() where id=:id");
    $statement->execute (['id' => $id]);
  }

}
  ?>