<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");

// Delete slider
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // Get image file name
    $img = $conn->query("SELECT image FROM sliders WHERE id=$id")->fetch_assoc()['image'];

    // Delete image file
    if(file_exists("uploads/$img")){
        unlink("uploads/$img");
    }

    // Remove record
    $conn->query("DELETE FROM sliders WHERE id=$id");

    header("Location: slider_admin.php"); // change filename if needed
    exit();
}

// Add slider
if(isset($_POST['save'])){
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tempname,"uploads/".$filename);

    $conn->query("INSERT INTO sliders (title,subtitle,button_text,button_link,image) 
    VALUES ('$title','$subtitle','$button_text','$button_link','$filename')");
}
?>
<!DOCTYPE html>
<html>
<head>
<style>

 body{
        background: #f5f5f0;
    }

form{
    width:400px; margin:auto; padding:37px; border:1px solid #ddd;
}
input,button{
    width:100%; padding:10px; margin:10px 0;
}
table{
    width:90%; margin:auto; margin-top:20px; border-collapse:collapse;
}
th,td{
    border:1px solid #ccc; padding:10px; text-align:center;
}
.delete-btn{
    background:red;
    color:white;
    padding:6px 10px;
    border:none;
    cursor:pointer;
}
</style>
</head>
<body>

<?php
     include 'admin-navbar.php';
    ?>

<h2 style="text-align:center;">Manage Slider</h2>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Slider Title" required>
    <input type="text" name="subtitle" placeholder="Subtitle" required>
    <input type="text" name="button_text" placeholder="Button Text" required>
    <input type="text" name="button_link" placeholder="Button Link (URL)" required>
    <input type="file" name="image" required>
    <button type="submit" name="save">Add Slider</button>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Image</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM sliders");
while($row = $result->fetch_assoc()){
?>
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['title'];?></td>
    <td><img src="uploads/<?php echo $row['image'];?>" width="100"></td>
    <td>
        <a href="?delete=<?php echo $row['id'];?>" onclick="return confirm('Delete this slide?');">
            <button class="delete-btn">Delete</button>
        </a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>