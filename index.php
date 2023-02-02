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
            <?php while($todo = $latihan->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span href="app/delete.php" id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                          <?php if($todo['status']){ ?> 
                            <input type="checkbox"
                            class="check-box"
                            data-todo-id ="<?php echo $todo['id']; ?>"
                            checked />
                            <h2 class="checked"><?php echo $todo['kegiatan'] ?></h2>
                            <?php }else { ?>
                                <input type="checkbox"
                                data-todo-id ="<?php echo $todo['id']; ?>"
                                class="check-box" />
                                <h2><?php echo $todo['kegiatan'] ?></h2>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>

        <script>
            $(document).ready(function(){
                $('.remove-to-do').click(function(){
                    const id = $(this).attr('id');

                    $.post("app/delete.php",
                    {
                        id : id
                    },
                    (data) => {
                        // alert(data);
                        if(data){
                            $(this).parent().hide(600);
                        }
                    }
                );    
                });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');

                $.post('app/centang.php',
                {
                    id : id
                },
                (data) => {
                    if(data != 'error'){
                        const h2 =$(this).next();
                        if(data === '1'){
                            h2.removeClass('checked');
                        }else{
                            h2.addClass('checked');
                        }

                    }
                }
                );
            });
        });
        

       </script>
</body>
</html>