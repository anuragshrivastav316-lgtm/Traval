<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Load data for editing
$editData = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $editData = $conn->query("SELECT * FROM packages WHERE id=$id")->fetch_assoc();
}

// Add new package
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);

    $conn->query("INSERT INTO packages (title, description, image) VALUES('$title', '$description', '$image')");
    header("Location: manage-packages.php");
    exit();
}

// Update package
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if($_FILES['image']['name']){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);
        $updateQuery = "UPDATE packages SET title='$title', description='$description', image='$image' WHERE id=$id";
    } else {
        $updateQuery = "UPDATE packages SET title='$title', description='$description' WHERE id=$id";
    }

    $conn->query($updateQuery);
    header("Location: manage-packages.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $editData ? 'Edit Package' : 'Add Package'; ?></title>

<style>
body{
    font-family: Arial;
    background: #eadbc8;
    margin: 0;
}
.form-box{
    width: 450px;
    background: white;
    margin: 30px auto;
    padding: 20px;
    border-radius: 10px;
}
.form-box input, textarea{
    width: 100%;
    margin-bottom: 12px;
    padding: 10px;
}
.save-btn{
    width: 100%;
    padding: 10px;
    background: purple;
    color: white;
    border: none;
    font-size: 18px;
    cursor: pointer;
    margin-top: 10px;
}
.back-btn{
    text-align: center;
    display: block;
    margin-top: 15px;
    text-decoration: none;
    color: #000;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="form-box">
<h2><?php echo $editData ? 'Edit Package' : 'Add New Package'; ?></h2>

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $editData['id'] ?? ''; ?>">

    <input type="text" name="title" placeholder="Package Name" required value="<?php echo $editData['title'] ?? ''; ?>">

    <textarea name="description" placeholder="Description" required><?php echo $editData['description'] ?? ''; ?></textarea>

    <input type="file" name="image">

    <button type="submit" class="save-btn" name="<?php echo $editData ? 'update' : 'add'; ?>">
        <?php echo $editData ? 'Update Package' : 'Add Package'; ?>
    </button>
</form>

<a href="manage-packages.php" class="back-btn">Back to Packages</a>
</div>

</body>
</html>