<?php

    use Carbon\Carbon;

    if(!function_exists("convert")){
        function convert($date){
            return Carbon::parse($date)->format('d.m.Y. H:i');
        }
    }
?>