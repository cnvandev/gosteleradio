<!doctype html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
  </style>

  <link rel="stylesheet" href="css/superslides.css">

  <script src="js/jquery-2.0.2.min.js"></script>
  <script src="js/jquery.superslides.min.js"></script>
  <script src="js/jquery.animate-enhanced.min.js"></script>

  <script>
    $(function(){
      $("#slides").superslides({
        play: 5000, // Milliseconds for delay
        slide_speed: 'normal',
        slide_easing: 'easeInOutCubic',
        pagination: false,
        scrollable: false, // Allow scrollable content inside slide
      });
      $("#slides").superslides("start");
    });
  </script>
</head>
<body>
  <div id="slides">
  <ul class="slides-container">
    <?php
    $directory = 'img';
    $images_directory = array_diff(scandir($directory), array('..', '.'));
    foreach($images_directory as $image) {
      ?><li>
        <img src="img/<?= $image ?>" alt="">
      </li><?php
    }
    ?>
  </ul>
</div>
</body>