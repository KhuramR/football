<?php
session_start();
unset($_SESSION['user_session']);
unset($_SESSION['role']);
unset($_SESSION['user_id']);
echo"<script>window.open('../login','_self');</script>";
?>