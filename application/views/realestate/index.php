
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <!--
              <div class="title_left">
                <h3>Brommo APP for real estate</h3>
              </div>
              -->

              <div class="title_right">
<!--//
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
//-->                
              </div>
            </div>
            <div class="clearfix"></div>

              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  	<h2>Overview of real estate objects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />

 					          <div class="clearfix"></div>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
<!--//
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
//-->                            
                            <th class="column-title">Title </th>
                            <th class="column-title">Location </th>
                            <th class="column-title">Price </th>
                            <th class="column-title">Size</th>
                            <th class="column-title">KPIs</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span></th>
<!--//
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
//-->
                          </tr>
                        </thead>

                        <tbody>

					<?php $i=1; foreach ($realestate as $object_item): ?>

                          <tr class="<?php $i++; if ($i%2==0) echo "even"; else echo "odd"; ?> pointer">
<!--//
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
//-->                            
                            <td width="30%" class=" "><a href="<?php echo site_url('realestate/'.$object_item['objid']); ?>"><?php echo $object_item['title']; ?></a></td>
                            <td class=" "><?php echo $object_item['zip']; ?> <?php echo $object_item['city']; ?><br /><?php echo $object_item['street']; ?></td>
                            <td class=" ">€ <?php echo number_format($object_item['purchaseprice'],2,'.',','); ?> <!--<i class="success fa fa-long-arrow-up"></i>--> <a href="<?php echo site_url('realestate/delete/'.$object_item['objid']); ?>">[X]</a></td>
                            <td class=" "><?php echo $object_item['size']; ?> m2 / <?php echo $object_item['outdoorspace']; ?> m2</td>
                            <td width="20%" class="a-right a-right ">Yield <?php echo number_format($object_item['yield'], 2); ?>%<br />
                              Earnings <?php echo number_format($object_item['earnings'], 2); ?> €<br />
                              Cashflow <?php echo number_format($object_item['cashflow'], 2); ?> €
                            </td>
                            <td class=" last">
                              <a href="<?php echo site_url('realestate/'.$object_item['objid']); ?>">[View]</a> | 
                              <a href="<?php echo site_url('realestate/edit/'.$object_item['objid']); ?>">[Edit]</a>
                              
                            </td>
                          </tr>

					<?php endforeach; ?>

                        </tbody>
                      </table>
                     </div>

                     <a class="btn btn-success" href="/brommo/index.php?/realestate/create">Create real estate object</a>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

       



