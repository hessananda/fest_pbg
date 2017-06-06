<?php
  session_start();
  unset($_SESSION['user_id']);
  unset($_SESSION['user_password']);
  unset($_SESSION['user_type'])   ;
  unset($_SESSION['user_name'])   ;
  
  echo "<script>alert('Anda telah Log Out'); window.location = 'login.php'</script>";
?>