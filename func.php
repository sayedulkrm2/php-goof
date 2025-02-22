<?php 
    require __DIR__.'/vendor/autoload.php';
	include("db.php");

    use League\CommonMark\CommonMarkConverter;

    $converter = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);

	if (isset($_GET['edid'])){

$id = intval($_GET['edid']);
$query = "SELECT * FROM task WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

$id = intval($_GET['edid']);
$query = "SELECT * FROM task WHERE id = $id";
	    $result = mysqli_query($conn, $query);

	    if(mysqli_num_rows($result) == 1){
	        $row = mysqli_fetch_array($result);
	        $title = $row['title'];

	        $_SESSION['message'] = 'Edit Task';
	        $_SESSION['message_type'] = 'info';
	    }
	}


?>