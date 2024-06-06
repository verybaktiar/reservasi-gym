@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">
        <div class="content mt-3">
          
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $totalMember }}</span>
                        </h4>
                        <p class="text-light">Total Member</p>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart1" height="140" style="display: block; width: 313px; height: 70px;" width="626"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $totalReservasi }}</span>
                        </h4>
                        <p class="text-light">Total Reservasi</p>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart2" height="140" style="display: block; width: 313px; height: 70px;" width="626"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $totalPendapatan }}</span>
                        </h4>
                        <p class="text-light">Total Pendapatan</p>
                    </div>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <canvas id="widgetChart3" height="160" style="display: block; width: 343px; height: 80px;" width="686"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                       
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $totalTopup }}</span>
                        </h4>
                        <p class="text-light">Total Topup</p>
                        <div class="chart-wrapper px-3" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart4" height="130" style="display: block; width: 281px; height: 65px;" width="562"></canvas>
                        </div>
                    </div>
                </div>
            </div>

          
           
        </div>
    </div>

</div>
@endsection