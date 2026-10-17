
<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");

$slider = $conn->query("SELECT * FROM sliders ORDER BY id DESC LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<style>
.slider{
    position:relative;
    width:100%;
    height:80vh;
    background:url('uploads/<?php echo $slider['image'];?>') center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
    text-align:center;
}
.slider h1{
    font-size:60px;
    margin:10px 0;
}
.slider p{
    font-size:20px;
}
.slider button{
    padding:12px 25px;
    background:purple;
    border:none;
    color:white;
    cursor:pointer;
    margin-top:20px;
}
</style>
</head>
<body>

<div class="slider">
    <div>
        <p><?php echo $slider['subtitle'];?></p>
        <h1><?php echo $slider['title'];?></h1>
        <a href="<?php echo $slider['button_link'];?>">
         <button><?php echo $slider['button_text'];?></button>
        </a>
    </div>
</div>

</body>
</html>