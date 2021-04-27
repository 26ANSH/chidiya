hello
<?php
$simple_string = readline('Enter a string: ');
echo "Original String: " . $simple_string;
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$iv = '1234567891011121';
$key = "GeeksforGeeks";
$encryption = openssl_encrypt($simple_string, $ciphering, $key, $options, $iv);
echo "\nEncrypted String: " . $encryption . "\n";
$decryption=openssl_decrypt ($encryption, $ciphering, $key, $options, $iv);
echo "Decrypted String: " . $decryption;
?>
