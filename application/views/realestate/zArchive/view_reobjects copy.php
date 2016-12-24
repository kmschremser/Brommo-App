<section class="page-content">
<div class="page-content-inner">

    <section class="panel">

        <div class="panel-heading">
            <h2><?php echo $rei['title']; ?></h2>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="margin-bottom-50">
                        <!--<h4><?php echo $this->lang->line('Price'); ?></h4>-->
                        <p><?php echo $rei['description']; ?> ...&nbsp;</p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                            
                                <tbody>
                                <tr>
                                    <td class="text-nowrap">
                                        <code><b><?php echo $this->lang->line('Price'); ?> (<?php echo $this->lang->line('gross'); ?>)</b><br />
                                        (<?php echo $this->lang->line('incl. VAT &amp; garage'); ?>)</code>
                                    </td>
                                    <td class="color-success"><?php echo number_format($rei['purchaseprice'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></span></td>
                                </tr>
<?php if ( $rei['vatreduction'] == 1 ) { ?>
                                <tr>
                                    <td class="text-nowrap">
                                        <code><?php echo $this->lang->line('Price'); ?> (<?php echo $this->lang->line('net'); ?>)<br />
                                        (<?php echo $this->lang->line('excl. VAT &amp; incl. garage'); ?>)</code>
                                    </td>
                                    <td>
                                        <?php echo number_format(($rei['purchasepricenet']), 2, '.', ','); ?> <?php echo $rei['currency']; ?>
                                    </td>
                                </tr>
<?php } ?>
                                <tr>
                                    <td class="text-nowrap">
                                        <code><?php echo $this->lang->line('Size'); ?></code>
                                    </td>
                                    <td><?php echo $rei['size']; ?> <?php echo $rei['sizeunit']; ?> + <?php echo $this->lang->line('outdoor'); ?> <?php echo $rei['outdoorspace']; ?>  <?php echo $rei['sizeunit']; ?></td>
                                </tr>
<?php $total_price = $rei['total_price']; ?>

                              <tr>
                                <th class="color-info"><?php echo $this->lang->line('TOTAL PRICE'); ?></th>
                                <td class="color-info"><strong><?php echo number_format($rei['total_price'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></strong></td>
                              </tr>
<!--//
                              <tr>
                                <th><?php echo $this->lang->line('Price per m2') . ' ' . $this->lang->line('(excl. garage)'); ?>:</th>
                                <td><?php echo number_format(($rei['price_per_m2_exclgarage']), 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><?php echo $this->lang->line('Price per m2') . ' ' . $this->lang->line('(excl. outdoor)'); ?>:</th>
                                <td><?php echo number_format(($rei['price_per_m2']), 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr> 
//-->                                  
                              <tr>
                                <th><code><?php echo $this->lang->line('Price per m2') . ' ' . $this->lang->line('(incl. outdoor, excl. garage)'); ?>:</code></th>
                                <td class="color-info"><?php echo number_format(($rei['price_per_m2_incloutdoor']), 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
<?php if ( isset( $rei['avg_price'] ) ) { ?>                              
                              <tr>
                                <th><code><?php echo $this->lang->line('AVG m2 for this area'); ?>:</code></th>
                                <td><?php echo number_format($rei['avg_price'], 2, '.',','); ?> <?php echo $rei['currency']; ?> <br />(
<?php 
    if ( $rei['diff_price'] > 0 ) 
      echo '<span class="color-success">' . $this->lang->line('good') .' '; 
    else 
      echo '<span class="color-warning">' . $this->lang->line('check') .' '; 
    
    echo number_format( $rei['diff_price'], 2, '.', ','); 
?>                              <?php echo $rei['currency']; ?> </span>)
                                </td>
                              </tr>     
<?php } ?>                              
                                </tbody>
                            </table>

                            <section class="panel">
                                <div class="panel-body">
                                    <div class="profile-user-skills">
                                        <h5><?php echo $this->lang->line('Rent'); ?> <?php echo $this->lang->line('gross'); ?>:
                                        <span class="color-success"><?php echo number_format($rei['rentgross'], 2, '.', ','); echo $rei['addit'] . $rei['estimated1']; ?></span>, 
                                        <span class="color-info"><?php echo number_format( ($rei['rentgross']/$rei['total_size']), 2, '.', ',' ); ?> <?php echo $rei['currency']; ?> <?php echo $this->lang->line('per m2'); ?>)</span><br />
                                        (<?php echo $this->lang->line('incl. overheads, reserve &amp; taxes'); ?>)</span></h5>
                                        <p>
                                            <?php echo $this->lang->line('Rent net per m2 (incl. 50% outdoor)'); ?> 
                                            <?php echo number_format( $rei['rent_net_per_m2'], 2, '.', ',' ); ?> <?php echo $rei['currency']; ?>
                                        </p>

                                        <h6><?php echo $this->lang->line('AVG rent in this area'); ?>: 
                                        <span class="color-success"><?php echo number_format($rei['alt_rent'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></span>, <span class="color-info"><?php echo number_format($rei['rent_rate'], 2, '.', ','); ?> <?php echo $rei['currency']; ?> <?php echo $this->lang->line('per m2'); ?></span><br />
                                        (<?php if ( $rei['diff_rent'] > 0 ) echo '<span class="color-danger">' . $this->lang->line('check') . ' '; else echo '<span class="color-success">' . $this->lang->line('good') . ' '; ?>
                                        <?php echo number_format($rei['diff_rent'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></span> )<br />
                                        </h6>

                                        <canvas id="chart-doughnut" width="910" height="454" style="display: block; width: 455px; height: 227px;"></canvas>

                                    </div>
                                </div>
                            </section>

                        </div>

                        <br />
                        <div class="cui-ecommerce--product--option_title">
                            <b><?php echo $this->lang->line('Features'); ?></b>
                        </div>
                        <div class="cui-ecommerce--product--option">
                            <div class="cui-ecommerce--catalog--item--descr--sizes">

                              <?php if ( $rei['freerent'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Free rent price'); ?></span><?php } ?>
                              <?php if ( $rei['goodlocation'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Good location'); ?></span><?php } ?>
                              <?php if ( $rei['attic'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Attic'); ?></span><?php } ?>
                              <?php if ( $rei['patio'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Patio'); ?></span><?php } ?>
                              <?php if ( $rei['publictransport'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Public transport'); ?></span><?php } ?>
                              <?php if ( $rei['garage'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Garage'); ?></span><?php } ?>
                              <?php if ( $rei['kitchen'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('Kitchen'); ?></span><?php } ?>
                              <?php if ( $rei['vatreduction'] == 1 ) { ?><span data-toggle="tooltip" data-placement="right" title=""><?php echo $this->lang->line('VAT reduction'); ?></span><?php } ?></dd>

                            </div>
                        </div>

                          <div class="table-responsive">
                            <table class="table table-hover">
<!--
                            <thead>
                              <tr>
                                <th>Description</th>
                                <th>Value</th>
                              </tr>
                            </thead>
-->                            
                            <tbody>
                              <tr>
                                <th><code><?php echo $this->lang->line('Renovation'); ?>:</code></th>
                                <td><?php echo number_format($rei['renovationprice'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Price of garage'); ?>:</code></th>
                                <td><?php echo number_format($rei['garage'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>       

<?php $agentprice = $rei['agentprice']; ?>  

                              <tr>
                                <th><code><?php echo $this->lang->line('Agent'); ?>:</code></th>
                                <td><?php echo number_format($rei['agentprice'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Lawyer / Notary'); ?>:</code></th>
                                <td><?php echo number_format(($rei['notary']), 2, '.', ','); // 2,0% ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Purchase Tax / Land registry'); ?>:</code></th>
                                <td><?php echo number_format(($rei['landregistry']), 2, '.', ','); // 4,6% ?> <?php echo $rei['currency']; ?></td>
                              </tr>

<?php if ( $rei['loanregistrycost'] ) { ?>

                              <tr>
                                <th><code><?php echo $this->lang->line('Loan Registry costs: (in case of loan)'); ?></code></th>
                                <td><?php echo number_format(($rei['loanregistrycost']), 2, '.', ','); // 2,3% ?> <?php echo $rei['currency']; ?></td>
                              </tr>

<?php } ?>

<?php $total_price = $rei['total_price']; ?>

                              <tr>
                                <th class="color-info"><?php echo $this->lang->line('TOTAL PRICE'); ?></th>
                                <td class="color-info"><strong><?php echo number_format($rei['total_price'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></strong></td>
                              </tr>
<!--//
                              <tr>
                                <th><code><?php echo $this->lang->line('Price per m2 (excl. garage)'); ?>:</code></th>
                                <td><?php echo number_format(($rei['price_per_m2_exclgarage']), 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Price per m2 (excl. outdoor)'); ?>:</code></th>
                                <td><?php echo number_format(($rei['price_per_m2']), 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr> 
//-->
                                                                               
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <th class="color-info"><?php echo $this->lang->line('LOAN - EQUITY RATIO'); ?>:</th>
                                <td><span class="color-info"><?php echo $rei['equityratio']*100; ?> %</span></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Equity'); ?>:</code></th>
                                <td><?php echo number_format($rei['equitysum'], 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Loan sum'); ?>:</code></th>
                                <td><?php echo number_format($rei['loansum'], 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Loan rate'); ?> <?php echo $this->lang->line('p.a.'); ?>:</code></th>
                                <td><?php echo number_format($rei['loan_rate'], 2, '.',','); ?> <?php echo $rei['currency']; ?><br />
                                  (<?php echo number_format($rei['loan_rate']/12, 2, '.',','); ?> <?php echo $rei['currency']; ?> <?php echo $this->lang->line('p.m.'); ?>)
                                </td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Payback'); ?> <?php echo $this->lang->line('p.a.'); ?>:</code></th>                                
                                <td><?php echo number_format($rei['capital_payback'], 2, '.',','); ?> <?php echo $rei['currency']; ?><br />
                                  (<?php echo number_format($rei['capital_payback']/12, 2, '.',','); ?> <?php echo $rei['currency']; ?> <?php echo $this->lang->line('p.m.'); ?>)
                                </td>
                              </tr>

                            </tbody>
                          </table>                          
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="margin-bottom-50">
                        <!--<h4 class="example-title">Additional info</h4>-->

                        <p>
                            <?php echo $rei['street']; ?>, <?php echo $rei['zip']; ?> <?php echo $rei['city']; ?>, <?php echo $rei['country']; ?> 
                            &nbsp;&nbsp;
                            <a class=" link-underlined link-blue" target="_blank" href="http://maps.google.com/?q=<?php echo $rei['street']; ?>,<?php echo $rei['zip']; ?> <?php echo $rei['city']; ?>,<?php echo $rei['country']; ?>">
                                <span class="left-menu-link-icon icmn-books"></span> <?php echo $this->lang->line('Open in Maps'); ?>
                            </a>
                        </p>

                        <div class="cui-ecommerce--catalog--item">
                        <div class="cui-ecommerce--catalog--item--img">
                            <div class="cui-ecommerce--catalog--item--status">
                                <span class="cui-ecommerce--catalog--item--status--title"><?php echo $this->lang->line('New'); ?></span>
                            </div>
                            <a href="javascript: void(0);">
                                <?php if ( isset( $rei['mainimage'] ) ) { ?>
                                    <img alt="" src="<?php echo $rei['mainimage']; ?>" width="100%" />
                                <?php } ?>

                            </a>

                        <div class="cui-ecommerce--product--rating vertical-align-bottom">

                            <div class="steps-inline display-block">
                                <a href="javascript: void(0);" class="step-block">1</a>
                                <a href="javascript: void(0);" class="step-block">2</a>
                                <a href="javascript: void(0);" class="step-block">3</a>
                            </div>   

                        </div>
                        
                        </div>

                    </div>

                        <div class="example-block">

    <?php if ( isset( $rei['link'] ) && $rei['link'] != "" ) { ?>
                            <p>
                                <a class="link-underlined link-blue" href="<?php echo $rei['link']; ?>" target="_blank">
                                    <span class="left-menu-link-icon icmn-books"></span> <?php echo $this->lang->line('Open Original Post'); ?>
                                </a>
                            </p>
    <?php } ?>
                            <p><?php echo $this->lang->line('Exists since'); ?>: <?php echo $rei['createdate']; ?></p>
                            <p><?php echo $this->lang->line('Last activity'); ?>: <?php echo $rei['modification']; ?></p>

                            <div>
                             <a class="btn btn-success" href="/brommo/index.php?/realestate/edit_reobjects/<?php echo $rei['objid']; ?>"><?php echo $this->lang->line('Edit'); ?></a>
                             <a class="btn btn-success" href="/brommo/index.php?/realestate/list_reobjects"><?php echo $this->lang->line('Back to overview'); ?></a>
                            </div>

                        </div>
                        <br />

                        <div class="table-responsive">
                            <table class="table table-hover">

                              <tr>
                                <th class="warning"><code><?php echo $this->lang->line('YIELD (Total cost / net rent p.a.)'); ?>:</code></th>
                                <td class="warning"><?php echo number_format($rei['yield'], 2, '.', ','); ?> %</td>
                              </tr> 

                              <tr>
                                <th><code><?php echo $this->lang->line('Risk p.a. (5% of rent)'); ?>:</code></th>
                                <td><?php echo number_format($rei['risk'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>

                              <tr>
                                <th><code><?php echo $this->lang->line('Refurbishment p.a (1 € per m2)'); ?>:</code></th>
                                <td><?php echo number_format($rei['refurb'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>  

<?php if ( $rei['vatreduction'] == 1 ) { ?>
                              <tr>
                                <th><code><?php echo $this->lang->line('VAT Reduction'); ?>:</code></th>
                                <td><?php echo number_format($rei['vat_red'], 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>  
<?php } else $data['vat_red'] = 0; ?>
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <th class="color-info"><?php echo $this->lang->line('TAXES'); ?>:</th>
                                <td></td>
                              </tr> 
                              <tr>
                                <th><code><?php echo $this->lang->line('Rent net'); ?> <?php echo $this->lang->line('p.a.'); ?></code></th>
                                <td><?php echo number_format(($rei['rent_net'] * 12), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Depreciation'); ?> <?php echo $this->lang->line('p.a.'); ?></code></th>
                                <td><?php echo number_format(($rei['depreciation'] * -1), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Loan rate'); ?> <?php echo $this->lang->line('p.a.'); ?></code></th>
                                <td><?php echo number_format(($rei['loan_rate'] * -1), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Profite'); ?> <?php echo $this->lang->line('p.a.'); ?></code></th>
                                <td><?php echo "<span class='blue'><b>" . number_format($rei['profite'], 2, '.', ',')  . "</b></span>"; ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Taxes'); ?> <?php echo $this->lang->line('p.a.'); ?></code></th>
                                <td><?php echo number_format(($rei['taxes']), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th class="color-warning"><?php echo $this->lang->line('Earnings'); ?> <?php echo $this->lang->line('p.a.'); ?><br /><?php echo $this->lang->line('(incl. VAT reduction + depreciation)'); ?></th>
                                <td class="color-warnings"><?php echo number_format($rei['earnings'], 2, '.', ','); ?> <?php echo $rei['currency']; ?><br />
                                <?php echo number_format($rei['earnings']/12, 2, '.', ','); ?> <?php echo $rei['currency']; ?> <?php echo $this->lang->line('p.m.'); ?><br />
                              </td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Refinancing in years'); ?></code></th>
                                <td><?php echo number_format($rei['refinancing'], 0, '.', ','); ?> <?php echo $this->lang->line('ys.'); ?><br />
                                ( <?php echo number_format($rei['refinancing2'], 0, '.', ','); ?> <?php echo $this->lang->line('ys.'); ?> <?php echo $this->lang->line('without loan'); ?> )
                              </td>
                              </tr>
 
                               <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <th class="color-info"><?php echo $this->lang->line('CASHFLOW'); ?></code>:</th>
                                <td></td>
                              </tr> 
                              <tr>
                                <th><code><?php echo $this->lang->line('Rent net'); ?> <?php echo $this->lang->line('p.a.'); ?></code></th>
                                <td><?php echo number_format(($rei['rent_net'] * 12), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('VAT Reduction'); ?></code></th>
                                <td><?php 
                                echo number_format(($rei['vat_red'] * -1), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Loan'); ?></code></th>
                                <td>
                                <?php echo number_format($rei['capital_payback'] * -1, 2, '.',','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Tax on yield'); ?></code></th>
                                <td><?php                           
                                echo number_format(($rei['profite'] * -0.25), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th class="warning"><code><?php echo $this->lang->line('Cashflow p.a.'); ?></code><br /><?php echo $this->lang->line('{rent net <br />+vat red. <br />- loan (capital payback)}'); ?></th>
                                <td class="warning">
<?php 
  if ( $rei['cashflow'] > 0 ) 
    echo '<span class="color-success">' . $this->lang->line('good') . ' '; 
  else 
    echo '<span class="color-danger">' . $this->lang->line('check') . ' '; 
  
  echo number_format($rei['cashflow'], 2, '.', ',');

?> <?php echo $rei['currency']; ?></span><br />
<?php  echo number_format($rei['cashflow']/12, 2, '.', ','); ?> <?php echo $rei['currency']; ?> <?php echo $this->lang->line('p.m.'); ?>

                                </td>
                              </tr>

                              <tr>
                                <th><code><?php echo $this->lang->line('Risk + Refurbishment'); ?></code></th>
                                <td><?php 
                                echo number_format((($rei['risk']+$rei['refurb'])*-1), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('Cashflow p.a. (with risk+refurb)'); ?></code></th>
                                <td class="info"><?php 
                                echo number_format(($rei['cashflow2']), 2, '.', ','); ?> <?php echo $rei['currency']; ?></td>
                              </tr>
                              <tr>
                                <th><code><?php echo $this->lang->line('ROI (Experimental)'); ?></code></th>
                                <td class="info"><?php 
                                echo number_format(($rei['roi']), 2, '.', ','); ?> %</td>
                              </tr>

                            </table>
                        </div>
      
                    </div>
                    <!-- End Example Text Wrapping -->
                </div>

                <div class="clearfix visible-lg-block"></div>

            </div>
        </div>
    </section>
    <!-- End Text Related -->

<script>
<!--//
    $(function () {
        // DOUGHTNUT CHART
        var doughnutCtx = document.getElementById('chart-doughnut').getContext('2d');

        var chartDoughnut = {
            labels: [
                "<?php echo $this->lang->line('Overheads'); ?>: <?php echo $rei['overheads_curr'].$rei['estimated2']; ?>",
                "<?php echo $this->lang->line('Reserve'); ?>: <?php echo number_format($rei['reserve'], 2, '.', ','); ?> <?php echo $rei['currency']; ?>",
                "<?php echo $this->lang->line('Tax'); ?> (10%): <?php echo number_format( $rei['rent_net_tax'], 2, '.', ',' ); ?> <?php echo $rei['currency']; ?>",
                "<?php echo $this->lang->line('Rent net'); ?>: <?php echo number_format( $rei['rent_net'], 2, '.', ',' ); ?> €"
            ],
            datasets: [
                {
                    data: [<?php echo $rei['overheads_ratio']; ?>, <?php echo $rei['overheads_ratio']; ?>, <?php echo $rei['rent_net_tax_ratio']; ?>, <?php echo $rei['rent_net_ratio']; ?>],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#46BE8A"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#46BE8A"
                    ]
                }]
        };

        new Chart(doughnutCtx, {
            type: 'doughnut',
            data: chartDoughnut
        });



    });
//-->
</script>


</div>
</section>


