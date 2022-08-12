<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";

use Framework\Connector;
use Framework\View;

use Framework\Model\VirtualServer;

$conn = new Connector;
$view = new View();
$server = new VirtualServer();
$configs = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
?>
<html>

<head>
    <link rel="stylesheet" href="assets/style/index.css">
</head>

<body>
    <header>
        <div id="main-title">
            <h1><?= $configs['servername']?>  TS Server</h1>
        </div>
        <div id="header-flags">
            <img src="assets/image/aws.png" id="powered" />
            <img src="assets/image/brazil.png" id="brazil-flag" />
        </div>

    </header>
    <section id="main-info">
        <div id="connection">
            <p>Status: <span class="<?php echo $server->status == "online" ? "status-online" : "status-offline"; ?>"><?= $server->status == "online" ? "online" : "offline"; ?></span></p>
            <?php if ($server->status == "online") : ?>
                <a href="ts3server://<?= $configs['ts_ip']?>?port=<?= $configs['ts_port']?>" rel="nofollow" id="connect-button" data-tooltip-content="connect to TS3">Conectar</a>
            <?php endif; ?>
            <p><?= $configs['ts_ip']?>:<?= $configs['ts_port']?></p>
        </div>
        <?php if ($server->status == "online") : ?>
            <div id="server-info">
                <?php $displayer = new ServerDisplayer\Block\Displayer();
                $displayer->render(); ?>
            </div>
        <?php endif; ?>
    </section>
    <div id="downblock">
        <?php if ($server->status == "online") : ?>
            <p id="uptime">Estamos a <span id="uptime-text"><?= $server->stringUptime() ?></span> sem dar ruim.</p>
            <script>
                var uptime = <?= $server->uptime ?>;
            </script>
        <?php else : ?>
            <p id="uptime">Estamos dando ruim. (offline)</p>
        <?php endif; ?>
        <a href="https://www.teamspeak.com/en/downloads/">Download do Teamspeak</a>
    </div>
    <footer>
        Criado e gerenciado por <a href="https://github.com/gui679">guizo</a>.
    </footer>
</body>
<link rel="stylesheet" href="assets/style/mobile.css">
<script src="assets/script/index.js"></script>
<script src="assets/script/uptime.js"></script>

</html>