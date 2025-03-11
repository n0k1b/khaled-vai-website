<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /login.php');
    exit;
}

$jsonPath = __DIR__ . '/../public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($section && isset($pageContent[$section])) {
        $pageContent[$section]['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $section = $_POST['section'] ?? '';
    $targetDir = __DIR__ . '/../public/uploads/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $pageContent[$section]['image'] = 'uploads/' . basename($_FILES['image']['name']);
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Image updated successfully!';
    } else {
        echo 'Error uploading image.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Content</title>
</head>
<body>
    <h1>Update Content</h1>
    <form method="post" action="">
        <label for="section">Section:</label>
        <select id="section" name="section">
            <?php foreach ($pageContent as $key => $value): ?>
                <option value="<?php echo $key; ?>"><?php echo ucfirst($key); ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="4" cols="50"></textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
