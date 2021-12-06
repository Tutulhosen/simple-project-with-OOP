<?php 
namespace App\supporters;

use mysqli;

/**
 * this class is for connection with server and play with database
 */
abstract class Database{
    private $host= HOST;
    private $user= USER;
    private $pass= PASS;
    private $db= DB;
    private $connection;

    /**
     * connection with database
     */
    private function connection(){
        return $this->connection= new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    /**
     * insert data into database
     */

     protected function create($sql){
                $this->connection()->query($sql);
     }

     /**
      * Get all data from database
      */
      protected function all($table, $order='DESC'){
         return $this->connection()->query("SELECT * FROM {$table} ORDER BY id {$order}");
      }

      /**
       * delete data from database
       */
      protected function delete($table, $id){
          return $this->connection()->query("DELETE FROM {$table} WHERE id={$id}");
      }

      /**
       * get all info from database for a user
       */
      protected function get_user_data($table, $id){
          return $this->connection()->query("SELECT * FROM {$table} WHERE id= '{$id}'");
      }

      /**
       * update the user data from database
       */
      protected function update_data( $name, $email, $class, $sector, $subject, $id){
          return $this->connection()->query("UPDATE students SET name='{$name}', email='{$email}', class='{$class}',  sector='{$sector}', subject='{$subject}' WHERE id='{$id}'");
      }
















}





?>