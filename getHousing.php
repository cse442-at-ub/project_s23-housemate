<?php

function getHousing($conn,$housingName) {
    $sql = "SELECT * FROM housing WHERE housingName='$housingName'";
    $result = $conn->query($sql);
    
    
    while ($row = $result->fetch_assoc()) {

        echo "<div class='housing_title'>
            <h1>'".$row['housingName']."'</h1>
            <a href='".$row['link']."'>Learn more</a>
            <a href='".$row['Price']."'>Price Details</a>
        </div>";

        echo "<!-- Slideshow container -->
        <div class='slideshow-container fade'>

        <!-- Full images with numbers and message Info -->
        <div class='Containers'>
            <div class='MessageInfo'>1 / 3</div>
            <img src='data:image;base64,".base64_encode($row['img1'])."' style='width:100%'>
        </div>

        <div class='Containers'>
            <div class='MessageInfo'>2 / 3</div>
            <img src='data:image;base64,".base64_encode($row['img2'])."' style='width:100%'>
        </div>

        <div class='Containers'>
            <div class='MessageInfo'>3 / 3</div>
            <img src='data:image;base64,".base64_encode($row['img3'])."' style='width:100%'>
        </div>

        <!-- Back and forward buttons -->
        <a class='Back' onclick='plusSlides(-1)'>&#10094;</a>
        <a class='forward' onclick='plusSlides(1)'>&#10095;</a>
        </div>
        <br>

        <!-- The circles/dots -->
        <div style='text-align:center'>
        <span class='dots' onclick='currentSlide(1)'></span>
        <span class='dots' onclick='currentSlide(2)'></span>
        <span class='dots' onclick='currentSlide(3)'></span>
        </div>";

    }
}

?>