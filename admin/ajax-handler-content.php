<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('HTTP/1.1 403 Forbidden');
    exit('Access denied');
}

$jsonPath = __DIR__ . '/../public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $section = $input['section'] ?? '';
    $content = $input['content'] ?? '';
    $type = $input['type'] ?? 'text';

    // Debugging: Log the incoming data
    error_log("Section: $section");
    error_log("Content: $content");
    error_log("Type: $type");

    // Handle different sections based on their structure in the JSON
    if ($section === 'heroTitle' && isset($pageContent['heroSection'])) {
        $pageContent['heroSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'heroSubtitle' && isset($pageContent['heroSection'])) {
        $pageContent['heroSection']['subtitle'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'heroSection' && isset($pageContent['heroSection']['ctaButton'])) {
        $pageContent['heroSection']['ctaButton']['text'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'regularPriceLabel' && isset($pageContent['pricingSection']['regularPrice'])) {
        $pageContent['pricingSection']['regularPrice']['label'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'regularPriceAmount' && isset($pageContent['pricingSection']['regularPrice'])) {
        $pageContent['pricingSection']['regularPrice']['amount'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'regularPriceCurrency' && isset($pageContent['pricingSection']['regularPrice'])) {
        $pageContent['pricingSection']['regularPrice']['currency'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'offerPriceLabel' && isset($pageContent['pricingSection']['offerPrice'])) {
        $pageContent['pricingSection']['offerPrice']['label'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'offerPriceAmount' && isset($pageContent['pricingSection']['offerPrice'])) {
        $pageContent['pricingSection']['offerPrice']['amount'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'offerPriceCurrency' && isset($pageContent['pricingSection']['offerPrice'])) {
        $pageContent['pricingSection']['offerPrice']['currency'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'benefitsTitle' && isset($pageContent['benefitsSection'])) {
        $pageContent['benefitsSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'testimonialsTitle' && isset($pageContent['testimonialsSection'])) {
        $pageContent['testimonialsSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'guaranteeTitle' && isset($pageContent['guaranteeSection'])) {
        $pageContent['guaranteeSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'solutionsTitle' && isset($pageContent['solutionsSection'])) {
        $pageContent['solutionsSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'solutionsButton' && isset($pageContent['solutionsSection']['button'])) {
        $pageContent['solutionsSection']['button']['text'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'ingredientsTitle' && isset($pageContent['ingredientsSection'])) {
        $pageContent['ingredientsSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif (strpos($section, 'ingredientsBenefit') === 0 && isset($pageContent['ingredientsSection']['benefits'])) {
        // Handle ingredient benefits (indexed items)
        $index = intval(substr($section, strlen('ingredientsBenefit')));
        if (isset($pageContent['ingredientsSection']['benefits'][$index])) {
            $pageContent['ingredientsSection']['benefits'][$index] = $content;
            file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo 'Content updated successfully!';
        } else {
            echo 'Failed to update content: Invalid index.';
        }
    } elseif ($section === 'instructionsTitle' && isset($pageContent['instructionsSection'])) {
        $pageContent['instructionsSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'instructionsDescription' && isset($pageContent['instructionsSection'])) {
        $pageContent['instructionsSection']['description'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'contactInfo' && isset($pageContent['contactInfo'])) {
        $pageContent['contactInfo']['value'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'contactPhone' && isset($pageContent['contactInfo'])) {
        $pageContent['contactInfo']['phone'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'productTitle' && isset($pageContent['productSection'])) {
        $pageContent['productSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Content updated successfully!';
    } elseif ($section === 'videoTitle' && isset($pageContent['videoSection'])) {
        $pageContent['videoSection']['title'] = $content;
        file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'Video title updated successfully!';
    } elseif (in_array(strtolower($section), ['facebook', 'instagram', 'tiktok', 'youtube', 'imo']) && isset($pageContent['socialMedia'])) {
        $platform = strtolower($section);

        if (array_key_exists($platform, $pageContent['socialMedia'])) {
            // Update URL
            $pageContent['socialMedia'][$platform]['url'] = $content;

            file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo 'Social media link updated successfully!';
        } else {
            echo 'Invalid social media platform';
        }
    } else {
        echo 'Failed to update content: Section not found or not supported.';
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['type']) && $_POST['type'] === 'image') {
    $section = $_POST['section'] ?? '';
    $targetDir = __DIR__ . '/../wp-content/uploads/2025/01/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    // Check if the file was uploaded without errors
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            if ($section === 'heroBackground' && isset($pageContent['heroSection'])) {
                $pageContent['heroSection']['backgroundImage'] = 'wp-content/uploads/2025/01/' . basename($_FILES['image']['name']);
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Image updated successfully!';
            } else {
                echo 'Failed to update JSON content.';
            }
        } else {
            echo 'Error moving uploaded file.';
        }
    } else {
        echo 'Error uploading image.';
    }
    exit;
}
