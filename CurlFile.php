<?php

class Download{

    //clean url
    
    const URL_MAX_LENGTH= 2050);

    protected function cleanURL($url){
        if(isset($url)){
            if(!empty($url)){
                if(strlen($url) < self::URL_MAX_LENGTH){
                    return strip_tags($url);
                }
            }
        }
    }


    //is url

    protected function isURL($url){
        $url = $this->cleanURL($url);
        if(isset($url)){
            if(filter_var($url , FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED)){
                return $url;
            }
        }
    }

    //return exension
    protected function returnExtension($url){
        if($this->isURL($url)){
            $end = end(preg_split("/[.]+/",$url));
            if(isset($end)){
                return $end;
            }
        }
    }

    //download file

    public function downloadFile($url){
        if($this->isURL($url)){
            $extension = $this->returnExtension($url);
            if($extension){

                $ch = curl_init();
                curl_setopt($ch , CURLOPT_URL, $url);
                curl_setopt($ch , CURLOPT_RETURNTRANSFER, true); //dont return to browser
                $return = curl_exec($ch);
                curl_close($ch);
                
                $destination = "file.$extension";
                $file = fopen($destination , 'w+');//read and write
                fputs($file, $return);
                if(fclose($file)){
                    echo "File Downloaded";
                }

            }
        }
    }

}
