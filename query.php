<?php

class query{
    function getData($con,$table,$field,$condition_arr='',$like='',$orderby='',$ordertype='desc',$limit=''){
        $sql="select $field from $table";

        if($condition_arr!=''){
            $sql.=" where ";
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key=>$val){
                if($i==$c){
                    $sql.="$key='$val' ";
                }else{
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
        }
        if($orderby!=''){
            $sql.=" order by $orderby $ordertype";
        }
        if($limit!=''){
            $sql.=" limit $limit";
        }
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            $arr=array();
            while($row=mysqli_fetch_assoc($res)){
                $arr[]=$row;
            }
            return $arr;
        }else{
            return 0;
        }
    }

    function insertData($con,$table,$condition_arr){
        if($condition_arr!=''){
            foreach($condition_arr as $key=>$val){
                $fieldarr[]=$key;
                $valuearr[]=$val;
            }
            $field=implode(",",$fieldarr);
            $value=implode("','",$valuearr);
            $value="'".$value."'";
            $sql="insert into $table ($field) values($value) ";
            $res=mysqli_query($con,$sql);
        }
       
    }

    function deleteData($con,$table,$condition_arr){
        $sql="delete from $table where ";
        $c=count($condition_arr);
        $i=1;
        foreach($condition_arr as $key=>$val){
            if($i==$c){
                $sql.="$key='$val' ";
            }else{
                $sql.="$key='$val' and ";
            }
            $i++;
        }      
        $res=mysqli_query($con,$sql);
       
    }
/**somethings wrong with upate */
    function updateData($con,$table,$condition_arr,$where_field,$where_value){
        if($condition_arr!=''){
            $sql="update $table set ";
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key=>$val){
                if($i==$c){
                    $sql.="$key='$val' ";
                }else{
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
            $sql.="where $where_field='$where_value' ";
            $res=mysqli_query($con,$sql);
        }
       
    }
    

}


?>