<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets4.lottiefiles.com/packages/lf20_xjPvZu.json"  background="transparent"  speed="1"  style="width: 90px; height: 50px;"  loop  autoplay></lottie-player>
<a href="home.php" class="logo" style="margin-left:-70px;">AR Tube.</a>
      <form action="search.php" method="POST" class="search-form">
         <input type="text" name="search_box" class="box" maxlength="100" placeholder="search for blogs" required>
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fa-solid fa-circle-user"></div>
      </div>

      <nav class="navbar">
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="posts.php"> <i class="fas fa-angle-right"></i> posts</a>
         <a href="all_category.php"> <i class="fas fa-angle-right"></i> category</a>
         <a href="authors.php"> <i class="fas fa-angle-right"></i> authors</a>
         <a href="/project/courses.php"> <i class="fas fa-angle-right"></i>Content videos</a>
         <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
         <a href="register.php"> <i class="fas fa-angle-right"></i> register</a>
      </nav>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <a href="update.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div> 
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="option-btn">login</a>
         <?php
            }
         ?>
      </div>

   </section>

</header>