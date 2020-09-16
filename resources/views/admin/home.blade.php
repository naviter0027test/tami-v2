<html>
    <head>
        <meta charset="utf-8">
        <title>管理系統</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/admin/body.css' rel='stylesheet' />
        <link href='/css/admin/home.css' rel='stylesheet' />
    </head>
    <body>
@include('admin.layout.menu')
        <div class="content">
            <h3>首頁</h3>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                    @if(isset($result['processCount']))
                        {{ $result['processCount']['not'] }}
                    @endif
                        </h3>
                        <p>聯絡我們(未處理)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-alert-circled"></i>
                    </div>
                    <a href="/admin/contact" class="small-box-footer">&nbsp;</a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                    @if(isset($result['processCount']))
                        {{ $result['processCount']['ing'] }}
                    @endif
                        </h3>
                        <p>聯絡我們(處理中)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-chatboxes-outline"></i>
                    </div>
                    <a href="/admin/contact" class="small-box-footer">&nbsp;</a>
                </div>
            </div>
<!--
            <h4 class="col-lg-12 col-xs-12">稱謂 統計</h4>
            <div class="flot-jobtitle" ></div>
            <h4 class="col-lg-12 col-xs-12">產業別 統計</h4>
            <div class="pie-industry" ></div>
-->
            <div class="pagination paginationCenter">
            </div>
        </div>
@include('admin.layout.footer')
    </body>
    <script type="text/javascript" src="/lib/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.canvaswrapper.js"></script>    
    <script type="text/javascript" src="/lib/flot/source/jquery.colorhelpers.js"></script>    
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.js"></script>    
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.saturated.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.browser.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.drawSeries.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.uiConstants.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.symbol.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.axislabels.js"></script>

<!-- pie plugin -->
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.legend.js"></script>
    <script type="text/javascript" src="/lib/flot/source/jquery.flot.pie.js"></script>
<!-- pie plugin -->
    <script type="text/javascript">
        //******* 2012 Average Temperature - BAR CHART
        var data = [
            //[0, 11],[1, 15],[2, 25],[3, 24],[4, 13],[5, 18]
        ];
        @foreach($result['jobTitleList'] as $jobIdx => $jobTitle)
        data.push([ {{ $jobIdx }}, {{ $jobTitle['count'] }} ]);
        @endforeach
            console.log(data);
        var ticks = [
            //[0, "倫敦"], [1, "New York"], [2, "New Delhi"], [3, "Taipei"],[4, "Beijing"], [5, "Sydney"]
        ];
        @foreach($result['jobTitleList'] as $jobIdx => $jobTitle)
            ticks.push([ {{ $jobIdx }} , "{{ $jobTitle['jobTitle'] }}" ]);
        @endforeach
            console.log(ticks);
        var dataset = [{ label: "稱謂 統計", data: data, color: "#0086b3" }];

        var options = {
        series: {
        bars: {
        show: true
        }
        },
            bars: {
            align: "center",
                barWidth: 0.5
        },
        xaxis: {
        axisLabel: "稱謂",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'serif, Verdana, Arial',
            axisLabelPadding: 10,
            font: {
                size: 12
            },
            ticks: ticks
        },
        yaxis: {
            minTickSize: 2,
            axisLabel: "數量",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
            tickFormatter: function (v, axis) {
                return v + "";
            }
        },
            legend: {
            noColumns: 0,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            grid: {
            hoverable: true,
                borderWidth: 2,
                backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
            }
        };

        //pie start
        var pieData = [
            //{ label: "種類 A", data: 10 },
            //{ label: "種類 B", data: 20 },
            //{ label: "種類 C", data: 30 },
            //{ label: "種類 D", data: 40 }
        ];
    @foreach($result['industryList'] as $industryIdx => $industry)
        @if($industry['count'] != 0)
        pieData.push({ label: '{{ $industry->name }}', data: {{ $industry['percent'] }} });
        @endif
    @endforeach
        //pie end

        $(document).ready(function () {
            $.plot($(".flot-jobtitle"), dataset, options);
            $.plot(".pie-industry", pieData, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 3/4,
                            background: {
                                opacity: 0.5,
                                color: '#000'
                            }
                        }
                    }
                },
                legend: {
                    show: false
                }
            });
            //$(".flot-jobtitle").UseTooltip();
        });
    </script>
</html>
