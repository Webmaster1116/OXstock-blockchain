<?php
require_once 'classes/configure.php'; 
include('header.php'); ?>


<div class="sheares_pag">
        <div class="Container">
            <div class="row">
                <?php 
                    //$cmd = 'dir';
                    //$output = shell_exec($cmd);
                    // echo shell_exec("cd .. ; pwd");
                     //$output = shell_exec('mkdir veggies');
                    //echo exec('whoami').'</br>';
                    //echo shell_exec('start calc 2>&1').'</br>';
                    //echo  shell_exec('./oxcoind.exe 2>&1');
                    // $output = shell_exec('/home2/kpve/public_html/oxstock/oxcoin-cli.exe getnewaddress 2>&1');
                    //$output = shell_exec('./oxcoin-cli.exe getnewaddress 2>&1');
                    shell_exec('start ./oxcoind.exe 2>&1');
                    $output = shell_exec('./oxcoin-cli.exe getnewaddress 2>&1');
                    echo "<pre>$output</pre>"; 
                ?>
            </div>

        </div>
    </div>


     <?php include('footer.php'); ?>