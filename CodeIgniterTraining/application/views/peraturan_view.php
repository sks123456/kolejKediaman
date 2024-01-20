<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Viewer</title>
</head>
<body>
    <?php if ($file_content): ?>
        <iframe srcdoc="<?= $file_content ?>" width="100%" height="500px"></iframe>
    <?php else: ?>
        <p>No active session found.</p>
    <?php endif; ?>
</body>
</html>