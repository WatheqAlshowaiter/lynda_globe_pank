<?php 

// set the cookie
setcookie(
    'name', 
    'value',
    time() + 60*60*24*365,
     "/", // Domain
    true, // available over a secure connection only.
    true // available over HTTP protocol only. JavaScript won't be able to access the cookie.
);

// Delete the cookie
// We should write all the parameters of the cookie to delete it
setcookie(
    'name', 
    'value', 
    time() - 3600,
    "/", 
    true,
    true
);


// optional parameter
