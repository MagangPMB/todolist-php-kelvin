<?php 
    if(isset($_POST['id'])){
        require '../db_conn.php';
    
        $id = $_POST['id'];

        if(empty($id)){
            echo 'error';
        }else{
            $latihan = $conn->prepare("SELECT id, status FROM latihan1 WHERE id=?");
            $latihan->execute([$id]);

            $todo = $latihan->fetch();
            $uid = $todo['id'];
            $status = $todo['status'];

            $uStatus = $status ? 0 : 1;

            $res = $conn->query("UPDATE latihan1 SET status=$uStatus WHERE id=$uid");

            if($res){
                echo $status;
            }else {
                echo "error";
            }

            $conn = null;
            exit();
        }
    }else {
        header("Location: ../index.php?mess=error");
    }