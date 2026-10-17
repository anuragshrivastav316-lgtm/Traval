<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Services</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    margin:0;
    background: #eadbc8;
    font-family:Arial, sans-serif;
}

/* Heading */
h1{
    text-align:center;
    font-size:50px;
    margin-top:20px;
}

/* Service Box Section */
.service-container{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(180px, 1fr));
    max-width:1200px;
    margin:40px auto;
    gap:20px;
    padding:0 20px;
}

.service-card{
    background: #d9aaff;
    text-align:center;
    padding:25px;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}

.service-card:hover{
    background: #b97aff;
    transform:scale(1.05);
}

.service-card i{
    font-size:50px;
    color:#222;
}

.service-card h3{
    margin-top:15px;
    font-size:20px;
}

/* About Section */
.about-section{
    max-width:1200px;
    margin:40px auto;
    display:flex;
    background: #d8d2c2;
    border-radius:10px;
    overflow:hidden;
    flex-wrap:wrap;
}

.about-section img{
    width:50%;
    min-width:300px;
    object-fit:cover;
}

.about-content{
    padding:30px;
    flex:1;
}

.about-content h2{
    font-size:35px;
    margin-bottom:10px;
}

.about-content p{
    line-height:1.6;
    color: #333;
}

.read-btn{
    display:inline-block;
    margin-top:20px;
    background: #8a2be2;
    padding:12px 20px;
    color:white;
    text-decoration:none;
    border-radius:5px;
    font-size:18px;
}

.read-btn:hover{
    background:#6a1bb5;
}
</style>
</head>
<body>

<h1>OUT SERVICES</h1>

<div class="service-container">
    <div class="service-card">
        <i class="fa-solid fa-person-hiking"></i>
        <h3>Adventure</h3>
    </div>
    
    <div class="service-card">
        <i class="fa-solid fa-map-location-dot"></i>
        <h3>Tour Guide</h3>
    </div>
    <div class="service-card">
        <i class="fa-solid fa-fire"></i>
        <h3>Camp Fire</h3>
    </div>

    <div class="service-card">
        <i class="fa-solid fa-location-arrow"></i>
        <h3>Off Road</h3>
    </div>

    <div class="service-card">
        <i class="fa-solid fa-campground"></i>
        <h3>Camping</h3>
    </div>
</div>

<!-- <div class="about-section">
    <img src="image/back_4.jpg" alt="Image">
    
    <div class="about-content">
        <h2>About Us</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, ducimus.
            Sit neque dolores impedit cupiditate ipsa dolore odit nam beatae non tempore.
            Autem libero sed expedita, ea rerum consectetur sint quia illo? omnis.
        </p>
        <a href="#" class="read-btn">Read More</a>
    </div>
</div> -->

     
 <?php
     include 'about.php';
    ?>


</body>
</html>