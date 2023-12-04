<?php
// Assuming you've connected to the database already ($conn)

// Get all donors
$donors_query = "SELECT * FROM donor.donor_data";
$donors_result = $conn->query($donors_query);

// Get all recipients
$recipients_query = "SELECT * FROM recipient.recipient_data";
$recipients_result = $conn->query($recipients_query);

$matchFound = false; // Flag to check if any match is found

// Loop through donors
if ($donors_result->num_rows > 0 && $recipients_result->num_rows > 0) {
    while ($donor = $donors_result->fetch_assoc()) {
        $donor_blood_group = $donor['blood_group'];
        $donor_name = $donor['name'];
        $donor_age = $donor['age'];

        // Loop through recipients
        while ($recipient = $recipients_result->fetch_assoc()) {
            // Ensure the correct key is used to access blood group info
            if (isset($recipient['blood_group'])) {
                $recipient_blood_group = $recipient['blood_group'];
                $recipient_name = $recipient['name'];
                $recipient_age = $recipient['age'];

                // Matching condition: blood group and age
                if ($donor_blood_group === $recipient_blood_group) {
                    $age_difference = abs($recipient_age - $donor_age);
                    $age_matching_range = 5;

                    if ($age_difference <= $age_matching_range) {
                        // Match found: You can take actions here (e.g., notify recipient and donor)
                        echo "\tMatch found! Donor: $donor_name matches with Recipient: $recipient_name<br>";
                        // Implement notification system as needed
                        $matchFound = true; // Set flag for match 
                        break 2;
                    }
                }
            }
        }
        // Reset recipients result pointer
        $recipients_result->data_seek(0);
    }
} else {
    echo "No donors or recipients found.";
}

// Display message if no matches were found
if (!$matchFound) {
    echo "No suitable matches found.";
}
?>
