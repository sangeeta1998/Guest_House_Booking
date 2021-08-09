<?php
require_once('conn/conn.php');

if(isset($_POST['submit_category'])){

    $room_type = $_POST['category'];

    $conn->query("INSERT INTO `roomtype` (`roomtype_desc`) VALUES ('$room_type')") or die($conn->error);
    echo '<script>alert("Data Has been updated Successfully")</script>';
    echo "<script>window.location.assign('room-data.php')</script>";

}


//Guest Submit

if(isset($_POST['submit_guest'])){

    $gname = $_POST['gname'];
    $gphone = $_POST['gphone'];
    $gemail = $_POST['gemail'];

    $conn->query("INSERT INTO `guest` (`gname`, `gphone`, `gemail`) VALUES ('$gname', '$gphone', '$gemail')") or die($conn->error);
    echo '<script>alert("Data Has been updated Successfully")</script>';
    echo "<script>window.location.assign('guest-entry.php')</script>";

}

//Rooms

if(isset($_POST['submit_room'])){

    $room_number = $_POST['room_number'];
    $room_type = $_POST['category'];
    $status = $_POST['status'];

    $conn->query("INSERT INTO `rooms` (`roomnumber`, `roomtypeid`, `status`) VALUES ('$room_number', '$room_type', '$status')") or die($conn->error);
    echo '<script>alert("Data Has been updated Successfully")</script>';
    echo "<script>window.location.assign('rooms.php')</script>";

}


if(isset($_POST['modal_submit'])){

    $guestID = $_POST['guestID'];

    $room_category = $_POST['category'];

    $dateFrom = $_POST['dateFrom'];

    $dateEnd = $_POST['dateEnd'];

    $rno = $_POST['roomNumber'];

    $conn->query("INSERT INTO `bookings` (`guestid`, `roomtypeid`, `from`, `to`, `rno`, `status`) VALUES ('$guestID', '$room_category', '$dateFrom', '$dateEnd', '$rno', '1')") or die($conn->error);
    
    $conn->query("UPDATE `rooms` SET status = 'booked' WHERE roomnumber = '$rno'") or die($conn->error);

    echo '<script>alert("Data Has been updated Successfully")</script>';
    echo "<script>window.location.assign('allguest.php')</script>";




}



if(isset($_GET['cancel_booking'])){

    $id = $_GET['cancel_booking'];

    $conn->query("UPDATE bookings SET status = '2' WHERE Bid = '$id'");

    echo '<script>alert("Bookings Has been Cancelled")</script>';
    echo "<script>window.location.assign('allguest.php')</script>";



}






?>