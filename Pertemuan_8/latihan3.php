<?php
/**
 * Fungsi untuk mengulang teks dalam bentuk list terurut (OL)
 * 
 * @param string $text Teks yang akan ditampilkan
 * @param int $num Jumlah pengulangan (default: 10)
 */
function repeat(string $text, int $num = 10): void
{
    echo "<ol>\n";
    for ($i = 0; $i < $num; $i++) {
        // htmlspecialchars digunakan untuk keamanan output HTML
        $safeText = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
        echo "  <li>{$safeText}</li>\n";
    }
    echo "</ol>\n";
}

// Pemanggilan 1: Dengan 2 argumen (diulang 15 kali)
repeat("I'm the best", 15);

// Pemanggilan 2: Dengan 1 argumen (menggunakan default $num = 10)
repeat("You're the man");
?>