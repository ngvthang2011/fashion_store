<?php
function getCategory($arr,$parent,$shift,$active){
    foreach($arr as $row){
        if($row->parent == $parent){
            if($row->id == $active){
                echo '<option selected value='.$row->id.'>'.$shift.$row->name.'</option>';
            }else{
                echo '<option value='.$row->id.'>'.$shift.$row->name.'</option>';
            }
            
            getCategory($arr,$row->id,$shift.'--|',$active);
        }
    }

}

function showCategory($arr,$parent,$shift){
    foreach($arr as $row){
        if($row->parent == $parent){
            echo "<div class='item-menu'><span>".$shift.$row->name."</span>
            <div class='category-fix'>
                <a class='btn-category btn-primary' href='admin/category/edit/".$row->id."'><i
                        class='fa fa-edit'></i></a>
                <a onclick='return delCat(\"$row->name\")' class='btn-category btn-danger' href='admin/category/del/".$row->id."'><i class='fas fa-times'></i></i></a>

            </div>
        </div>";
            showCategory($arr,$row->id,$shift.'--|');
        }
    }

}
?>