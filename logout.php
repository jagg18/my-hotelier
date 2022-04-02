<?php
	session_start();
    session_unset();
    session_destroy();
    header("Location: logoutSuccess.php");
    exit();
?>
</body>
	 

</html>