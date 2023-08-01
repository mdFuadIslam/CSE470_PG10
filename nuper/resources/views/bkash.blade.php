<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h3>Dear {{Auth::user()->name}},</h3><br>
    <h4>You are purchasing:</h4><br>
    <table border='1'>
        <tr>
            <th> Username </th>
            <th> Product Name </th>
            <th> Price </th>
            <th> Duration </th>
            <th> Type </th>
            <th> Quantity </th>
        </tr>
        <?php
            $total=0;
        ?>
        @foreach($data as $item)
            <tr>
                <th> {{$item->username}} </th>
                <th> {{$item->name}} </th>
                <th> {{$price=$item->price}} </th>
                <?php 
                    $duration=$item->duration;
                    if ($duration==NULL){  
                        echo "<th>Permanent</th>";
                    }
                    else{
                        echo "<th>$duration</th>";
                    }
                ?>
                <?php 
                    $type=$item->type;
                    if ($type==0){  
                        echo "<th>Buying</th>";
                    }
                    else{
                        echo "<th>Renting</th>";
                    }
                ?>
                <th> {{$quantity=$item->quantity}} </th>
            </tr>
            <?php
                $total=$total+($quantity*$price);
            ?>
        @endforeach
    </table>
    <h3>For a grand total of {{$total}}</h3><br>
    You are paying Via Bkash:<br>
    bkash number: {{$number}}<br>
    transaction id: {{$trxId}}<br>
    <form method='post' action='bkashInvoice'>
        @csrf
        <input type='hidden' name='total' id='total' value='$total'>
        <input type='submit' name='invoice' id='invoice' value='confirm'>
    </form>
</body>
</html>