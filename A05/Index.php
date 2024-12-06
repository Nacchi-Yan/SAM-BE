<?php
  include ("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Personality Island</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('bg4.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}

.w3-button {
  width: 120px;
  text-align: center;
}

.imgDb {
  width: 100%;
}
</style>
</head>
<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-topleft w3-container w3-xlarge">
    <p><button onclick="document.getElementById('gaming').style.display='block'" class="w3-button w3-black">Gaming</button></p>
    <p><button onclick="document.getElementById('music').style.display='block'" class="w3-button w3-black">Music</button></p>
    <p><button onclick="document.getElementById('sibling').style.display='block'" class="w3-button w3-black">Sibling</button></p>
    <p><button onclick="document.getElementById('musical').style.display='block'" class="w3-button w3-black">Theater</button></p>
  </div>
</div>

<!-- Gaming Modal -->
<div id="gaming" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('gaming').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Gaming</h1>
    </div>
    <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 1";
        $gamingContent = executeQuery($getQuery);

        while ($row = mysqli_fetch_array($gamingContent)) {
    ?>
    <div class="w3-container" style="padding:0px;">
      <img src="<?php echo $row["image"]; ?>" class="imgDb">
    </div>
    <div class="w3-container w3-black w3-display-container">
      <h5><b><?php echo $row['content']; ?></b></h5>
    </div>
    <?php } ?>
  </div>
</div>

<!-- Music Modal -->
<div id="music" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('music').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Music</h1>
    </div>
    <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 2";
        $musicContent = executeQuery($getQuery);

        while ($row = mysqli_fetch_array($musicContent)) {
    ?>
    <div class="w3-container" style="padding:0px;">
      <img src="<?php echo $row["image"]; ?>" class="imgDb">
    </div>
    <div class="w3-container w3-black w3-display-container">
      <h5><b><?php echo $row['content']; ?></b></h5>
    </div>
    <?php } ?>
  </div>
</div>

<!-- Sibling Modal -->
<div id="sibling" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('sibling').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Sibling</h1>
    </div>
    <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 3";
        $siblingContent = executeQuery($getQuery);

        while ($row = mysqli_fetch_array($siblingContent)) {
    ?>
    <div class="w3-container" style="padding:0px;">
      <img src="<?php echo $row["image"]; ?>" class="imgDb">
    </div>
    <div class="w3-container w3-black w3-display-container">
      <h5><b><?php echo $row['content']; ?></b></h5>
    </div>
    <?php } ?>
  </div>
</div>

<!-- Musical Modal -->
<div id="musical" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('musical').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Theater</h1>
    </div>
    <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 4";
        $musicalContent = executeQuery($getQuery);

        while ($row = mysqli_fetch_array($musicalContent)) {
    ?>
    <div class="w3-container" style="padding:0px;">
      <img src="<?php echo $row["image"]; ?>" class="imgDb">
    </div>
    <div class="w3-container w3-black w3-display-container">
      <h5><b><?php echo $row['content']; ?></b></h5>
    </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
