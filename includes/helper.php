<?php

//handle input
function sanitizeInput($name)
{
    trim($_POST[$name] ?? '');
}
