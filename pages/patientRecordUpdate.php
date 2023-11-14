<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/oldPatient.css">
</head>
<body>

<div class="am-container">
    <div class="am-body">
        <div class="am-head">
            <h1>Patient Record Update</h1>
        </div>

        <form class="am-body-box" method="post" action="patientRecordUpdate.php">
            <a href="patientRecord.php">Back</a>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Patient ID</p>
                    <input type="number" name="patientID" id="patientID" value="<?php echo $requestID; ?>" readonly>
                </div>

                <div class="am-col-6">
                    <p>Balance</p>
                    <input type="number" name="patientBalance" id="patientBalance" placeholder="Enter New Balance" value="<?php echo $date; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>First Name</p>
                    <input type="text" name="patientFirstName" id="patientFirstName" placeholder="Enter New First Name" value="<?php echo $patientID; ?>">
                </div>

                <div class="am-col-6">
                    <p>Last Name</p>
                    <input type="text" name="patientLastName" id="patientLastName" placeholder="Enter New Last Name" value="<?php echo $serviceID; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Age</p>
                    <input type="number" name="patientAge" id="patientAge" placeholder="Enter New Age" value="<?php echo $date; ?>">
                </div>

                <div class="am-col-6">
                    <p>Sex</p>
                    <input type="text" name="patientSex" id="patientSex" placeholder="Enter New Sex" value="<?php echo $time; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Mobile Number</p>
                    <input type="text" name="patientMobileNo" id="patientMobileNo" placeholder="Enter New Mobile Number" value="<?php echo $date; ?>">
                </div>

                <div class="am-col-6">
                    <p>Email</p>
                    <input type="text" name="patientEmail" id="patientEmail" placeholder="Enter New Email" value="<?php echo $time; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Address</p>
                    <input type="text" name="patientAddress" id="patientAddress" placeholder="Enter New Address" value="<?php echo $date; ?>">
                </div>

                <div class="am-col-6">
                    <p>Occupation</p>
                    <input type="text" name="patientOccupation" id="patientOccupation" placeholder="Enter New Occupation" value="<?php echo $time; ?>">
                </div>
            </div>

                <div class="am-row">
                    <div class="am-col-12">
                        <button type="submit" name="submit">Update Appointment</button>
                    </div>
                </div>

        </form>

        <div class="update-message">
            <?php echo $updateMessage; ?>
        </div>

    </div>
</div>

</body>
</html>