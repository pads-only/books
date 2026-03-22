<?php

//handle input
function trimmingInput($name)
{
    return trim($_POST[$name] ?? '');
}


//check for empty inputs
function isEmpty($inputs)
{
    foreach ($inputs as $value) {
        if ($value === '') {
            return false;
        }
    }
    return true;
}
