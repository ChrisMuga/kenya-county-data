<?php
class RequestData{
    Public function RequestConstituencies($county_code,$url){
        $data= json_decode(file_get_contents($url."/constituency/".$county_code));
        $response=array();
        foreach($data as $element){
            $constituencies=(array)$element;
            $constituency_ids=(array_keys($constituencies));
            foreach($constituency_ids as $constituency_id){
                $constituency_name=$constituencies[$constituency_id];
                $wards=$this->RequestWards($constituency_id,$url);
            }
        }   
    }
    public function RequestWards($constituency_code,$url){
        $data= json_decode(file_get_contents($url."/constituency/".$county_code));
        $response=array();
        foreach($data as $element){
            $constituencies=(array)$element;
            $constituency_ids=(array_keys($constituencies));
            foreach($constituency_ids as $constituency_id){
                $constituency_name=$constituencies[$constituency_id];
                $wards=$this->RequestWards($constituency_id,$url);
            }
        }
    }
}
?>