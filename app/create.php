<?php 
    if(isset($_POST['kegiatan'])){
        require '../db_conn.php';
    
        $kegiatan = $_POST['kegiatan'];

        if(empty($kegiatan)){
            header("Location: ../index.php?mess=error");
        }else{
            $stmt = $conn->prepare("INSERT INTO latihan1(kegiatan) VALUE(?)");
            $res = $stmt->execute([$kegiatan]);

            if($res){
            header("Location: ../index.php?mess=success");
            }else {
            header("Location: ../index.php");
            }
            $conn = null;
            exit();
        }
    }else {
        header("Location: ../index.php?mess=error");
    }