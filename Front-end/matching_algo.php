<?php

// Get all donors
$donors_query = "SELECT * FROM donor";
$donors_result = $conn->query($donors_query);

// Loop through donors
if ($donors_result->num_rows > 0) {
    while ($donor = $donors_result->fetch_assoc()) {
        $donor_blood_group = $donor['Blood_Group'];
        $donor_name = $donor['Name'];
        $donor_age = $donor['Age'];

        // Find matching recipients for each donor
        $matching_query = "SELECT * FROM recipient WHERE Required_Blood_Group = '$donor_blood_group'";
        $matching_result = $conn->query($matching_query);

        if ($matching_result->num_rows > 0) {
            while ($recipient = $matching_result->fetch_assoc()) {
                // Check additional criteria, such as age
                $recipient_age = $recipient['Age'];

                // You can define a range for age matching, e.g., within 5 years
                $age_difference = abs($recipient_age - $donor_age);
                $age_matching_range = 5;

                if ($age_difference <= $age_matching_range) {
                    // Match found: You can take actions here (e.g., notify recipient and donor)
                    $recipient_name = $recipient['Name'];
                    echo "Match found! Donor: $donor_name matches with Recipient: $recipient_name<br>";
                    // Implement notification system as needed
                }
            }
        }
    }
} else {
    echo "No donors found.";
}
?>
