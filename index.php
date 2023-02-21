<?php
require 'db_conn.php';
// require 'app/create.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="app/create.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){?>
                <input type = "text"
                    style= "border-color: #ff6666"
                    name="kegiatan" 
                    placeholder="This is required" />
                <button type="submit">ADD &nbsp; <span>&#43;</span>
                </button>
                <?php }else{?>
                    <input 
                    type = "text"
                    name="kegiatan" 
                    placeholder="This is required" />
                <button type="submit">ADD &nbsp; <span>&#43;</span>
                </button>
                <?php } ?>
            </form>
        </div>
        <?php
            $latihan = $conn->query('SELECT * FROM latihan1 ORDER BY id DESC ');
        ?>
        <div class="show-todo-section">            
            <?php while($kegiatan = $latihan->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <td class="contact-delete">
                        <form action='app/delete.php?id="<?php echo $kegiatan['id']; ?>"' method="post">
                            <input type="hidden" name="id" value="<?php echo $kegiatan['id']; ?>">
                            <input type="submit" name="submit" value="Delete" >
                            <input type="submit" name="submit" value="Selesai">
                        </form>
                    </td>
                          <?php if($kegiatan['status']){ ?> 
                            <h2 class="checked"><?php echo $kegiatan['kegiatan'] ?></h2>
                            <?php }else { ?>
                                <h2><?php echo $kegiatan['kegiatan'] ?></h2>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        </div>
</body>
</html>