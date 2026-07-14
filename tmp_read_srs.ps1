Add-Type -AssemblyName System.IO.Compression.FileSystem
$zipPath = Join-Path $PSScriptRoot 'SRS_Rental_Mobil.docx'
if (-not (Test-Path $zipPath)) {
    Write-Error "File not found: $zipPath"
    exit 1
}
$zip = [System.IO.Compression.ZipFile]::OpenRead($zipPath)
try {
    $entry = $zip.Entries | Where-Object { $_.FullName -eq 'word/document.xml' }
    if (-not $entry) {
        Write-Error 'document.xml not found in .docx'
        exit 1
    }
    $stream = $entry.Open()
    try {
        $reader = New-Object System.IO.StreamReader($stream)
        $content = $reader.ReadToEnd()
        $reader.Close()
    }
    finally {
        $stream.Close()
    }
    $zip.Dispose()
    [regex]::Matches($content, '<w:t[^>]*>(.*?)</w:t>', 'Singleline') | ForEach-Object {
        $text = $_.Groups[1].Value.Trim()
        if ($text -ne '') { Write-Output $text }
    }
}
finally {
    if ($zip) { $zip.Dispose() }
}
