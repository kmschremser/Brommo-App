

<section class="page-content">
<div class="page-content-inner single-page-login-beta" style="background-image: url(/brommo/public/assets/common/img/temp/login/6.jpg)">

    <!-- Login Beta Page -->
    <div class="single-page-block-header">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="javascript: void(0);" class="logo">
                        <img src="/brommo/public/assets/images/brommoapp_logo.png" alt="Brommo APP Logo" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="color-warning single-page-block-header-menu">
                    <ul class="list-unstyled list-inline">
                        <?php if ( $this->session->language == "de" ) { ?><li><a href="/brommo/index.php?auth/login/en"><?php echo $this->lang->line('English'); ?></a></li>
                        <?php } else { ?><li><a href="/brommo/index.php?auth/login/de"><?php echo $this->lang->line('Deutsch'); ?></a></li>
                        <?php } ?>                        
                        <li><a href="/brommo/index.php">&larr; <?php echo $this->lang->line('Back'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="single-page-block">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-page-block-inner">
                    <div class="single-page-block-form">
                        
                        <h3 class="text-center">
                            <?php echo $this->lang->line('Register'); ?>
                        </h3>
                        
                        <?php if ( validation_errors() !== null ) { ?>
                        <div class="color-danger">
                          <?php echo validation_errors(); ?>
                        </div>                    
                        <?php } ?>

                        <?php if ( isset( $success ) ) { ?>
                        <div class="color-success">
                            <?php echo $success; ?>
                        </div>
                        <?php } ?>

                        <!--<form id="form-validation" name="form-validation" method="POST">-->
                        <?php if ( isset( $data['update'] ) ) echo form_open('auth/update'); else echo form_open('auth/register'); ?>

                        <?php if ( isset( $data['update'] ) ) { ?>
                        <input type="hidden" name="objid" value="<?php echo $data['objid']?>" />
                        <?php } ?>  

                        
                            <div class="form-group">
                                <label class="form-label"><?php echo $this->lang->line('Firstname'); ?></label>
                                <input id="validation-text"
                                       class="form-control"
                                       placeholder="<?php echo $this->lang->line('Firstname'); ?>"
                                       name="firstname"
                                       type="text"
                                       value="<?php if ( isset( $data['firstname'] ) ) { echo $data['firstname']; } ?>"
                                       data-validation="[FIRSTNAME]">
                            </div>                           
                            <div class="form-group">
                                <label class="form-label"><?php echo $this->lang->line('Email'); ?></label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="<?php echo $this->lang->line('Email'); ?>"
                                       name="email"
                                       type="text"
                                       value="<?php if ( isset( $data['email'] ) ) { echo $data['email']; } ?>"
                                       data-validation="[EMAIL]">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><?php echo $this->lang->line('Password'); ?></label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="<?php echo $this->lang->line('Password'); ?>">
                            </div>
                            <div class="form-group">
                                <!--<a href="/brommo/index.php?/auth/passforgotten" class="pull-right link-blue link-underlined"><?php echo $this->lang->line('Forgot Password?'); ?></a>-->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="newsletter" value="1" checked>
                                        <?php echo $this->lang->line('Keep me updated'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary width-150 margin-inline"><?php echo $this->lang->line('Create Account'); ?></button>
                                <a href="/brommo/index.php?/auth/login" class="btn btn-default-outilne width-150 margin-inline"><?php echo $this->lang->line('Sign In'); ?></a>
                            </div>
                            <div class="form-group">
<!--                                
                                <div class="social-login">
                                    <span class="title">
                                        <?php echo $this->lang->line('Use another service to'); ?> <?php echo $this->lang->line('Create Account'); ?>
                                    </span>
                                    <div class="social-container">
                                        <a href="javascript: void(0);" class="btn btn-icon">
                                            <i class="icmn-facebook"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-icon">
                                            <i class="icmn-google"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-icon">
                                            <i class="icmn-windows"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-icon">
                                            <i class="icmn-twitter"></i>
                                        </a>
                                    </div>
                                </div>
-->
                            </div>
                        </form>
                    </div>
                    <div class="single-page-block-sidebar" style="background-image: url(/brommo/public/assets/images/money.jpg)">
                        <div class="single-page-block-sidebar--shadow"><!-- --></div>
                        <div class="single-page-block-sidebar--content">
                            <div class="single-page-block-sidebar--content--title">
                                <!--<?php echo $this->lang->line('Register'); ?>
                                <br />-->
                                <!--<span>2016</span>-->
                            </div>
                            <div class="single-page-block-sidebar--content--item">
                                <?php echo $this->lang->line('Register TEXT'); ?>
                            </div>
                        </div>
                        <div class="single-page-block-sidebar--place">
                            <i class="icmn-location margin-right-5"><!-- --></i>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-page-block-footer text-center">
        <ul class="list-unstyled list-inline">
            <!--
            <li><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active"><a href="javascript: void(0);">Compliance</a></li>
            <li><a href="javascript: void(0);">Confidential Information</a></li>
            <li><a href="javascript: void(0);">Support</a></li>
            <li><a href="javascript: void(0);">Contacts</a></li>
            -->
        </ul>
    </div>
    <!-- End Login Beta Page -->

</div>

<!-- Page Scripts -->
<script>
    $(function() {

        // Add class to body for change layout settings
        $('body').addClass('single-page');

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

    });
</script>
<!-- End Page Scripts -->
</section>

<div class="main-backdrop"><!-- --></div>

</body>
</html>