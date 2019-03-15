<?php
/**
 * Created by PhpStorm.
 * User: Rizwan Shah
 * Date: 3/11/2019
 * Time: 7:43 AM
 */

namespace App;


class helpers
{
    function makeStringtoSlug($string){
        if(is_string($string)){
            return str_replace(' ','_',$string);
        }else{
            return false;
        }
    }

}
