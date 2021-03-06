<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * OD_User_Search
 */
class OD_User_Search {

    public function in_my_dec_already($check_id){
        
        global $current_user;
        
        if(is_user_logged_in()){

            $current_dec = get_user_meta($current_user->ID, 'mydec', false);
            $current_dec = array() !== $current_dec ? $current_dec : array(0 => array());

            if($current_dec[0] !== array()){

                foreach($current_dec[0] as $currentid ){

                    if($currentid == $check_id){     

                        return false;
                    }
                }
            }
        }
        
        return true;
    }
    
    public function get_user_modal_results($key){

        $config = array('host'=>DB_HOST, 'user'=>DB_USER, 'pass'=>DB_PASSWORD, 'db_name'=>DB_NAME);

        $sql = new mysqli($config['host'], $config['user'], $config['pass'], $config['db_name']);

        if (mysqli_connect_errno()) {

          printf("Connect failed: %s\n", mysqli_connect_error());

          exit;
        }

        $query = "SELECT * from od_users WHERE ID IN (SELECT user_id FROM od_usermeta WHERE meta_key = 'od_capabilities' AND meta_value LIKE '%professional%' OR meta_value LIKE '%business%' OR meta_value LIKE '%client%') AND ID IN (SELECT ID from od_users WHERE user_nicename LIKE '%{$key}%' OR display_name LIKE '%{$key}%' OR user_email LIKE '%{$key}%')";

        $result = $sql->query($query);

        if($result->num_rows !== 0){

            while($row = $result->fetch_row()) {

                if($row[0]){
            $rows[]=$row;}
            }
        }else{ 

            $rows = array('no suggestions.');
        }

        return $rows;
        $result->close();

        $sql->close();
    }
}
    
$od_user_search = new OD_User_Search();    