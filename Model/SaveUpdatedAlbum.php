<?phpinclude '../Database/Connect.php';global $conn;if($_SERVER['REQUEST_METHOD'] === 'POST'){    $id = $_POST['Id'];    $Title = mysqli_real_escape_string($conn,$_POST['Title']);    // check if the input file is not empty(if true make a query with image   if(!empty( $_FILES['Image']['name'])){       // if the condition is true then make update the image       $image_dir = './uploadAlbum/';       $FilePath = $_FILES['Image']['tmp_name'];       $fileName = $_FILES['Image']['name'];       $Destination = $image_dir . $fileName;       move_uploaded_file($FilePath,$Destination);       $imageName = htmlspecialchars(basename($_FILES['Image']['name']));       //make a query       $Query = "UPDATE album SET Image = ? ,Title = ? WHERE Id = ?";       $stmt = $conn->prepare($Query);       $stmt->bind_param('ssi',$imageName,$Title,$id);       if($stmt->execute()){           echo "Please Wait...";       }else{           echo "Error" . mysqli_error($conn);       }       $stmt->close();   }else{       // else you update the title only then make  query without the image update       $Query = "UPDATE album SET Title = ? WHERE Id = ?";       $stmt = $conn->prepare($Query);       $stmt->bind_param('si',$Title,$id);       if($stmt->execute()){           echo "Please Wait...";       }else{           echo "Error" . mysqli_error($conn);       }   }}$conn->close();