<?php
class RequestData{
    Public function RequestConstituencies($county_code,$url){
        $data= json_decode(file_get_contents($url."/constituency/".$county_code));
        foreach($data as $constituency){
            print_r($constituency);
            exit(0);
        }
    }
    public function RequestWards($constituency_code){

    }
}
?>