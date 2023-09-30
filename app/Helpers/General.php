<?php


    function get_cols_where_p($model=null, $columns_names = array(), $order_field="id",$order_type="DESC",$pagination_counter=2)
    {
        $data = $model::select($columns_names)->orderby($order_field, $order_type)->paginate($pagination_counter);
        return $data;
    }

/*get some cols for one row on table */
    function get_cols_where_row($model=null, $columns_names = array(), $where = array())
    {
    $data = $model::select($columns_names)->where($where)->first();
    return $data;
    }

    function insert($model=null, $arrayToInsert=array(),$returnData=false)
    {
        $flag = $model::create($arrayToInsert);
        if($returnData==true){

        $data=get_cols_where_row($model,array("*"),$arrayToInsert);
        return $data;

        }else{
            return $flag;
        }
    }

    function update($model=null,$data_to_update=array(),$where=array()){
        $flag=$model::where($where)->update($data_to_update);
        return $flag;
    }

    function destroy($model=null,$where=array()){
    $flag=$model::where($where)->delete();
    return $flag;
    }


function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
}
