<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('HTTP/1.1 403 Forbidden');
    exit('Access denied');
}

$jsonPath = __DIR__ . '/../public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'] ?? '';
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;
    $targetDir = __DIR__ . '/../wp-content/uploads/2025/01/';

    // Create directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetFile = $targetDir . basename($_FILES['image']['name']);
    $uploadPath = 'wp-content/uploads/2025/01/' . basename($_FILES['image']['name']);

    // Check if the file was uploaded without errors
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $updated = false;

            // Handle different sections based on their structure in the JSON
            if ($section === 'heroBackground' && isset($pageContent['heroSection'])) {
                $pageContent['heroSection']['backgroundImage'] = $uploadPath;
                $updated = true;
            }
            // Product images in benefits section
            elseif (strpos($section, 'productImage') === 0 && isset($pageContent['benefitsSection']['images']['productImages'])) {
                $imageIndex = intval(substr($section, strlen('productImage')));
                if (isset($pageContent['benefitsSection']['images']['productImages'][$imageIndex])) {
                    $pageContent['benefitsSection']['images']['productImages'][$imageIndex]['src'] = $uploadPath;
                    // Update other image properties if needed
                    $updated = true;
                }
            }
            // Bottom image in benefits section
            elseif ($section === 'bottomImage' && isset($pageContent['benefitsSection']['images']['bottomImage'])) {
                $pageContent['benefitsSection']['images']['bottomImage']['src'] = $uploadPath;
                $updated = true;
            }
            // Testimonial images
            elseif (strpos($section, 'testimonialImage') === 0 && isset($pageContent['testimonialsSection']['testimonialImages'])) {
                $imageIndex = intval(substr($section, strlen('testimonialImage')));
                if (isset($pageContent['testimonialsSection']['testimonialImages'][$imageIndex])) {
                    $pageContent['testimonialsSection']['testimonialImages'][$imageIndex]['src'] = $uploadPath;
                    $updated = true;
                }
            }
            // Ingredient images
            elseif (strpos($section, 'ingredientImage') === 0 && isset($pageContent['ingredientsSection']['ingredients'])) {
                $imageIndex = intval(substr($section, strlen('ingredientImage')));
                if (isset($pageContent['ingredientsSection']['ingredients'][$imageIndex]['image'])) {
                    $pageContent['ingredientsSection']['ingredients'][$imageIndex]['image']['src'] = $uploadPath;
                    $updated = true;
                }
            }
            // Product image in order section
            elseif ($section === 'productImage' && isset($pageContent['orderSection']['product']['image'])) {
                $pageContent['orderSection']['product']['image']['src'] = $uploadPath;
                $updated = true;
            }
            // Guarantee section images
            elseif (strpos($section, 'guaranteeImage') === 0 && isset($pageContent['guaranteeSection']['images'])) {
                $imageIndex = intval(substr($section, strlen('guaranteeImage')));
                if (isset($pageContent['guaranteeSection']['images'][$imageIndex])) {
                    $pageContent['guaranteeSection']['images'][$imageIndex]['src'] = $uploadPath;
                    $updated = true;
                }
            }
            // Solutions section images
            elseif (strpos($section, 'solutionImage') === 0 && isset($pageContent['solutionsSection']['images'])) {
                $imageIndex = intval(substr($section, strlen('solutionImage')));
                if (isset($pageContent['solutionsSection']['images'][$imageIndex])) {
                    $pageContent['solutionsSection']['images'][$imageIndex]['src'] = $uploadPath;
                    $updated = true;
                }
            }
            // Product section logo or featured image
            elseif ($section === 'productLogo' && isset($pageContent['productSection']['logo'])) {
                $pageContent['productSection']['logo']['src'] = $uploadPath;
                $updated = true;
            }
            // Any other section-specific images
            elseif (strpos($section, 'benefitImage') === 0 && isset($pageContent['benefitsSection']['benefits'])) {
                $imageIndex = intval(substr($section, strlen('benefitImage')));
                if (isset($pageContent['benefitsSection']['benefits'][$imageIndex]['image'])) {
                    $pageContent['benefitsSection']['benefits'][$imageIndex]['image']['src'] = $uploadPath;
                    $updated = true;
                }
            }
            // Instructions section images
            elseif (strpos($section, 'instructionImage') === 0 && isset($pageContent['instructionsSection']['images'])) {
                $imageIndex = intval(substr($section, strlen('instructionImage')));
                if (isset($pageContent['instructionsSection']['images'][$imageIndex])) {
                    $pageContent['instructionsSection']['images'][$imageIndex]['src'] = $uploadPath;
                    $updated = true;
                }
            }

            if ($updated) {
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Image updated successfully!';
            } else {
                echo 'Failed to update JSON content: Section not found or not supported.';
            }
        } else {
            echo 'Error moving uploaded file.';
        }
    } else {
        echo 'Error uploading image.';
    }
    exit;
}
