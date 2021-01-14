<?php
class RequestData{
    Public function RequestConstituencies($county_code,$url){
        $data= json_decode(file_get_contents($url."/constituency/".$county_code));        
        foreach($data as $element){
            $consituency_list=array();
            $constituencies=(array)$element;
            $constituency_ids=(array_keys($constituencies));
            foreach($constituency_ids as $constituency_id){
                $constituency_data=array();
                $constituency_name=$constituencies[$constituency_id];               
                $wards=$this->RequestWards($constituency_id,$url);
                $constituency_data['name']=$constituency_name;
                $constituency_data['id']=$constituency_id;
                $constituency_data['wards']=$wards;
                $consituency_list[]=$constituency_data;
            }            
        }
       return $consituency_list;
    }
    public function RequestWards($constituency_code,$url){
        $data= (array)json_decode(file_get_contents($url."/wards/".$constituency_code));
        foreach($data as $element){
            $ward_list=array();
            $wards=(array)$element;
            $ward_ids=(array_keys($wards));
            foreach($ward_ids as $ward_id){
                $ward_data=array();
                $ward_name=$wards[$ward_id];              
                $ward_data['name']=$ward_name;
                $ward_data['id']=$ward_id;
                $ward_list[]=$ward_data;
            }            
        }
       return $ward_list;
    }
}
?>