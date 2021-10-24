<?php
	$cmd = 'oxcoin-cli.exe getnewaddress 2>&1';
	echo "Oxcoind is started<br>";
	echo "Wallet is connected";
	//$output = shell_exec('oxcoin-cli.exe /rpcuser=167273 /rpcpassword=pfm8DTwAg5ff8Nt getnewaddress 2>&1');
	$output = shell_exec($cmd);
	echo "<pre>$output</pre>";
	echo "Account is created";
?>