<?php

//handle input
function trimmingInput($name)
{
    return trim($_POST[$name] ?? '');
}
