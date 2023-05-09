<?php
  include "message2.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>روبوت رشد</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="title">رُشْد</div>
      <div class="form">
        <div class="bot-inbox inbox">
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <div class="msg-header">
              <form action="#" method="post">
              <p>حيّاك الله , كيف اقدر اخدمك ؟</p>
              <button class="gee1-btn" type="submit" name="archef">كُتيب الإرشاد الاكاديمي</button>
              <button class="gee2-btn">عرض المقررات</button>
              <button class="gee3-btn">عرض المقررات المتاحة</button>
            </form>
            </div>
        </div>
            <?php
                if(isset($_POST['archef'])){
                    $select_rule = $conn->prepare("SELECT * FROM `rule`");
                    $select_rule->execute();
                    if($select_rule->rowCount() > 0){
                        while($row = $select_rule->fetch(PDO::FETCH_ASSOC)){
                          ?>
                            <div class="topic">
                                <form action="#" method="post">
                                    <input type="hidden" value="<?= $row['id']; ?>" name="id">
                                    <button type="submit" class="id-topic"><?= $row['id']; ?> - <?= $row['topic']; ?></button>
                                </form>
                            </div>
                          <?php
                        }
                    }
                }

                if(isset($_GET['topic'])){
                  $topic = $_GET['topic'];
                  $query = $conn->prepare("SELECT * FROM `rule` WHERE id = '$topic'");
                  $query->execute();
                  if($query->rowCount() > 0){
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                      ?>
                          <h4 class="body"><?= $row['body']?></h4>
                      <?php
                      }
                  }else{
                    echo "error message!";
                  }
                }
             
            ?>
      </div>
      <div class="typing-field">
            <form action="" method="GET" class="input-data">
              <input id="data" name="topic" type="text" placeholder="...آمرني" required>
              <button id="send-btn" type="submit">ارسل</button>
            </form>
      </div>
    </div>
  </body>
</html>
