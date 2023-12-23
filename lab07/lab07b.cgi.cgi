#!/usr/bin/perl
use CGI ':standard';
print "Content-type: text/html\n\n";

$first = param('first-name');
$last = param('last-name');
$street = param('street');
$city = param('city');
$postalCode = param('postal-code');
$province = param('province');
$phoneNumber = param('phone');
$email = param('email');

$isValid = 1;
$submitMsg = '<h3>Oopsie! You make a mistake with your information:</h3>';

unless ($phoneNumber =~ /^\d{10}$/) {
    $isValid = 0;
    $submitMsg .= '<h3>Invalid phone number.</h3>';
}
    
unless ($postalCode =~ /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/) {
    $isValid = 0;
    $submitMsg .= "<h3>Invalid postal code.</h3>";
}

unless ($email =~ /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/) {
    $isValid = 0;
    $submitMsg .= "<h3>Invalid email.</h3>"
}

if ($isValid) {
  $submitMsg = "<p>Thanks, $first $last!</p>";
  $submitMsg .= "<p>I'll send your invite to $street, $city, $province, $postalCode</p>";
  $submitMsg .= "<p>You'll get e-invite to $email.</p>";
  $submitMsg .= "<p>I'll text you later at $phoneNumber!</p>";
  $submitMsg .= "<p>See you soon :)))</p>";
}

print <<HTML;
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab07b - Registration Result</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      font-family: Helvetica, sans-serif;
      background-color: #f4f4f4;
    }

    .result {
      max-width: 600px;
      background-color: #fffff;
      padding: 20px;
      border: #88aaf8 double 12px;
      border-radius:25px;
    }

    h3 {
      color: #ff0000;
      font-weight: bold;
    }

  </style>
</head>
<body>
  <div class="result">
    <h2>Registration Result</h2>
    $submitMsg
  </div>
</body>
</html>
HTML

