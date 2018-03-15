<?php
$error = false;
$md5 = false;
$code = "";
if ( isset($_GET['code']) ) {
    $code = $_GET['code'];
    if ( strlen($code) !=4 ) {
        $error = "Input must be exactly 4 digits PIN";
    } else if ( $code[0] < "0" || $code[0] > "9" || 
                $code[1] < "0" || $code[1] > "9" 
				|| $code[2] <"0" || $code[2] > "9" || 
                $code[3] < "0" || $code[3] > "9") {
        $error = "Input must contains digits";
    } else {
        $md5 = hash('md5', $code);
    }
}
?>
<!DOCTYPE html>
<head><title>Charles Severance PIN Code</title></head>
<body>
<h1>MD5 PIN Maker</h1>
<?php
if ( $error !== false ) {
    print '<p style="color:red">';
    print htmlentities($error);
    print "</p>\n";
}
if ( $md5 !== false ) {
    print "<p>MD5 value: ".htmlentities($md5)."</p>";
}
?>
<p>Please enter 4 digit PIN.</p>
<form>
<input type="number" name="code" value="<?= htmlentities($code) ?>"/>
<input type="submit" value="Compute MD5 for CODE"/>
</form>
<p><a href="makecode.php">Reset</a></p>
<p><a href="index.php">Back to Cracking</a></p>
</body>
</html>