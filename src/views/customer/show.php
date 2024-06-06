<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
</head>
<body>
    <h1>Customer Details</h1>
    <?php if ($data['customer']): ?>
        <p>ID: <?php echo htmlspecialchars($data['customer']['id']); ?></p>
        <p>Name: <?php echo htmlspecialchars($data['customer']['name']); ?></p>
        <p>Address: <?php echo htmlspecialchars($data['customer']['address']); ?></p>
        <p>Email: <?php echo htmlspecialchars($data['customer']['email']); ?></p>
    <?php else: ?>
        <p>Customer not found.</p>
    <?php endif; ?>
    <a href="/customer/list">Back to List</a>
</body>
</html>