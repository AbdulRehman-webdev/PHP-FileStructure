<?php
session_start();
if(session_destroy()){
// redirect
header("Location: login");

}
?>