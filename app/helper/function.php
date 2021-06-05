<?php
//show error alert
function showErrors($errors,$name){
    if ($errors->has($name)){
        echo '<div class="alert alert-danger" role="alert">';
        echo '<strong>'.$errors->first($name).'</strong>';
        echo '</div>';
    }
}

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

// input $arr=$product->value  output: array('size'=>array(s,m),'color'=>array(đen,đỏ))
function attr_values($arr){
    $result=array();
    foreach($arr as $value){
        $attr = $value->attribute->name;
        $result[$attr][]=$value->value;
    }
    return $result;
}

// input dạng arr('size'=>arr('S','M'), 'color'=>arr('blue','green'))
function get_combinations($arr){
    $result = array(array());
    foreach($arr as $property=>$property_values){
        $tmp = array();
        foreach($result as $result_item){
            foreach($property_values as $property_value){
                $tmp[]=array_merge($result_item, array($property_value));
            }
        }
        $result=$tmp;
    }
    return $result;
}

//check value của 1 product (editproduct.blade.php)
function checkValue($product, $value_check){
    foreach($product->values as $value)
    {
        if($value->id == $value_check){
            return true;
        }
    }
    return false;
}

// check variant xem đã tồn tại chưa (ProductController@postEditProduct)
function checkVariant($product, $variant){
    foreach($product->variant as $vari)
    {
        $arr = array();
        foreach($vari->values as $value)
        {
            $arr[]=$value->id;
        }
        if(array_diff($variant,$arr) == NULL){
            return false;
        }
    }
    return true;
}
?>