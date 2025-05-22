<?php
$plain = 'ardipassword123';
$hash = password_hash($plain, PASSWORD_DEFAULT);

echo "Hash: $hash\n";

// Simulasikan user input
$input = 'ardipassword123';

if (password_verify($input, $hash)) {
    echo "Cocok!";
} else {
    echo "Tidak cocok!";
}
?>
