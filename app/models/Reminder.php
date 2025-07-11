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

  public function create_reminder ($subject, $user_id) {
    $db = db_connect ();
    $statement = $db->prepare("INSERT INTO reminders (subject, user_id) VALUES (:subject, :user_id)");
    $statement->execute([
      'subject' => $subject,
      'user_id' => $user_id
                        ]);
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

  public function admin_report_1 () {
    $db = db_connect ();
    $statement = $db->prepare("SELECT users.username, reminders.subject, reminders.created_at FROM reminders 
    JOIN users ON reminders.user_id = users.id
    WHERE reminders.deleted_at IS NULL
    ORDER BY users.username ASC, reminders.created_at DESC");
    $statement->execute ();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function admin_report_most_reminders() {
    $db = db_connect();
    $statement = $db->prepare("SELECT users.username, COUNT(reminders.id) AS reminder_count FROM reminders
    JOIN users ON reminders.user_id = users.id
    WHERE reminders.deleted_at IS NULL
    GROUP BY users.username
    ORDER BY reminder_count DESC
    LIMIT 1");
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

}
  ?>