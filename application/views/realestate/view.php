

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $rei['title']; ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-6 col-sm-6 col-xs-12" style="border:0px solid #e5e5e5;">

                      <!--<h3 class="prod_title"></h3>-->
                      <p><?php echo $rei['street']; ?> - <?php echo $rei['zip']; ?> <?php echo $rei['city']; ?> - <?php echo $rei['country']; ?></p>
                      <p>[<a target="_blank" href="http://maps.google.com/?q=<?php echo $rei['street']; ?>,<?php echo $rei['zip']; ?> <?php echo $rei['city']; ?>,<?php echo $rei['country']; ?>">Show in Maps</a>]</p>
                      <p><i><?php echo $rei['description']; ?></i></p>
                      <?php if ( isset( $rei['link'] ) && $rei['link'] != "" ) { ?><p><a href="<?php echo $rei['link']; ?>" target="_blank">LINK: <?php echo $rei['link']; ?></a></p><?php } ?>
                      <p>Create date: <?php echo $rei['createdate']; ?> / Modified: <?php echo $rei['modification']; ?></p>
                      <br />


                      <div class="">
                        <ul class="list-inline prod_size">
                          <?php if ( $rei['freerent'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Free rent price</button></li><?php } ?>
                          <?php if ( $rei['goodlocation'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Good location</button></li><?php } ?>
                          <?php if ( $rei['attic'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Attic</button></li><?php } ?>
                          <?php if ( $rei['patio'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Patio</button></li><?php } ?>
                          <?php if ( $rei['publictransport'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Public transport</button></li><?php } ?>
                          <?php if ( $rei['garage'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Garage</button></li><?php } ?>
                          <?php if ( $rei['kitchen'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">Kitchen</button></li><?php } ?>
                          <?php if ( $rei['vatreduction'] == 1 ) { ?><li><button type="button" class="btn btn-default btn-xs">VAT reduction</button></li><?php } ?>
                        </ul>
                      </div>
                      <div class="">
                        <div class="product_price">
                          <h1 class="price"><?php echo number_format($rei['purchaseprice'], 2, '.', ','); ?> € Price</h1>
                          <p>* including garage and VAT</p>
<?php if ( $rei['vatreduction'] == 1 ) { ?>
                          <p>Net price (net): <?php echo number_format(($rei['purchasepricenet']), 2, '.', ','); ?></p>
<?php } ?>
                        <h2>Size <b><?php echo $rei['size']; ?> m2</b> / Outdoor <?php echo $rei['outdoorspace']; ?> m2</h2>

                          <br />
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Description</th>
                                <th>Value</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Renovation:</th>
                                <td><?php echo number_format($rei['renovationprice'], 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Garage: (incl. in price)</th>
                                <td><?php echo number_format($rei['garage'], 2, '.', ','); ?> €</td>
                              </tr>       

<?php $agentprice = $rei['agentprice']; ?>  

                              <tr>
                                <th>Agent:</th>
                                <td><?php echo number_format($rei['agentprice'], 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Lawyer/Notary:</th>
                                <td><?php echo number_format(($rei['notary']), 2, '.', ','); // 2,0% ?> €</td>
                              </tr>
                              <tr>
                                <th>Purchase Tax/Land registry:</th>
                                <td><?php echo number_format(($rei['landregistry']), 2, '.', ','); // 4,6% ?> €</td>
                              </tr>

<?php if ( $rei['loanregistrycost'] ) { ?>
                              <tr>
                                <th>Loan Registry costs: (in case of loan)</th>
                                <td><?php echo number_format(($rei['loanregistrycost']), 2, '.', ','); // 2,3% ?> €</td>
                              </tr>

<?php } ?>

<?php 
$total_price = $rei['total_price'];
?>
                              <tr>
                                <th class="warning"><h2>TOTAL PRICE</h2></th>
                                <td class="warning"><h2><strong><?php echo number_format($rei['total_price'], 2, '.', ','); ?> €</strong></h2></td>
                              </tr>
                              <tr>
                                <th>Price per m2 (excl. garage):</th>
                                <td><?php echo number_format(($rei['price_per_m2_exclgarage']), 2, '.',','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Price per m2 (excl. outdoor):</th>
                                <td><?php echo number_format(($rei['price_per_m2']), 2, '.',','); ?> €</td>
                              </tr>  
                              <tr>
                                <th>Price per m2 <br />(incl. outdoor space, excl. garage):</th>
                                <td class="info"><?php echo number_format(($rei['price_per_m2_incloutdoor']), 2, '.',','); ?> €</td>
                              </tr>
<?php

if ( isset( $rei['avg_price'] ) ) {
?>                              
                              <tr>
                                <th>AVG m2 for this location:</th>
                                <td><?php echo number_format($rei['avg_price'], 2, '.',','); ?> € <br />(
<?php 
    if ( $rei['diff_price'] > 0 ) 
      echo '<span class="green">good '; 
    else 
      echo '<span class="red">check '; 
    
    echo number_format( $rei['diff_price'], 2, '.', ','); 
?>                              € </span>)
                                </td>
                              </tr>     
<?php
}
?>                                                                                      
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <th>LOAN - EQUITY RATIO:</th>
                                <td><?php echo $rei['equityratio']*100; ?> %</td>
                              </tr>
                              <tr>
                                <th>Equity:</th>
                                <td><?php echo number_format($rei['equitysum'], 2, '.',','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Loan sum:</th>
                                <td><?php echo number_format($rei['loansum'], 2, '.',','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Loan rate p.a.: (2,3 %)</th>

                                <td><?php echo number_format($rei['loan_rate'], 2, '.',','); ?> €<br />
                                  (<?php echo number_format($rei['loan_rate']/12, 2, '.',','); ?> € p.m.)
                                </td>
                              </tr>
                              <tr>
                                <th>Payback p.a.:</th>                                

                                <td><?php echo number_format($rei['capital_payback'], 2, '.',','); ?> €<br />
                                  (<?php echo number_format($rei['capital_payback']/12, 2, '.',','); ?> € p.m.)
                                </td>
                              </tr>

                            </tbody>
                          </table>                          
                        </div>
                      </div> 
                                         
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="">

                        <?php if ( isset( $rei['mainimage'] ) ) { ?>
                        <img alt="" src="<?php echo $rei['mainimage']; ?>" width="100%" />
                        <?php } ?>

                        <div class="product_price">
                         
                          <h2 class="price"><?php echo number_format($rei['rent_gross'], 2, '.', ','); echo $rei['addit']; ?> rent gross</h2><br />
                          <?php echo number_format( ($rei['rent_gross']/$rei['total_size']), 2, '.', ',' ); ?> € per m2
                          <p>* including overheads, reserve and taxes</p>

                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Description</th>
                                <th>Value</th>
                              </tr>
                            </thead>
                            <tbody>
<?php

?>                               
                              <tr>
                                <th>Overheads:</th>
                                <td><?php echo $rei['overheads_curr']; ?></td>
                              </tr>
                              <tr>
                                <th>Reserve:</th>
                                <td><?php echo number_format($rei['reserve'], 2, '.', ','); ?> €</td>
                              </tr> 
                              <tr>
                                <th>Tax 10%:<br />Rent net:<br />Rent net per m2 (incl. 50% outdoor)</th>
                                <td><?php echo number_format( $rei['rent_net_tax'], 2, '.', ',' ) . " €"; ?><br />
                                <?php echo number_format( $rei['rent_net'], 2, '.', ',' ); ?> €<br />
                                <?php echo number_format( $rei['rent_net_per_m2'], 2, '.', ',' ); ?> €</td>
                              </tr>  
                            
                              <tr>
                                <th>AVG rent in this location:</th>
                                <td class="info"><?php echo number_format($rei['alt_rent'], 2, '.', ','); ?> € <br />(
                                  <?php 
                                  if ( $rei['diff_rent'] > 0 ) echo '<span class="red">check '; else echo '<span class="green">good '; 
                                  echo number_format($rei['diff_rent'], 2, '.', ','); ?> €</span> )<br />
                                  <?php echo number_format($rei['rent_rate'], 2, '.', ','); ?> € per m2</td>
                              </tr> 

                              <tr>
                                <th class="warning">YIELD (Total / Net rent*12):</th>
                                <td class="warning"><?php echo number_format($rei['yield'], 2, '.', ','); ?> %</td>
                              </tr> 

                              <tr>
                                <th>Risk p.a. (5% of rent):</th>
                                <td><?php echo number_format($rei['risk'], 2, '.', ','); ?> €</td>
                              </tr>

                              <tr>
                                <th>Refurbishment p.a (1 € per m2):</th>
                                <td><?php echo number_format($rei['refurb'], 2, '.', ','); ?> €</td>
                              </tr>  

<?php if ( $rei['vatreduction'] == 1 ) { ?>
                              <tr>
                                <th>VAT Reduction:</th>
                                <td><?php echo number_format($rei['vat_red'], 2, '.', ','); ?> €</td>
                              </tr>  
<?php } else $data['vat_red'] = 0; ?>
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <th>TAXES:</th>
                                <td></td>
                              </tr> 
                              <tr>
                                <th>Net rent p.a.</th>
                                <td><?php echo number_format(($rei['rent_net'] * 12), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Depreciation p.a.</th>
                                <td><?php echo number_format(($rei['depreciation'] * -1), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Loan rate p.a.</th>
                                <td><?php echo number_format(($rei['loan_rate'] * -1), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Profite p.a.</th>
                                <td><?php echo "<span class='blue'><b>" . number_format($rei['profite'], 2, '.', ',')  . "</b></span>"; ?> €</td>
                              </tr>
                              <tr>
                                <th>Taxes p.a.</th>
                                <td><?php echo number_format(($rei['taxes']), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th class="warning">Earnings p.a.<br /> (incl. VAT reduction + depreciation)</th>
                                <td class="warning"><?php echo number_format($rei['earnings'], 2, '.', ','); ?> €<br />
                                <?php echo number_format($rei['earnings']/12, 2, '.', ','); ?> € p.m.<br />
                              </td>
                              </tr>
                              <tr>
                                <th>Refinancing in years</th>
                                <td><?php echo number_format($rei['refinancing'], 0, '.', ','); ?> ys.<br />
                                ( <?php echo number_format($rei['refinancing2'], 0, '.', ','); ?> ys. without loan )
                              </td>
                              </tr>
 
                               <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <th>CASHFLOW:</th>
                                <td></td>
                              </tr> 
                              <tr>
                                <th>Net rent p.a.</th>
                                <td><?php echo number_format(($rei['rent_net'] * 12), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>VAT reduction</th>
                                <td><?php 
                                echo number_format(($rei['vat_red'] * -1), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Loan</th>
                                <td>
                                <?php echo number_format($rei['capital_payback'] * -1, 2, '.',','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Tax on yield</th>
                                <td><?php                           
                                echo number_format(($rei['profite'] * -0.25), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th class="warning">Cashflow p.a.<br />{rent net <br />+vat red. <br />- loan (capital payback)}</th>
                                <td class="warning">
<?php 
  if ( $rei['cashflow'] > 0 ) 
    echo '<span class="green">good '; 
  else 
    echo '<span class="red">check '; 
  
  echo number_format($rei['cashflow'], 2, '.', ','); 
?> €</span><br />
<?php  echo number_format($rei['cashflow']/12, 2, '.', ','); ?> € p.m.
                                </td>
                              </tr>

                              <tr>
                                <th>Risk + Refurbishment</th>
                                <td><?php 
                                echo number_format((($rei['risk']+$rei['refurb'])*-1), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>Cashflow p.a. (with risk+refurb)</th>
                                <td class="info"><?php 
                                echo number_format(($rei['cashflow2']), 2, '.', ','); ?> €</td>
                              </tr>
                              <tr>
                                <th>ROI (Experimental)</th>
                                <td class="info"><?php 
                                echo number_format(($rei['roi']), 2, '.', ','); ?> %</td>
                              </tr>

                            </table>
                          </div>
                      </div> 
                    </div>
                    <div>
                     <a class="btn btn-success" href="/brommo/index.php?/realestate/">Back to overview</a>
                     <a class="btn btn-success" href="/brommo/index.php?/realestate/edit/<?php echo $rei['objid']; ?>">Edit</a>

                    </div>
<!--//
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <div class="product-image">
                        <img src="https://cache.willhaben.at/tw/immo_genossenschaft.png" alt="..." />
                      </div>   

                      <div class="clearfix"></div>
                      <br /><br /><br />

                      <div>
                      <div id="mainb" style="height:400px;"></div>
                      </div>
                    </div>
//-->
                </div>
              </div>
            </div>
          </div>
        </div>       

<?php 
/**
    <!-- ECharts -->
    <script src="/brommo/public/vendors/echarts/dist/echarts.min.js"></script>

   <!-- ECharts -->
    <script>
      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartBarLine = echarts.init(document.getElementById('mainb'), theme);

      echartBarLine.setOption({
        title: {
          x: 'center',
          y: 'top',
          padding: [0, 0, 20, 0],
          text: 'Project Perfomance :: Revenue vs Input vs Time Spent',
          textStyle: {
            fontSize: 15,
            fontWeight: 'normal'
          }
        },
        tooltip: {
          trigger: 'axis'
        },
        toolbox: {
          show: true,
          feature: {
            dataView: {
              show: true,
              readOnly: false,
              title: "Text View",
              lang: [
                "Text View",
                "Close",
                "Refresh",
              ],
            },
            restore: {
              show: true,
              title: 'Restore'
            },
            saveAsImage: {
              show: true,
              title: 'Save'
            }
          }
        },
        calculable: true,
        legend: {
          data: ['Revenue', 'Cash Input', 'Time Spent'],
          y: 'bottom'
        },
        xAxis: [{
          type: 'category',
          data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        }],
        yAxis: [{
          type: 'value',
          name: 'Amount',
          axisLabel: {
            formatter: '{value} ml'
          }
        }, {
          type: 'value',
          name: 'Hours',
          axisLabel: {
            formatter: '{value} °C'
          }
        }],
        series: [{
          name: 'Revenue',
          type: 'bar',
          data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
        }, {
          name: 'Cash Input',
          type: 'bar',
          data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
        }, {
          name: 'Time Spent',
          type: 'line',
          yAxisIndex: 1,
          data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
        }]
      });
    </script>
    <!-- /ECharts -->
**/
?>
