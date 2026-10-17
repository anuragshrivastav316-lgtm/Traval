<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");
$about = $conn->query("SELECT * FROM about_us LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>About Us</title>
<style>
body {
    margin:0;
    font-family:Arial;
    background:#e9ddcc;
}

.container {
    display:flex;
    align-items:center;
    gap:20px;
    padding:40px;
}

.container img{
    width:50%;
    height:350px;
    object-fit:cover;
    border-radius:10px;
}

.content {
    background:#dfd5c3;
    padding:30px;
    border-radius:10px;
    width:50%;
}

button{
    padding:10px 20px;
    background:#7c308e;
    color:white;
    border:none;
    cursor:pointer;
    margin-top:10px;
}
</style>
</head>

<body>

<div class="container">
    <img src="uploads/<?php echo $about['image'];?>" >
    <div class="content">
        <h2><?php echo $about['title']; ?></h2>
        <p><?php echo $about['description']; ?></p>
        <button>Read More</button>
    </div>
</div>

</body>
</html>