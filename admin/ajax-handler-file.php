<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('HTTP/1.1 403 Forbidden');
    exit('Access denied');
}

$jsonPath = __DIR__ . '/../public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $section = $_POST['section'] ?? '';
    $targetDir = __DIR__ . '/../wp-content/uploads/2025/01/';

    // Create directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Generate a unique filename to avoid overwriting
    $filename = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $filename;
    $relativePath = 'wp-content/uploads/2025/01/' . $filename;

    // Check if the file was uploaded without errors
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Handle different sections
            if ($section === 'heroBackground' && isset($pageContent['heroSection'])) {
                $pageContent['heroSection']['backgroundImage'] = $relativePath;
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Hero background image updated successfully!';
            } elseif ($section === 'productSection' && isset($pageContent['productSection'])) {
                $pageContent['productSection']['image'] = $relativePath;
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Product image updated successfully!';
            } elseif (strpos($section, 'productImage') === 0 && isset($pageContent['benefitsSection']['images']['productImages'])) {
                $index = intval(substr($section, strlen('productImage')));
                if (isset($pageContent['benefitsSection']['images']['productImages'][$index])) {
                    $pageContent['benefitsSection']['images']['productImages'][$index]['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Product image ' . ($index + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
            } elseif ($section === 'bottomImage' && isset($pageContent['benefitsSection']['images'])) {
                $pageContent['benefitsSection']['images']['bottomImage']['src'] = $relativePath;
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Bottom image updated successfully!';
            } elseif (strpos($section, 'testimonialImage') === 0 && isset($pageContent['testimonialsSection']['testimonialImages'])) {
                $index = intval(substr($section, strlen('testimonialImage')));
                if (isset($pageContent['testimonialsSection']['testimonialImages'][$index])) {
                    $pageContent['testimonialsSection']['testimonialImages'][$index]['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Testimonial image ' . ($index + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
            } elseif (strpos($section, 'ingredientImage') === 0 && isset($pageContent['ingredientsSection']['ingredients'])) {
                $imageIndex = intval(substr($section, strlen('ingredientImage')));
                if (isset($pageContent['ingredientsSection']['ingredients'][$imageIndex]['image'])) {
                    $pageContent['ingredientsSection']['ingredients'][$imageIndex]['image']['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Ingredient image ' . ($imageIndex + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
            } elseif ($section === 'productImage' && isset($pageContent['orderSection']['product']['image'])) {
                $pageContent['orderSection']['product']['image']['src'] = $relativePath;
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Product image updated successfully!';
            } elseif (strpos($section, 'guaranteeImage') === 0 && isset($pageContent['guaranteeSection']['images'])) {
                $imageIndex = intval(substr($section, strlen('guaranteeImage')));
                if (isset($pageContent['guaranteeSection']['images'][$imageIndex])) {
                    $pageContent['guaranteeSection']['images'][$imageIndex]['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Guarantee image ' . ($imageIndex + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
            } elseif (strpos($section, 'solutionImage') === 0 && isset($pageContent['solutionsSection']['images'])) {
                $imageIndex = intval(substr($section, strlen('solutionImage')));
                if (isset($pageContent['solutionsSection']['images'][$imageIndex])) {
                    $pageContent['solutionsSection']['images'][$imageIndex]['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Solution image ' . ($imageIndex + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
            } elseif ($section === 'productLogo' && isset($pageContent['productSection']['logo'])) {
                $pageContent['productSection']['logo']['src'] = $relativePath;
                file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo 'Product logo updated successfully!';
            } elseif (strpos($section, 'benefitImage') === 0 && isset($pageContent['benefitsSection']['benefits'])) {
                $imageIndex = intval(substr($section, strlen('benefitImage')));
                if (isset($pageContent['benefitsSection']['benefits'][$imageIndex]['image'])) {
                    $pageContent['benefitsSection']['benefits'][$imageIndex]['image']['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Benefit image ' . ($imageIndex + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
            }
            elseif (strpos($section, 'instructionImage') === 0 && isset($pageContent['instructionsSection']['images'])) {
                $imageIndex = intval(substr($section, strlen('instructionImage')));
                if (isset($pageContent['instructionsSection']['images'][$imageIndex])) {
                    $pageContent['instructionsSection']['images'][$imageIndex]['src'] = $relativePath;
                    file_put_contents($jsonPath, json_encode($pageContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo 'Instruction image ' . ($imageIndex + 1) . ' updated successfully!';
                } else {
                    echo 'Failed to update image: Invalid index.';
                }
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

echo 'Invalid request method or missing image file.';
