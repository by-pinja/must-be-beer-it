<?php
include('Net/SSH2.php');
include('config.php');

$ssh = new Net_SSH2($host);
if (!$ssh->login($username, $password)) {
    exit('Login Failed');
}

$ssh->exec('cd /var/temp/torch-rnn');
$beerNames = $ssh->exec('/root/torch/install/bin/th sample.lua -checkpoint cv/checkpoint_9000.t7 -length 2000 -gpu -1');
$beerNamesArray = explode("\n", $beerNames);

echo json_encode($beerNamesArray);