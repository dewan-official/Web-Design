<?php
	include 'baribhara.php';
	class main extends baribhara {
		
		protected function user_login() {
			$sql = "SELECT * FROM newpost";
			$result = $this->db_func()->query($sql);
			$numrows = $result->num_rows;
			if($numrows > 0) {
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}
		}
		protected function re_conn() {
			$conn = $this->db_func();
			return $conn;
		}
	}
?>