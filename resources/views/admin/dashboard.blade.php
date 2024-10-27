@extends('layouts.admin')
@section('content')
    <div class="content-area">
        @include('includes.form-success')


        @if (Session::has('cache'))
            <div class="alert alert-success validation">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h3 class="text-center">{{ Session::get('cache') }}</h3>
            </div>
        @endif

        {{-- 
<!-- 
    <div class="row row-cards-one">

        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg4">
                <div class="left">
                    <h5 class="title">{{ __('Total Events') }}</h5>
                    <span class="number">{{count($products)}}</span>
                    <a href="{{route('admin-prod-index')}}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg6">
                <div class="left">
                    <h5 class="title">{{ __('Total Posts!') }}</h5>
                    <span class="number">{{count($blogs)}}</span>
                    <a href="{{ route('admin-blog-index') }}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg5">
                <div class="left">
                    <h3 class="title">{{ __('Total Comments') }}</h3>
                    <span class="number">{{count($coments)}}</span>
                    <a href="{{route('admin-user-index')}}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row row-cards-one">

            <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                            <h5 class="card-header">{{ __('Popular Event(s)') }}</h5>
                            <div class="card-body">
            
                                <div class="table-responsiv  dashboard-home-table">
                                    <table id="poproducts" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Featured Image') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Category') }}</th>


                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($poproducts as $data)
                                            <tr>
                                            <td><img src="{{filter_var($data->photo, FILTER_VALIDATE_URL) ?$data->photo:asset('public/assets/images/products/'.$data->photo)}}"></td>
                                            <td>{{  strlen(strip_tags($data->name)) > 50 ? substr(strip_tags($data->name),0,50).'...' : strip_tags($data->name) }}</td>
                                            <td>{{ $data->category->name }}
                                                    @if (isset($data->subcategory))
                                                    <br>
                                                    {{ $data->subcategory->name }}
                                                    @endif
                                                    @if (isset($data->childcategory))
                                                    <br>
                                                    {{ $data->childcategory->name }}
                                                    @endif
                                                </td>




                                                <td>
                                                    <div class="action-list"><a href="{{ route('admin-prod-edit',$data->id) }}"><i
                                                                class="fas fa-eye"></i> {{ __('Details') }}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
            </div>
    
        </div>

    <div class="row row-cards-one">

            <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                            <h5 class="card-header">{{ __('Recent Event(s)') }}</h5>
                            <div class="card-body">
            
                                <div class="table-responsiv dashboard-home-table">
                                    <table id="pproducts" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                                    <tr>
                                                        <th>{{ __('Featured Image') }}</th>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Category') }}</th>


                                                        <th></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pproducts as $data)
                                                    <tr>
                                                    <td><img src="{{filter_var($data->photo, FILTER_VALIDATE_URL) ?$data->photo:asset('public/assets/images/products/'.$data->photo)}}"></td>
                                                    <td>{{  strlen(strip_tags($data->name)) > 50 ? substr(strip_tags($data->name),0,50).'...' : strip_tags($data->name) }}</td>
                                                    <td>{{ $data->category->name }}
                                                        @if (isset($data->subcategory))
                                                        <br>
                                                        {{ $data->subcategory->name }}
                                                        @endif
                                                        @if (isset($data->childcategory))
                                                        <br>
                                                        {{ $data->childcategory->name }}
                                                        @endif
                                                    </td>


                                                        <td>
                                                            <div class="action-list"><a href="{{ route('admin-prod-edit',$data->id) }}"><i
                                                                        class="fas fa-eye"></i> {{ __('Details') }}</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                    </table>
                                </div>
            
                            </div>
                        </div>
    
            </div>
    
        </div>
 --> --}}


        <input type="text" name="daterange" class="form-control" />


        <div class="row row-cards-one">

            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <h5 class="card-header">{{ __('Top Referrals') }}</h5>
                    <div class="card-body">
                        <div class="admin-fix-height-card">
                            <div id="chartContainer-topReference"></div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <h5 class="card-header">{{ __('Most Used OS') }}</h5>
                    <div class="card-body">
                        <div class="admin-fix-height-card">
                            <div id="chartContainer-os"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection

@section('scripts')
    <script language="JavaScript">
        displayLineChart();

        function displayLineChart() {
            var data = {
                labels: [
                    {!! $days !!}
                ],
                datasets: [{
                    label: "Prime and Fibonacci",
                    fillColor: "#3dbcff",
                    strokeColor: "#0099ff",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        {!! $sales !!}
                    ]
                }]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
    </script>

    <script type="text/javascript">
        $('#poproducts').dataTable({
            "ordering": false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'responsive': true,
            'paging': false
        });
    </script>


    <script type="text/javascript">
        $('#pproducts').dataTable({
            "ordering": false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'responsive': true,
            'paging': false
        });
    </script>

    <script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference", {
            exportEnabled: true,
            animationEnabled: true,

            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "",
                toolTipContent: "{name}: <strong> {y} (#percent%)</strong>",
                indexLabel: "#percent%",
                indexLabelFontColor: "white",
                indexLabelPlacement: "inside",
                dataPoints: [
                    @foreach ($referrals as $browser)
                        {
                            y: {{ $browser->total_count }},
                            name: "{{ $browser->referral }}"
                        },
                    @endforeach
                ]
            }]
        });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os", {
            exportEnabled: true,
            animationEnabled: true,
            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "",
                toolTipContent: "{name}: <strong>{#percent%} {y} (#percent%)</strong>",
                indexLabel: "#percent%",
                indexLabelFontColor: "white",
                indexLabelPlacement: "inside",
                dataPoints: [
                    @foreach ($aggregatedBrowsers as $browser)
                        {
                            y: {{ $browser['total_count'] }},
                            name: "{{ $browser['referral'] }}"
                        },
                    @endforeach
                ]
            }]
        });
        chart.render();
    </script>
@endsection
