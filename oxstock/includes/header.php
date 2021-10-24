<header class="main">
    <div class="container wide">
        <div class="content slim">
            <div class="set">
                <div class="fill">
                    <a class="pseudoshop" href="<?php echo URL_BASE;?>wallet"><strong>OXCOIN</strong></a>
                </div>

                <!--<div class="fit">
                    <a class="braintree" href="https://developers.braintreepayments.com/guides/drop-in" target="_blank">Braintree</a>
                </div>-->
            </div>
        </div>
    </div>

    <div class="notice-wrapper">
        <?php if(isset($_SESSION["errors"])) : ?>
            <div class="show notice error notice-error">
                <span class="notice-message">
                    <?php
                        echo($_SESSION["errors"]);
                        unset($_SESSION["errors"]);
                    ?>
                <span>
            </div>
        <?php endif; ?>
    </div>
</header>
