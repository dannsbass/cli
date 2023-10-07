<?php 
function odd($var){
    return $var & 1;
}
var_dump(odd(1)); //int(1)
var_dump(odd(2)); //int(0)
var_dump(odd(3)); //int(1)
var_dump(odd(4)); //int(0)
var_dump(odd(5)); //int(1)