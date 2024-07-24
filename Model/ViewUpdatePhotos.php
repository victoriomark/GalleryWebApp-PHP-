<?php$conn = mysqli_connect('sql108.infinityfree.com','if0_36676265','CzdXppFAt08jk','if0_36676265_galleryapp');if(!$conn){    die('<h1 class="text-danger">Connection Problem</h1>');}global $conn;if($_SERVER['REQUEST_METHOD'] === 'POST'){    $id = $_POST['ID'];    $Query = "SELECT * FROM pictures WHERE id =  ?";    $stmt = $conn->prepare($Query);    $stmt->bind_param('i',$id);    $stmt->execute();    $result = $stmt->get_result();    while ($row = $result->fetch_assoc()){        ?>        <div class="modal fade" tabindex="-1" id="Modal_ViewPhoto">            <div class="modal-dialog modal-sm">                <div class="modal-content">                    <div class="modal-header">                        <h5 id="Message_con_" class="modal-title text-dark">Update Picture</h5>                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                    </div>                    <div class="modal-body">                        <img class="card-img"  src="../Model/PictureUpload/<?= $row['image'] ?>" alt="image">                        <input class="form-control mt-3" type="file" id="UploadUpPictureSave">                        <div id="MessageError" class="invalid-feedback"></div>                    <div class="modal-footer">                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>                        <button style="background-color: #20c997" type="button" value="<?= $row['id'] ?>" id="Save_Btn" class="btn">Save</button>                    </div>                </div>            </div>        </div><?php    }}