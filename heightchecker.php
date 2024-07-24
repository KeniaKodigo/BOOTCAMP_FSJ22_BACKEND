<?php
    /**
     * Example 1:
*Input: heights = [1,1,4,2,1,3]
*Output: 3
*Explanation: 
*heights:  [1,1,4,2,1,3]
*expected: [1,1,1,2,3,4]
*Indices 2, 4, and 5 do not match.
     */
    function testAltura($altura){
        $expected = $altura;
        sort($expected);
        
        $contador =0;
        $arreglo = [];
        $a = [];
        for ($i=0; $i < count($altura); $i++) { 
            # code...
            if ($altura[$i] != $expected[$i]) {
                $contador++;
                $arreglo[] = $i;
            }
        }
        //return ["contador " => $contador , " indice " => $arreglo];
        $a["contador"] = $contador;
        $a["indice"] = $arreglo;
        return $a;
    }
    $altura =[1,1,4,2,1,3];
    $result = testAltura($altura); #3
    //echo "unexpected: " . $result['contador'];
    print_r($result);
?>