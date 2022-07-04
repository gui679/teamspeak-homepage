<!DOCTYPE html>
<?php
require_once "vendor/autoload.php";

use Framework\Helper\Connector;

$conn = new Connector;
$server = $conn->serverList();
$uptime = new DateTime("@" . $server->uptime);
$now = new DateTime('@0');
?>
<html>

<head>
    <link rel="stylesheet" href="assets/style/index.css">
</head>

<body>
    <header>
        <div id="main-title">
            <h1>Dannazione TS Server</h1>
        </div>
        <div id="header-flags">
            <img src="assets/image/aws.png" id="powered" />
            <img src="assets/image/brazil.png" id="brazil-flag" />
        </div>

    </header>
    <section id="main-info">
        <div id="connection">
            <p>Status: <?= $server->status ?></p>
            <a href="ts3server://18.228.11.219?port=9987" rel="nofollow" id="connect-button" data-tooltip-content="connect to TS3">Conectar</a>
            <p>18.228.11.219:9987</p>
        </div>
        <div id="server-info">
            <div id="ts3viewer_1127191" style=""> </div>

            <script src="https://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
            <script>
                var ts3v_url_1 = "https://www.tsviewer.com/ts3viewer.php?ID=1127191&text=ffffff&text_size=16&text_family=1&text_s_color=ffffff&text_s_weight=normal&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_i_color=&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_c_color=&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_u_color=ffffff&text_u_weight=normal&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_s_color_h=&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=none&text_i_color_h=dedede&text_i_weight_h=bold&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=none&text_c_color_h=&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=none&text_u_color_h=&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none&iconset=default";
                ts3v_display.init(ts3v_url_1, 1127191, 100);
            </script>
        </div>
    </section>
    <div>
        <p id="uptime">Estamos a <?= $now->diff($uptime)->format('%a dias, %h horas, %i minutos e %s segundos') ?> sem dar ruim.</p>
    </div>
    <footer>
        Created and managed by <a href="https://github.com/gui679">guizo</a>.
    </footer>
</body>
<link rel="stylesheet" href="assets/style/mobile.css">
<script src="assets/script/index.js"></script>

</html>