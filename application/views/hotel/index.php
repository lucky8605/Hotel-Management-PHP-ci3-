<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-2">
                <div class="card-head text-center">
                    <h6>Active Table</h6>
                </div>
                <div class="card-body">
                    <h5 class="card-text text-center" style="color:green;">12</h5>
                </div>
                <div class="card-footer text-center mt-3">
                    <button class="btn btn-outline-info btn-sm">Check</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-2">
                <div class="card-head text-center">
                    <h6>Product Category</h6>
                </div>
                <div class="card-body">
                    <h5 class="card-text text-center" style="color:green;">12</h5>
                </div>
                <div class="card-footer text-center mt-3">
                    <button class="btn btn-outline-info btn-sm">Check</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-2">
                <div class="card-head text-center">
                    <h6>Product's</h6>
                </div>
                <div class="card-body">
                    <h5 class="card-text text-center" style="color:green;">12</h5>
                </div>
                <div class="card-footer text-center mt-3">
                    <button class="btn btn-outline-info btn-sm">Check</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-2">
                <div class="card-head text-center">
                    <h6>Avilable Table's</h6>
                </div>
                <div class="card-body">
                    <h5 class="card-text text-center" style="color:green;">12</h5>
                </div>
                <div class="card-footer text-center mt-3">
                    <button class="btn btn-outline-info btn-sm">Check</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row shadow p-3">
        <div class="col-md-12 text-center">
            <h4>Last 7 Days Sale ₹ <?=number_format(array_sum($y_axis))?></h4>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
var xValues = [<?= "'".implode("', '",$x_axis)."'";?>];
var yValues = [<?= "'".implode("', '",$y_axis)."'";?>];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor:'blue',
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "GRAF"
    }
  }
});
</script>

