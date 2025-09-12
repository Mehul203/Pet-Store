<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="container">
  <?php 
    $files = array();
    $products = $conn->query("SELECT * FROM `products` order by rand() ");
    while($row = $products->fetch_assoc()){
      if(!is_dir(base_app.'uploads/product_'.$row['id']))
      continue;
      $fopen = scandir(base_app.'uploads/product_'.$row['id']);
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/product_'.$row['id'].'/'.$fname);
      }
    }
  ?>
 