@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="row">
    <div class="col-sm-7">
          <h2>Dashboard</h2>
     </div>
     <div class="col-sm-5">
          <div class="input-group">
            <input class="form-control py-2 border-right-0 border" type="search" value="search" id="example-search-input">
            <span class="input-group-append">
              <button class="btn btn-outline-secondary border-left-0 border" type="button">
                    <i class="fa fa-search"></i>
              </button>
            </span>
        </div>
</div>
</form>
</div>
  </div>
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-3">
            <div class="card border-light text-center bg-light mb-3 shadow-sm" style="max-width: 18rem;">
                    <div class="card-body">
                     <h5 class="card-title">{{$customers}}</h5>
                   <h6 style="font-size: 18px; font-weight: 300;">Total Customers</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-light text-center bg-light mb-3 shadow-sm" style="max-width: 18rem;">
                    <div class="card-body">
                     <h5 class="card-title">{{number_format($consumption,2)}}<small>m<sup>3</sup></small></h5>
                   <h6 style="font-size: 18px; font-weight: 300;">Total Consumption</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-light text-center bg-light mb-3 shadow-sm" style="max-width: 18rem;">
                    <div class="card-body">
                     <h5 class="card-title"><small>Kes. </small> {{number_format($bills,2)}}</h5>
                   <h6 style="font-size: 18px; font-weight: 300;">Total Bills for the year</h6>
                </div>
            </div>
        </div> 
        <div class="col-md-3">
            <div class="card border-light text-center bg-light mb-3 shadow-sm" style="max-width: 18rem;">
                    <div class="card-body">
                     <h5 class="card-title"><small>Kes. </small> {{number_format($payments,2)}}</h5>
                   <h6 style="font-size: 18px; font-weight: 300;">Total Payments for the year</h6>
                </div>
            </div>
        </div>
   </div>
   <div class="row">
       <div class="col-sm-6">
           <div class="card">
               <div class="card-body">
                <h4>Trend of consumption in m<sup>3</sup></h4>
                   <canvas id="consumption" width="500" height="300"></canvas>
               </div>
           </div>
       </div>

       <div class="col-sm-6">
           <div class="card">
               <div class="card-body">
                <h4>Billing trend in Kes.</h4>
                   <canvas id="bill" width="500" height="300"></canvas>
               </div>
           </div>
       </div>
   </div>
    </div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<script type="text/javascript">
    var consumptionGroup=new Array();
    var billGroup=new Array();
    var consumption = document.getElementById("consumption").getContext('2d');
    var bill = document.getElementById("bill").getContext('2d');
<?php for($i = 0; $i < 12; $i++) {?>
consumptionGroup[<?php echo $i; ?>]=<?php echo $consumptionGroup->where('monthNum','=',$i+1)->sum('consumption');?>;
billGroup[<?php echo $i; ?>]=<?php echo $billGroup->where('monthNum','=',$i+1)->sum('amount');?>;
<?php }?>

var consumptionChartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"],
            datasets: [{
                label: 'Consumption per month in cubic meters',
                backgroundColor: 'rgba(204, 192, 20, 80)',
                data:consumptionGroup 
            }]
        };

var billChartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"],
            datasets: [{
                label: 'Bills per month in KES',
                backgroundColor: 'rgba(138, 216, 211, 1)',
                data:billGroup 
            }]
        };


var consumptionChart = new Chart(consumption, {
    type: 'line',
    data: consumptionChartData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        plugins: {
          labels: false
  },
    }
});


var billChart = new Chart(bill, {
    type: 'bar',
    data: billChartData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        plugins: {
          labels: false
  },
    }
});



</script>
@endsection
