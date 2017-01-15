<?php
	function sanitiseInput($input) {
		$rinput = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
		$rinput = stripslashes($rinput);
		return $rinput;
	}

	function sanitiseQuery($con, $query) {
		$rquery = mysqli_real_escape_string($con,$query);
		return $rquery;
	}
?>