<!DOCTYPE html>
<html lang="da">

<head>
	<meta charset="utf-8">
	<!-- Primary Meta Tags -->
<title>Rafle.dk - Underholdningsredskaber til motorikbesværede.</title>
<meta name="title" content="Rafle.dk - Underholdningsredskaber til motorikbesværede.">
<meta name="description" content="Bestil Rafle eller Penholder-sæt her">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.rafle.dk/Pages/Bestil_her.php">
<meta property="og:title" content="Rafle.dk - Underholdningsredskaber til motorikbesværede.">
<meta property="og:description" content="Bestil Rafle eller Penholder-sæt her">
<meta property="og:image" content="https://rafle.dk/Media/Rafle/imgRafle026-crop.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://www.rafle.dk/Pages/Bestil_her.php">
<meta property="twitter:title" content="Rafle.dk - Underholdningsredskaber til motorikbesværede.">
<meta property="twitter:description" content="Bestil Rafle eller Penholder-sæt her">
<meta property="twitter:image" content="https://rafle.dk/Media/Rafle/imgRafle026-crop.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/style_product.css">
    <link rel="stylesheet" href="../CSS/style_contact.css">
	<link rel="icon" type="image/x-icon" href="../Media/LOGO/Logo006_300x300.png"/>
    <script src="../Javascripts/javascripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header w3-include-html="../Include/Navbar.html"></header>
    <div class="main-parrent-border">
        
        <?php
// define variables and set to empty values
$nameErr = $emailErr = $tjekbox = "";
$name = $email = $adress = $tlf = $orderwhat = $comment = $okmess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Indtast venligst dit fulde navn.";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Indtast venligst din mail.";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Ugyldig email format";
    }
  }
    if (empty($_POST["tjekbox"])) {
        $tjekbox = "Tjek denne box for at sende os dine data.";
    } else {
        $tjekbox = "";
    }
    
  if (empty($_POST["adress"])) {
    $adress = "";
  } else {
    $adress = test_input($_POST["adress"]);
  }
     if (empty($_POST["tlf"])) {
    $tlf = "";
  } else {
    $tlf = test_input($_POST["tlf"]);
  }

     if (empty($_POST["orderwhat"])) {
    $orderwhat = "";
  } else {
    $orderwhat = test_input($_POST["orderwhat"]);
  }
    
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

    if (($nameErr == "") && ($emailErr == "") && ($tjekbox == "")) {
        $mailTo = "info@rafle.dk";
    $headers = "From: ".$email;
    $txt ="Der er ny mail fra: ".$name.".\n\n Comment: ".$comment.". \n\n tlf: ".$tlf.". \n adresse: ".$adress;
    
    mail($mailTo, $orderwhat, $txt, $headers);
    header("Location: Bestil_her.php?mailsend");
        $okmess = "Tak for din indsendelse. Hvis du ikke har modtaget nogen orderbekræftigelse inden for 24 timer, tjek da uønsket post.";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        
    <main class="main_order">

<h2>Udfyld formularen og bestil Produkter eller stil spørgsmål til Rafle.dk</h2>
        
<p>Du er velkommen til at stille spørgsmål eller komme med idéer til, hvordan vi måske kunne udvikle noget til dine behov. Vi forventer at svare indenfor 24 timer. Hvis du ikke ser en mail fra os, tjek da uønsket post.</p>
        <div class="okmess">
    <?php
        echo "<br><p class='okmessage'>" . $okmess . "</p>";
        ?>
    </div>
<p><span class="error">Udfyldning nødvendig *</span></p>
        <div class="center-megen">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <br>
<label for="name">Navn:</label>
    <span class="error">* <?php echo $nameErr;?></span>
    <br>
  <input type="text" name="name" id="name" placeholder="Dit fulde navn">
    <br>
  
  <label for="email">Din Email:</label>
    <span class="error">* <?php echo $emailErr;?></span>
    <br>
  <input type="text" id="email" name="email" placeholder="Email">
        <br>
  <label for="tlf">Telefonnummer:</label>
    <br>
  <input type="text" id="tlf" name="tlf" placeholder="Telefonnummer">
        <br>
  <label for="adress">Adresse, postnummer, by:</label>
    <br>
    <input type="text" name="adress" id="adress" placeholder="Adresse, postnummer, by">
        <br>
  <label for="orderwhat">Hvad vil du gerne bestille?</label>
    <br>
  <input type="text" name="orderwhat" id="orderwhat" placeholder="F.eks. 1 Rafle i rød og 1 Penholder-sæt">
        <br>
  <label for="comment">Har du spørgsmål eller kommentar?</label>
 <textarea name="comment" rows="5" cols="40" id="comment" placeholder="Skriv gerne kommentar eller spørgsmål her"></textarea>
    <br>
    <input type="checkbox" id="conferm" name="tjekbox" value="1" style="cursor: pointer;"> 
    <label for="conferm">Bekæft at du giver os lov til at beholde dine oplyninger.</label>
    <span class="error">* <?php echo $tjekbox;?> </span>
    <br><br>
  <input class="buttonorder" type="submit" name="submit" value="Bekræft din indsendelse her!">  
</form>
<br> 
     </div>

</main>
    </div>
    <div class="bottomSpacer"></div>
	<footer w3-include-html="../Include/Footer.html"></footer>

<script>
includeHTML();
</script>
</body>

</html>
