<?php
function getCategory($arr,$parent,$shift){
    foreach($arr as $row){
        if($row->parent == $parent){
            echo '<option>'.$shift.$row->name.'</option>';
            getCategory($arr,$row->id,$shift.'--|');
        }
    }

}
?>