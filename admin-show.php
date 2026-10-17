<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");
$data = $conn->query("SELECT * FROM book_section WHERE id=1")->fetch_assoc();

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $link = $_POST['link'];

    $file = $_FILES['image']['name'];
    
    if($file != ""){
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"uploads/".$file);
        $conn->query("UPDATE book_section SET title='$title', link='$link', image='uploads/$file' WHERE id=1");
    } else {
        $conn->query("UPDATE book_section SET title='$title', link='$link' WHERE id=1");
    }

    echo "<script>alert('Updated');window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Update</title>
<style>
form{
    width:400px;
    margin:30px auto;
    padding:20px;
    border:1px solid #ccc;
    border-radius:8px;
}
input,button{
    width:100%;
    padding:10px;
    margin-top:10px;
}
img{
    width:100%;
    margin-top:10px;
}
</style>
</head>
<body>

 <?php
     include 'admin-navbar.php';
    ?>

<form method="POST" enctype="multipart/form-data">
    <h2>Update Booking Banner</h2>

    <label>Title</label>
    <input type="text" name="title" value="<?php echo $data['title']; ?>">

    <label>Button Link</label>
    <input type="text" name="link" value="<?php echo $data['link']; ?>">

    <label>Image</label>
    <input type="file" name="image">

    <img src="<?php echo $data['image']; ?>">

    <button type="submit" name="update">Save Changes</button>
</form>

</body>
</html>