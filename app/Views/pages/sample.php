<?php

$load = "";



$payload   =    array(

        "client_id"                 => "JPN",
        "token_id"                  => "d61e5043da4da240a3e9843dfc895ac524bc3b648e040361d9e48087b2fc5334",
        "shipper"                   => "ABC Company",
        "shipper_addr"              => "Ninoy Aquino International Airport",
        "shipper_city"              => "Pasay City",
        "shipper_prov"              => "Metro Manila",
        "shipper_cont"              => "(02) 855 8888",
        "consignee"                 =>  $load['billing']['first_name']. " " .$load['billing']['last_name'],
        "consignee_addr"            =>  $load['billing']['address_1']. " " .$load['billing']['address_2'],
        "consignee_city"            =>  $load['billing']['city'],
        "consignee_prov"            => "Metro Manila",
        "consignee_brgy"            => "",
        "consignee_cont"            => $load['billing']['phone'],
        "consignee_email"           => $load['billing']['email'],
        "vendor_name"               => "ABCD Company",
        "zipcode"                   => $load['billing']['postcode'],
        "waybill"                   => "JPN". $load['billing']['meta_data'][4]['value'],
        "ship_date"                 => date('Y-m-d H:i:s', strtotime($load['billing']['date_created'])),
        "order_no"                  => "OR-10001",
        "sku_num"                   => "SKU-10001-1",
        "declared_value"            => "2,000",
        "commodity"                 => "office supplies",
        "special_instruction"       => "rush on delivery",
        "package_type"              => "COP",
        "package_length"            => "10.25",
        "package_width"             => "12.35",
        "package_height"            => "14.45",
        "weight"                    => "37.05",
        "payment_method"            => "COD",
        "total_pieces"              => "4",
        "cod_amt"                   => "2,500.00"


);


echo json_encode($payload);



?>