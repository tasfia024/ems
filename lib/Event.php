<?php
	
	include_once 'config/Session.php';
	include 'config/Database.php';

	class Event {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function eventStore ($data) {

            $event_name = $data['event_name'];
            $description = $data['description'];
            $location = $data['location'];
            $date = $data['date'];
            $time = $data['time'];
            $total_participant = $data['total_participant'];
            $imageFile = $_FILES['image'];

            $result = $this->uploadFile($imageFile);
            if (isset($result['success']) && !$result['success']) {
                return $result['message'];
            }

            $file_name = $result;

            $sql = "INSERT INTO events (event_name, image, date, time, location, description, total_participant) 
            VALUES('".$event_name."', '".$file_name."', '".$date."', '".$time."', '".$location."', '".$description."', '".$total_participant."')";
            $query = $this->db->insert($sql);

            if ($query) {
                $msg = '<div class="alert alert-success"><strong>Success!</strong> Thank you! your form have been submitted successfully</div>';
                return $msg;
            } else{
                $msg = '<div class="alert alert-success"><strong> Sorry!</strong> There has been problem inserting your details!</div>';
                return $msg;
            }

        }


        public function eventUpdate ($id, $data) {
            $findData = $this->getEventDataById($id)->fetch_object();
            
            $event_name = $data['event_name'];
            $description = $data['description'];
            $location = $data['location'];
            $date = $data['date'];
            $time = $data['time'];
            $total_participant = $data['total_participant'];

            $imageFile = $_FILES['image'];
            if ($imageFile['size']) {
                $result = $this->uploadFile($imageFile);
                if (isset($result['success']) && !$result['success']) {
                    return $result['message'];
                }

                $file_name = $result;
            } else {
                $file_name = $findData->image;
            }

            $query = "UPDATE events
	               	SET 
	               	event_name  = '$event_name', 
	               	image 	    = '$file_name', 
	               	date        = '$date', 
	               	time 	    = '$time', 
	               	location 	= '$location', 
	               	total_participant 	= '$total_participant', 
	               	description 		= '$description'
	               	WHERE id     = '$id'";

	            $updated_rows = $this->db->update($query);
	            if ($updated_rows) {
                    $msg = '<div class="alert alert-success"><strong>Success!</strong> Data updated successfully</div>';
					return $msg;
	            }else {
	                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Something went wrong.</div>';
					return $msg;
	            }
        }


        public function uploadFile ($file) {
            $imageFileType = strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
            $file_name = strtotime("now").'-'.uniqid().'-'.rand(0,999999).'.' . $imageFileType;
            $target_file = 'uploads/' . $file_name;

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> only JPG, JPEG, PNG & GIF files are allowed.!</div>';
                $dataReturn['message'] = $msg;
                $dataReturn['success'] = false;

                return $dataReturn;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> file already exists.!</div>';
                $dataReturn['message'] = $msg;
                $dataReturn['success'] = false;

                return $dataReturn;
            }

            // Check file size
            if ($file["size"] > 5000000) {
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> your file is too large!</div>';
                $dataReturn['message'] = $msg;
                $dataReturn['success'] = false;

                return $dataReturn;
            }

            // Check if $uploadOk is set to 0 by an error
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $file_name;
            } else {
                $dataReturn['message'] = '<div class="alert alert-danger"><strong> Sorry!</strong> there was an error uploading your file!</div>';
                $dataReturn['success'] = false;

                return $dataReturn;
            }
        }



        // Get Events data
        public function getEventsData () {
            $sql = "SELECT * FROM events";
            $result = $this->db->select($sql);
            return $result;
        }

        // Get Event Data by Id
        public function getEventDataById ($id) {
            $sql = "SELECT * FROM events WHERE id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        // Delete event by id
        public function deleteEventById ($id) {
            $query = "DELETE from events where id = '$id'";
            $delcat = $this->db->delete($query);

            if($delcat != false){
                $msg = '<div class="alert alert-success"><strong> Congratulations!</strong> event deleted successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> event not deleted!</div>';
                return $msg;
            }
        }


	}
?>