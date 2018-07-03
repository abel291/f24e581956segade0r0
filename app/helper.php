<?php 
public function upload_img($files,$title)
    {
                  
        $img=\Image::make($files)->stream('jpg');                
        $filename='segadeoro/img/'.uniqid(5)."_".str_slug($title).'.jpg';     
        //$filename='segadeoro/img/segadeoro_dd.jpg';    
        Storage::put($filename,$img->__toString(),'public');                           
        return Storage::url($filename);   
        
    }
 ?>