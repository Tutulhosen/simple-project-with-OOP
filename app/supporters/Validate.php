<?php

namespace App\supporters;

/**
 * This class is for all validation
 */
class Validate{

    /**
     * message validation
     */
    public static function mgs($mgs, $type='danger'){

        return "<p class=\"alert alert-{$type}\">{$mgs}</p>";

    }

    /**
     * show the validate message
     */
    public static function show($mgs){
        echo $mgs ?? '';
    }

    /**
     * email validation
     */
    public static function validEamil($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * upload file
     */
    public static function upload_file($file, $path='/'){

        $file_name= time() . '-' . rand() . '-' . $file['name'];
        $file_tmp= $file['tmp_name'];
        $file_size= $file['size'];
        move_uploaded_file($file_tmp, $path . $file_name);
        return $file_name;



    }

    /**
     * manage old data
     */
    public static function old_data($name){
           echo $_POST[$name] ?? '';
            
    }

    /**
     * clear data from input field
     */
    public static function clear_data(){
        echo $_POST= "";
    }














}



?>