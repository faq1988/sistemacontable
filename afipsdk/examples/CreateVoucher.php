<?php
include '../src/Afip.php'; 

$data = array(
	'CantReg' 		=> 1, // Cantidad de comprobantes a registrar
	'PtoVta' 		=> 1, // Punto de venta
	'CbteTipo' 		=> 6, // Tipo de comprobante (ver tipos disponibles) 
	'Concepto' 		=> 1, // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
	'DocTipo' 		=> 80, // Tipo de documento del comprador (ver tipos disponibles)
	'DocNro' 		=> 20111111112, // Numero de documento del comprador
	'CbteDesde' 	=> 2, // Numero de comprobante o numero del primer comprobante en caso de ser mas de uno
	'CbteHasta' 	=> 2, // Numero de comprobante o numero del ultimo comprobante en caso de ser mas de uno
	'CbteFch' 		=> intval(date('Ymd')), // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
	'ImpTotal' 		=> 189.30, // Importe total del comprobante
	'ImpTotConc' 	=> 0, // Importe neto no gravado
	'ImpNeto' 		=> 150, // Importe neto gravado
	'ImpOpEx' 		=> 0, // Importe exento de IVA
	'ImpIVA' 		=> 31.5, //Importe total de IVA
	'ImpTrib' 		=> 7.8, //Importe total de tributos
	'FchServDesde' 	=> NULL, // (Opcional) Fecha de inicio del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
	'FchServHasta' 	=> NULL, // (Opcional) Fecha de fin del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
	'FchVtoPago' 	=> NULL, // (Opcional) Fecha de vencimiento del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
	'MonId' 		=> 'PES', //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos) 
	'MonCotiz' 		=> 1, // Cotización de la moneda usada (1 para pesos argentinos)  
	'CbtesAsoc' 	=> array( // (Opcional) Comprobantes asociados
		array(
			'Tipo' 		=> 991, // Tipo de comprobante (ver tipos disponibles) 
			'PtoVta' 	=> 1, // Punto de venta
			'Nro' 		=> 2, // Numero de comprobante
			'Cuit' 		=> 20339203866 // (Opcional) Cuit del emisor del comprobante
			)
		),
	'Tributos' 		=> array( // (Opcional) Tributos asociados al comprobante
		array(
			'Id' 		=>  99, // Id del tipo de tributo (ver tipos disponibles) 
			'Desc' 		=> 'Ingresos Brutos', // (Opcional) Descripcion
			'BaseImp' 	=> 50, // Base imponible para el tributo
			'Alic' 		=> 10, // Alícuota
			'Importe' 	=> 7.8 // Importe del tributo
		)
	), 
	'Iva' 			=> array( // (Opcional) Alícuotas asociadas al comprobante
		array(
			'Id' 		=> 5, // Id del tipo de IVA (ver tipos disponibles) 
			'BaseImp' 	=> 150, // Base imponible
			'Importe' 	=> 31.5 // Importe 
		)
	), 
	'Opcionales' 	=> array( // (Opcional) Campos auxiliares
		array(
			'Id' 		=> 17, // Codigo de tipo de opcion (ver tipos disponibles) 
			'Valor' 	=> 2 // Valor 
		)
	)
);

$afip = new Afip(array('CUIT' => 20339203866));

//var_dump($afip->ElectronicBilling->CreateVoucher($data));
//var_dump($afip->ElectronicBilling->GetVoucherInfo(1, 1, 1));
var_dump($afip->ElectronicBilling->GetLastVoucher(1,6));
//var_dump($afip->ElectronicBilling->GetServerStatus());


?>