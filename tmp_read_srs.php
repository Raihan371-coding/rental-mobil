<?php
$zipPath = __DIR__ . DIRECTORY_SEPARATOR . 'SRS_Rental_Mobil.docx';
$zip = new ZipArchive();
if ($zip->open($zipPath) !== true) {
    fwrite(STDERR, "Failed to open $zipPath\n");
    exit(1);
}
$idx = $zip->locateName('word/document.xml');
if ($idx === false) {
    fwrite(STDERR, "document.xml not found in $zipPath\n");
    exit(1);
}
$content = $zip->getFromIndex($idx);
$zip->close();
if ($content === false) {
    fwrite(STDERR, "Failed to read document.xml\n");
    exit(1);
}
if (preg_match_all('/<w:t[^>]*>(.*?)<\\/w:t>/s', $content, $matches)) {
    foreach ($matches[1] as $text) {
        $text = trim($text);
        if ($text !== '') {
            echo $text . "\n";
        }
    }
}
