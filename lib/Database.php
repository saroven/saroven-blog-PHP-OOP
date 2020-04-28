<?php 
	class Database{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $db = DB_NAME;

		public $link;
		public $error;

		public function __construct()
		{
			$this->con();
		}

		private function con()
		{
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);
			if (!$this->link) {
				$this->error = "Conection not established".$this->link->connect_error;
				return false;
			}
		}
		// select or read data
		public function select($q)
		{
			$result = $this->link->query($q) or die($this->link->error.__line__);
			if ($result->num_rows > 0) {
				return $result;
			}
			else
			{
				return false;
			}
		}
		// insert data
		public function insert($q)
		{
			$result = $this->link->query($q) or die($this->link->error.__line__);
			if ($result) {
				header("location: index.php?msg=".urlencode('Data inserted successuly'));
				exit();
			} else {
				die("Error: ('.$this->errno.')").$this->link->error;
			}
		}
		// showing data in edit page
		public function show($q)
		{
			$result = $this->link->query($q) or die($this->link->error.__line__);
			if ($result) {
				return $result;
			} else {
				die("Error: ('.$this->errno.')").$this->link->error;
			}
		}
		// update data
		public function update($q)
		{
			$result = $this->link->query($q) or die($this->link->error.__line__);
			if ($result) {
				header("location: index.php?msg=".urlencode('Data Updated successuly'));
				exit();
			} else {
				die("Error: ('.$this->errno.')").$this->link->error;
			}
		}
		// Delete data
		public function delete($q)
		{
			$result = $this->link->query($q) or die($this->link->error.__line__);
			if ($result) {
				header("location: index.php?msg=".urlencode(' Deleted successuly'));
				exit();
			} else {
				die("Error: ('.$this->errno.')").$this->link->error;
			}
		}
	}
 ?>