<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//echo "dealerCode,pno34,pno34_dealerCode,earliestDelivery,TotalPrice,Color,Upholster,Rims,Model,Engine,PerformancePack,PilotPack,PlusPack,END\n";

$url = 'https://pc-api.polestar.com/eu-north-1/preconfigured-cars/';

$dealerJSON = '{"data":{"getClosestRetailerFunction":{"retailers":[
{"code":"USSAN0024","partnerId": "6US6676","name":"Polestar San Diego","zipcode":"92122","city":"San Diego, CA","distance":"88607","latitude":32.8702136,"longitude":-117.2128824},

{"code":"USMJI0012","partnerId": "6US6667","name":"Polestar South Coast","zipcode":"92692","city":"Mission Viejo, CA","distance":"88607","latitude":33.5498937,"longitude":-117.6719935},
{"code":"USVNY0011","partnerId": "6US6631","name":"Polestar Los Angeles","zipcode":"90401","city":"Santa Monica, CA","distance":"176046","latitude":34.0150961,"longitude":-118.495838},
{"code":"USPHX0026","partnerId": "6US6638","name":"Polestar Scottsdale","zipcode":"85251","city":"Scottsdale, AZ","distance":"495969","latitude":33.5027922,"longitude":-111.9293195},
{"code":"USSNN0011","partnerId": "6US6633","name":"Polestar San Jose","zipcode":"95128","city":"San Jose, CA","distance":"657867","latitude":37.324035,"longitude":-121.9464667},
{"code":"USSRF0013","partnerId": "6US6632","name":"Polestar Marin","zipcode":"94925","city":"Corte Madera, CA","distance":"741350","latitude":37.9298767,"longitude":-122.5140719},
{"code":"USLTO0013","partnerId": "6US6635","name":"Polestar Denver","zipcode":"80206","city":"Denver, CO","distance":"1335101","latitude":39.7204663,"longitude":-104.9536931},
{"code":"USBVW0012","partnerId": "6US6670","name":"Polestar Portland","zipcode":"97005","city":"Beaverton, OR","distance":"1484869","latitude":45.4894123,"longitude":-122.8205989},
{"code":"USTUK0012","partnerId": "6US6661","name":"Polestar Bellevue","zipcode":"98188","city":"TUKWILA, WA","distance":"1678362","latitude":47.4573286,"longitude":-122.2528714},
{"code":"USAUS0020","partnerId": "6US6636","name":"Polestar Austin","zipcode":"78752","city":"Austin, TX","distance":"1865454","latitude":30.3375622,"longitude":-97.7004218},
{"code":"USGPV0011","partnerId": "6US6665","name":"Polestar Grapevine","zipcode":"76051","city":"Grapevine, TX","distance":"1877597","latitude":32.9211932,"longitude":-97.0637092},
{"code":"USHOU0039","partnerId": "6US6677","name":"Polestar Houston","zipcode":"76051","city":"Grapevine, TX","distance":"1877597","latitude":32.9211932,"longitude":-97.0637092},

{"code":"USGVY0011","partnerId": "6US6662","name":"Polestar Minneapolis","zipcode":"55426","city":"Golden Vallley, MN","distance":"1374737","latitude":44.9729093,"longitude":-93.3646924},
{"code":"USTPA0024","partnerId": "6US6668","name":"Polestar Tampa","zipcode":"33614","city":"Tampa Florida","distance":"1498512","latitude":28.0022271,"longitude":-82.5057718},
{"code":"USAPF0013","partnerId": "6US6674","name":"Polestar Naples","zipcode":"FL 34109","city":"Naples","distance":"155294","latitude":26.2161971,"longitude":-81.7735326},
{"code":"USPBI0020","partnerId": "6US6672","name":"Polestar Palm Beach","zipcode":"33409","city":"West Palm Beach, FL","distance":"876","latitude":26.7075708,"longitude":-80.1020704},
{"code":"USFLL0022","partnerId": "6US6675","name":"Polestar Fort Lauderdale","zipcode":"33317","city":"Fort Lauderdale, FL","distance":"3290","latitude":26.0985294,"longitude":-80.2006262},
{"code":"USCLT0024","partnerId": "6US6666","name":"Polestar Charlotte","zipcode":"28262","city":"Charlotte, NC","distance":"1522683","latitude":35.2928772,"longitude":-80.7547413},
{"code":"USFHI0012","partnerId": "6US6663","name":"Polestar Detroit","zipcode": "48073",
    "city": "Royal Oak",
    "distance": "16421",
    "latitude": 42.5141938,
    "longitude": -83.1832839},
{"code":"USCMH0017","partnerId": "6US6678","name":"Polestar Columbus","zipcode":"48335","city":"Farmington Hills, MI","distance":"1596685","latitude":42.4729405,"longitude":-83.4342556},

{"code":"USRKV0016","partnerId": "6US6669","name":"Polestar Washington DC","zipcode":"20855","city":", Rockville, MD","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721},
{"code":"USBOS0018","partnerId": "6US6637","name":"Polestar Boston","zipcode": "02134","city": "Allston, MA","distance": "287032","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721},
{"code":"USWPR0011","partnerId": "6US6671","name":"Polestar Westport","zipcode": "6880","city": "Westport","distance": "415002","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721},
{"code":"USNYC0031","partnerId": "6US6634","name":"Polestar Manhattan","zipcode": "10001","city": "NEW YORK, NY","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721},
{"code":"USEHA0011","partnerId": "6US6664","name":"Polestar Short Hills","zipcode": "07936","city": "East Hanover, NJ","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721},
{"code":"USLRV0011","partnerId": "6US6660","name":"Polestar Princeton","zipcode": "08648","city": "Lawrenceville, NJ","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721}
],"province":null}}}';

// $dealerJSON = '{"data":{"getClosestRetailerFunction":{"retailers":[{"code":"USNYC0031","name":"Polestar Manhattan","zipcode": "10001","city": "NEW YORK, NY","distance":"1912276","latitude":39.1084355,"longitude":-77.1586721}], "province":null}}}';
$dealer_array = json_decode($dealerJSON, true);

// new version has years 2021 and 2022 hard coded in order to receive more cars. no filter value only gets 8 cars ...
$carsJSON = '{"operationName":"LoadResultsQuery","variables":{"market":"us","includeValidFilters":true,"sort":{"attribute":"DeliveryDate","direction":"Asc"},"debug":false,"filters":[{"filterTypeId":"4","filterValues":[{"value":"534","featureCode":"534","isB2B":false}]}],"partnerId":"USWPR0011","pagination":{"pageSize":60,"pageNo":1},"customerType":"B2C"},"query":"query LoadResultsQuery($market: String!, $includeValidFilters: Boolean!, $filters: [FilterValueGroupInput], $pagination: PaginationInput, $partnerId: String, $sort: FilterSortInput, $debug: Boolean!, $stateCode: String, $customerType: String) {\n  filterFunction(\n    market: $market\n    includeValidFilters: $includeValidFilters\n    filters: $filters\n    pagination: $pagination\n    partnerId: $partnerId\n    sort: $sort\n    debug: $debug\n    stateCode: $stateCode\n    customerType: $customerType\n  ) {\n    debugInfo\n    b2b\n    timestamp\n    market\n    pagination {\n      pageSize\n      pageNo\n      totalRecords\n    }\n    validFilters {\n      filterTypeId\n      featureType\n      filterValues {\n        value\n        featureCode\n        isB2B\n        thumbnailUrl\n      }\n      filterRanges {\n        upper\n        lower\n        featureCode\n        isB2B\n      }\n    }\n    filterResults {\n      pno34\n      modelYear\n      structureWeek\n      description\n      earliestDeliveryDate\n      cashPriceData {\n        discounted {\n          car {\n            type\n            code\n            price\n            vat\n            priceIncVat\n          }\n          totals {\n            car {\n              carTotalPrice {\n                id\n                label\n                value\n              }\n              carTotalPriceExclVAT {\n                id\n                label\n                value\n              }\n            }\n            grandTotal {\n              paymentTotal {\n                paymentTotalBasicPrice {\n                  id\n                  label\n                  value\n                }\n                paymentTotalPrice {\n                  id\n                  label\n                  value\n                }\n              }\n            }\n          }\n        }\n        listPrice {\n          totals {\n            car {\n              carTotalPrice {\n                id\n                label\n                value\n              }\n              carTotalPriceExclVAT {\n                id\n                label\n                value\n              }\n            }\n            grandTotal {\n              paymentTotal {\n                paymentTotalBasicPrice {\n                  id\n                  label\n                  value\n                }\n                paymentTotalPrice {\n                  id\n                  label\n                  value\n                }\n              }\n            }\n          }\n        }\n      }\n      images {\n        icons {\n          rims\n          color\n          upholstery\n        }\n        location {\n          url\n          angles\n          resolutions\n        }\n        studio {\n          url\n          angles\n          resolutions\n        }\n      }\n      content {\n        excluded\n        filterTypeId\n        featureType\n        code\n        name\n        description\n        numericValue\n        dateValue\n        stringValue\n        images {\n          url\n          alt\n        }\n        thumbnail {\n          url\n          alt\n        }\n        isB2B\n      }\n      towbar {\n        excluded\n        filterTypeId\n        featureType\n        code\n        name\n        cardTitle\n        labelForInfo\n      }\n      wltpNedcSummary {\n        items {\n          name\n          description\n          value\n          unit\n        }\n      }\n      techData {\n        engineBev_LabelForPower\n        engineBev_TotalHp\n        engineBev_TotalKw\n        engineBev_LabelForTorque\n        labelForPerformanceRange\n        performance\n        engineBev_ElectricRange\n        engineBev_LabelForElectricMotors\n        engineBev_ElectricMotors\n        engineBev_ElectricRangeEpaMiles\n        labelForDivider\n        driveTrain\n        drive\n      }\n      packages {\n        filterTypeId\n        featureType\n        name\n        code\n        cardTitle\n        images {\n          url\n          alt\n        }\n        thumbnail {\n          url\n          alt\n        }\n      }\n      isCampaignEnabled\n    }\n    filters {\n      filterTypeId\n      featureType\n      filterValues {\n        value\n        featureCode\n        isB2B\n      }\n      filterRanges {\n        upper\n        lower\n        featureCode\n        isB2B\n      }\n    }\n    campaigns {\n      description\n      discountCode\n      discountImageUrl\n      discountType\n      title\n      url\n      validTo\n    }\n  }\n}\n"}';
$cars_array = json_decode($carsJSON, true);

foreach ($dealer_array['data']['getClosestRetailerFunction']['retailers'] as $r) {
$pagestop = 5;
for($page=1; $page<$pagestop+1; $page++) {
//    echo "** " . $r['name'] . " (" . $r['code'] . ") ***\n";
    $cars_array['variables']['partnerId'] = $r['partnerId'];
    $cars_array['variables']['pagination']['pageNo'] = $page;    
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cars_array));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = curl_exec($ch);

    curl_close($ch);

    $re_array = json_decode($result, true);
    $want = $re_array['data']['filterFunction']['filterResults'];
$totalRecords = $re_array['data']['filterFunction']['pagination']['totalRecords'];
$pagestop = ceil($totalRecords/50);

    // loop thru cars at the dealer.
    foreach ($want as $w) {
    echo str_replace("Polestar ", "", $r['name']) . ",";
    echo ",";
        echo $w['pno34'] . " (" . $r['code'] . "),";
        echo substr($w['earliestDeliveryDate'], 0, 10) . ",";
        echo '$' . $w['cashPriceData']['totals']['car']['carTotalPrice']['value'] . ",";
        $pack['Performance'] = 0;
        $pack['Pilot'] = 0;
        $pack['Plus'] = 0;

        foreach ($w['content'] as $car) {
            if ($car['featureType'] == 'Price')
                continue;

            if ($car['featureType'] == 'DeliveryDate')
                continue;

            if ($car['featureType'] == 'Drive')
                continue;

        if ($car['featureType'] == 'Packages') {
        $pack[$car['name']] = 1;
        continue;
        }

//            echo $car['featureType'] . ": ";
            if ($car['featureType'] == 'DeliveryDate') {
                echo $car['code'] . ": " . $car['dateValue'];
            } else 
                echo $car['name'];
            echo ",";

        }
    foreach (array_keys($pack) as $key) {
        echo $pack[$key] . ",";
    }
    echo "\n";
    }
}
}
