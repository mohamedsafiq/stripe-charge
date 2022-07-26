@include('layouts')
@section('title')
    {{ __('Products') }}
@endsection
<?php
use App\Models\Products;
$products = Products::all();
?>
<div class="col-md-12 mt-4 p-2">
    <div class="card">
        <div class="card-header heading">
            <h5><i class='fas fa-border-all' style='font-size:17px'></i> Products</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>Sno</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th style="width:45%;">Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $sno = 1;
                    foreach($products as $product)
                    {
                        echo "<tr>";
                        echo "<td>".$sno."</td>";
                        echo "<td>".$product->field_name."</td>";
                        echo "<td>".$product->price."</td>";
                        echo "<td>".$product->description."</td>";
                        echo "<td><a href='".route('buyproduct',$product)."' class='btn btn-warning'>Buy Now</a></td>";
                        echo "</tr>";
                        $sno++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>