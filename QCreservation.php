<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "QC.html";
?>

<style>
    table{
        border: 1px solid black;
        margin-left: 5%;

    }
    .In-Res{
        margin-top: 5%;
        width: 50%;
    }
    td,th{
        border: 1px solid black;
        width: 10%;
    }
    .prog{
        margin-bottom: 2%;
        margin-left: 5%;
        font-size: 200%;
        font-weight: bolder;
        
    }
    .noC{
        margin-top: 10%;
        margin-left: 5%;
        font-size: 100%;
        font-weight: bolder;
    }
    .noE{
        margin-top: 3%;
        margin-left: 5%;
        font-size: 100%;
        font-weight: bolder;
    }
</style>
</head>

<body>
    <div class = "In-Res">
        <h2 class = "prog">In Progress</h2>
    <table>
        <tr>
            <th>Guest</th>
            <th>Room</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reserved by</th>
            <th>Payment Method</th>
        </tr>
        <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        </tr>
    </table>
    <h2 class = "noC">Number of canceled reservations: 0</h2>
    <h2 class = "noE">Number of edited reservations: 0</h2>
</div>
<div class = "In-Res">
        <h2 class = "prog">Done</h2>
    <table>
        <tr>
            <th>Guest</th>
            <th>Room</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reserved by</th>
            <th>Payment Method</th>
            <th>Ratings</th>
        </tr>
        <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        </tr>
    </table>

    

</div>

</body>
</html>

