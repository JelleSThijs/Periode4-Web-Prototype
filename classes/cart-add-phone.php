<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect phone-specific data from the form
    $phoneId  = isset($_POST['phone_id']) ? (int)$_POST['phone_id'] : null;
    $color    = $_POST['color'] ?? 'N.v.t.';
    $plan     = $_POST['plan'] ?? 'los_toestel';
    $delivery = $_POST['delivery'] ?? 'postnl';

    // Validate that we have a phone ID
    if ($phoneId !== null) {
        if (!isset($_SESSION['orders'])) {
            $_SESSION['orders'] = [];
        }

        // Create a unique key for this phone configuration
        // Using md5(color + plan + delivery) ensures that if a user adds
        // the same phone with different choices, it creates a new cart item.
        $orderKey = 'phone_' . $phoneId . '_' . md5($color . $plan . $delivery);

        if (isset($_SESSION['orders'][$orderKey])) {
            $_SESSION['orders'][$orderKey]['quantity'] += 1;
        } else {
            $_SESSION['orders'][$orderKey] = [
                'type'     => 'phone',
                'phone_id' => $phoneId,
                'color'    => $color,
                'plan'     => $plan,
                'delivery' => $delivery,
                'quantity' => 1
            ];
        }
    }
}

header("Location: ../checkout.php?status=success");
exit();