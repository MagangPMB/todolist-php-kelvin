<?php 
    if(isset($_POST['id'])){
        require '../db_conn.php';
    
        $id = $_POST['id'];

        if(empty($id)){
            echo 'error';
        }else{
            $stmt = $conn->prepare("DELETE FROM latihan1 WHERE id=?");
            $res = $stmt->execute([$id]);

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