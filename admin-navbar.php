<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $file = $_FILES["image"]["name"];
    if($file!=""){
        $tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp, "uploads/".$file);
        $conn->query("UPDATE about_us SET title='$title', description='$description', image='$file' WHERE id=1");
    } else {
        $conn->query("UPDATE about_us SET title='$title', description='$description' WHERE id=1");
    }
}

$data = $conn->query("SELECT * FROM about_us WHERE id=1")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit About Page</title>
<style>
form{
    width:400px;
    margin:40px auto;
    background:#e9ddcc;
    padding:20px;
    border-radius:10px;
}
input, textarea{
    width:100%;
    padding:10px;
    margin-bottom:10px;
}
button{
    padding:10px 20px;
    background:#7c308e;
    color:white;
    border:none;
    cursor:pointer;
}
</style>
</head>
<body>

    <?php
     include 'admin-navbar.php';
    ?>


<form method="post" enctype="multipart/form-data">
    <h2>Edit About Page</h2>
    
    <input type="text" name="title" value="<?php echo $data['title']; ?>" required>

    <textarea name="description" rows="6" required><?php echo $data['description'];?></textarea>

    <label>Change Image:</label>
    <input type="file" name="image">

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
