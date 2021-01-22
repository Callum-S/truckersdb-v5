<?php
$pageTitle = "Contact Us | TruckersDB";
$pageName = "contact";
require_once("./assets/common/head.php");
?>
<body>
    <?php require_once("./assets/common/navigation.php"); ?>
    <div class="container">
        <h2>Contact Us</h2>
        <p style="text-align: justify;">If you would like to email us or don't have access to the options below, you can get in touch with us at <strong><a href="mailto:support@truckersdb.net">support@truckersdb.net</a></strong></p><br>
        <div id="contact">
            <a href="https://truckersdb.freshdesk.com">
                <div class="card ticket">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-life-ring"></i>Support Center</h4>
                        <p>For most queries and concerns, you can use our built-in support system to access FAQs and create a ticket. You must be registered with TruckersDB and logged in to access the Support Center.</p>
                    </div>
                </div>
            </a>
            <a href="https://discord.truckersdb.net">
                <div class="card discord">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fab fa-discord"></i>Discord</h4>
                        <p>Feel free to join our Discord server to talk to us about improvements, issues or questions. You can also speak to other users and companies!</p>
                    </div>
                </div>
            </a>
            <a href="https://twitter.com/truckers_db">
                <div class="card twitter">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fab fa-twitter"></i>Twitter</h4>
                        <p>Follow us on Twitter to get the latest updates to your feed. Our Twitter is monitored by our staff, so you can send us your questions or issues.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <?php require_once("./assets/common/footer.php"); ?>
    <?php require_once("./assets/common/scripts.php"); ?>
</body>
</html>