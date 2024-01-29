<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="sms.css">
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="mobileNumber">Mobile Number:</label>
            <input type="tel" id="mobileNumber" name="mobileNumber" placeholder="Enter your mobile number" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>

            <button type="submit" name="submit">Send</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // require __DIR__ ."/vendor/autoload.php";
        require 'D:\XAMPPfolder\htdocs\Project\admin\vendor\autoload.php';

        $BASE_URL = "w198jd.api.infobip.com";
        $API_KEY = "210054a2e4135fc98bb91d33e483d4ad-56146e87-9598-4549-b34b-ed967c9c4399";

        $message = $_POST['message'];
        $phoneNumber =  $_POST['mobileNumber'];

        $configuration = new \Infobip\Configuration(host: $BASE_URL, apiKey: $API_KEY);

        $sendSmsApi = new \Infobip\Api\SmsApi(config: $configuration);

        $destination = new \Infobip\Model\SmsDestination(to: $phoneNumber);

        $theMessage = new \Infobip\Model\SmsTextualMessage(destinations: [$destination], from: "Sabin", text: $message);

        $request = new \Infobip\Model\SmsAdvancedTextualRequest(messages: [$theMessage]);
        echo "success";
        try {
            $smsResponse = $sendSmsApi->sendSmsMessage($request);

            foreach ($smsResponse->getMessages() ?? [] as $message) {
                echo sprintf('Message ID: %s, status: %s', $message->getMessageId(), $message->getStatus()?->getName()) . PHP_EOL;
            }
        } catch (\Throwable $apiException) {
            echo "Error: " . $apiException->getMessage();
        }
    }
    
    ?>
    

    
</body>
</html>
