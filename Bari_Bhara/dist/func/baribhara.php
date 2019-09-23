<?php
	class baribhara{
		private $db_host;
		private $db_username;
		private $db_pwd;
		private $db_name;
		protected function db_func() {
			$this->da_host = "localhost";
			$this->db_username = "root";
			$this->db_pwd = "";
			$this->db_name = "db_baribhara";
			$conn = new mysqli($this->da_host, $this->db_username, $this->db_pwd, $this->db_name);
			return $conn;
			mysqli_close($conn);
		}
	}
?>