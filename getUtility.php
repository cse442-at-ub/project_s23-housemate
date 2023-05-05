<?php

function getHousing($conn,$housingId) {
    $sql = "SELECT * FROM utility WHERE housingId=$housingId";
    $result = $conn->query($sql);
    
    
    while ($row = $result->fetch_assoc()) {

        ;

        ;

    }
}

?>