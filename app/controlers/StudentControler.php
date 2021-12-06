<?php 

 namespace App\controlers;

use App\supporters\Database;

/**
 * this class is deal all the information with database
 */
class StudentControler extends Database {

/**
 * sent data to database
 */
public function dataSent($name, $email, $class, $sector, $subject, $photo){
    parent::create("INSERT INTO students (name, email, class, sector, subject, photo) VALUES ('$name', '$email', '$class', '$sector', '$subject', '$photo')");
}


/**
 * get all data from database
 */
public function get_data($table){
   return parent::all($table);
}

/**
 * delete from database
 */
public function delete_id($delete_id){
    return parent::delete('students', $delete_id);
}

/**
 * view all info from database for a user
 */
public function view_data($user_id){
    return parent::get_user_data('students', $user_id);
}

/**
 *edit data from database for a user
 */
public function edit_data($name, $email, $class, $sector, $subject, $edit_id){
    return parent::update_data( $name, $email, $class, $sector, $subject, $edit_id);
}












}






?>