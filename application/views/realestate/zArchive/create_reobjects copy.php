<section class="page-content">
<div class="page-content-inner">

    <!-- Basic Form Elements -->
    <section class="panel">
        <div class="panel-heading">
            <h3><?php if ( isset( $rei['update'] ) ) { ?><?php echo $this->lang->line('Update'); ?> <?php echo $this->lang->line('of a real estate object'); ?><?php } else { ?><?php echo $this->lang->line('Creation'); ?> <?php echo $this->lang->line('of a real estate object'); ?><?php } ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="margin-bottom-50">
                        <!--<h4>Horizontal Form</h4>-->
                        <br />
                        
                        <?php if ( validation_errors() !== null ) { ?>
                        <div class="color-danger">
                          <?php echo validation_errors(); ?>
                        </div>                    
                        <?php } ?>

                        <?php if ( isset( $rei['update'] ) ) echo form_open('realestate/update_reobjects'); else echo form_open('realestate/create_reobjects'); ?>

                        <?php if ( isset( $rei['update'] ) ) { ?>
                        <input type="hidden" name="objid" value="<?php echo $rei['objid']?>" />
                        <?php } ?>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group has-focused">
                                        <label class="form-control-label" for="l0"><b><?php echo $this->lang->line('Short description of object'); ?></b> <span class="required">*</span></label>                              
                                        <input type="text" class="form-control" name="title" id="title" value="<?php if ( isset( $rei['title'] ) ) echo $rei['title']; ?>" placeholder="<?php echo $this->lang->line('Real estate title'); ?>" data-parsley-type="alphanum" data-parsley-length="[2, 255]" data-parsley-required="true" class="form-control has-feedback-left parsley-error" id="l0">
                                        <!--<small>Technical information for user</small>-->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="size"><b><?php echo $this->lang->line('Size (m2)'); ?></b> <span class="required">*</span></label>
                                      <input type="text" name="size" id="size" value="<?php if ( isset( $rei['size'] ) ) echo $rei['size']; ?>" placeholder="<?php echo $this->lang->line('m2'); ?>" data-parsley-type="alphanum" data-parsley-required class="form-control has-feedback-left parsley-error">
                                      <!--<small>Technical information for user</small>-->
                                    </div>
                                </div>
                            </div>   

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group has-focused">
                                        <label for="purchaseprice"><b><?php echo $this->lang->line('Purchase price'); ?></b><span class="required">*</span></label><br />
                                         <sup>(<?php echo $this->lang->line('incl. VAT &amp; garage'); ?>)</sup> 
                                        <input type="number" name="purchaseprice" id="purchaseprice" value="<?php if ( isset( $rei['purchaseprice'] ) ) echo $rei['purchaseprice']; ?>" placeholder="<?php echo $this->lang->line('Purchase price'); ?> <?php echo $rei['currency']; ?>" data-parsley-type="alphanum" data-parsley-required class="form-control has-feedback-left parsley-error">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="outdoorspace"><?php echo $this->lang->line('Outdoor space (m2)'); ?></label><br />
                                      <sup>&nbsp;</sup> 
                                      <input type="text" name="outdoorspace" id="outdoorspace" value="<?php if ( isset( $rei['outdoorspace'] ) ) echo $rei['outdoorspace']; ?>" placeholder="<?php echo $this->lang->line('Outdoorspace (m2)'); ?>" data-parsley-type="alphanum" class="form-control has-feedback-left">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group has-focused">                                      
                                      <label for="purchasepricenet"><b><?php echo $this->lang->line('Purchase price'); ?> <?php echo $this->lang->line('net'); ?></b><span class="required">*</span></label><br />
                                      <sup>(<?php echo $this->lang->line('excl. VAT &amp; incl. garage'); ?>)</sup> 
                                      <input type="number" name="purchasepricenet" id="purchasepricenet" value="<?php if ( isset( $rei['purchasepricenet'] ) ) echo $rei['purchasepricenet']; ?>" placeholder="<?php echo $this->lang->line('Purchase price'); ?> <?php echo $this->lang->line('net'); ?> <?php echo $rei['currency']; ?>" data-parsley-type="alphanum" data-parsley-required class="form-control has-feedback-left parsley-error">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="garage"><b><?php echo $this->lang->line('Garage'); ?></b></label><br /> 
                                      <sup>(<?php echo $this->lang->line('included in purchase price'); ?>)</sup>
                                      <input type="number" name="garage" id="garage" value="<?php if ( isset( $rei['garage'] ) ) echo $rei['garage']; ?>" placeholder="<?php echo $this->lang->line('Garage'); ?> <?php echo $rei['currency']; ?>" data-parsley-type="number" data-parsley-length="[1, 10]" class="form-control has-feedback-left">
                                      
                                    </div>
                                </div>
                            </div>   

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group has-focused form-input-icon">
                                      <label for="renovationprice"><b><?php echo $this->lang->line('Renovation'); ?></b></label><br />
                                      <i class="icmn-pie-chart font-green"></i>
                                      <input type="number" name="renovationprice" id="renovationprice" value="<?php if ( isset( $rei['renovationprice'] ) ) echo $rei['renovationprice']; ?>" placeholder="<?php echo $this->lang->line('Renovation'); ?> <?php echo $rei['currency']; ?>" data-parsley-type="alphanum" data-parsley-length="[1, 10]" class="form-control has-feedback-left">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="rating"><?php echo $this->lang->line('Rating'); ?></label>
                                    
                                      <select class="form-control parsley-error" id="rating" name="rating" data-parsley-required>
                                        <option value="0" <?php if ( isset ( $rei['rating'] ) && $rei['rating'] == '0' ) echo "selected"; ?>>0 (bad)</option>
                                        <option value="1" <?php if ( isset ( $rei['rating'] ) && $rei['rating'] == '1' ) echo "selected"; ?>>1 * (average)</option>
                                        <option value="2" <?php if ( isset ( $rei['rating'] ) && $rei['rating'] == '2' ) echo "selected"; ?>>2 ** (good)</option>
                                        <option value="3" <?php if ( isset ( $rei['rating'] ) && $rei['rating'] == '3' ) echo "selected"; ?>>3 *** (perfect)</option>
                                      </select>

                                    </div>
                                </div>
                            </div>     

                            <hr />

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group color-success">
                                      <label for="rentgross"><?php echo $this->lang->line('Rent'); ?> <?php echo $this->lang->line('gross'); ?></label><br/ >
                                      <sup>(<?php echo $this->lang->line('incl. overheads, reserve &amp; taxes'); ?>)</sup>
                                      <input type="text" name="rentgross" id="rentgross" value="<?php if ( isset( $rei['rentgross'] ) ) echo $rei['rentgross']; ?>" placeholder="<?php echo $this->lang->line('Rent'); ?> <?php echo $this->lang->line('gross'); ?> <?php echo $rei['currency']; ?>" data-parsley-type="alphanum" class="form-control">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group color-info">
                                      <label for="overheads"><?php echo $this->lang->line('Overheads'); ?></label><br />
                                        <sup>&nbsp;</sup>
                                      <input type="text" name="overheads" id="overheads" value="<?php if ( isset( $rei['overheads'] ) ) echo $rei['overheads']; ?>" placeholder="<?php echo $this->lang->line('Overheads'); ?> <?php echo $rei['currency']; ?>"data-parsley-type="alphanum" class="form-control">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group color-info">
                                      <label for="reserve"><?php echo $this->lang->line('Reserve'); ?></label><br />
                                       <sup>&nbsp;</sup>
                                      <input type="text" name="reserve" id="reserve" value="<?php if ( isset( $rei['reserve'] ) ) echo $rei['reserve']; ?>" placeholder="<?php echo $this->lang->line('Reserve'); ?> <?php echo $rei['currency']; ?>" data-parsley-type="alphanum" class="form-control">

                                    </div>
                                </div>

                            </div> 

                            <hr />

                            <p><b><?php echo $this->lang->line('Features'); ?></b></p>

                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="freerent" id="freerent" value="1" class="js-switch" <?php if ( isset ( $rei['freerent'] ) && $rei['freerent'] == 1 ) echo "checked"; ?> /> <?php echo $this->lang->line('Free rent price'); ?>
                                        </label>
                                      </div>

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="goodlocation" id="goodlocation" value="1" class="js-switch" <?php if ( isset ( $rei['goodlocation'] ) && $rei['goodlocation'] == 1 ) echo "checked"; ?> /> <?php echo $this->lang->line('Good location'); ?>
                                        </label>
                                      </div>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="attic" id="attic" value="1" class="js-switch" <?php if ( isset ( $rei['attic'] ) && $rei['attic'] == 1 ) echo "checked"; ?> /> <?php echo $this->lang->line('Attic'); ?> 
                                        </label>
                                      </div>

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="patio" id="patio" value="1" class="js-switch" <?php if ( isset ( $rei['patio'] ) && $rei['patio'] == 1 ) echo "checked"; ?> /> <?php echo $this->lang->line('Patio'); ?>
                                        </label>
                                      </div>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="publictransport" id="publictransport" value="1" class="js-switch" <?php if ( isset ( $rei['publictransport'] ) && $rei['publictransport'] == 1 ) echo "checked"; ?>  /> <?php echo $this->lang->line('Public transport'); ?>
                                        </label>
                                      </div>

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="kitchen" id="kitchen" value="1" class="js-switch" <?php if ( isset ( $rei['kitchen'] ) && $rei['kitchen'] == 1 ) echo "checked"; ?> /> <?php echo $this->lang->line('Kitchen'); ?>
                                        </label>
                                      </div>

                                      <div class="">
                                        <label>
                                          <input type="checkbox" name="vatreduction" id="vatreduction" value="1" class="js-switch" <?php if ( isset ( $rei['vatreduction'] ) && $rei['vatreduction'] == 1 ) echo "checked"; ?> /> <?php echo $this->lang->line('VAT reduction'); ?>
                                        </label>
                                      </div>

                                    </div>
                                </div>

                            </div> 

                            <hr />

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                      <label for="street"><?php echo $this->lang->line('Street'); ?></label>
                                      <input type="text" name="street" id="street" value="<?php if ( isset( $rei['street'] ) ) echo $rei['street']; ?>" placeholder="<?php echo $this->lang->line('Street'); ?>" data-parsley-type="alphanum" class="form-control">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                      <label for="zip"><?php echo $this->lang->line('ZIP'); ?> <span class="required">*</span></label>
                                      <input type="number" name="zip" id="zip" value="<?php if ( isset( $rei['zip'] ) ) echo $rei['zip']; ?>" placeholder="ZIP" data-parsley-type="number" data-parsley-required class="form-control parsley-error">                        
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                      <label for="city"><?php echo $this->lang->line('City'); ?></label>
                                      <input type="text" name="city" id="city" value="<?php if ( isset( $rei['city'] ) ) echo $rei['city']; ?>" placeholder="<?php echo $this->lang->line('City'); ?>" data-parsley-type="alphanum" data-parsley-required class="form-control">
                                      
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                      <label for="country"><?php echo $this->lang->line('Country'); ?> <span class="required">*</span></label>
                                    
                                      <select class="form-control parsley-error" id="country" name="country" data-parsley-required>
                                        <option value="Austria" <?php if ( isset ( $rei['country'] ) && $rei['country'] == 'Austria' ) echo "selected"; ?>><?php echo $this->lang->line('Austria'); ?></option>
                                        <option value="Germany" <?php if ( isset ( $rei['country'] ) && $rei['country'] == 'Germany' ) echo "selected"; ?>><?php echo $this->lang->line('Germany'); ?></option>
                                        <option value="Other" <?php if ( isset ( $rei['country'] ) && $rei['country'] == 'Other' ) echo "selected"; ?>><?php echo $this->lang->line('Other'); ?></option>
                                      </select>

                                    </div>
                                </div>
                            </div>  

                            <hr />

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="description" class="control-label"><?php echo $this->lang->line('Description'); ?></label>
                                    <textarea name="description" id="description" value="<?php if ( isset( $rei['description'] ) ) echo $rei['description']; ?>" class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                                <div class="col-md-6">
                                  <label for="link" class="control-label"><?php echo $this->lang->line('Link to real estate ad'); ?></label>
                                  <input type="text" name="link" id="link" value="<?php if ( isset( $rei['link'] ) ) echo $rei['link']; ?>" placeholder="http(s)://" data-parsley-type="alphanum" class="form-control">
                        
                                </div>
                            </div>

                            <hr />


                            <div class="form-group row">
                                <div class="col-md-4">
                                  <label for="equityratio"><?php echo $this->lang->line('Equity ratio'); ?></label><br />
                                  <sup>0-100%</sup>

                                  <select class="form-control parsley-error" id="equityratio" name="equityratio" data-parsley-required>

                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0' ) echo "selected"; ?>   value="0">0 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.1' ) echo "selected"; ?> value="0.1">10 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.2' ) echo "selected"; ?> value="0.2">20 %</option>
                                    <option <?php if ( !isset ( $rei['equityratio'] ) || ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.3' ) ) echo "selected"; ?> value="0.3">30 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.4' ) echo "selected"; ?> value="0.4">40 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.5' ) echo "selected"; ?> value="0.5">50 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.6' ) echo "selected"; ?> value="0.6">60 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.7' ) echo "selected"; ?> value="0.7">70 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.8' ) echo "selected"; ?> value="0.8">80 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.9' ) echo "selected"; ?> value="0.9">90 %</option>
                                    <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '1.0' ) echo "selected"; ?> value="1.0">100 %</option>

                                  </select>

                                </div>
                                <div class="col-md-4">
                                  <label for="agent"><?php echo $this->lang->line('Agent'); ?></label><br />
                                  <sup>(<?php echo $this->lang->line('empty = standard, 0 = 0 EUR, number = special price'); ?>)</sup>
                                  <input type="number" name="agent" id="agent" value="<?php if ( isset( $rei['agent'] ) ) echo $rei['agent']; ?>" placeholder="<?php echo $this->lang->line('Agent'); ?>" data-parsley-type="alphanum" class="form-control has-feedback-left">
                                  <input type="checkbox" name="agent_default" id="agent_default" value="1" class="js-switch" /> <?php echo $this->lang->line('Use 3.6% default agent rate'); ?>                                
                                </div>
                                <div class="col-md-4">
                                  <label for="title"><?php echo $this->lang->line('Create date'); ?><span class="required">*</span></label><br />
                                  <sup>(YYYY-MM-DD)</sup>
                                  <input type="text" name="createdate" id="createdate" value="<?php if ( isset( $rei['createdate'] ) )  { echo $rei['createdate']; } else { echo date("Y-m-d", time()); } ?>" placeholder="<?php echo $this->lang->line('Create date'); ?>" data-parsley-type="alphanum" data-parsley-length="[2, 255]" data-parsley-required="true" class="form-control has-feedback-left parsley-error"> 
                        
                                </div>
                            </div>

                            <hr />
                            <p><b><?php echo $this->lang->line('Settings'); ?></b></p>

                            <div class="form-group row has-warning">
                                <div class="col-md-4">
                                  <label for="link" class="control-label"><?php echo $this->lang->line('Lawyer &amp; notary'); ?></label><br />
                                  <sup>0-100%</sup>
                                  <input type="text" name="lawyerpercent" id="lawyerpercent" value="<?php if ( isset( $rei['lawyerpercent'] ) ) echo $rei['lawyerpercent']; else echo $rei['rate']['notary']*100; ?>" placeholder="<?php echo $rei['rate']['notary']*100; ?>" data-parsley-type="alphanum" class="form-control">

                                </div>
                                <div class="col-md-4">
                                  <label for="link" class="control-label"><?php echo $this->lang->line('Purchase tax'); ?></label><br />
                                  <sup>0-100%</sup>
                                  <input type="text" name="purchasetax" id="purchasetax" value="<?php if ( isset( $rei['purchasetax'] ) ) echo $rei['purchasetax']; else echo $rei['rate']['landregistry']*100;?>" placeholder="<?php echo $rei['rate']['landregistry']*100; ?>" data-parsley-type="alphanum" class="form-control">

                                </div>
                                <div class="col-md-4">
                                  <label for="link" class="control-label"><?php echo $this->lang->line('Loan registry %'); ?></label><br />
                                  <sup>0-100%</sup>
                                  <input type="text" name="loanregistrypercent" id="loanregistrypercent" value="<?php if ( isset( $rei['loanregistrypercent'] ) ) echo $rei['loanregistrypercent']; else echo $rei['rate']['loan']*100; ?>" placeholder="<?php echo $rei['rate']['loan']*100; ?>" data-parsley-type="alphanum" class="form-control">
                        
                                </div>
                            </div>
                            <div class="form-group row has-warning">
                                <div class="col-md-4">
                                  <label for="link" class="control-label"><?php echo $this->lang->line('Depreciation'); ?> %</label><br />
                                  <sup>0-100%</sup>
                                  <input type="text" name="depreciationpercent" id="depreciationpercent" value="<?php if ( isset( $rei['depreciationpercent'] ) ) echo $rei['depreciationpercent']; else echo $rei['rate']['depreciation']*100; ?>" placeholder="<?php echo $rei['rate']['depreciation']*100; ?>" data-parsley-type="alphanum" class="form-control">

                                </div>
                                <div class="col-md-4">
                                  <label for="link" class="control-label"><?php echo $this->lang->line('Rent tax'); ?> %</label><br />
                                  <sup>0-100%</sup>
                                  <input type="text" name="taxpercent" id="taxpercent" value="<?php if ( isset( $rei['taxpercent'] ) ) echo $rei['taxpercent']; else echo $rei['rate']['renttax']*100; ?>" placeholder="<?php echo $rei['rate']['renttax']*100; ?>" data-parsley-type="alphanum" class="form-control">

                                </div>
                                <div class="col-md-4">
                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1">
                                  
                                </div>
                                <div class="col-md-6">
                                  <button type="submit" class="btn btn-success"><?php echo $this->lang->line('Submit'); ?></button>
                                  <!--<button type="submit" class="btn btn-primary">Cancel</button>-->

                                   <a class="btn btn-success" href="/brommo/index.php?/realestate/list_reobjects/"><?php echo $this->lang->line('Back to overview'); ?></a>

                                </div>
                                <div class="col-md-5">
                        
                                </div>

                            </div>
                        </form>
                        <!-- End Column Sizing -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

</div>
</section>
