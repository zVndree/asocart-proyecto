<?php
    
    /*=============================================
	FORMATO MONEDA
	=============================================*/

        function moneyFormat($price,$curr) {
        
            $currencies['EUR'] = array(2, ',', '.');        // Euro
            $currencies['ESP'] = array(2, ',', '.');        // Euro
            $currencies['USD'] = array(2, '.', ',');        // US Dollar
            $currencies['COP'] = array(0, '.', '.');        // Colombian Peso
            $currencies['CLP'] = array(0,  '', '.');        // Chilean Peso
        
            return number_format($price, ...$currencies[$curr]);
        }
    
        $money = moneyFormat($price, $curr='COP');

	