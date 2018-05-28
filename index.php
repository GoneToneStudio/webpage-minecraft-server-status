<?php
/*
 * 張文相 Zhang Wenxiang - 個人 Blog
 * https://blog.reh.tw/
 *
 * 範例教學
 * https://blog.reh.tw/webpage-display-minecraft-server-status/
 */
$host = "meow.mcpe.tw"; //設定伺服器網域或 IP
$port = "19132"; //設定伺服器端口
/*
$host = $_GET["host"];
$port = $_GET["port"];
*/

require __DIR__.'/data.php';

    function parseMinecraftColors($string) {
        $string = utf8_decode(htmlspecialchars($string, ENT_QUOTES, "UTF-8"));
        $string = preg_replace('/\xA7([0-9a-f])/i', '<span class="mc-color mc-$1">', $string, -1, $count) . str_repeat("</span>", $count);
        return utf8_encode(preg_replace('/\xA7([k-or])/i', '<span class="mc-$1">', $string, -1, $count) . str_repeat("</span>", $count));
    }
$new_motd = parseMinecraftColors($motd);
?>
<style>
    /*
 * Minecraft Color Parser for PHP
 * Copyright (c) 2013, Minecrell
 * MIT License: http://opensource.org/licenses/MIT
 */

/* Colors  */
.mc-color.mc-0 { /* Black */ color: #000000; }
.mc-color.mc-1 { /* Dark Blue */ color: #0000AA; }
.mc-color.mc-2 { /* Dark Green */ color: #00AA00; }
.mc-color.mc-3 { /* Dark Aqua */ color: #00AAAA; }
.mc-color.mc-4 { /* Dark Red */ color: #AA0000; }
.mc-color.mc-5 { /* Purple */ color: #AA00AA; }
.mc-color.mc-6 { /* Gold */ color: #FFAA00; }
.mc-color.mc-7 { /* Gray */ color: #AAAAAA; }
.mc-color.mc-8 { /* Dark Gray */ color: #555555; }
.mc-color.mc-9 { /* Blue */ color: #5555FF; }
.mc-color.mc-a { /* Green */ color: #55FF55; }
.mc-color.mc-b { /* Aqua */ color: #55FFFF; }
.mc-color.mc-c { /* Red */ color: #FF5555; }
.mc-color.mc-d { /* Light Purple */ color: #FF55FF; }
.mc-color.mc-e { /* Yellow */ color: #FFFF55; }
.mc-color.mc-f { /* White */ color: #FFFFFF; }

/* Formatting */
.mc-color, .mc-r {
    color: #ffffff;
    font-weight: normal;
    font-style: normal;
    text-decoration: none;
}
.mc-k { /* TODO */ }
.mc-l { /* Bold */ font-weight: bold; }
.mc-m { /* Strikethrough */ text-decoration: line-through; }
.mc-n { /* Underline */ text-decoration: underline; }
.mc-o { /* Italic */ font-style: italic; }

/* Recommend Font: http://www.dafont.com/minecraftia.font */
    </style>
<html>
    <head>
        <title>網頁顯示 Minecraft 伺服器狀態示範</title>
    </head>
    <body>
        <h1>網頁顯示 Minecraft 伺服器狀態示範</h1>
        <h2>教學文章：<a href="https://blog.reh.tw/webpage-display-minecraft-server-status/" target="_blank">https://blog.reh.tw/webpage-display-minecraft-server-status/</a></h2>
        <hr>
        <p>狀態：<font color="#2a6c0f"><?php echo $status; ?></font></p>
        <p>IP 或網域：<font color="#2a6c0f"><?php echo $host; ?></font>
            <br>主機 IP：<font color="#2a6c0f"><?php echo $hostip; ?></font>
            <br>端口：<font color="#2a6c0f"><?php echo $port; ?></font></p>
        <p>MOTD：<font color="#2a6c0f"><?php echo $new_motd; ?></font>
            <br>清除顏色參數後的 MOTD：<font color="#2a6c0f"><?php echo $clean_motd; ?></font></p>
        <p>平台：<font color="#2a6c0f"><?php echo $platform; ?></font>
            <br>遊戲類型：<font color="#2a6c0f"><?php echo $gametype; ?></font></p>
        <p>兼容遊戲版本：<font color="#2a6c0f"><?php echo $version; ?></font>
            <br>伺服器使用的軟體或核心：<font color="#2a6c0f"><?php echo $software; ?></font></p>
        <p>可容納最大玩家數：<font color="#2a6c0f"><?php echo $players_max; ?></font>
            <br>線上玩家數：<font color="#2a6c0f"><?php echo $players_online; ?></font></p>
        <p>使用的查詢協定：<font color="#2a6c0f"><?php echo $agreement; ?></font>
            <br>查詢耗時：<font color="#2a6c0f"><?php echo $processed; ?></font></p>
        <hr>
        <h3>目前在線玩家 <font color="#2a6c0f"><?php echo $players_online; ?></font>/<font color="#2a6c0f"><?php echo $players_max; ?></font></h3>
        <?php if (is_array($Players)) : ?>
        <?php foreach($Players as $Player) : ?>
        <font color="#2a6c0f"><?php echo htmlspecialchars($Player); ?></font><br>
        <?php endforeach; ?>
        <?php else: ?>
        無玩家在線。
        <?php endif; ?>
    </body>
</html>
