

<section class="page-content">
<div class="page-content-inner">

    <!-- Dashboard -->
    <div class="dashboard-container">
               
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-with-borders m-b-0">
                    <div class="panel-body">

                        <div class="nav-tabs-horizontal margin-bottom-20">
                          <h2><?php echo $this->lang->line('List of real estate'); ?></h2>
<!--
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#h1" role="tab">Registered Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#h2" role="tab">Total Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#h3" role="tab">Administrators</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#h4" role="tab">Waiting for Registration</a>
                                </li>
                            </ul>
-->
                        </div>


                        <table class="table table-hover nowrap margin-bottom-0" id="example1" width="100%">
                            <thead>
                            <tr>
                                <th><?php echo $this->lang->line('Title'); ?> </th>
                                <th><?php echo $this->lang->line('Location'); ?> </th>
                                <th><?php echo $this->lang->line('Price'); ?> </th>
                                <th><?php echo $this->lang->line('Size'); ?></th>
                                <th><?php echo $this->lang->line('KPIs'); ?></th>
                                <th><span class="nobr"><?php echo $this->lang->line('Action'); ?></span></th>                              
                            </tr>
                            </thead>
<!--
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Date</th>
                                <th>Salary</th>
                            </tr>
                            </tfoot>
-->                            
                            <tbody>
        <?php $i=1; foreach ($realestate as $object_item): ?>

                            <tr class="<?php $i++; if ($i%2==0) echo "even"; else echo "odd"; ?>">                              
                                <td>
                                  <a href="<?php echo site_url('realestate/'.$object_item['objid']); ?>"><?php echo $object_item['title']; ?></a><br /><br />
                                            <div class="steps-inline display-block">
                                                <a href="javascript: void(0);" class="step-block<?php if ( $object_item['rating'] >= 1 ) { ?> step-success<?php } ?>">1</a>
                                                <a href="javascript: void(0);" class="step-block<?php if ( $object_item['rating'] >= 2 ) { ?> step-success<?php } ?>">2</a>
                                                <a href="javascript: void(0);" class="step-block<?php if ( $object_item['rating'] == 3 ) { ?> step-success<?php } ?>">3</a>
                                            </div>                                    
                                </td>
                                <td>
                                  <?php echo $object_item['zip']; ?> <?php echo $object_item['city']; ?><br /><nobr><?php echo $object_item['street']; ?></nobr>
                                </td>
                                <td>
                                  <nobr>€ <?php echo number_format($object_item['purchaseprice'],2,'.',','); ?> <!--<i class="success fa fa-long-arrow-up"></i>--> <a href="<?php echo site_url('realestate/delete_reobjects/'.$object_item['objid']); ?>">[X]</a></nobr><br />
                                  <?php echo $this->lang->line('Equity'); ?> <?php echo number_format($object_item['equityratio']*100,0,'.',','); ?>%
                                </td>
                                <td>
                                  <?php echo $object_item['size']; ?> <?php echo $this->lang->line('m2'); ?> / <?php echo $object_item['outdoorspace']; ?> <?php echo $this->lang->line('m2'); ?>
                                </td>
                                <td width="20%">
                                  <?php echo $this->lang->line('Yield'); ?> <?php echo number_format($object_item['yield'], 2); ?>%<br />
                                  <?php echo $this->lang->line('Earnings'); ?> <?php echo number_format($object_item['earnings'], 2); ?> <?php echo $CURRENCY; ?><br />
                                
                                <?php if ( $object_item['cashflow'] < 0 ) { ?><span style="color:red"><?php } else { ?><span style="color:green"><?php } ?>
                                <?php echo $this->lang->line('Cashflow'); ?> <?php echo number_format($object_item['cashflow'], 2); ?> <?php echo $CURRENCY; ?></span><br />                              
                                </td>
                                <td>
                                <a href="<?php echo site_url('realestate/view_reobjects/'.$object_item['objid']); ?>">[<?php echo $this->lang->line('View'); ?>]</a> | 
                                <a href="<?php echo site_url('realestate/edit_reobjects/'.$object_item['objid']); ?>">[<?php echo $this->lang->line('Edit'); ?>]</a><br />
                                </td>
                            </tr>

        <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Dashboard -->

</div>


<!-- Page Scripts -->
<script>
    $(function() {

        ///////////////////////////////////////////////////////////
        // COUNTERS
        /*
        $('.counter-init').countTo({
            speed: 1500
        });
        */

        ///////////////////////////////////////////////////////////
        // ADJUSTABLE TEXTAREA
        //autosize($('#textarea'));

        ///////////////////////////////////////////////////////////
        // CUSTOM SCROLL
        if (!cleanUI.hasTouch) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

        
        ///////////////////////////////////////////////////////////
        // CHART 1
        new Chartist.Line(".chart-line", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // CHART 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);


    });
</script>
<!-- End Page Scripts -->
</section>





