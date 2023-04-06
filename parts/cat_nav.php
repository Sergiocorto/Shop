<div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link " href = "/">Все</a>
        <?php
            //Выводим каегори товаров
            $sql = "SELECT * FROM categories";
            
            $result = $connect->query($sql);
            while( $row = mysqli_fetch_assoc($result)){
        ?>
        <a class="nav-link <?php if( $cat == $row["id"]) {echo "active";} ?>" href = "/?category_id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a>

        <?php
            }
        ?>  
    </div>
</div>