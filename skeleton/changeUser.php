<?php
if (!empty($_POST)) {
    include('database.php');
    foreach ($_POST as $field_userid => $val) {
//from the fieldname:user_id we need to get user_id
        $split_data = explode(':', $field_userid);
        $userId = $split_data[1];
        $fieldName = $split_data[0];
        if (!empty($userId) && !empty($fieldName) && !empty($val)) {
//update the values
            $db->changeUser($fieldName, $val, $userId);
            echo "Updated";
        } else {
            echo "Invalid Requests";
        }
    }
} else {
    echo "Invalid Requests";
}