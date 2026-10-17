<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");
$data = $conn->query("SELECT * FROM book_section WHERE id=1")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Section</title>
<style>
.hero{
    width:100%;
    height:300px;
    background:url('<?php echo $data['image']; ?>') center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
}
.hero a{
    font-size:50px;
    color:white;
    font-weight:bold;
    text-decoration:none;
    background:rgba(0,0,0,0.3);
    padding:10px 20px;
    border-radius:5px;
}
</style>
</head>
<body>

<div class="hero">
    <a href="<?php echo $data['link']; ?>"><?php echo $data['title']; ?></a>
</div>

</body>
</html>
