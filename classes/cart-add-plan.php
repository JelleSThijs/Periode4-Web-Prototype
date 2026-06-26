<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Get plan-specific data
    $planId   = isset($_POST['plan_id']) ? (int)$_POST['plan_id'] : null;
    $delivery = $_POST['delivery'] ?? 'postnl';

    // 2. Validate that we have a plan ID
    if ($planId !== null) {
        if (!isset($_SESSION['orders'])) {
            $_SESSION['orders'] = [];
        }

        // 3. Create a unique key for the plan
        // We include delivery here in case the same plan is chosen with different shipping
        $orderKey = 'plan_' . $planId . '_' . $delivery;

        if (isset($_SESSION['orders'][$orderKey])) {
            $_SESSION['orders'][$orderKey]['quantity'] += 1;
        } else {
            $_SESSION['orders'][$orderKey] = [
                'type'     => 'plan',
                'plan_id'  => $planId,
                'delivery' => $delivery,
                'quantity' => 1
            ];
        }
    }
}

header("Location: ../checkout.php?status=success");
exit();