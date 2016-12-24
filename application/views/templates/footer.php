

<div class="cwt__footer visible-footer">
    <div class="cwt__footer__top">
        <div class="row">
            <div class="col-lg-6">
                <div class="cwt__footer__title cwt__footer__title--light">
                    <!--<?php echo $this->lang->line('SITEMAP'); ?>-->
                </div>
                <div class="row">
<!--                    
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a target="_blank" href="#" class="cwt__footer__link">Navigation 1</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a target="_blank" href="#" class="cwt__footer__link">Navigation 2</a></li>
                        </ul>
                    </div>
-->                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cwt__footer__title">
                    <?php echo $this->lang->line('Brommo APP'); ?>
                </div>
                <div class="cwt__footer__description">
                    <p><?php echo $this->lang->line('Sitemap_text1'); ?></p>
                    <p><?php echo $this->lang->line('Sitemap_text2'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="cwt__footer__bottom">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="cwt__footer__company">
                    <img class="cwt__footer__company-logo" src="/brommo/public/assets/images/brommoapp_logo.png" target="_blank" title="<?php echo $this->lang->line('Brommo APP'); ?> Logo">
                    <span>
                        © <?php date('Y', time()); ?> <a href="http://kms.ninja" class="cwt__footer__link" target="_blank">KMS Ninja</a>
                        <br />
                        <?php echo $this->lang->line('All rights reserved'); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="main-backdrop"></div>

<script>
    $(function() {

        ///////////////////////////////////////////////////////////
        // COUNTERS
        $('.counter-init').countTo({
            speed: 1500
        });

    });
</script>
</body>
</html>