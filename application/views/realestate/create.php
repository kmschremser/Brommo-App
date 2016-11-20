
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_right">

              </div>
            </div>
            <div class="clearfix"></div>


              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php if ( isset( $rei['update'] ) ) { ?><?php echo $lang['Update of a real estate object']; ?><?php } else { ?>Registration of a real estate object<?php } ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />

                    <?php if ( validation_errors() !== null ) { ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <?php echo validation_errors(); ?>
                    </div>                    
                    <?php } ?>

                    <?php if ( isset( $rei['update'] ) ) echo form_open('realestate/update'); else echo form_open('realestate/create'); ?>

<!--//                    <form class="form-horizontal form-label-left"> //-->

                    <?php if ( isset( $rei['update'] ) ) { ?>
                    <input type="hidden" name="objid" value="<?php echo $rei['objid']?>" />
                    <?php } ?>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        
                        <label for="title">Short description of object <span class="required">*</span></label>
                        <input type="text" name="title" id="title" value="<?php if ( isset( $rei['title'] ) ) echo $rei['title']; ?>" placeholder="Real estate title" data-parsley-type="alphanum" data-parsley-length="[2, 255]" data-parsley-required="true" class="form-control has-feedback-left parsley-error">
                        <span class="fa fa-check-square form-control-feedback left" aria-hidden="true"></span>

                        <label for="purchaseprice">Purchase price (EUR) <span class="required">*</span> incl. VAT &amp; garage</label>
                        <input type="number" name="purchaseprice" id="purchaseprice" value="<?php if ( isset( $rei['purchaseprice'] ) ) echo $rei['purchaseprice']; ?>" placeholder="Purchase price (EUR)" data-parsley-type="alphanum" data-parsley-required class="form-control has-feedback-left parsley-error">

                        <label for="purchasepricenet">Purchase price net (EUR) <span class="required">*</span> excl. VAT &amp; incl. garage</label>
                        <input type="number" name="purchasepricenet" id="purchasepricenet" value="<?php if ( isset( $rei['purchasepricenet'] ) ) echo $rei['purchasepricenet']; ?>" placeholder="Purchase price net (EUR)" data-parsley-type="alphanum" data-parsley-required class="form-control has-feedback-left parsley-error">

                        <label for="renovationprice">Renovation price (EUR)</label>
                        <input type="number" name="renovationprice" id="renovationprice" value="<?php if ( isset( $rei['renovationprice'] ) ) echo $rei['renovationprice']; ?>" placeholder="Renovation price" data-parsley-type="alphanum" data-parsley-length="[1, 10]" class="form-control has-feedback-left">

                        <label for="garage">Garage price (EUR) *inluded in purchase price</label>
                        <input type="number" name="garage" id="garage" value="<?php if ( isset( $rei['garage'] ) ) echo $rei['garage']; ?>" placeholder="Garage price" data-parsley-type="number" data-parsley-length="[1, 10]" class="form-control has-feedback-left">

                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                        <label for="street">Street</label>
                        <input type="text" name="street" id="street" value="<?php if ( isset( $rei['street'] ) ) echo $rei['street']; ?>" placeholder="Street + No." data-parsley-type="alphanum" class="form-control">

                        <label for="zip">ZIP <span class="required">*</span></label>
                        <input type="number" name="zip" id="zip" value="<?php if ( isset( $rei['zip'] ) ) echo $rei['zip']; ?>" placeholder="ZIP" data-parsley-type="number" data-parsley-required class="form-control parsley-error">

                        <label for="city">City</label>
                        <input type="text" name="city" id="city" value="<?php if ( isset( $rei['city'] ) ) echo $rei['city']; ?>" placeholder="City" data-parsley-type="alphanum" data-parsley-required class="form-control">

                        <label for="country">Country <span class="required">*</span></label>
                        
                          <select class="form-control parsley-error" id="country" name="country" data-parsley-required>
                            <option <?php if ( isset ( $rei['country'] ) && $rei['country'] == 'Austria' ) echo "selected"; ?>>Austria</option>
                            <option <?php if ( isset ( $rei['country'] ) && $rei['country'] == 'Germany' ) echo "selected"; ?>>Germany</option>
                            <option <?php if ( isset ( $rei['country'] ) && $rei['country'] == 'Other' ) echo "selected"; ?>>Other</option>
                          </select>
                          <br /><br /><br /><br />
                      </div>

                      <div class="form-group">
                        <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea name="description" id="description" value="<?php if ( isset( $rei['description'] ) ) echo $rei['description']; ?>" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <label for="link" class="control-label col-md-3 col-sm-3 col-xs-12">Link to ad</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="link" id="link" value="<?php if ( isset( $rei['link'] ) ) echo $rei['link']; ?>" placeholder="http(s)://" data-parsley-type="alphanum" class="form-control">
                            <span class="form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

<!--//
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Phone">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
//-->

                      <div class="form-group has-feedback">
                        <hr />
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        
                        <label for="size">Size (m2) <span class="required">*</span></label>
                        <input type="text" name="size" id="size" value="<?php if ( isset( $rei['size'] ) ) echo $rei['size']; ?>" placeholder="Size (m2)" data-parsley-type="alphanum" data-parsley-required class="form-control has-feedback-left parsley-error">

                        <label for="outdoorspace">Outdoor space (m2)</label>
                        <input type="text" name="outdoorspace" id="outdoorspace" value="<?php if ( isset( $rei['outdoorspace'] ) ) echo $rei['outdoorspace']; ?>" placeholder="Outdoorspace (m2)" data-parsley-type="alphanum" class="form-control has-feedback-left">

                        <label for="agent">Agent (EUR) (null = standard, 0 = 0 EUR, number = special price)</label>
                        <input type="number" name="agent" id="agent" value="<?php if ( isset( $rei['agent'] ) ) echo $rei['agent']; ?>" placeholder="Agent (EUR)" data-parsley-type="alphanum" class="form-control has-feedback-left">
                        <input type="checkbox" name="agent_default" id="agent_default" value="1" class="js-switch" /> Use 3.6% default agent rate<br /> 

                        <label for="equityratio">Equity ratio (0-1) ==> 0-100%</label>
<!--//
                        <input type="number" name="equityratio" id="equityratio" value="<?php if ( isset ( $rei['equityratio'] ) ) echo $rei['equityratio']; else echo '1'; ?>" class="form-control has-feedback-left parsley-error">
//-->
                          <select class="form-control parsley-error" id="equityratio" name="equityratio" data-parsley-required>

                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0' ) echo "selected"; ?>   value="0">0 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.1' ) echo "selected"; ?> value="0.1">10 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.2' ) echo "selected"; ?> value="0.2">20 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.3' ) echo "selected"; ?> value="0.3">30 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.4' ) echo "selected"; ?> value="0.4">40 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.5' ) echo "selected"; ?> value="0.5">50 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.6' ) echo "selected"; ?> value="0.6">60 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.7' ) echo "selected"; ?> value="0.7">70 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.8' ) echo "selected"; ?> value="0.8">80 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '0.9' ) echo "selected"; ?> value="0.9">90 %</option>
                            <option <?php if ( isset ( $rei['equityratio'] ) && $rei['equityratio'] == '1.0' ) echo "selected"; ?> value="1.0">100 %</option>

                          </select>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                        <label for="rentgross">Rent gross (EUR) incl. tax, reserve and overheads</label>
                        <input type="text" name="rentgross" id="rentgross" value="<?php if ( isset( $rei['rentgross'] ) ) echo $rei['rentgross']; ?>" placeholder="Rent gross (EUR)" data-parsley-type="alphanum" class="form-control">

                        <label for="overheads">Overheads (EUR)</label>
                        <input type="text" name="overheads" id="overheads" value="<?php if ( isset( $rei['overheads'] ) ) echo $rei['overheads']; ?>" placeholder="Overheads (EUR)"data-parsley-type="alphanum" class="form-control">

                        <label for="reserve">Reserve (EUR)</label>
                        <input type="text" name="reserve" id="reserve" value="<?php if ( isset( $rei['reserve'] ) ) echo $rei['reserve']; ?>" placeholder="Reserve (EUR)" data-parsley-type="alphanum" class="form-control">

                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">ADDITIONAL</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                          <div class="">
                            <label>
                              <input type="checkbox" name="freerent" id="freerent" value="1" class="js-switch" <?php if ( isset ( $rei['freerent'] ) && $rei['freerent'] == 1 ) echo "checked"; ?> /> Free rent price
                            </label>
                          </div>

                          <div class="">
                            <label>
                              <input type="checkbox" name="goodlocation" id="goodlocation" value="1" class="js-switch" <?php if ( isset ( $rei['goodlocation'] ) && $rei['goodlocation'] == 1 ) echo "checked"; ?> /> Good location
                            </label>
                          </div>

                          <div class="">
                            <label>
                              <input type="checkbox" name="attic" id="attic" value="1" class="js-switch" <?php if ( isset ( $rei['attic'] ) && $rei['attic'] == 1 ) echo "checked"; ?> /> Attic 
                            </label>
                          </div>

                          <div class="">
                            <label>
                              <input type="checkbox" name="patio" id="patio" value="1" class="js-switch" <?php if ( isset ( $rei['patio'] ) && $rei['patio'] == 1 ) echo "checked"; ?> /> Patio
                            </label>
                          </div>

                          <div class="">
                            <label>
                              <input type="checkbox" name="publictransport" id="publictransport" value="1" class="js-switch" <?php if ( isset ( $rei['publictransport'] ) && $rei['publictransport'] == 1 ) echo "checked"; ?>  /> Public transport
                            </label>
                          </div>

                          <div class="">
                            <label>
                              <input type="checkbox" name="kitchen" id="kitchen" value="1" class="js-switch" <?php if ( isset ( $rei['kitchen'] ) && $rei['kitchen'] == 1 ) echo "checked"; ?> /> Kitchen
                            </label>
                          </div>

                          <div class="">
                            <label>
                              <input type="checkbox" name="vatreduction" id="vatreduction" value="1" class="js-switch" <?php if ( isset ( $rei['vatreduction'] ) && $rei['vatreduction'] == 1 ) echo "checked"; ?> /> VAT reduction (-20%)
                            </label>
                          </div>

                        </div>
                      </div>


                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        
                        <label for="title">Create date (YYYY-MM-DD)<span class="required">*</span></label>
                        <input type="text" name="createdate" id="createdate" value="<?php if ( isset( $rei['createdate'] ) )  { echo $rei['createdate']; } else { echo date("Y-m-d", time()); } ?>" placeholder="Create date" data-parsley-type="alphanum" data-parsley-length="[2, 255]" data-parsley-required="true" class="form-control has-feedback-left parsley-error">

                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->

                        </div>
                      </div>

                    </form>

                    <div class="clearfix"></div><br /><br />

                    <div>
                     <a class="btn btn-success" href="/brommo/index.php?/realestate/">Back to overview</a>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

       

