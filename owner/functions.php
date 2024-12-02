<?php
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        return true;
    }
    return false;
}

function handle_image_upload($file, $allowed_mime_types, $max_file_size) {
    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $file['tmp_name'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_type = mime_content_type($file_tmp);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_type, $allowed_mime_types)) {
            return ['success' => false, 'message' => 'Invalid image type. Allowed types: jpg, jpeg, png, gif.'];
        }

        if ($file_size > $max_file_size) {
            return ['success' => false, 'message' => 'Image size exceeds the maximum allowed size of 2MB.'];
        }

        $new_filename = uniqid() . '.' . $file_ext;
        $destination = __DIR__ . '/../img/uploads/' . $new_filename;

        if (move_uploaded_file($file_tmp, $destination)) {
            return ['success' => true, 'filename' => $new_filename];
        } else {
            return ['success' => false, 'message' => 'Failed to move uploaded file.'];
        }
    }

    return ['success' => false, 'message' => 'No image uploaded or there was an upload error.'];
}


function log_error($message) {
    $log_file = __DIR__ . '/error_log.txt';
    $current_time = date('Y-m-d H:i:s');
    $formatted_message = "[{$current_time}] {$message}\n";
    file_put_contents($log_file, $formatted_message, FILE_APPEND);
}
?>