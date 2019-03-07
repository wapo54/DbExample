<?php

//Average ////////////////////////////////////////////////////////////

$Values = [12, 7, 12, 6, 1, 2, 13, 15, 12];

function AverageValuesFromArray($Input) {
    //var_dump($Input);
    $MyResult = array_sum($Input)/count($Input);
    // echo  array_sum($Input)/count($Input);
    // print_r($Input);
    return $MyREsult;

}


//echo "Average is : ".AverageValuesFromArray([1,12]);
//echo "Average is : ".AverageValuesFromArray([5,15]);

$MyREsult = AverageValuesFromArray([43,1234322]);

//echo "Average is : ".$MyREsult."<br>";

$ValuesForFunctionInput = range(10,30);
//print_r($ValuesForFunctionInput);

echo $ValuesForFunctionInput[3];
function ReturnStringOfValuesEvenFromArray($InputArray) {
    $MyValuestoReturn = '';
    for ($LoopCounter=1;$LoopCounter<count($InputArray);$LoopCounter++) {
        echo "<br>LoopCounter:".$LoopCounter." Value: ".$InputArray[$LoopCounter]." InputArray[".$LoopCounter."]";
        if($InputArray[$LoopCounter] % 2 == 0) {
            echo "is Even";
            $MyValuestoReturn = $MyValuestoReturn.$InputArray[$LoopCounter]." ";
        }
    }
    return $MyValuestoReturn;
}

echo "<br>Even Values are : ".ReturnStringOfValuesEvenFromArray($ValuesForFunctionInput);


function recArea($l, $w){
    $area = $l * $w;
    echo "<br>A rectangle of length $l and width $w has an area of $area.";
}

//Call function.
recArea(2, 4);
?>age