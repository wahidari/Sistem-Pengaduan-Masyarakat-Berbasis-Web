<?php
# @Author: Wahid Ari <wahidari>
# @Date:   13 January 2018, 3:58
# @Copyright: (c) wahidari 2018

session_start();
unset($_SESSION['admin']); // unset admin session
header("Location: index");
?>
