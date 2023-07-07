<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>brandBeans.biz</title>
</head>

<body>
    <h3>Mail From <a href="http://brandbeans.biz/">brandbeans.biz</a></h3>
    <?php

    use App\Models\Otp;

    $otp = Otp::all()->last();
    ?>
    <p>Dear User, your OTP for Registration is {{$otp->otp}}. Use this Password to Validate your login.</p>
</body>

</html>