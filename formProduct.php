<?php
$result=category::select(["id","title", "description"])->get();
?>
<!DOCTYPE html>
<html>
    <head>  
        </head>
        <body>
            <form action='getProduct' method='post' style = "margin-left:250px;">
                <input type='text'   name ='name'>
                <input type='number' name = 'price'>
                <input type='text'   name = 'description'>
            <select name='category'>
                    <?php   
             for($i=0; $i<$result->num_rows; $i++){
                $category=$result->fetch_assoc();
                ?>
                <option value="<?php echo $category ['id']?>">
                    <?php echo $category['title'];?>
                </option>
            <?php
            }
            ?>
            </select>
            <button>ارسال</button>
            </form>
    </body>
    </html>
