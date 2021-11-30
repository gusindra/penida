<?php

function cloud_image_url($name, $type=null){
    // return 1;
    if($name!='' && $type!=null){
        $image = explode("/", $name);
        return "https://res.cloudinary.com/dionlinein/image/upload/q_auto/penidachoice/".end($image);
    }else{
        if($name==''){
            return false;
        }
        return $name; //"https://res.cloudinary.com/dionlinein/image/upload/v1638161642/penidachoice/ujuecif3vtoje1oewa5u.jpg";
    }
}
