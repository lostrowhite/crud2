DROP TABLE aactivos;buffernowdotcom

CREATE TABLE `aactivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `navance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO aactivos VALUES("1","1","1");buffernowdotcom



DROP TABLE afactura;buffernowdotcom

CREATE TABLE `afactura` (
  `preciou` decimal(11,2) unsigned NOT NULL COMMENT 'precio unitario',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad de articulos',
  `id_a` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de listado de articulos de factura',
  `id_r` int(5) unsigned NOT NULL COMMENT 'id de repuesto',
  `id_f` int(5) unsigned NOT NULL COMMENT 'id de factura',
  PRIMARY KEY (`id_a`),
  KEY `id_r_2` (`id_r`),
  KEY `id_f` (`id_f`),
  CONSTRAINT `afactura_ibfk_1` FOREIGN KEY (`id_f`) REFERENCES `factura` (`id_f`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `afactura_ibfk_2` FOREIGN KEY (`id_r`) REFERENCES `repuestos` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO afactura VALUES("0.00","8888","4","1","5");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","6","3","21");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","7","3","22");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","9","4","24");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","10","7","24");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","11","1","25");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","12","1","26");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","17","1","29");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","18","3","29");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","19","3","30");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","20","4","31");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","21","5","31");buffernowdotcom
INSERT INTO afactura VALUES("0.00","1","22","5","32");buffernowdotcom
INSERT INTO afactura VALUES("9800.00","2","23","3","33");buffernowdotcom
INSERT INTO afactura VALUES("15000.00","3","24","4","33");buffernowdotcom
INSERT INTO afactura VALUES("9800.00","2","25","3","34");buffernowdotcom
INSERT INTO afactura VALUES("10500.00","7","26","5","34");buffernowdotcom
INSERT INTO afactura VALUES("4900.00","2","27","3","35");buffernowdotcom
INSERT INTO afactura VALUES("1500.00","2","28","6","36");buffernowdotcom



DROP TABLE ainactivos;buffernowdotcom

CREATE TABLE `ainactivos` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `navance` int(11) NOT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO ainactivos VALUES("1","1","2");buffernowdotcom
INSERT INTO ainactivos VALUES("2","2","1");buffernowdotcom
INSERT INTO ainactivos VALUES("3","2","2");buffernowdotcom
INSERT INTO ainactivos VALUES("4","3","1");buffernowdotcom
INSERT INTO ainactivos VALUES("5","3","2");buffernowdotcom
INSERT INTO ainactivos VALUES("6","4","1");buffernowdotcom
INSERT INTO ainactivos VALUES("7","4","2");buffernowdotcom
INSERT INTO ainactivos VALUES("8","5","1");buffernowdotcom
INSERT INTO ainactivos VALUES("9","5","2");buffernowdotcom
INSERT INTO ainactivos VALUES("10","6","1");buffernowdotcom
INSERT INTO ainactivos VALUES("11","6","2");buffernowdotcom
INSERT INTO ainactivos VALUES("12","7","1");buffernowdotcom
INSERT INTO ainactivos VALUES("13","7","2");buffernowdotcom
INSERT INTO ainactivos VALUES("14","8","1");buffernowdotcom
INSERT INTO ainactivos VALUES("15","8","2");buffernowdotcom
INSERT INTO ainactivos VALUES("16","9","1");buffernowdotcom
INSERT INTO ainactivos VALUES("17","9","2");buffernowdotcom
INSERT INTO ainactivos VALUES("18","10","1");buffernowdotcom
INSERT INTO ainactivos VALUES("19","10","2");buffernowdotcom
INSERT INTO ainactivos VALUES("20","11","1");buffernowdotcom
INSERT INTO ainactivos VALUES("21","11","2");buffernowdotcom
INSERT INTO ainactivos VALUES("22","12","1");buffernowdotcom
INSERT INTO ainactivos VALUES("23","12","2");buffernowdotcom
INSERT INTO ainactivos VALUES("24","13","1");buffernowdotcom
INSERT INTO ainactivos VALUES("25","13","2");buffernowdotcom
INSERT INTO ainactivos VALUES("26","14","1");buffernowdotcom
INSERT INTO ainactivos VALUES("27","14","2");buffernowdotcom
INSERT INTO ainactivos VALUES("28","15","1");buffernowdotcom
INSERT INTO ainactivos VALUES("29","15","2");buffernowdotcom
INSERT INTO ainactivos VALUES("30","16","1");buffernowdotcom
INSERT INTO ainactivos VALUES("31","16","2");buffernowdotcom
INSERT INTO ainactivos VALUES("32","17","1");buffernowdotcom
INSERT INTO ainactivos VALUES("33","17","2");buffernowdotcom
INSERT INTO ainactivos VALUES("34","18","1");buffernowdotcom
INSERT INTO ainactivos VALUES("35","18","2");buffernowdotcom
INSERT INTO ainactivos VALUES("36","19","1");buffernowdotcom
INSERT INTO ainactivos VALUES("37","19","2");buffernowdotcom
INSERT INTO ainactivos VALUES("38","20","1");buffernowdotcom
INSERT INTO ainactivos VALUES("39","20","2");buffernowdotcom



DROP TABLE auditoria;buffernowdotcom

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `ip` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO auditoria VALUES("2","2013-11-20 01:11:17","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("3","2013-11-20 01:11:01","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("4","2013-11-20 01:11:20","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("5","2013-11-20 01:11:07","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("6","2013-11-20 01:11:35","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("7","2013-11-20 01:11:05","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("8","2013-11-20 01:11:48","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("9","2013-11-20 01:11:15","127.0.0.1","lostro","12","Cierre de mes:11  a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("10","2013-11-20 01:11:00","127.0.0.1","lostro","12","Cierre de mes:11 a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("11","2013-11-20 01:11:22","127.0.0.1","lostro","12","Cierre de mes:11 a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("12","2013-11-20 02:11:33","127.0.0.1","lostro","12","Cierre de mes:11 a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("13","2013-11-20 02:11:53","127.0.0.1","lostro","12","Cierre de mes:11 a√±o:2013 por Usuario: lostro");buffernowdotcom
INSERT INTO auditoria VALUES("14","2014-01-27 09:01:24","::1","alemax","1","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("15","2014-01-27 09:01:39","::1","alemax","1","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("16","2014-01-27 09:01:52","::1","lostro","1","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("17","2014-01-27 09:01:05","::1","lostro","2","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("18","2014-01-27 09:01:20","::1","lostro","0.1","Actualiz√≥ el usuario: alex");buffernowdotcom
INSERT INTO auditoria VALUES("19","2014-01-27 11:01:55","::1","lostro","12","Registro factura de venta por el usuario lostro idfactura N: 35");buffernowdotcom
INSERT INTO auditoria VALUES("20","2014-01-27 12:01:13","::1","alex","1","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("21","2014-01-27 12:01:29","::1","alex","1","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("22","2014-01-27 12:01:38","::1","lostro","2","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("23","2014-01-27 12:01:39","::1","lostro","2","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("24","2014-01-27 12:01:41","::1","lostro","11.1","Registro factura de compra el usuario lostro idfactura N: 27");buffernowdotcom
INSERT INTO auditoria VALUES("25","2014-01-27 01:01:19","::1","","12.3","Eliminada factura de venta por el usuario  			   	idfactura N: 32");buffernowdotcom
INSERT INTO auditoria VALUES("26","2014-01-27 01:01:51","::1","","12.3","Eliminada factura de venta por el usuario  			idfactura N: 30");buffernowdotcom
INSERT INTO auditoria VALUES("27","2014-01-27 01:01:58","::1","lostro","12.3","Eliminada factura de venta por el usuario lostro 			idfactura N: 28");buffernowdotcom
INSERT INTO auditoria VALUES("28","2014-01-27 01:01:36","::1","lostro","12.3","Eliminada factura de venta por el usuario lostro 			idfactura N: 31");buffernowdotcom
INSERT INTO auditoria VALUES("29","2014-01-27 03:01:57","::1","lostro","11.3","Eliminada factura de compra por el usuario lostro 			idN: 27");buffernowdotcom
INSERT INTO auditoria VALUES("30","2014-01-27 04:01:37","::1","","0","Registr√≥ un usuario: alemax");buffernowdotcom
INSERT INTO auditoria VALUES("31","2014-01-27 04:01:26","::1","","0","Registrado usuario: ss por ");buffernowdotcom
INSERT INTO auditoria VALUES("32","2014-01-27 04:01:16","::1","","0.5","Eliminado usuario:  por lostro");buffernowdotcom
INSERT INTO auditoria VALUES("33","2014-01-27 04:01:28","::1","","0.5","Eliminado usuario:  por lostro");buffernowdotcom
INSERT INTO auditoria VALUES("34","2014-01-27 04:01:43","::1","","0.5","Eliminado usuario:  por lostro");buffernowdotcom
INSERT INTO auditoria VALUES("35","2014-01-27 04:01:51","::1","","0.5","Eliminado usuario:  por lostro");buffernowdotcom
INSERT INTO auditoria VALUES("36","2014-01-27 05:01:27","::1","saman","0","Registrado usuario: saman por lostro");buffernowdotcom
INSERT INTO auditoria VALUES("37","2014-01-27 05:01:22","::1","lostro","0.5","Eliminado usuario: ");buffernowdotcom
INSERT INTO auditoria VALUES("38","2014-01-27 05:01:28","::1","lostro","0.5","Eliminado usuario: ");buffernowdotcom
INSERT INTO auditoria VALUES("39","2014-01-27 05:01:42","::1","lostro","0.5","Eliminado usuario: ");buffernowdotcom
INSERT INTO auditoria VALUES("40","2014-01-27 05:01:05","::1","lostro","0.5","Eliminado usuario: ");buffernowdotcom
INSERT INTO auditoria VALUES("41","2014-01-27 05:01:40","::1","lostro","0.1","Actualiz√≥ el usuario: alemax");buffernowdotcom
INSERT INTO auditoria VALUES("42","2014-01-27 05:01:30","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("43","2014-01-27 05:01:52","::1","lostro","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("44","2014-01-27 05:01:04","::1","lostro","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("45","2014-01-27 05:01:13","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("46","2014-01-27 05:01:16","::1","alemax","0","Registr√≥ usuario: sosa");buffernowdotcom
INSERT INTO auditoria VALUES("47","2014-01-27 05:01:03","::1","alemax","0.5","Eliminado usuario: ");buffernowdotcom
INSERT INTO auditoria VALUES("48","2014-01-27 05:01:18","::1","alemax","0","Registr√≥ usuario: sosa");buffernowdotcom
INSERT INTO auditoria VALUES("49","2014-01-27 06:01:43","::1","sosa","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("50","2014-01-27 06:01:54","::1","sosa","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("51","2014-01-27 06:01:05","::1","sosa","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("52","2014-01-27 06:01:15","::1","sosa","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("53","2014-01-27 06:01:26","::1","alemax","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("54","2014-01-27 06:01:37","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("55","2014-01-27 06:01:08","::1","sosa","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("56","2014-01-27 06:01:01","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("57","2014-01-27 06:01:44","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 29");buffernowdotcom
INSERT INTO auditoria VALUES("58","2014-01-27 06:01:29","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 30");buffernowdotcom
INSERT INTO auditoria VALUES("59","2014-01-27 06:01:19","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 31");buffernowdotcom
INSERT INTO auditoria VALUES("60","2014-01-27 06:01:21","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 32");buffernowdotcom
INSERT INTO auditoria VALUES("61","2014-01-27 06:01:31","::1","alemax","0.1","Actualiz√≥ el usuario: alemax");buffernowdotcom
INSERT INTO auditoria VALUES("62","2014-01-27 08:01:13","::1","alemax","12.1","Registro factura de venta por el usuario alemax idfactura N: 36");buffernowdotcom
INSERT INTO auditoria VALUES("63","2014-01-27 09:01:35","::1","alemax","12.1","Registro factura de venta por el usuario alemax idfactura N: 36");buffernowdotcom
INSERT INTO auditoria VALUES("64","2014-01-27 09:01:38","::1","alemax","12.1","Registro factura de venta por el usuario alemax idfactura N: 37");buffernowdotcom
INSERT INTO auditoria VALUES("65","2014-01-27 10:01:58","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 33");buffernowdotcom
INSERT INTO auditoria VALUES("66","2014-01-27 10:01:06","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 34");buffernowdotcom
INSERT INTO auditoria VALUES("67","2014-01-27 10:01:01","::1","alemax","12.1","Registro factura de venta por el usuario alemax idfactura N: 38");buffernowdotcom
INSERT INTO auditoria VALUES("68","2014-01-27 10:01:19","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 35");buffernowdotcom
INSERT INTO auditoria VALUES("69","2014-01-27 10:01:49","::1","alemax","12.1","Registro factura de venta por el usuario alemax idfactura N: 39");buffernowdotcom
INSERT INTO auditoria VALUES("70","2014-01-27 10:01:44","::1","alemax","11.1","Registro factura de compra el usuario alemax idfactura N: 36");buffernowdotcom
INSERT INTO auditoria VALUES("71","2014-01-28 09:01:54","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("72","2014-01-28 09:01:03","::1","alemax","0.5","Eliminado usuario: sosa");buffernowdotcom
INSERT INTO auditoria VALUES("73","2014-01-28 09:01:49","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("74","2014-01-28 09:01:59","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("75","2014-01-28 09:01:48","::1","alemax","12.3","Anulada factura de venta idfactura N: 38");buffernowdotcom
INSERT INTO auditoria VALUES("76","2014-01-28 09:01:45","::1","alemax","12.3","Anulada factura de venta idfactura N: 2");buffernowdotcom
INSERT INTO auditoria VALUES("77","2014-01-28 09:01:22","::1","alemax","12.3","Eliminada factura de venta por el usuario alemax 			idfactura N: 27");buffernowdotcom
INSERT INTO auditoria VALUES("78","2014-01-28 09:01:30","::1","alemax","12.3","Eliminada factura de venta por el usuario alemax 			idfactura N: 24");buffernowdotcom
INSERT INTO auditoria VALUES("79","2014-01-28 09:01:50","::1","alemax","12.3","Anulada factura de venta idfactura N: 17");buffernowdotcom
INSERT INTO auditoria VALUES("80","2014-01-28 10:01:05","::1","alemax","12.3","Anulada factura de venta idfactura N: 15");buffernowdotcom
INSERT INTO auditoria VALUES("81","2014-01-28 10:01:18","::1","alemax","12.3","Anulada factura de venta idfactura N: 1");buffernowdotcom
INSERT INTO auditoria VALUES("82","2014-01-28 10:01:12","::1","alemax","12.3","Anulada factura de venta idfactura N: 3");buffernowdotcom
INSERT INTO auditoria VALUES("83","2014-01-28 10:01:26","::1","alemax","12.3","Anulada factura de venta idfactura N: 3");buffernowdotcom
INSERT INTO auditoria VALUES("84","2014-01-28 10:01:06","::1","alemax","12.3","Anulada factura de venta idfactura N: 4");buffernowdotcom
INSERT INTO auditoria VALUES("85","2014-01-28 10:01:22","::1","alemax","0","Registr√≥ usuario: javi");buffernowdotcom
INSERT INTO auditoria VALUES("86","2014-01-28 10:01:58","::1","alemax","0.1","Actualiz√≥ el usuario: javi");buffernowdotcom
INSERT INTO auditoria VALUES("87","2014-01-28 10:01:05","::1","alemax","0.5","Eliminado usuario: javi");buffernowdotcom
INSERT INTO auditoria VALUES("88","2014-01-28 11:01:07","::1","alemax","0","Registr√≥ usuario: javi");buffernowdotcom
INSERT INTO auditoria VALUES("89","2014-01-28 11:01:23","::1","alemax","0.1","Actualiz√≥ el usuario: javi");buffernowdotcom
INSERT INTO auditoria VALUES("90","2014-01-28 11:01:07","::1","alemax","1","Registr√≥ el Socio N: 7");buffernowdotcom
INSERT INTO auditoria VALUES("91","2014-01-28 11:01:20","::1","alemax","1.1","Actualiz√≥ Socio N: 7");buffernowdotcom
INSERT INTO auditoria VALUES("92","2014-01-28 11:01:25","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("93","2014-01-28 11:01:13","::1","alemax","0.1","Actualiz√≥ el usuario: alemax");buffernowdotcom
INSERT INTO auditoria VALUES("94","2014-01-28 11:01:29","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("95","2014-01-28 11:01:40","::1","alemax","1.2","Elimin√≥ el Socio N: 7");buffernowdotcom
INSERT INTO auditoria VALUES("96","2014-01-28 11:01:32","::1","javier","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("97","2014-01-28 11:01:45","::1","javi","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("98","2014-01-28 11:01:21","::1","javi","0.1","Actualiz√≥ el usuario: javi");buffernowdotcom
INSERT INTO auditoria VALUES("99","2014-01-28 11:01:42","::1","javi","0.4","Autenticacion Fallida");buffernowdotcom
INSERT INTO auditoria VALUES("100","2014-01-28 11:01:51","::1","javi","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("101","2014-01-29 10:01:08","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("102","2014-01-30 12:01:57","::1","alemax","0.3","Autenticacion Correcta");buffernowdotcom
INSERT INTO auditoria VALUES("103","2014-01-30 03:01:13","::1","alemax","12.1","Registro factura de venta por el usuario alemax idfactura N: 40");buffernowdotcom



DROP TABLE avances;buffernowdotcom

CREATE TABLE `avances` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `navance` int(2) NOT NULL,
  `id_s` int(4) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `venci` varchar(100) NOT NULL COMMENT 'fecha de vencimiento de la cedula',
  `ingreso` varchar(100) NOT NULL,
  `tlf` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `edocivil` varchar(100) DEFAULT NULL,
  `cargafam` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `historia` varchar(150) DEFAULT NULL,
  `contrato` varchar(150) DEFAULT NULL,
  `beneficiario` varchar(100) DEFAULT NULL,
  `nlic` varchar(255) DEFAULT NULL,
  `grado` varchar(255) NOT NULL,
  `vence` date NOT NULL COMMENT 'fecha de vencimiento de licencia de conducir',
  `cuenta` varchar(255) DEFAULT NULL,
  `certmed` varchar(255) DEFAULT NULL,
  `certmedven` date NOT NULL COMMENT 'fecha de vencimiento de certificado mÈdico',
  `gruposang` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `estado` int(1) NOT NULL COMMENT 'estado del avance',
  PRIMARY KEY (`id_a`),
  KEY `id_s` (`navance`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO avances VALUES("1","1","1","MARQUEZ","JOSE GREGORIO","5.963.093","17/04/2013","28/10/2004","516-43-22","4167499913","0000-00-00","V","Masculino","SOLTERO","0","Resd. San Antonio, Piso 4, Apto. 43, El Valle","","","","5963093","5","1900-01-00","","9291099","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("2","1","2","MIKAIL YORDANO","MARQUEZ GUZMAN","19.560.292","30/04/2016","03/05/2006","633-35-12","","0000-00-00","V","Masculino","SOLTERO","0","PETARE BALOA CASA N.- 21","","","","1252102","5","0000-00-00","","13029923","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("3","1","3","HUGO","GARCIA BRAVO","10.421.741","09/03/2014","18/10/2004","451-75-85","","0000-00-00","V","Masculino","SOLTERO","0","2da. Avenida de Artigas, vuelta la atlantico Casa Nro. 22 San Martin Caracas","","","","10421741","5","0000-00-00","","7554825","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("4","1","5","JESUS JAVIER","RODRIGUEZ VASQUEZ","11.420.555","21/12/2011","10/11/2005","","","0000-00-00","V","Masculino","SOLTERO","0","CALLE LOS MANGOS NRO. 32 EL CEMENTERIO.","","","","11420555","5","0000-00-00","","9032690","0000-00-00","ORH+","","0");buffernowdotcom
INSERT INTO avances VALUES("5","2","5","DANNY SANTOS","MARQUEZ ACEVEDO","11.405.721","30/06/2016","06/02/2012","0212-580-30-06","0424-279-18-36","0000-00-00","V","Masculino","SOLTERO","0","1ero DE MAYO CASA N.- 57 (CERCA DE LA BODEGA LAVENTODO)","","","","1392320","5","0000-00-00","","1445279","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("6","1","6","JORVI JOSE","MEZA OLIVEROS","15.516.086","30/08/2016","20/12/2011","","0416-716-97-45","0000-00-00","V","Masculino","SOLTERO","0","URB LA BANDERA EL TRIANGULO CALLE UNO FINAL CALLE LA CRUZ, CASA N.- 102-05 PARROQUIA SANTA ROSALIA","","","","S/N.-","5","0000-00-00","","1252792","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("7","1","8","JOSE AURELIO","SANDOVAL BUENO","6.346.848","30/07/2014","23/05/2011","","0416-906-47-18","0000-00-00","V","Masculino","SOLTERO","0","RUIZ PINEDA LOS TELARES COLINAS DE PALO GRANDE CALLE EL BAMBU CASA N.- 58","","","","S/N.-","5","0000-00-00","","434532","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("8","1","9","ENDER ERNESTO","PERNIA RIVERO","17.159.354","30/05/2019","12/02/2012","0212-427-63-15","0416-519-71-41","0000-00-00","V","Masculino","SOLTERO","0","URB LA PASTORA AV OESTE ESQ. SOLEDAD ACEVEDO CASA 174 (CERCA DEL COLEGIO DE MONJAS)","","","","S/N.-","5","0000-00-00","","810357","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("9","1","10","JUAN","NEMESIO MESIA","6.345.305","30/11/2015","11/03/2010","753-34-17","0414-282-73-55","0000-00-00","V","Masculino","SOLTERO","0","BELLO MONTE CALLE CHOPIN EDIF ROMERO P.B.- APTO A-1","","","","S/N.-","5","0000-00-00","","118236","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("10","1","11","HECTOR ARMANDO","VI—A DIAZ","4.277.372","24/11/1998","19/11/2002","","","0000-00-00","V","Masculino","CASADO","0","","","","","4277372","5","0000-00-00","","4774160","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("11","1","13","RAMON ELIEL","CONTRERAS","15.234.677","30/09/2021","24/01/2012","","0426-352-11-99","0000-00-00","V","Masculino","SOLTERO","0","BARRIO EL ONOTO SECTOR LA CEIBA PARTE ALTA VEREDA TAMARINDO CASA S/N.-","","","","S/N.-","5","0000-00-00","","1257804","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("12","1","14","RICHARD ANTONIO","VARGAS ANZOLA","25.210.061","30/05/2017","07/08/2008","914-94-44","0412-989-17-91","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV BOGOTA CASA S/N EL CEMENTERIO","","","","2599236","5","0000-00-00","","17026551","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("13","2","14","HECTOR JOSE","VELASQUEZ","14.633.035","30/10/2015","10/08/2011","0212-414-16-15","0414-106-93-24","0000-00-00","V","Masculino","SOLTERO","0","BARUTA SECTOR OJO DE AGUA LAS ESMERALDAS CAS n.-52 (FRENTE A LA CANCHA)","","","","S/N.-","5","0000-00-00","","215404","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("14","1","16","MARCO ANTONIO","NAVAS RIVAS","14.016.584","08/05/2017","15/02/2008","","","0000-00-00","V","Masculino","SOLTERO","0","KM. 7, EL JUNQUITO, BARRIO BICENTENARIO, SECTOR VALLE AZUL, CASA NRO. 0311","","","","","5","1900-01-00","","16467914","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("15","1","17","JUAN CARLOS","CALZADILLA SANCHEZ","13.612.914","27/03/2009","12/07/2005","631-46-97","","0000-00-00","V","Masculino","SOLTERO","0","Av. Los Totumos en 6ta. y 7ma. Transversal El Cementrio, Casa Nro. 139","","","","13612914","5","0000-00-00","","10641766","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("16","1","18","RAMON HUMBERTO","AVENDA—O","6.308.759","1900-01-00","16/04/2002","","","0000-00-00","V","Masculino","","0","***********","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("17","1","19","KATERINA DEL VALLE","MORON MONASTERIO","11.740.839","30/11/2016","27/09/2007","0212-633-49-76","0412-812-61-72","0000-00-00","V","Femenino","","0","AV PPAL CEMENTERIO CALLE LOS ALPES CASA 18-67","","","","2431826","5","0000-00-00","","9675404","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("18","2","19","ISIDRO ANTONIO","BRACHO CANELON","11.404.838","30/10/2015","15/09/2008","862-40-40","0416-160-71-86","0000-00-00","V","Masculino","SOLTERO","0","LA PASTORA ESQ DESAN CARLOS A SAN CRISTOBAL CASA N.- 107","","","","947106","5","0000-00-00","","14361292","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("19","1","20","JUVENAL ANTONIO","BRICE—O GONZALEZ","6.373.532","1900-01-00","21/07/1999","014-322-9835","","0000-00-00","V","Masculino","","0","Calle los BaÒos, Resd. Vista Alta, Bloque 4, Aptp. 41-D Las Clavellinas - Guarenas","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("20","1","21","JOSE MANUEL","CABEZAS","6.221.425","1900-01-00","21/09/1998","862-46-13","","0000-00-00","V","Masculino","","0","CALLE 5 DE JULIO NRO. 14, GRAMOVEN - CATIA","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("21","2","21","ANGEL JOSE","TERAN MARQUEZ","6.785.495","1900-01-00","26/05/1999","014-925-70-77","","0000-00-00","V","Masculino","","0","CALLE 2 DE MAYO BARRIO 2 DE MAYO Nß 29 EL CEMENTERIO","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("22","1","23","OMAR LUIS","TINEO","5.015.278","1900-01-00","01/11/1997","631-38-49","","0000-00-00","V","Masculino","","0","Calle Los Mangos, Nro. 51-2. El Cementerio.","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("23","2","23","EMIGDIO JOSE","MIRABAL ORTEGA","10.870.110","1900-01-00","27/01/2000","631-17-84","","0000-00-00","V","Masculino","","0","ESCALERA DE LA UNIDAD , CASA NRO.  24, EL LA GRAN COLOMBIA  CE","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("24","1","24","LUIS OMAR","ARAUJO MEDINA","10.177.796","30/07/2014","10/09/2009","0212-632-10-70","0416-929-88-81","0000-00-00","V","Masculino","SOLTERO","0","LOS ROSALES CALLE 18 DE OCTUBRE CASA N.- 06 CERCA DE ABASTOS LA FRONTERA","","","","S/N.-","5","0000-00-00","","15260","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("25","1","27","CARLOS ALBERTO","HERNANDEZ RODRIGUEZ","6.193.352","1900-01-00","20/10/1999","632-39-38","","0000-00-00","V","Masculino","","0","FINAL CALLE LOS ALPES Nß 57 EL CEMENTERIO","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("26","1","28","DANIEL WILFREDO","AGUILAR GONZALEZ","4.681.492","30/08/2016","11/10/2010","","0426-405-53-86","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV BOGOTA CASA N.- 39 EL CEMENTERIO","","","","1010263","5","0000-00-00","","19428292","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("27","1","29","YONATHAN ANTONIO","GUILLEN BORGES","19.022.813","30/01/2020","07/06/2010","","","0000-00-00","V","Masculino","SOLTERO","0","","","","","S/N.-","5","0000-00-00","","462083","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("28","1","30","WINDER ALFREDO","AGUILAR VERGARA","13.126.319","30/04/2015","05/12/2007","","0424-108-16-21","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV ROOSEVELT CALLE LOS SIN TECHOS CASA 34-2 EL CEMENTERIO","","","","957187","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("29","1","31","RODOLFO FRANCISCO","RIVERO","6.346.541","04/03/2015","20/04/2005","","0414-242-62-16","0000-00-00","V","Masculino","SOLTERO","0","Calle los Alpes Nro. 1087, El Cementerio","","","","6346541","5","0000-00-00","","9315413","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("30","1","34","JOSE MANUEL","TORREALBA","14.048.706","10/06/2015","02/08/2005","","0416-813-73-42","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV. BOGOTA, LOS SIN TECHOS- EL CEMENTERIO","","","","14048706","5","0000-00-00","","10945689","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("31","1","35","EUCLIDES","PARADA","14.919.299","30/09/2015","08/09/2009","","0416-012-65-83","0000-00-00","V","Masculino","SOLTERO","0","TELARES PALO GRANDE CARICUAO RUIZ PINEDA CALLE PRINCIPAL ENTRADA DE LA BOCONO 8 CERCA DE LA FERRETER","","","","1374663","5","0000-00-00","","4021","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("32","1","36","HELBERT IVAN","GAMEZ RIVERA","12.230.396","05/06/2014","09/09/2005","","0416-816-82-44","0000-00-00","V","Masculino","SOLTERO","0","Calle el estanque Nro. con Manguito Nro. 43","","","","12230396","5","0000-00-00","","10531845","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("33","1","37","RAUL ANTONIO","ARCILE","6.192.891","30/10/2020","17/01/2012","0212-614-65-52","0416-992-73-06","0000-00-00","V","Masculino","SOLTERO","0","CALLE 1ero DE MAYO ESCALERA N.- 12 CASA N.- 42","","","","S/N.-","5","0000-00-00","","2186075","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("34","1","38","EDINCSON GREGORY","MENDOZA FUENTES","12.293.623","1900-01-00","15/03/2001","781-48-54/014","","0000-00-00","V","Masculino","","0","CALLE REAL DE SIM¢N RODR°GUEZ, CASA NRO. 16, PINTO SALINAS.","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("35","2","38","JAIRO JAVIER","MORA ZAMBRANO","15.143.099","30/03/2016","16/01/2012","0212-571-76-60","0414-256-18-43","0000-00-00","V","Masculino","SOLTERO","0","URB GUAICAIPURO SUR AV.- ANDRES BELLO QTA MERCEDES ( AL LADO DEL CENTRO MOVISTAR)","","","","S/N.-","5","0000-00-00","","536426","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("36","1","40","JOSE DEL CARMEN","HIDALGO","9.157.231","1900-01-00","07/03/2002","0414-259-15-53","","0000-00-00","V","Masculino","","0","PARTE ALTA 1RO DE MAYO, EL CEMENTERIO","","","","9157231","5","0000-00-00","","198029","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("37","1","41","EULIDES DEL VALLE","TINEO","5.428.294","10/12/2008","07/07/2003","","0412-7071049","0000-00-00","V","Masculino","SOLTERO","0","Sector 3, Vereda 13 Casa Nro. 25, Cua Edo. Miranda","","","","5428294","5","0000-00-00","","4577037","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("38","2","41","ROSMMEL GONZALO","AVENDA—O MARIN","13.873.660","30/06/2019","03/09/2010","631-48-93","0412-021-90-25","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV.- LOS MANGOS CASA N.- 51","","","","S/N.-","5","0000-00-00","","333473","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("39","1","42","FRANKLIN RAFAEL","CORDOVA DIAZ","6.653.731","08/03/2003","25/09/1998","0212-614-9287","0414-173-64-16","0000-00-00","V","Masculino","SOLTERO","0","AV. LOS CARMENES, NRO. 112, EL CEMENTERIO.","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("40","2","42","CARLOS JOSE","FARFAN RODRIGUEZ","15.468.870","30/06/2016","04/02/2011","","0424-321-20-73","0000-00-00","V","Masculino","SOLTERO","0","AV ANDRES BELLO 3RA TSVL GUAICAIPURO CASA ANA N.- 46","","","","1567853","5","0000-00-00","","19630874","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("41","1","44","RAFAEL","CABRERA MORENO","14.195.153","30/10/2016","02/12/2011","0212-887-96-90","0426-758-45-49","0000-00-00","V","Masculino","SOLTERO","0","AV SAN JOSE DEL AVILA EDIF SAN CRISTOBAL PISO 3 APTO 3","","","","S/N.-","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("42","1","45","ENDER JOSE","LA CRUZ LA CRUZ","17.304.639","30/10/2018","25/02/2010","","","0000-00-00","V","Masculino","SOLTERO","0","","","","","S/N.-","5","0000-00-00","","88882","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("43","2","45","OMAR ANTONIO","LA CRUZ TORRES","17.304.672","30/07/2020","11/11/2010","431-34-05","0416-920-19-22","0000-00-00","V","Masculino","SOLTERO","0","CARICUAO TERRAZA B CENTRAL VEREDA 10 CASA N.- 02","","","","S/N.-","5","0000-00-00","","661738","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("44","1","46","ALEXIS JOSE","TORO MU—OZ","13.564.000","24/04/2009","28/04/2005","","0416-409-6607","0000-00-00","V","Masculino","SOLTERO","0","Cota 905,  Barrio el Naranjal, vereda Nro., Caso Nro. 18","","","DESDE 04/05/2006","","5","0000-00-00","","10575371","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("45","2","46","HUGO ALBERTO","SALAS RIZ","6.590.670","23/04/2014","25/11/2005","","0416-422-73-21","0000-00-00","V","Masculino","CASADO","0","CALLE REAL DE LOS FRAILES, CASA NRO. 18, CATIA","","","","PROV.","5","1900-01-00","","119489233","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("46","1","47","GABRIEL DE JESUS","DOMINGUEZ","6.678.880","30/11/2015","15/10/2008","339-71-69","0416-530-87-45","0000-00-00","V","Masculino","SOLTERO","4","BARRIO GUZMAN BLANCO COTA 905 CHIVERA ESCALERA 3 CASA 30","","","","1713358","5","0000-00-00","","15305818","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("47","2","47","HAMLET SALVADOR","AQUINO JIMENEZ","22.671.008","30/01/2019","17/02/2009","418-29-49","0412-382-41-53","0000-00-00","V","Masculino","SOLTERO","0","CALLE LOS MANGOS CASA N.- 24 EL CEMENTERIO (CERCA DE LA BODEGA DE LA ENTRADA A MURACHI)","","","","1987926","5","0000-00-00","","2003015","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("48","1","49","JAIME LEONEL","ESTEPA PALENCIA","23.619.889","30/11/2014","14/02/2012","","0416-412-85-94","0000-00-00","V","Masculino","SOLTERO","0","LOS ROSALES CALLE REAL DE PRADO DE MARIA CASA N.- 120 (CERCA DEL ABASTO MIRABAL)","","","","S/N.-","5","0000-00-00","","1016712","0000-00-00","\"AB\"+","","0");buffernowdotcom
INSERT INTO avances VALUES("49","1","50","RAUL ANTONIO","BRACHO MARTINEZ","9.485.443","30/07/2018","29/01/2009","","0416-8270462","0000-00-00","V","Masculino","SOLTERO","0","AV PPAL DEL CEMENTERIO CALLE LOS ALPES CASA N.- 73 ( CERCA DE TRANSPORTE ALIANZA )","","","","S/N.-","5","0000-00-00","","18746249","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("50","1","51","RICHARD JOSE","PEASPAN","10.354.025","17/05/2012","08/06/2005","","","0000-00-00","V","Masculino","SOLTERO","0","Calle Los Alpes, casa numero 21, El Cementerio Av Principal","","","","10354025","5","0000-00-00","","10865775","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("51","2","51","GERMAN EDMUNDO","SOLORZANO GONZALEZ","13.716.070","30/03/2017","14/10/2011","0212-613-19-60","0426-189-07-16","0000-00-00","V","Masculino","SOLTERO","0","CALLE 2 LOS JARDINES DEL VALLE SECTOR VUELTA E\' MONTA—A CASA N.- 4 ( CERCA DE LA RAMPA )","","","","948239","5","0000-00-00","","267099","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("52","1","52","ALFREDO ANTONIO","COLMENARES","10.506.587","25/04/2015","18/06/1996","1","4141735460","0000-00-00","V","Masculino","SOLTERO","0","Final AVEMIDA BOGOTA LOS SIN TECHOS","","","","6123","5","0000-00-00","","11729593","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("53","1","53","JHIM FREDYS","VANEGAS TORO","23.610.007","30/04/2015","31/01/2007","","0416-938-23-92","0000-00-00","V","Masculino","SOLTERO","0","AV PPAL DEL CEMENTERIO EDF.- SAN LORENZO PISO 3 APTO 8","","","","991842","5","0000-00-00","","15375005","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("54","1","57","JOSE DANIEL","NIETO ORTIZ","10.156.084","14/06/2003","21/12/2003","9706284","","0000-00-00","V","Masculino","SOLTERO","0","Casa Nro. 2, El Junquito","","","","72878532","5","0000-00-00","","10156084","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("55","1","59","RAUL","PABON VELAZCO","16.023.193","28/02/2020","07/06/2010","432-56-41","0412-080-45-32","0000-00-00","V","Masculino","SOLTERO","0","SECTOR UNO # 5 MANZANA 039 UV-9 RUIZ PINEDA CARICUAO","","","","PROVIS.-","5","1900-01-00","","65158","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("56","1","60","ANGEL AUGUSTO","JIMENEZ MORENO","13.253.627","30/11/2019","07/04/2011","","0414-021-79-78","0000-00-00","V","Masculino","SOLTERO","0","AV. LAMAS BARRIO SAN JOSE SECTOR LOS PINOS EDIF BLAUCANEL PISO 1 APTO 5","","","","S/N.-","5","0000-00-00","","2412422","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("57","1","61","JUSTO RAM”N","JAIMES HERNANDEZ","9.466.905","1900-01-00","26/01/2005","","4142459365","0000-00-00","V","Masculino","","0","Autopista Regional del Centro Km. 24 Sector los Ocimitos","","","","9466905","5","0000-00-00","","9183173","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("58","2","61","EFRAIN","MOLINA BELANDRIA","13.229.883","30/06/2014","09/09/2011","","0426-117-96-49","0000-00-00","V","Masculino","SOLTERO","0","BLOQUE 13 ESCALERA 2 PISO 3 APTO 03-04 SECTOR UD-5 CARICUAO","","","","2619478","5","0000-00-00","","272447","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("59","1","62","ISMAEL JOSE","BRAZON GUZMAN","17.695.366","30/06/2018","05/09/2008","0239-714-76-14","0412-907-29-78","0000-00-00","V","Masculino","SOLTERO","0","URB CARTANAL ALTO DE SOAPIRE SECTOR CAJIGAL CALLE REVOLUCION CASA S/N","","","","PROVISIONL","5","1900-01-00","","18911314","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("60","1","63","JOSE ALEJOS","BASTIDAS B","17.346.142","08/03/2006","30/06/2003","","","0000-00-00","V","Masculino","SOLTERO","0","7ma. Transversal de los Mangos, El cementerio.","","","","17346142","5","0000-00-00","","65866456","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("61","2","63","ANGEL MANUEL","CORDOVA CORDOVA","13.347.281","13/06/2014","30/04/2007","","0414-2250081","0000-00-00","V","Masculino","SOLTERO","0","CEMENTERIO LOS CARMENES, CALLE LOS MAGOS CASA N∫ 9","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("62","1","64","DANIEL ELY"," CASTILLO GONZALEZ","6.357.614","03/05/1961","13/09/2004","631-79-01","","0000-00-00","V","Masculino","SOLTERO","0","Calle el Carmen # 22 Prado de MarÌa.","","","","6357614","5","0000-00-00","","8722162","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("63","1","66","JOSE ROMAN","PIMENTEL JUSTO","16.806.752","30/08/2016","19/10/2006","631-26-83","","0000-00-00","V","Masculino","SOLTERO","0","CEMENTERIO AV. LOS CARMENES CON LA PICA N.- 31-08","","","","1582968","5","0000-00-00","","14407034","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("64","1","67","RAMON JESUS","MORENO GONZALEZ","4.353.563","20/05/2010","05/03/1999","6326203","             0414-197-80-007","0000-00-00","V","Masculino","CASADO","0","FINAL AV. LOS TOTUMOS NRO. 10, EL CEMENTERIO.","","","","22763","5","0000-00-00","","9557941","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("65","2","67","OSWALDO ENRIQUE","RODRIGUEZ GONZALEZ","12.357.763","30/12/2008","06/02/2008","416-90-18","0414-204-76-99","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV BOGOTA CASA N.- 03 EL CEMENTERIO","","","","1228312","5","0000-00-00","","17884978","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("66","1","68","RAUL ALFONSO","MURGAS ARANGO","13.432.982","29/07/2014","18/06/2003","422-03-49","4141397900","0000-00-00","V","Masculino","SOLTERO","0","Km. 12 el Junquito, Urb. Gusmel Casa Alivel","","","","2136270","5","0000-00-00","","5431445","0000-00-00","ARH+","","0");buffernowdotcom
INSERT INTO avances VALUES("67","2","68","IVAN DE JESUS","SULVARAN MORON","10.632.929","29/09/2012","06/09/2005","0212-422-03-49","412-611-88-88","0000-00-00","V","Masculino","SOLTERO","0","KM. 12 EL JUNQUITO, URB. EL GUAMAL, CALLE BOLIVAR, QUINTA ALI-BOL, EL JUNQUITO.","","","","10632929","5","1900-01-00","","511495266","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("68","1","69","JESUS OSWALDO","MANZANILLA MENDOZA","6.297.676","30/05/2018","05/08/2009","418-12-80","0414-104-97-64","0000-00-00","V","Masculino","SOLTERO","5","AV PPAL DEL CEMENTERIO EDIF REPA PISO 2 APTO 2-B ( DIAGONAL AL CENTRO COMERCIAL EL CEMENTERIO","","","","2852024","5","0000-00-00","","17882752","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("69","2","69","NESTOR GUALBERTO","MOREIRA MENENDEZ","23.156.531","30/06/2014","07/06/2010","","0412-399-03-24","0000-00-00","V","Masculino","SOLTERO","0","CALLE LAS LUCES CASA N.- 63 ( AL LADO DE LA CAPILLA ) EL CEMENTERIO","","","","S/N.-","5","0000-00-00","","20557","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("70","1","70","DOUGLAS GIOVANI","DELGADO SANDOVAL","10.826.759","24/10/2014","28/07/2005","","","0000-00-00","V","Masculino","SOLTERO","0","","","","","10826759","5","0000-00-00","","11162881","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("71","2","70","MARCOS AGUSTO","CORDOVA ACU—A","9.935.416","30/11/2015","28/09/2007","0212-715-00-53","0424-153-50-13","0000-00-00","V","Masculino","CASADO","0","BARRIO LAS LUCES CASA N.- 64 EL CEMENTERIO","","","","S/N.-","5","0000-00-00","","43949762","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("72","1","71","JOHANY GREGORIO","VALERO","15.591.446","30/05/2014","18/08/2011","212","0416-215-74-20","0000-00-00","V","Masculino","SOLTERO","0","LOS CASTA—OS CALLEJON SOSA CASA N.- 1 EL CEMENTERIO","","","","2059473","5","0000-00-00","","381581","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("73","1","72","ANTONIO JOSE","GARCIA RIVAS","8.853.960","30/04/2016","10/03/2008","0212-861-21-75","0416-303-37-58","0000-00-00","V","Masculino","SOLTERO","0","AV EL CALVARIO N.- 28 EL TRIANGULO LOS ROSALES","","","","2285392","5","0000-00-00","","16185666","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("74","2","72","FREDDY ALBERTO","FRANKLIN","6.127.391","30/11/2017","07/09/2009","0212-494-37-40","0416-0119036","0000-00-00","V","Masculino","CASADO","0","FINAL AV LOS CARMENES CALLE LOS MANGOS CASA N.- 08","","","","S/N.-","5","0000-00-00","","18424892","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("75","1","73","CARO ARI—A","HUMBERTO RAFAEL","24.207.906","1900-01-00","22/05/1992","871-10-18","","0000-00-00","V","Masculino","","0","CALLE OLIVET, URB. BRISAS DE PROPATRIA NRO. 13.","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("76","1","75","WILLIAM YOVANNY","MENDEZ","11.373.110","27/01/2010","04/04/2003","632-55-97","","0000-00-00","V","Masculino","SOLTERO","0","Antigua Televisora Frente al Com ando de la Guandia, Casa Nro. 90","","","","11373110","5","0000-00-00","","252163","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("77","1","78","JOSE RAFAEL","MONTA—O ALVAREZ","82.013.290","30/04/2008","28/05/2008","0212-632-56-61","0412-707-45-82","0000-00-00","E","Masculino","SOLTERO","0","AV LA RAMBLA QTA AVE MARIA N.- 14-35 LOS ROSALES","","","","S/N","5","0000-00-00","","16019289","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("78","1","79","ALEXANDER","BARRETO","11.324.823","1900-01-00","16/11/2001","","","0000-00-00","V","Masculino","CASADO","0","AV. PRESIDENTE MEDINA, EDIF. IUTIRLA    P.B., 3-8","","","","11324823","5","0000-00-00","","2921523","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("79","1","81","ERICK JONATHAN","MARTINEZ","15.759.736","20/10/1979","17/05/2005","","0412-973-05-13","0000-00-00","V","Masculino","SOLTERO","0","Final calle 10 de Propatria, Barrio Los casiques","","","","15759736","5","0000-00-00","","10619876","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("80","1","84","WILMAR DANIEL","AGUILAR VERGARA","13.865.607","1900-01-00","06/02/2001","014-219-38-38","","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV. BOGOTA, BARRIO LOS SIN TECHO, NRO. 82 EL CEMENTERIO.","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("81","1","85","ANGEL JOSE","GRIMON ATAGUA","6.322.189","30/01/2016","30/05/2011","","0412-826-36-43","0000-00-00","V","Masculino","SOLTERO","0","PINTO SALINAS SECTOR ARENAS CASA N.- 45 (DETRAS DE LA PLAZA ANDRES BELLO)","","","","S/N.-","5","0000-00-00","","113752","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("82","1","86","ALBERTO JOSE","ROSALES BARRETO","11.920.682","30/09/2007","24/05/2006","5152830","","0000-00-00","V","Masculino","SOLTERO","0","BARRIO GRAN COLOMBIA CALLE 13 DE SEPTIEMBRE","","","","1294091","5","0000-00-00","","12962837","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("83","1","88","EDINSON RAFAEL","CASTA—O HERRERA","82.134.722","30/01/2016","29/11/2011","0212-715-71-61","0412-720-96-25","0000-00-00","E","Masculino","SOLTERO","0","CALLE EL CARMEN CASA N.- 27 LA DOLORITA PETARE ( AL LADO DEL MODULO POLICIAL)","","","","S/N.-","5","0000-00-00","","1278122","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("84","1","89","ADRIAN","FORERO SANCHEZ","11.682.187","1900-01-00","23/10/2000","016-856-07-84","","0000-00-00","V","Masculino","","0","FINAL AV. SAN MARTIN, CALLE YEPEZ NRO. 141, LA COROMOTO","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("85","2","89","DEUSHAROMIT","RODRIGUEZ G.","15.701.753","20/02/2015","29/09/2005","","4141076314","0000-00-00","V","Masculino","SOLTERO","0","FINAL AVENIDA BOGOTA LOS SIN TECHOS CEMENTERIO CASA #20","","","","15701753","5","0000-00-00","","11652514","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("86","1","90","OSWALDO DE JESUS","MERY MARQUEZ","14.360.883","30/10/2015","18/04/2006","0414-0279388","","0000-00-00","V","Masculino","SOLTERO","0","CALLE COLON CRUCE CON PASEO COLON LOS CAOBOS QTA CELI CASA N.- 0516","","","","360881","5","0000-00-00","","11889102","0000-00-00","o+","","0");buffernowdotcom
INSERT INTO avances VALUES("87","1","91","ALFREDO ENRIQUE","OLIVERO PARRA","14.249.807","30/11/2015","12/08/2011","","0414-284-00-71","0000-00-00","V","Masculino","SOLTERO","0","Av.- BOLIVAR DE PEREZ BONALDE CATIA EDIF NESA PISO 1 APTO 1","","","","S/N.-","5","0000-00-00","","315913","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("88","1","92","GUILLERMO JOSE","YANCE MARTIN","13.405.871","08/07/2008","21/08/2003","","0412-5303102","0000-00-00","V","Masculino","SOLTERO","0","Barria 1ro. de Mayo Casa Nro. 14, El Plan.","","","","13405871","5","0000-00-00","","5372829","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("89","1","93","JHOAN JAVIER","HERNANDEZ CHIQUITO","14.799.226","30/06/2014","16/09/2009","","0426-811-03+28","0000-00-00","V","Masculino","SOLTERO","3","LOS CASTA—OS AV.- BOGOTA QTA DON ALIRIO 12-19","","","","S/N.-","5","0000-00-00","","229625","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("90","1","94","LUIS ALBERTO","GUDI—O LA CRUZ","15.313.738","14/08/2004","04/09/2003","","","0000-00-00","V","Masculino","SOLTERO","0","Final calle los Mangos Nro. 06, El Cementerio.","","","","15313738","5","0000-00-00","","6885497","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("91","1","95","LUIS MARIA","PALMA MORENO","11.117.410","22/04/2008","27/12/2000","","0414-155-22-06","0000-00-00","V","Masculino","SOLTERO","4","CALLE LOS ALPES NRO. 419, EL CEMENTERIO.","","","ESPOSA E HIJOS","","5","0000-00-00","","11169072","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("92","1","99","JESUS EDUARDO","GAMEZ RIVERA","5.648.740","16/10/2014","08/02/2006","","","0000-00-00","V","Masculino","SOLTERO","0","","","","","","5","1900-01-00","","10096473","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("93","1","100","RONNY EVELIO","NIEVES DIAZ","14.531.887","1900-01-00","04/07/2000","016.721.52.87","","0000-00-00","V","Masculino","","0","5TA. CALLE LA CHARNECA SAN AGUST°N DEL SUR","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("94","2","100","LIZARDO DEL VALLE","SANCLER ESPA—OL","14.169.298","30/10/2010","02/08/2010","","0424-227-86-67","0000-00-00","V","Masculino","SOLTERO","0","SANTA LUCIA MUNICIPIO PAZ CASTILLO SECTOR EL MANGUITOV-A  CALLE 6 CASA N.- 113","","","","1339568","5","0000-00-00","","72503","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("95","1","101","WILLIAM JOSE","SOLANO ORTEGA","18.184.607","30/05/2007","02/10/2007","0212-715-43-11","0416-539-09-75","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV.- BOGOTA LOS CASTA—OS CASA N.- 89","","","","2596094","5","0000-00-00","","16912879","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("96","2","101","ALEXANDER ANTONIO","LOPEZ PEREZ","13.214.019","18/06/2013","04/04/2008","0212-885-62-30","0416-9245636","0000-00-00","V","Masculino","SOLTERO","0","CEMENTERIO CALLE ALTAMIRA CASA N.-24","","","","S/N","5","0000-00-00","","16189912","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("97","1","102","JORGE LUIS","VASQUEZ AVILA","9.482.243","1900-01-00","05/12/1999","014-903-80-75","","0000-00-00","V","Masculino","","0","AVENIDA AL° PRIMERA EDIF. QUIRIQUIRE PISO 6 APTO. 6-3","","","","","5","1900-01-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("98","2","109","RICARDO","ECHENIQUE","3.981.928","1900-01-00","11/04/2000","870-49-59","","0000-00-00","V","Masculino","","0","CALLE REAL SE LOS MAGALLANES DE CATIA, ENTRE MEXICO Y COLOMBIA","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("99","1","103","JAIRO ENRIQUE","OJEDA","13.718.338","31/10/2013","01/11/2003","","4141823094","0000-00-00","V","Masculino","SOLTERO","0","Carretera vieja la Guaira Blandin","","","","13718338","5","0000-00-00","","7141117","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("100","1","105","PEDRO SEGUNDO","JAIMES HERNANDEZ","9.460.108","30/01/2015","10/04/2008","","0414-163-37-49","0000-00-00","V","Masculino","SOLTERO","3","URB GRAN COLOMBIA FINAL CALLE COMERCIO CASA N.-11","","","","2787936","5","0000-00-00","","17668122","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("101","1","108","CARLOS JOSE","MORENO CAMPOS","6.222.572","1900-01-00","24/08/2001","014-2136820","","0000-00-00","V","Masculino","","0","AV. LOS JABILLOS, QTA. MARIA, NRO. 3006 EL CEMENTERIO.","","","","2193-A","5","0000-00-00","","2568431","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("102","2","108","MIGUEL ANGEL","CAMPOS MORENO","6.215.619","30/12/2008","18/08/2006","","0416-412-02-37","0000-00-00","V","Masculino","SOLTERO","0","LOS FRAILES DE CATIA EL MIRADOR CASA N.- 69","","","","521093","5","0000-00-00","","12953874","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("103","1","110","OSCAR JOSE","LOZADA RAMIREZ","10.507.013","14/01/2013","16/07/2002","631-34-74","4141119174","0000-00-00","V","Masculino","SOLTERO","0","FINAL AV. LOS JABILLOS, SEGUNDA CALLE LOS MANGUITOS, CASA NRO. 27-17","","","DESDE 28/04/06","6216","5","0000-00-00","","510117543","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("104","2","110","RONALD ENRIQUE","MORENO","16.562.528","03/10/2012","05/08/2004","631-3691","","0000-00-00","V","Masculino","SOLTERO","0","ÁFinal Av. Bogat· el Cementerio","","","","6562528","5","0000-00-00","","7587142","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("105","1","111","GUSTAVO","ESQUEDA MENDOZA","13.128.762","30/06/2018","02/06/2011","","0424-188-34-04","0000-00-00","V","Masculino","SOLTERO","0","TINAJITOS A SAN NICOLAS CASA N.- 17-03 ( CERCA DE LA CANCHA TINAJITOS)","","","","S/N.-","5","0000-00-00","","875932","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("106","2","111","HIRAM ANTONIO","HENRIQUEZ ROOPCHAND","12.403.413","30/03/2019","30/06/2011","0212-782-79-74","0426-715-07-06","0000-00-00","V","Masculino","SOLTERO","0","URB. PINTO SALINAS BLOQ.- 01 EDIF 02 PISO 2 APTO 22","","","","PROVIS.-","5","1900-01-00","","200607","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("107","1","112","LUIS ENRIQUE","RINCON  MATHEUS","7.831.091","02/08/2002","20/03/2003","","14129773513","0000-00-00","V","Masculino","SOLTERO","0","Telares de Palos Grandes, Av. Principal Nro. 37 Ruiz Pineda","","","","7831091","5","0000-00-00","","1794494","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("108","1","113","OLIMPO","DIAZ","5.682.990","30/07/2014","13/08/2007","339-11-64","0414-235-58-05","0000-00-00","V","Masculino","SOLTERO","0","CALLE PPAL BARRIO ANDRES ELOY BLANCO CASA N.- 08 23 DE ENERO","","","","1684988","5","0000-00-00","","10088601","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("109","1","114","CESAR","MOLINA MONTOYA","10.904.904","26/04/2008","24/09/1998","016-815-21-45","4141969478","0000-00-00","V","Masculino","SOLTERO","3","CALLE BOGOTA, QTA. MARIA, EL CEMENTERIO.","","","","1745071","5","0000-00-00","","9566764","0000-00-00","ORH+","","0");buffernowdotcom
INSERT INTO avances VALUES("110","2","114","RAMIRO","BRICE—O BRICE—O","13.762.097","17/11/2012","28/06/2007","690-15-34","0416-425-64-84","0000-00-00","V","Masculino","SOLTERO","0","AV ROOSEVELT CON CALLE AMERICA EDIF.- YUGOSOLFA PISO 3 APTO 7-B","","","","1509510","5","0000-00-00","","14073794","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("111","1","116","JONATHAN ENRIQUE","GUAINA RODRIGUEZ","16.135.724","30/06/2014","10/01/2011","","0414-907-27-96","0000-00-00","V","Masculino","SOLTERO","0","CEMENTERIO LOS CASTA—OS AV. BOGOTA LOS SIN TECHOS CASA N.- 84","","","","S/N.-","5","1900-01-00","","633105","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("112","1","117","ALEXANDER RAFAEL","VELAZCO PEREZ","6.342.110","1900-01-00","21/07/1998","014-919-65-88","","0000-00-00","V","Masculino","","0","PRIMERA CALLE DEL TRI†NGULO Nß 20 LOS ROSALES","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("113","1","119","LUIS GONZALO","DELGADO","11.933.436","1900-01-00","16/02/1998","016-713-01-11","","0000-00-00","V","Masculino","SOLTERO","0","AV. PRINCIPAL LOS EUCALIPTOS CALLE LIBERTAD Nß 50 SAN JUAN","","","","","5","0000-00-00","","","1900-01-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("114","2","119","FERNANDO DAVID","DELGADO REYES","18.022.610","30/01/2016","16/02/2012","0212-422-51-62","0424-220-11-28","0000-00-00","V","Masculino","SOLTERO","0","KM. 9 EL JUNQUITO  CALLE LOS AGUACATES CASA N.- 19 (CERCA DEL HOTEL SAINT MORITZ)","","","","S/N-","5","0000-00-00","","14457923","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("115","1","120","JHONATHAN NOEL","SOLANO CARABALLO","14.584.414","30/12/2018","26/01/2012","0212-633-26-12","0424-202-79-89","0000-00-00","V","Masculino","SOLTERO","0","PROLONGACION ZULOAGA LOS ROSALES LA RAZZETTI CASA N.- 34 ( CERCA DE LA PARADA DE LOS YEEP","","","","S/N.-","5","0000-00-00","","413617","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("116","1","121","ELIO ROGER","SANCHEZ AVENDA—O","14.048.627","1900-01-00","11/09/2001","6335524","","0000-00-00","V","Masculino","","0","AV. LOS CARMENES, CALLE LOS MANGOS,     CASA NRO. 51, EL CEMENTERIO","","","","PROVICINA0","5","0000-00-00","","2746575","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("117","2","121","JOSE JAVIER","FLORES CHAVEZ","6.253.096","09/02/2011","27/04/2009","633-59-03","0414-030-54-82","0000-00-00","V","Masculino","SOLTERO","0","CEMENTERIO CALLE LOS MANGOS CASA n.-02","","","","1915177","5","0000-00-00","","20057","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("118","1","122","JOSE GREGORIO","SALCEDO","12.452.749","30/01/2009","14/09/2006","574-75-15","","0000-00-00","V","Masculino","SOLTERO","0","SAN AGUSTIN DEL NORTE URDANETA AZALON CASA N.- 77","","","","892783","5","0000-00-00","","13949069","0000-00-00","","","0");buffernowdotcom
INSERT INTO avances VALUES("119","1","123","ULISES SAMIR","DEL VALLE CERVANTES","23.681.074","30/05/2020","03/02/2011","715-07-83","0424-167-49-97","0000-00-00","V","Masculino","SOLTERO","0","BLOQ. 03 COCHECITO PISO 16 APTO 1607","","","","S/N.-","5","0000-00-00","","615075","0000-00-00","","","0");buffernowdotcom



DROP TABLE combustible;buffernowdotcom

CREATE TABLE `combustible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(15) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO combustible VALUES("10","Gasoil");buffernowdotcom
INSERT INTO combustible VALUES("12","Gasolina");buffernowdotcom
INSERT INTO combustible VALUES("13","Hibrido");buffernowdotcom
INSERT INTO combustible VALUES("25","Hibrido");buffernowdotcom
INSERT INTO combustible VALUES("26","Metano");buffernowdotcom



DROP TABLE dfacturav;buffernowdotcom

CREATE TABLE `dfacturav` (
  `id_av` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id del detalle de factura venta',
  `id_r` int(5) unsigned NOT NULL COMMENT 'id del repuesto',
  `id_fv` int(5) NOT NULL COMMENT 'id de la factura venta',
  `cantidad` int(5) NOT NULL,
  `preciou` int(10) NOT NULL COMMENT 'precio unitario',
  PRIMARY KEY (`id_av`),
  KEY `id_r` (`id_r`),
  KEY `id_fv` (`id_fv`),
  CONSTRAINT `dfacturav_ibfk_1` FOREIGN KEY (`id_fv`) REFERENCES `facturav` (`id_fv`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dfacturav_ibfk_2` FOREIGN KEY (`id_r`) REFERENCES `repuestos` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO dfacturav VALUES("3","1","1","3","4900");buffernowdotcom
INSERT INTO dfacturav VALUES("4","1","1","4","5000");buffernowdotcom
INSERT INTO dfacturav VALUES("5","4","2","1","5000");buffernowdotcom
INSERT INTO dfacturav VALUES("6","6","2","1","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("7","5","3","1","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("8","4","3","1","5000");buffernowdotcom
INSERT INTO dfacturav VALUES("13","1","8","1","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("14","1","9","1","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("15","3","9","1","4900");buffernowdotcom
INSERT INTO dfacturav VALUES("16","1","10","1","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("18","1","12","1","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("21","5","15","1","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("22","5","16","0","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("23","1","17","0","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("24","1","18","2","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("25","5","18","3","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("50","6","35","1","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("53","3","36","1","4900");buffernowdotcom
INSERT INTO dfacturav VALUES("54","4","36","1","5000");buffernowdotcom
INSERT INTO dfacturav VALUES("55","6","37","2","1500");buffernowdotcom
INSERT INTO dfacturav VALUES("56","7","37","2","300");buffernowdotcom
INSERT INTO dfacturav VALUES("57","1","40","1","1700");buffernowdotcom
INSERT INTO dfacturav VALUES("58","3","40","1","4900");buffernowdotcom



DROP TABLE factura;buffernowdotcom

CREATE TABLE `factura` (
  `nfactura` int(15) NOT NULL COMMENT 'numero de factura',
  `id_f` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'numero de referencia',
  `id_proveedor` int(4) NOT NULL COMMENT 'numero de proveedor',
  `fmonto` decimal(12,2) NOT NULL COMMENT 'monto de la factura',
  `fechainv` date NOT NULL,
  `iva` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_f`),
  KEY `nproveedor` (`id_proveedor`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO factura VALUES("1","1","1","3000.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("3333","2","1","33333.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("2222","3","2","22222.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("666","4","2","6666.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("77777","5","2","77777.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("888888","6","2","77777.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("77777","7","2","77777.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("8888","8","2","88888.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("3000","10","1","70000.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("3000","11","1","70000.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("12","12","2","12.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("12","13","2","12.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("7854545","14","2","31321321.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("15","16","1","15.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("17","17","1","17.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("17","18","1","17.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("112121","20","1","6600.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("322000","21","2","4900.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("4654","22","4","4900.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("1100","23","1","1904.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("4500","24","1","5936.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("1100","25","2","1904.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("2000","26","1","1904.00","0000-00-00","12.00");buffernowdotcom
INSERT INTO factura VALUES("7850","28","1","24080.00","2014-01-27","12.00");buffernowdotcom
INSERT INTO factura VALUES("111","29","1","7392.00","2014-01-27","0.00");buffernowdotcom
INSERT INTO factura VALUES("222","30","2","5488.00","2014-01-27","0.00");buffernowdotcom
INSERT INTO factura VALUES("1","31","4","7280.00","2014-01-27","0.00");buffernowdotcom
INSERT INTO factura VALUES("2","32","1","1680.00","2014-01-27","0.00");buffernowdotcom
INSERT INTO factura VALUES("5000","33","1","27776.00","2014-01-28","0.00");buffernowdotcom
INSERT INTO factura VALUES("2000","34","2","22533.00","2014-01-28","11.00");buffernowdotcom
INSERT INTO factura VALUES("2000","35","2","10878.00","2014-01-28","11.00");buffernowdotcom
INSERT INTO factura VALUES("111111","36","1","3000.00","2014-01-28","11.00");buffernowdotcom



DROP TABLE facturav;buffernowdotcom

CREATE TABLE `facturav` (
  `estado` int(1) unsigned NOT NULL COMMENT 'estado de la factura',
  `id_fv` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id de la factura (venta)',
  `id_s` int(5) NOT NULL COMMENT 'id del socio ',
  `fvmonto` decimal(11,2) NOT NULL COMMENT 'monto de venta ',
  `fechaf` date NOT NULL,
  `iva` decimal(4,2) unsigned NOT NULL,
  PRIMARY KEY (`id_fv`),
  KEY `id` (`id_s`),
  CONSTRAINT `facturav_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `socios` (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO facturav VALUES("1","1","3","9900.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("1","2","3","6500.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("1","3","3","6500.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("1","4","3","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","5","3","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","6","3","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","7","4","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","8","3","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","9","2","6600.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","10","4","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","12","7","1700.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","13","4","5488.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","14","3","5600.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("1","15","3","1680.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","16","4","0.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("1","17","4","0.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","18","7","8848.00","2013-11-18","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","35","7","1680.00","2014-01-27","0.00");buffernowdotcom
INSERT INTO facturav VALUES("0","36","3","11088.00","2014-01-28","12.00");buffernowdotcom
INSERT INTO facturav VALUES("0","37","4","4032.00","2014-01-28","12.00");buffernowdotcom
INSERT INTO facturav VALUES("1","38","4","10878.00","2014-01-28","11.00");buffernowdotcom
INSERT INTO facturav VALUES("1","39","2","3000.00","2014-01-28","11.00");buffernowdotcom
INSERT INTO facturav VALUES("0","40","1","7392.00","2014-01-30","12.00");buffernowdotcom



DROP TABLE gastos;buffernowdotcom

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `socioavance` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO gastos VALUES("3","11","2013-11-10","2500","Prestamo Rines","2");buffernowdotcom
INSERT INTO gastos VALUES("4","217","2013-11-13","1500","Prestamo Rines","3");buffernowdotcom
INSERT INTO gastos VALUES("5","417","2013-11-20","1000","dsdfdsf","2");buffernowdotcom
INSERT INTO gastos VALUES("6","418","2013-11-19","3000","sadasd","2");buffernowdotcom



DROP TABLE hmultas;buffernowdotcom

CREATE TABLE `hmultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(50) NOT NULL,
  `pago` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO hmultas VALUES("1","2","8","2013-01-10","3000","3000");buffernowdotcom
INSERT INTO hmultas VALUES("2","1","9","2013-01-10","2000","");buffernowdotcom
INSERT INTO hmultas VALUES("3","2","10","2013-02-13","2500","3");buffernowdotcom
INSERT INTO hmultas VALUES("4","3","12","2013-02-05","3500","");buffernowdotcom



DROP TABLE hsociosavances;buffernowdotcom

CREATE TABLE `hsociosavances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navance` varchar(15) NOT NULL,
  `nsocio` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `venci` varchar(100) NOT NULL,
  `ingreso` varchar(100) NOT NULL,
  `tlf` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `edocivil` varchar(100) NOT NULL,
  `cargafam` varchar(100) NOT NULL,
  `contrato` varchar(150) NOT NULL,
  `ruta` varchar(150) NOT NULL,
  `beneficiario` varchar(100) NOT NULL,
  `nlic` varchar(255) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `vence` date NOT NULL,
  `cuenta` varchar(255) NOT NULL,
  `certmed` varchar(255) NOT NULL,
  `certmedven` date NOT NULL,
  `gruposang` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `historia` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;buffernowdotcom




DROP TABLE ingresos;buffernowdotcom

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(100) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `socioavance` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO ingresos VALUES("19","219","2013-11-01","190.80","Finanza","S2A1");buffernowdotcom
INSERT INTO ingresos VALUES("22","110","2013-11-05","5100","Finan","S1");buffernowdotcom
INSERT INTO ingresos VALUES("25","225","2013-11-07","2500","Pago multa socio N:2, Exp :011","2");buffernowdotcom
INSERT INTO ingresos VALUES("27","227","2013-01-03","1500","Pago multa socio N:2, Exp :011","2");buffernowdotcom
INSERT INTO ingresos VALUES("33","228","2013-11-10","15000","Caja","1");buffernowdotcom
INSERT INTO ingresos VALUES("34","229","2013-01-01","8000","Por Caja mala","2");buffernowdotcom
INSERT INTO ingresos VALUES("35","230","2012-01-01","61000","Por cauchos","1");buffernowdotcom
INSERT INTO ingresos VALUES("36","231","2012-02-10","1000","Por motor","1");buffernowdotcom



DROP TABLE iva;buffernowdotcom

CREATE TABLE `iva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `piva` decimal(4,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO iva VALUES("1","12.00");buffernowdotcom



DROP TABLE mpagos;buffernowdotcom

CREATE TABLE `mpagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montoc` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO mpagos VALUES("14","5100","2013-01-00");buffernowdotcom
INSERT INTO mpagos VALUES("15","2500","2013-10-08");buffernowdotcom
INSERT INTO mpagos VALUES("30","1600","2013-11-20");buffernowdotcom



DROP TABLE mpagosa;buffernowdotcom

CREATE TABLE `mpagosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` decimal(11,2) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO mpagosa VALUES("2","190.80","7","2013");buffernowdotcom



DROP TABLE mprestamos;buffernowdotcom

CREATE TABLE `mprestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `montomi` int(11) NOT NULL,
  `montoma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO mprestamos VALUES("1","1","500","30000");buffernowdotcom
INSERT INTO mprestamos VALUES("2","2","500","20000");buffernowdotcom
INSERT INTO mprestamos VALUES("3","3","10000","30000");buffernowdotcom



DROP TABLE multas;buffernowdotcom

CREATE TABLE `multas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` varchar(100) NOT NULL,
  `nsocio` varchar(15) NOT NULL,
  `nombresocio` varchar(100) NOT NULL,
  `cedula` text NOT NULL,
  `fecha` date NOT NULL,
  `fechap` date NOT NULL,
  `monto` varchar(100) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO multas VALUES("11","011","2","Luis","18270061","2013-02-20","2013-02-03","2500","por no cumplir ruta","Pagado");buffernowdotcom
INSERT INTO multas VALUES("13","013","4","Pedro","22222222","2013-02-20","0000-00-00","2500","por no cumplir ruta","Pendiente");buffernowdotcom
INSERT INTO multas VALUES("14","001","1","Carlos","11111111","0000-00-00","0000-00-00","12000","prueba","Pagado");buffernowdotcom
INSERT INTO multas VALUES("15","0054","3","Luis","18270061","0000-00-00","0000-00-00","1500","otro","Pendiente");buffernowdotcom



DROP TABLE pagoavances;buffernowdotcom

CREATE TABLE `pagoavances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navance` varchar(15) NOT NULL,
  `nombres` text NOT NULL,
  `apellido` text NOT NULL,
  `cedula` int(11) NOT NULL,
  `deposito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `banco` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `concepto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO pagoavances VALUES("1","S2A1","Williams","Gonzalez","14587856","11112222","2013-02-03","Mercantil","190.80","Finanza");buffernowdotcom



DROP TABLE pagosocios;buffernowdotcom

CREATE TABLE `pagosocios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` int(11) NOT NULL,
  `id_s` int(4) NOT NULL,
  `deposito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `mes` date NOT NULL,
  `banco` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `concepto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expediente` (`expediente`),
  KEY `id_s` (`id_s`),
  CONSTRAINT `pagosocios_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `socios` (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO pagosocios VALUES("27","1","80","123456","2013-10-10","2013-10-09","Mercantil","3849,40","mes noviembre");buffernowdotcom



DROP TABLE permisos;buffernowdotcom

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` varchar(15) NOT NULL,
  `nombresocio` varchar(100) NOT NULL,
  `cedulasocio` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `avance1` varchar(100) NOT NULL,
  `nombreavanp` varchar(100) NOT NULL,
  `cedulaavanp` varchar(100) NOT NULL,
  `avance2` varchar(100) NOT NULL,
  `nombreavans` varchar(100) NOT NULL,
  `cedulaavans` varchar(100) NOT NULL,
  `dirige` varchar(150) NOT NULL,
  `placa` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ano` date NOT NULL,
  `cantidadptos` varchar(100) NOT NULL,
  `linea` text NOT NULL,
  `motor` varchar(100) NOT NULL,
  `chasis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO permisos VALUES("25","1","Luis","18270061","2013-01-30","2013-01-25","2013-01-16","2","Angel","15236541","","","","Los roques","MAE94A","ENCAVA","ENT-610  ","BLANCO","2013-01-03","32","","439184         ","8XL6GC11DAE005036     ");buffernowdotcom
INSERT INTO permisos VALUES("26","2","Alexander","11589975","2013-02-18","2013-02-09","2013-02-16","","","","","","","SSSSSSS","AAU78AS","CHEVROLET","ENT-610  ","BLANCO","2013-01-03","32","","439184         ","8XL6GC11DAE005036     ");buffernowdotcom
INSERT INTO permisos VALUES("27","3","Luis","11589975","2013-02-18","2013-02-15","2013-02-21","","","","","","","CHIRIMENA","5456465464","sadasd","encava","sadasdsad","2013-02-16","546546","","5646546","456465465");buffernowdotcom
INSERT INTO permisos VALUES("28","2","Alexander","11589975","2013-02-18","2013-02-16","2013-02-08","","","","","","","CUBA","AAU78AS","CHEVROLET","ENT-610  ","BLANCO","2013-01-03","32","","439184         ","8XL6GC11DAE005036     ");buffernowdotcom



DROP TABLE prestamos;buffernowdotcom

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` varchar(15) NOT NULL,
  `expediente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechap` date NOT NULL,
  `monto` varchar(100) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO prestamos VALUES("2","1","42","Carlos","Perez","18270061","2012-01-01","2013-11-13","61000","Por cauchos","Pagado");buffernowdotcom
INSERT INTO prestamos VALUES("3","1","43","Carlos","Perez","11111111","2012-01-10","2013-02-03","1256","Por motor","Pagado");buffernowdotcom
INSERT INTO prestamos VALUES("4","2","44","Alemaxxx","Cordova","22222222","2013-01-01","2013-02-18","8000","Por Caja mala","Pagado");buffernowdotcom
INSERT INTO prestamos VALUES("5","1","45","Carlos","Perez","18270061","2012-02-10","2013-11-13","1000","Por motor","Pagado");buffernowdotcom
INSERT INTO prestamos VALUES("6","1","46","Carlos","Perez","18270061","2012-02-10","0000-00-00","1200","Por motor","Pendiente");buffernowdotcom
INSERT INTO prestamos VALUES("7","1","47","Carlos","Perez","18270061","2012-02-16","0000-00-00","1300","arreglo de caja","Pendiente");buffernowdotcom
INSERT INTO prestamos VALUES("13","1","413","Carlos","Castillo","18270061","2013-02-15","2013-02-18","15000","Caja","Pagado");buffernowdotcom
INSERT INTO prestamos VALUES("17","2","417","Alexander","Canizalez","11589975","2015-02-11","0000-00-00","1000","dsdfdsf","Pendiente");buffernowdotcom
INSERT INTO prestamos VALUES("18","2","418","Alexander","Canizalez","11589975","2013-02-08","0000-00-00","5000","sadasd","Pendiente");buffernowdotcom



DROP TABLE proveedores;buffernowdotcom

CREATE TABLE `proveedores` (
  `id_proveedor` int(4) NOT NULL AUTO_INCREMENT COMMENT 'numero de proveedor',
  `proveedor` varchar(20) NOT NULL COMMENT 'nombre de proveedor',
  `rproveedor` varchar(10) NOT NULL COMMENT 'rif de proveedor ',
  `nombrecontacto` varchar(30) NOT NULL COMMENT 'nombre de representante de la compaÒia',
  `dproveedor` varchar(40) NOT NULL COMMENT 'direccion de proveedor',
  `tproveedor` int(9) NOT NULL COMMENT 'telefono de proveedor',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO proveedores VALUES("1","MERCAMOTO","J-18369199","","CHACAITO","2129513328");buffernowdotcom
INSERT INTO proveedores VALUES("2","RAMBER","2445632132","","Chacaito","9512457");buffernowdotcom
INSERT INTO proveedores VALUES("4","La Juanita","3656465","Sr. Victor Troconis","petare","3373399");buffernowdotcom



DROP TABLE repuestos;buffernowdotcom

CREATE TABLE `repuestos` (
  `id_r` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_r` varchar(20) NOT NULL COMMENT 'CÛdigo de la pieza de inventario ',
  `pieza` varchar(20) NOT NULL COMMENT 'Nombre del respuesto',
  `descripcion` text NOT NULL,
  `costo` decimal(11,2) NOT NULL,
  `cantidad` int(11) DEFAULT NULL COMMENT 'cantidad de unidades disponibles',
  PRIMARY KEY (`id_r`),
  UNIQUE KEY `codigo_p` (`codigo_r`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO repuestos VALUES("1","0001","rotor","parte electrica","1700.00","9");buffernowdotcom
INSERT INTO repuestos VALUES("3","CA001","Caucho 170/90/17","Caucho para autobus encava ","4900.00","9");buffernowdotcom
INSERT INTO repuestos VALUES("4","RI001","Rines 20\" ","Para encava modelo gt","5000.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("5","KI002","Kit de cable para bo","Conecta con el distribuidor ","1500.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("6","IN002","inyectores ","cuerpo de admision","1500.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("7","SE002","selenoides ","vidrios","300.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("8","GU003","guardafango","encava 5000","600.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("9","BA003","bateria ","electrico","2000.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("12","MA004","manzana","sssss","1111.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("14","SE006","sexy","sdagfsfd","46546.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("16","RE008","recio","juanga","8888.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("21","NO010","nopuedo","alfin","8888.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("22","BO011","Bombillo faro","faro encava","330.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("23","CR012","cruze derecho","Stop","250.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("24","LU013","Luz de retroceso","Stop","300.00","10");buffernowdotcom
INSERT INTO repuestos VALUES("25","CA014","Carburador","Encava 500","300.25","10");buffernowdotcom



DROP TABLE rutas;buffernowdotcom

CREATE TABLE `rutas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreruta` varchar(15) NOT NULL COMMENT 'nombre de la ruta',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO rutas VALUES("1","Carmelitas");buffernowdotcom
INSERT INTO rutas VALUES("2","Chacaito");buffernowdotcom
INSERT INTO rutas VALUES("12","Previsora");buffernowdotcom



DROP TABLE sactivos;buffernowdotcom

CREATE TABLE `sactivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO sactivos VALUES("2","2","Alexander");buffernowdotcom
INSERT INTO sactivos VALUES("3","3","Alexander");buffernowdotcom
INSERT INTO sactivos VALUES("5","5","Alexander");buffernowdotcom
INSERT INTO sactivos VALUES("6","4","Juan");buffernowdotcom
INSERT INTO sactivos VALUES("8","1","Pedro");buffernowdotcom



DROP TABLE servicios;buffernowdotcom

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `fechai` date NOT NULL,
  `fechar` date NOT NULL,
  `telefono` text NOT NULL,
  `cantidad` text NOT NULL,
  `historia` text NOT NULL,
  `estatus` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO servicios VALUES("1","Carlos Castillo","ccastilloucv@gmail.com","2013-11-19","0000-00-00","0414-1736416","40","asdasdasdas","Noprocesada");buffernowdotcom



DROP TABLE sinactivos;buffernowdotcom

CREATE TABLE `sinactivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO sinactivos VALUES("6","8","");buffernowdotcom
INSERT INTO sinactivos VALUES("7","9","");buffernowdotcom
INSERT INTO sinactivos VALUES("9","11","");buffernowdotcom
INSERT INTO sinactivos VALUES("10","12","");buffernowdotcom
INSERT INTO sinactivos VALUES("11","13","");buffernowdotcom
INSERT INTO sinactivos VALUES("12","14","");buffernowdotcom
INSERT INTO sinactivos VALUES("13","15","");buffernowdotcom
INSERT INTO sinactivos VALUES("14","16","");buffernowdotcom
INSERT INTO sinactivos VALUES("15","17","");buffernowdotcom
INSERT INTO sinactivos VALUES("16","18","");buffernowdotcom
INSERT INTO sinactivos VALUES("17","19","");buffernowdotcom
INSERT INTO sinactivos VALUES("18","20","");buffernowdotcom
INSERT INTO sinactivos VALUES("19","21","");buffernowdotcom
INSERT INTO sinactivos VALUES("20","22","");buffernowdotcom
INSERT INTO sinactivos VALUES("21","23","");buffernowdotcom
INSERT INTO sinactivos VALUES("22","24","");buffernowdotcom
INSERT INTO sinactivos VALUES("23","25","");buffernowdotcom
INSERT INTO sinactivos VALUES("24","26","");buffernowdotcom
INSERT INTO sinactivos VALUES("25","27","");buffernowdotcom
INSERT INTO sinactivos VALUES("26","28","");buffernowdotcom
INSERT INTO sinactivos VALUES("27","28","");buffernowdotcom
INSERT INTO sinactivos VALUES("28","29","");buffernowdotcom
INSERT INTO sinactivos VALUES("29","30","");buffernowdotcom
INSERT INTO sinactivos VALUES("30","31","");buffernowdotcom
INSERT INTO sinactivos VALUES("31","32","");buffernowdotcom
INSERT INTO sinactivos VALUES("32","33","");buffernowdotcom
INSERT INTO sinactivos VALUES("33","34","");buffernowdotcom
INSERT INTO sinactivos VALUES("34","35","");buffernowdotcom
INSERT INTO sinactivos VALUES("35","36","");buffernowdotcom
INSERT INTO sinactivos VALUES("36","37","");buffernowdotcom
INSERT INTO sinactivos VALUES("37","38","");buffernowdotcom
INSERT INTO sinactivos VALUES("38","39","");buffernowdotcom
INSERT INTO sinactivos VALUES("39","40","");buffernowdotcom
INSERT INTO sinactivos VALUES("40","41","");buffernowdotcom
INSERT INTO sinactivos VALUES("41","42","");buffernowdotcom
INSERT INTO sinactivos VALUES("42","43","");buffernowdotcom
INSERT INTO sinactivos VALUES("43","44","");buffernowdotcom
INSERT INTO sinactivos VALUES("44","45","");buffernowdotcom
INSERT INTO sinactivos VALUES("45","46","");buffernowdotcom
INSERT INTO sinactivos VALUES("46","47","");buffernowdotcom
INSERT INTO sinactivos VALUES("47","48","");buffernowdotcom
INSERT INTO sinactivos VALUES("48","49","");buffernowdotcom
INSERT INTO sinactivos VALUES("49","50","");buffernowdotcom
INSERT INTO sinactivos VALUES("50","51","");buffernowdotcom
INSERT INTO sinactivos VALUES("51","52","");buffernowdotcom
INSERT INTO sinactivos VALUES("52","53","");buffernowdotcom
INSERT INTO sinactivos VALUES("53","54","");buffernowdotcom
INSERT INTO sinactivos VALUES("54","55","");buffernowdotcom
INSERT INTO sinactivos VALUES("55","56","");buffernowdotcom
INSERT INTO sinactivos VALUES("56","57","");buffernowdotcom
INSERT INTO sinactivos VALUES("57","58","");buffernowdotcom
INSERT INTO sinactivos VALUES("58","59","");buffernowdotcom
INSERT INTO sinactivos VALUES("59","60","");buffernowdotcom
INSERT INTO sinactivos VALUES("60","61","");buffernowdotcom
INSERT INTO sinactivos VALUES("61","62","");buffernowdotcom
INSERT INTO sinactivos VALUES("62","63","");buffernowdotcom
INSERT INTO sinactivos VALUES("63","64","");buffernowdotcom
INSERT INTO sinactivos VALUES("64","65","");buffernowdotcom
INSERT INTO sinactivos VALUES("65","66","");buffernowdotcom
INSERT INTO sinactivos VALUES("66","67","");buffernowdotcom
INSERT INTO sinactivos VALUES("67","68","");buffernowdotcom
INSERT INTO sinactivos VALUES("68","69","");buffernowdotcom
INSERT INTO sinactivos VALUES("69","70","");buffernowdotcom
INSERT INTO sinactivos VALUES("70","71","");buffernowdotcom
INSERT INTO sinactivos VALUES("71","72","");buffernowdotcom
INSERT INTO sinactivos VALUES("72","73","");buffernowdotcom
INSERT INTO sinactivos VALUES("73","74","");buffernowdotcom
INSERT INTO sinactivos VALUES("74","75","");buffernowdotcom
INSERT INTO sinactivos VALUES("75","76","");buffernowdotcom
INSERT INTO sinactivos VALUES("76","77","");buffernowdotcom
INSERT INTO sinactivos VALUES("77","78","");buffernowdotcom
INSERT INTO sinactivos VALUES("78","79","");buffernowdotcom
INSERT INTO sinactivos VALUES("79","80","");buffernowdotcom
INSERT INTO sinactivos VALUES("80","81","");buffernowdotcom
INSERT INTO sinactivos VALUES("81","82","");buffernowdotcom
INSERT INTO sinactivos VALUES("82","83","");buffernowdotcom
INSERT INTO sinactivos VALUES("83","84","");buffernowdotcom
INSERT INTO sinactivos VALUES("84","85","");buffernowdotcom
INSERT INTO sinactivos VALUES("85","86","");buffernowdotcom
INSERT INTO sinactivos VALUES("86","87","");buffernowdotcom
INSERT INTO sinactivos VALUES("87","88","");buffernowdotcom
INSERT INTO sinactivos VALUES("88","89","");buffernowdotcom
INSERT INTO sinactivos VALUES("89","90","");buffernowdotcom
INSERT INTO sinactivos VALUES("90","91","");buffernowdotcom
INSERT INTO sinactivos VALUES("91","92","");buffernowdotcom
INSERT INTO sinactivos VALUES("92","93","");buffernowdotcom
INSERT INTO sinactivos VALUES("93","94","");buffernowdotcom
INSERT INTO sinactivos VALUES("94","95","");buffernowdotcom
INSERT INTO sinactivos VALUES("95","96","");buffernowdotcom
INSERT INTO sinactivos VALUES("96","97","");buffernowdotcom
INSERT INTO sinactivos VALUES("97","98","");buffernowdotcom
INSERT INTO sinactivos VALUES("98","99","");buffernowdotcom
INSERT INTO sinactivos VALUES("106","10","");buffernowdotcom
INSERT INTO sinactivos VALUES("107","100","");buffernowdotcom
INSERT INTO sinactivos VALUES("108","101","");buffernowdotcom
INSERT INTO sinactivos VALUES("109","7","");buffernowdotcom



DROP TABLE socios;buffernowdotcom

CREATE TABLE `socios` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `venci` date NOT NULL COMMENT 'fecha de vencimiento de la cÈdula',
  `ingreso` date NOT NULL,
  `tlf` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `edocivil` varchar(100) NOT NULL,
  `cargafam` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `historia` varchar(150) DEFAULT NULL,
  `contrato` int(11) NOT NULL COMMENT 'n˙mero de coontrato',
  `beneficiario` text,
  `nlic` int(15) DEFAULT NULL,
  `grado` varchar(100) NOT NULL,
  `vence` date NOT NULL COMMENT 'fecha de vencimiento de la licencia',
  `cuenta` int(30) DEFAULT NULL,
  `certmed` int(20) DEFAULT NULL,
  `certmedven` date NOT NULL COMMENT 'fecha de vencimiento del certificado mÈdico',
  `gruposang` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` int(1) NOT NULL COMMENT 'estado del socio',
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO socios VALUES("1","1","TOBIAS EDUARDO","MURGAS MORON","81.646.501","1900-01-00","2005-12-20","0212-347-23-25","","1955-01-03","E","Masculino","SOLTERO","0","URB. PALO ALTO, CALLE M. CASA NRO. M4A, GUATIRE EDO MIRANDA.","","1","IGUAL VEHICULO NRO. 88","1266078","5","2012-01-13","0","10239164","2006-03-08","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("2","2","JONATHAN JOSE","DUQUE JIMENEZ","11.978.460","2016-10-30","2011-08-04","0212-632-39-38","0412-993-31-95","1975-04-09","V","Masculino","SOLTERO","0","CALLE REAL EDIFICIO BOLIVAR PISO 2 APTO 24 PRADO DE MARIA","","2","","0","5","2019-04-09","0","531106","2012-07-14","","","0");buffernowdotcom
INSERT INTO socios VALUES("3","4","OSWALDO","RAMIREZ"," 8.852.654","2006-06-30","2007-01-26","","0412-9644914","1960-06-13","V","Masculino","SOLTERO","0","CALLE PARATE BUENO CASA N.- 15 URB PINTO SALINAS","","3","","1872882","5","2017-06-13","0","15193595","2009-01-16","","","0");buffernowdotcom
INSERT INTO socios VALUES("4","7","JOSE GREGORIO","GUAINA MARTINEZ","10.352.743","2007-09-20","1999-10-14","0212-324-94-67","0412-6183477","1968-09-20","V","Masculino","SOLTERO","3","FINAL AV. BOGOTA BARRIO LOS SIN TECHOS # 52, EL CEMENTERIO.","","4","ESPOSA E HIJOS","1921359","5","2009-09-20","0","10935816","2006-06-21","","","0");buffernowdotcom
INSERT INTO socios VALUES("5","8","JOSE RAFAEL","RODRIGUEZ VASQUEZ","11.902.598","2005-10-20","1994-05-02","0212 5165580","0412-0901241","1967-10-20","V","Masculino","SOLTERO","3","CALLE MANGUITOS CON AV. LOS CARMENES, CASA NRO. 31-1, EL CEMENTERIO","","5","CONCUBINA E HIJOS","11902598","5","2009-10-20","0","8342913","2006-10-13","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("6","9","FERMIN ANTONIO","GARCIA MONSALVE"," 9.319.150","2017-12-30","2004-08-27","671-31-12","0414-3007131","1964-08-04","V","Masculino","SOLTERO","6","Longaray El Valle casa Nro. 23","","6","IGUAL  AVISO NRO. 162","0","5","2011-04-08","0","17518","2012-06-28","","","0");buffernowdotcom
INSERT INTO socios VALUES("7","10","ALBERTO","FERREIRA PINHEIRO"," 809.823","1942-06-30","1983-12-20","0212-6336313","","1942-06-30","E","Masculino","CASADO","3","AV. GRAN COLOMBIA, EDIF. LA ESTRELLA DEL CARIBE, P- 2, APTO. 9, LAS ACACIAS.","","7","ESPOSA E HIJOS","1346788","5","2009-06-30","0","9705101","2005-12-15","orh-","","0");buffernowdotcom
INSERT INTO socios VALUES("8","11","JOAO","DOS RAMOS"," 6.267.556","2015-03-17","1998-10-19","0212-472-00-63","0416-715-67-16","1948-04-17","V","Masculino","CASADO","2","AV. PICHINCHA, EDIF. SANTA BABARA, APTO. P.H. URB. LA PAZ.","","8","ESPOSA E HIJOS","2202740","5","2013-04-17","0","11349990","2006-08-18","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("9","12","JOSE GREGORIO","PERDOMO VARELA","16.248.299","2013-08-03","2007-05-31","0212-5150737","","1979-08-03","V","Masculino","SOLTERO","3","Final Av. Bogot· 7ma Transversal de los CastaÒos, al lado de la calle San Vicente de Paul Casa Nro.","","9","CONYUGUE E HIJOS","1556167","5","2011-10-03","0","13502990","2007-06-02","O+","","0");buffernowdotcom
INSERT INTO socios VALUES("10","13","ORLANDO ANTONIO","GONZALEZ PION"," 6.060.715","2011-04-09","2009-03-02","","0412-7275505","1961-01-22","V","Masculino","SOLTERO","0","CALLE BUENOS AIRES  SECTOR EL MATADERO N∫ 45 CUA EDO MIRANDA","","10","","0","4","1900-01-00","0","19367148","2010-11-17","","","0");buffernowdotcom
INSERT INTO socios VALUES("11","14","MANUEL","ESTEVEZ ESTEVEZ"," 6.160.379","2014-09-05","1992-04-03","0212-4847320","","1935-01-05","V","Masculino","CASADO","1","CALLE 400, EDIF. JON, PISO 5, APTO. 10","","11","ESPOSA","1307494","5","2009-04-05","0","99626661","2006-01-31","","","0");buffernowdotcom
INSERT INTO socios VALUES("12","15","LUIS ENRIQUE","PORRAS CANTOR"," 3.061.597","2014-04-21","1990-04-10","0212-363-28-67","0416-8086506","1955-04-21","V","Masculino","SOLTERO","1","CALLE ARAGUANEY, ESCALERA FLOR DE ARAGUANEY, NRO. 5, RAYA 36-A BARRIO ZULIA. GUARENAS.","","12","MADRE","473547","5","2014-10-21","0","10714558","2006-07-12","","","0");buffernowdotcom
INSERT INTO socios VALUES("13","17","DAVID","CABANACH PALA"," 4.278.121","2015-04-29","2000-03-21","0212-576-78-90","04123920588","1956-10-10","V","Masculino","CASADO","5","AV. BUENOS AIRES, RESD. FENIX 7MO PISO, APTO. 75. LOS CAOBOS","","13","ESPOSA E HIJOS","1762725","5","2009-10-10","0","10946479","2006-06-27","B+","","0");buffernowdotcom
INSERT INTO socios VALUES("14","18","CARLOS FRANKLIN","PERDOMO VARELA","14.037.198","1900-01-00","1999-06-10","515-11-38","0414-1370404","1977-09-09","V","Masculino","SOLTERO","0","7MA. TRANSVERSAL LOS CASTA§OS, FINAL AV. BOGOTA†, CASA # 2408.","","14","","0","4","1999-09-10","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("15","20","GIOVANNY ALFREDO","HUIZA","14.131.245","2016-10-30","2011-03-03","0212-8805448","0416-8154431","1974-01-30","V","Masculino","SOLTERO","5","BARRIO 1ERO DE MAYO CALLE PRINCIPAL CASA N.- 21","","15","","682938","5","2015-01-30","0","70493","2011-05-14","","","0");buffernowdotcom
INSERT INTO socios VALUES("16","21","JESUS EMIRO","ANGULO"," 6.110.868","2004-10-17","2003-05-29","0212-5644618","04142785999","1960-10-17","V","Masculino","CASADO","5","Esq. San Narsiso, Av. PanteÛn, Edificio Andrea, piso 1, Apto. 1-A, Parroquia San JosÈ.","","16","ESPOSA","2296785","5","2013-10-17","0","11131728","2006-07-13","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("17","22","ADJIMIRO ANTONIO","MATERANO GRATEROL"," 8.716.480","2008-04-23","1990-01-05","0212-631-54-28","0416-910-40-47","1966-04-23","V","Masculino","CASADO","4","CALLE LAS PALMAS CASA NRO. 80, EL CEMENTERIO.","","17","ESPOSA HE HIJOS","600470","5","2014-04-23","0","9327605","2005-10-26","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("18","24","GASPAR JOAO","CARVALHO COSTA"," 6.303.929","2013-06-02","2001-05-30","02-945-70-41","0416-707-64-91","1952-03-21","V","Masculino","SOLTERO","5","CONJ. RESD. EL NARANJAL, TORRE D, APTO. 13. LAS MINAS DE BARUTA.","","18","ESPOSA E HIJOS","128769","5","2010-03-21","0","9240596","2005-11-12","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("19","25","EDWIN DAVID","PAXI GUTIERREZ","21.618.631","2015-03-24","1999-10-28","0212-6326959","0412-7187753","1964-09-24","V","Masculino","CASADO","3","AV. LOS JABILLOS, CASA NRO. 0414, LOS CASTA—OS DEL CEMENTERIO.","","19","ESPOSA E HIJOS","2372125","5","2013-09-24","0","11731212","2006-10-11","","","0");buffernowdotcom
INSERT INTO socios VALUES("20","26","ROBERTO","TELES DA SILVA","12.398.217","2017-08-30","2008-02-28","451-44-63","0414-2489992","1976-05-07","V","Masculino","SOLTERO","0","AV.BOGOTA CALLE 6TA TSVL SECTOR EL CEMENTERIO EDF GUAMA PISO 2 APTO 06","","20","","752131","5","2011-05-07","0","16987538","2009-09-05","","","0");buffernowdotcom
INSERT INTO socios VALUES("21","27","JOSE HUMBERTO","CARRERO"," 8.706.596","2014-06-16","1996-02-12","0275-8818601","0416-7236812","1968-10-16","V","Masculino","SOLTERO","2","Barrio la inmaculada. Calle 12, Nro. 71. El vigia Edo. Merida","","21","PADRE Y SOBRINO","1757625","5","2009-10-16","0","9557533","2005-11-30","","","0");buffernowdotcom
INSERT INTO socios VALUES("23","28","OMAR LUIS","TINEO GONZALEZ","5.015.278","2017-10-30","2012-01-25","0212-631-38-49","0416-619-85-71","1951-06-05","V","Masculino","SOLTERO","0","CALLE LOS MANGOS CASA N.- 51-2","","22","","0","5","2019-06-05","0","256916","2012-07-27","","","0");buffernowdotcom
INSERT INTO socios VALUES("24","29","TEODOMIRO","ARAUJO MEDINA","12.973.818","2014-05-30","2009-04-30","632-05-31","0416-9205042","1973-07-13","V","Masculino","SOLTERO","0","LOS ROSALES CALLE LOS POSTES CASA N.- 33(CERCA DE LA ANTIGUA PANADERIA)","","23","","0","5","2019-07-13","0","8612","2011-03-25","","","0");buffernowdotcom
INSERT INTO socios VALUES("25","31","ROBERTO","TELES DA SILVA","12.398.217","1900-01-00","2009-02-18","","","1976-05-07","V","Masculino","SOLTERO","0","LA MISMA DEL ESCALAFON 026","","24","","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("26","32","ABEL AGOSTINHO","DOS SANTOS GOUVEIA","   814.471","2006-08-02","1982-09-10","0212-541-85-92","","1945-07-02","E","Masculino","SOLTERO","2","AV. PAJARO A CURAMICHATE, EDIF. PANORAMA PISO  2, APTO. 9.","","25","CONCUBINA E HIJA","184128","5","2010-07-02","0","9732939","2005-12-21","ARH+","","0");buffernowdotcom
INSERT INTO socios VALUES("27","33","WEGNER WILLIAN","MENDOZA ROJAS"," 6.169.570","2015-04-30","1995-05-30","0212-6313478","0412-9550938","1961-10-30","V","Masculino","CASADO","4","PROLONGACION ZULUAGA, EDIF. C, PISO 4, APTO. 8, LOS ROSALES. EL CEMENTERIO.","","26","ESPOSA E HIJOS","644015","5","2014-10-30","0","95909332","2005-12-16","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("28","34","BENITO ENRIQUE","NIEVES INFANTE"," 6.290.547","2009-05-05","2003-10-02","0212-6328436","0416-2102851","1969-05-05","V","Masculino","CASADO","3","Av. Los Carmenes, Casa Nro. 23, a cuadra y media de la Av. Ppal. del Cemeneterio, Caracas","","27","ESPOSA E HIJOS","37103","5","2013-05-05","0","9060246","2005-12-01","","","0");buffernowdotcom
INSERT INTO socios VALUES("29","36","ROBERTO ANTONIO","DUQUE JIMENEZ","12.612.056","2015-02-19","2005-10-28","632-39-38","04127229249","1977-02-19","V","Masculino","SOLTERO","0","IGUAL AL VEHICULO 149","","28","IGUAL VEHICULO 149","607558","5","2014-02-19","0","1235483","2007-01-17","orh+","","0");buffernowdotcom
INSERT INTO socios VALUES("30","37","JOSE SABINO","REYES RODRIGUEZ","10.220.271","1900-01-00","2010-01-14","0212-4166485","0412.2116971","1966-06-07","V","Masculino","SOLTERO","0","","","29","","0","5","2015-07-06","0","88976","2011-09-10","","","0");buffernowdotcom
INSERT INTO socios VALUES("31","38","LUIS ANTONIO","VALECILLO PARRA"," 9.648.727","2016-06-12","1999-10-19","","0412-0181623","1968-09-12","V","Masculino","SOLTERO","3","CALLE PROVIDENCIA, CASA # 33, LOS CASTAÒOS EL CEMENTERIO.","","30","CONCUBINA","2529422","5","2013-09-12","0","11695729","2006-10-17","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("32","40","OSCAR","ALMEIDA DA SILVA","13.161.263","2007-07-30","1982-06-23","0212-576-94-46","0416-7159591","1947-07-30","V","Masculino","CASADO","1","AV. ESTE, ESQ. DE LA CRUZ A FERRENQUIN,EDIF. DORAL PLAZA P- 6, APTO 63","","31","ESPOSA","67925","5","2010-07-30","0","10372551","2006-03-30","A+","","0");buffernowdotcom
INSERT INTO socios VALUES("33","41","ADERITO","PEREIRA DA COSTA"," 9.963.515","2015-04-30","1983-04-09","662-81-50","0414-261-91-99","1949-04-23","V","Masculino","CASADO","0","AV. CAPANAPARO, RESD. EL SAM†N, TORRE A-2, 1ER PISO APTO. 11","","32","","0","5","2011-04-23","0","17820586","2010-01-13","","","0");buffernowdotcom
INSERT INTO socios VALUES("34","42","WILLIAM RAFAEL","GERDEL","10.530.808","2014-06-14","2000-12-27","631-00-90","0414-237-58-44","1968-02-14","V","Masculino","SOLTERO","3","CALLE 19 DE ABRIL, FINAL AV. BOGOTA, EL CEMENETERIO, CASA NRO. 29","","33","ESPOSA E HIJOS","1348392","5","2012-02-14","0","10352953","2005-03-18","BRH +","","0");buffernowdotcom
INSERT INTO socios VALUES("35","43","JUAN CARLOS","RODRIGUEZ PASSO"," 6.968.598","2015-03-07","1997-08-27","0212-4720063","0412-3615058","1967-07-07","V","Masculino","CASADO","2","CALLE PICHINCHA URB LA PAZ, EDF. SANTA   BARBARA PISO 8 , PH.","","34","ESPOSA E HIJO","1417011","5","2012-07-07","0","9732892","2005-12-22","ARH-","","0");buffernowdotcom
INSERT INTO socios VALUES("36","44","JOSE ISMAEL","GAMEZ RIVERA"," 4.208.035","2012-03-20","2006-02-27","","0416-876-57-84","1954-03-20","V","Masculino","CASADO","0","IGUAL VEHICULO NRO. 45","","35","IGUAL VEHICULO NRO. 45","450035","5","2011-03-20","0","11260472","2006-08-03","arh+","","0");buffernowdotcom
INSERT INTO socios VALUES("37","45","JOSE ISMAEL","GAMEZ RIVERA"," 4.208.035","2012-03-20","2005-05-30","","0416-876-57-84","1954-03-20","V","Masculino","SOLTERO","6","Av. Roosevelt. Edif. Plaza, Piso 1, Apto. 1D, Las Acacias.","","36","ESPOSA","450035","5","2012-03-20","0","11260472","2006-08-03","ARH+","","0");buffernowdotcom
INSERT INTO socios VALUES("38","47","MARGARITA","FUENTES PARRA"," 5.676.428","1900-01-00","2000-05-30","781-48-54","0416-8171999","1956-07-18","V","Femenino","SOLTERO","0","CALLE REAL DE SIM¢N RODR°GUEZ, CASA NRO. 16, SIM¢N RODR°GUEZ.","","37","","0","4","2010-07-18","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("39","48","FRANKLIN OMAR","VASQUEZ BARRIOS","12.912.214","2010-11-26","2001-01-30","0212-6930838","0412-9760285","1975-11-26","V","Masculino","SOLTERO","3","AV. FRANCISCO LASO MARTIN EDIF. ALDEBARAN, PISO 3, APTO 28, SANTA MONICA.","","38","CONCUBIENA E HIJOS","558985","5","2011-11-26","0","10246681","2005-03-14","","","0");buffernowdotcom
INSERT INTO socios VALUES("40","49","HECTOR EDUARDO","PAXI GUTIERREZ","23.638.790","2014-11-30","2009-10-30","0212-491-22-19","0424-124-95-14","1967-07-28","V","Masculino","SOLTERO","0","AV ROOSEVEL EDIF GOMEZAL PISO 1 APTO 7-D LOS ROSALES","","39","","287953524","5","2012-07-28","0","1795421453","2010-05-28","","","0");buffernowdotcom
INSERT INTO socios VALUES("41","50","GONZALO ANTONIO","AVENDA—O ARAQUE"," 4.172.295","2005-08-12","1994-12-19","0212-631-48-93","0414-1502736","1953-08-12","V","Masculino","SOLTERO","3","FINAL CALLE LOS MANGOS NRO. 51. EL CEMENTERIO CARACAS.","","40","ESPOSA E HIJOS","1566383","5","2009-08-12","0","108999811","2006-06-09","A+","","0");buffernowdotcom
INSERT INTO socios VALUES("42","51","CARLOS ENRIQUE","CASTILLO ALVAREZ"," 6.869.436","2016-02-10","1994-07-26","631-63-63","0414-3079346","1964-05-17","V","Masculino","CASADO","3","AV. LOS CARMENES, NRO. 112, EL CEMENTERIO.","","41","ESPOSA E HIJOS","200573","5","2011-05-17","0","135800206","2007-06-23","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("43","52","MARCOS ANTONIO","TRUJILLO LEON","10.113.755","2018-10-30","2011-09-30","0212-631-42-23","0412-639-43-18","1970-10-28","V","Masculino","SOLTERO","4","CALLE SAN ANDRES TOWN HOUSE A-5 -57 SECTOR LAS TERRAZAS URB NUEVA CASARAPA GUARENAS EDO MIRANDA","","42","","0","5","2020-10-28","0","531185","2012-07-22","","","0");buffernowdotcom
INSERT INTO socios VALUES("44","53","FERMIN ANTONIO","GARCIA MONSALVE","9.319.150","2017-12-30","2011-12-02","0212-671-31-12","0416-300-76-56","1964-08-04","V","Masculino","SOLTERO","0","LONGARAY EL VALLE N.- 23","","43","","0","5","2017-12-30","0","17518","2012-06-28","","","0");buffernowdotcom
INSERT INTO socios VALUES("45","54","RAMON ANTONIO","GUDI—O"," 5.633.255","2010-10-29","2005-10-28","","04168103785","1959-11-29","V","Masculino","CASADO","4","IGUAL VEHICULO NRO. 107","","44","IGUAL VEHICULO NRO. 107","971202","5","2013-11-20","0","12826835","2007-03-13","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("46","57","ANA ROSA","ROJAS SILGUERA"," 6.130.312","2015-03-23","2006-05-30","","0416-4297513","1964-10-23","V","Femenino","VIUDO","2","FINAL CALLE SUCRE CASA NRO. 43, LOS MAGALLANES DE CATIA.","","45","HIJOS","0","4","1900-01-00","0","1113201227","2007-04-30","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("47","58","JORGE LUIS","BLANCO SALVADOR"," 6.275.137","2007-09-30","2006-11-30","","","1955-09-04","V","Masculino","CASADO","3","CEMENTERIO AV LOS CARMENES TALLER","","46","ESPOSA E HIJOS","1253585","5","2017-09-30","0","10357512","2007-04-08","","","0");buffernowdotcom
INSERT INTO socios VALUES("48","59","PLINIO","GONZALEZ LOPEZ","16.204.440","2014-05-21","1997-02-24","0212-631-12-02","0412-5576143","1973-11-21","V","Masculino","SOLTERO","4","URB. LOS CASTA—OS MANZANA L # 19 SAN JOSE DEL CEMENTERIO.","","47","CONCUBINA E HIJOS","267755","5","2014-11-21","0","11845297","2006-10-21","O+","","0");buffernowdotcom
INSERT INTO socios VALUES("49","60","JOSE JOAQUIN","MOURA DE ARAUJO","81.108.028","2008-04-01","1982-06-18","0212-514-40-47","","1947-04-01","E","Masculino","CASADO","4","TERRAZAS DE SAN ANTONIO, PISO 8, LETRA E, SAN ANTONIO DE LOS ALTOS.","","48","ESPOSA E HIJOS","704859","5","2011-04-01","0","11169071","2006-07-20","","","0");buffernowdotcom
INSERT INTO socios VALUES("50","61","ANDRES ALBERTO","GAMEZ ANGULO"," 6.426.947","1900-01-00","2009-07-28","383-37-65","0414-3317347","1961-11-04","V","Femenino","SOLTERO","0","URB. LLANO ALTO RES. SAN FRANCISCO CARRIZAL, LOS TEQUES EDO MIRANDA","","49","","1885794","5","2012-11-04","0","19794789","2011-01-22","","","0");buffernowdotcom
INSERT INTO socios VALUES("51","62","ROGER JOSE","PEASPAN REYES","10.867.533","2005-11-30","1999-10-04","016-823-60-23","0414-2704547","1972-07-12","V","Masculino","SOLTERO","5","CALLE 13 DE SEPTIEMBRE, CASA N∫ 15, SECTOR GRAN COLOMBIA, CEMENTERIO.","","50","","9959","5","2015-07-12","0","11672064","2008-10-23","","","0");buffernowdotcom
INSERT INTO socios VALUES("52","64","ELYS MAURICIO","VELIS DAZA"," 3.714.043","2014-05-21","1996-03-07","","0146-719-67-69","1950-02-21","V","Masculino","SOLTERO","6","FINAL AV. BOGOT†, EL CEMENTERIO # 54","","51","CONCUBINA E HIJOS","11171612","5","2009-02-21","0","9964080","2006-01-29","ORH-","","0");buffernowdotcom
INSERT INTO socios VALUES("53","68","ALEXANDER EDUARDO","LABRADOR DIAZ","11.484.160","1900-01-00","2009-09-11","6311760","0424-1529207","1972-09-29","V","Masculino","SOLTERO","0","PROLONGACION ZULUAGA CASA N∫ 44 CALLE INSTITUTO PRADO MARIA","","52","","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("55","69","RANDY ANTONIO","GUDI—O BASTIDAS","16.806.196","2019-11-30","2012-01-19","0212-911-87-21","0416-412-88-52","1984-04-29","V","Masculino","SOLTERO","0","CALLE EL CARMEN EL MANICOMIO LA PASTORA CASA N.- 19-20","","53","","0","5","2020-04-29","0","730337","2012-12-07","","","0");buffernowdotcom
INSERT INTO socios VALUES("56","70","CARLOS JAVIER","FUENTES VILLEGAS","16.275.003","2016-06-23","2009-01-29","","0416-9382693","1981-03-04","V","Masculino","SOLTERO","0","","","54","","0","5","1900-01-00","0","16466503","2009-06-19","","","0");buffernowdotcom
INSERT INTO socios VALUES("57","71","ANTONIO JOSE","ESCALONA VILLEGAS","14.780.389","1900-01-00","2009-08-06","","0426-4113636","1973-09-12","V","Masculino","SOLTERO","0","","","55","","0","5","2019-09-12","0","200005836","2011-01-15","","","0");buffernowdotcom
INSERT INTO socios VALUES("58","72","MARTINHO","DE ABREU","81.365.231","1952-09-17","1995-01-09","0212-690-27-75","","1952-09-17","E","Masculino","CASADO","3","AV. PROLONGACION EL CORTIJO, QTA. MARIA, LOS ROSALES.","","56","ESPOSA E HIJOS","1779735","5","2009-09-17","0","9828786","2006-01-14","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("59","73","RAUL","PABON ALVAREZ","16.264.961","2014-07-21","2004-03-31","0212-432-56-41","0424-2062838","1958-01-21","V","Masculino","CASADO","5","Av. Ppal. de Ruiz Pineda, Urb. UD9, Bloque 14, Letra A,  Nro. 03, P.B.","","57","ESPOSA E HIJOS","464691","5","2013-01-21","0","11131014","2006-07-14","","","0");buffernowdotcom
INSERT INTO socios VALUES("60","74","JUAN CARLOS","RODRIGUEZ PASSO"," 6.968.598","2015-03-07","1999-11-29","0212-4720063","0412-361-50-58","1967-07-07","V","Masculino","CASADO","2","CALLE PICHINCHA URB LA PAZ, ED SANTA    BARBARA PISO 8 , PH.","","58","ESPOSA E HIJO","1417011","5","2012-07-07","0","9732892","2005-12-22","ARH-","","0");buffernowdotcom
INSERT INTO socios VALUES("61","78","HECTOR ENRIQUE","PAREDES","10.542.919","1900-01-00","2009-03-23","","","1970-08-18","V","Masculino","","0","3era TSVL ENTRE LA AV. LOS SAMANAES Y LOS TOTUMOS QTA VILLA ZORAIDA PISO 1 URB. NUEVO PRADO","","59","","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("62","80","JOSE SABINO","REYES RODRIGUEZ","10.220.271","2014-10-07","2002-08-30","0212-416-64-85","0412-9164458","1966-06-07","V","Masculino","CASADO","3","SEXTA TRANSV. DE LOS CASTA—OS, NRO. 162. EL CEMENTERIO","","60","ESPOSA E HIJOS","10220271","5","2008-08-07","0","11402174","2006-08-23","","","0");buffernowdotcom
INSERT INTO socios VALUES("63","81","HECTOR ENRIQUE","PAREDES","10.542.919","2008-09-18","2000-01-26","","0414-1503297","1970-08-18","V","Masculino","SOLTERO","3","ENTRE AV. LOS SAMANES Y LOS TOTUMOS, 3RA. TRANSVERSAL, QTA. VILLA ZORAIDA, NUEVO PRADO.","","61","CONCUBINA E HIJOS","2403993","5","2013-08-18","0","11039163","2006-07-09","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("64","82","DAVID","CABANACH PALA"," 4.278.121","2015-04-10","1997-01-07","0212-576-78-90","04123920588","1956-10-10","V","Masculino","CASADO","3","AV. BUENOS AIRES, RESD. FENIX 7MO PISO, APTO. 75. LOS CAOBOS, CARACAS","","62","ESPOSA E HIJOS","1762725","5","2009-10-10","0","10946479","2006-06-27","B+","","0");buffernowdotcom
INSERT INTO socios VALUES("65","84","JONATHAN JOSE","DUQUE JIMENEZ","11.978.460","2009-04-09","2001-08-06","0212-6323938","0412-9933195","1975-04-09","V","Masculino","SOLTERO","2","CALLE REAL, EDIF. BOLIVAR, PISO2, APTO. 24, PDO. DE MARIA. EL CEMENTERIO.","","63","PADRES","1360877","5","2009-04-09","0","9598670","2005-12-07","","","0");buffernowdotcom
INSERT INTO socios VALUES("66","86","JOSE GILBERTO","FERRAZ","24.316.808","2005-07-14","2001-04-27","0212-4430773","","1968-09-02","V","Masculino","CASADO","4","CALLE 2, MONTALBAN 3, EDIF. CA—AVERAL, PISO 5, APTO. 5C. MONTALBAN","","64","ESPOSA E HIJOS","82232192","5","2011-02-09","0","10117828","2006-02-18","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("67","87","DELMIRA ISABEL","FERREIRA MORONTA"," 6.549.007","2015-06-02","2009-01-22","945-91-26","0414-2804594","1964-05-15","V","Femenino","SOLTERO","2","CALLE COLEGIO AMERICANO CONJUNTO RESD EL NARANJAL TORRE C PISO 6 APTO 63 LOS SAMANES","","65","","0","4","1900-01-00","0","19589389","2011-07-19","","","0");buffernowdotcom
INSERT INTO socios VALUES("68","88","TOBIAS EDUARDO","MURGAS MORON","81.646.501","2014-05-03","1990-05-18","0212-3472325","0414-2818631","1955-01-03","E","Masculino","SOLTERO","4","URB. PALO ALTO, CALLE M, CASA NRO. M4A, GUATIRE, EDO. MIRANDA.","","66","CONCUBINA E HIJOS","1266078","5","2012-01-03","0","102391964","2006-03-08","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("69","89","JORGE LUIS","BLANCO SALVADOR"," 6.275.137","2017-04-30","2009-04-30","","","1955-09-04","V","Masculino","CASADO","0","SAN ANTONIO DE LOS ALTOS CALLE LA ERMITA RESD LILIANA TORRE B PISO 7 APTO 30","","67","","939142","5","2016-09-04","0","16171550","2009-05-03","","","0");buffernowdotcom
INSERT INTO socios VALUES("70","91","ALIRIO JOSE","CARABALLO GUZMAN"," 7.958.660","2009-04-17","2001-05-18","","0414-0181709","1967-04-17","V","Masculino","CASADO","2","URB. TERRAZA DEL ESTE, PARCELA 15, EDIF. 8, PISO 2, APTO. 2D. GUARENAS.","","68","ESPOSA E HIJA","1548193","5","2012-04-17","0","10712309","2006-05-26","0RH+","","0");buffernowdotcom
INSERT INTO socios VALUES("71","92","BARTOLO JOSE","BASTIDAS ALDANA","14.739.842","2020-11-30","2011-11-03","","0414-257-52-20","1972-08-24","V","Masculino","SOLTERO","0","AV VICTORIA EDIF VIRGILIO PISO 3 APTO 3-D.-","","69","","0","5","2013-08-24","0","809481","2013-02-14","","","0");buffernowdotcom
INSERT INTO socios VALUES("72","93","ALVARO","DE CANHA TEIXEIRA","15.165.215","2015-09-10","1997-12-02","0212-7812936","0414-6386980","1955-07-10","V","Masculino","CASADO","3","AV. BUENOS AIRES RESD. FENIX, PISO 7, APTO. 77. LOS CAOBOS.","","70","ESPOSA E HIJOS","742943","5","2015-07-10","0","7881103","2006-03-10","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("73","96","MARIA YDALINA","DA SILVA DE TELES","15.759.334","2015-11-14","1994-10-24","0212-451-44-63","","1952-11-14","V","Femenino","VIUDO","0","AV. SAN MARTIN, EDIF. MARMINA, MEZANINA.","","71","HIJOS","0","4","2005-01-01","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("74","97","JUNNY ALBERTO","MARQUEZ GUILARTE","12.739.614","2014-06-07","2002-04-30","0212-871-51-18","0414-0846688","1974-07-05","V","Masculino","SOLTERO","4","COLINAS DE SIMON BOLIVAR CASA NRO. 38, CALLE LOS EUCALIPTOS CATIA","","72","ESPOSA E HIJOS","1162638","5","2011-05-07","0","10505037","2006-04-14","orh+","","0");buffernowdotcom
INSERT INTO socios VALUES("75","98","EDWIN DAVID","PAXI GUTIERREZ","21.618.631","2015-03-24","1996-10-28","0212-632-69-59","0412-718-77-53","1964-09-24","V","Masculino","CASADO","5","AV. LOS JABILLOS, CASA NRO. 0414 LOS CASTA—OS DEL CEMENTERIO.","","73","ESPOSA E HIJOS","2372125","5","2013-09-27","0","11731212","2006-10-11","","","0");buffernowdotcom
INSERT INTO socios VALUES("76","99","ANGEL","ROMERO PICHEL","10.074.521","2016-08-30","2008-07-29","0212-472-97-02","0414-139-57-41","1964-01-26","V","Masculino","SOLTERO","2","AV ROTARIA EDF BASSANO PISO 2 APTO 20 URB LA PAZ EL PARAISO","","74","","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("77","100","MIGUEL ANGEL","SEQUERA RIVERO","10.512.973","2014-05-30","2007-12-30","574-3003","0416-3293785","1969-02-20","V","Masculino","SOLTERO","0","","","75","","960215","5","2011-02-20","0","17692116","2009-12-13","","","0");buffernowdotcom
INSERT INTO socios VALUES("78","101","ROGER JOSE","PEASPAN REYES","10.867.533","2015-11-30","2008-04-07","0212-633-35-12","0414-270-45-47","1972-07-12","V","Masculino","SOLTERO","5","CALLE 13 DE SEPTIEMBRE CALLE GRAN COLOMBIA EL CEMENTERIO CASA N.-15","","76","","9959","5","2015-07-12","0","11672064","2008-10-23","","","0");buffernowdotcom
INSERT INTO socios VALUES("79","102","ROBERT MANUEL","TORO"," 9.119.100","2013-08-11","1993-02-01","0212-7815852","0412-9785580","1964-08-11","V","Masculino","SOLTERO","1","AV. TRUJILLO, NRO. 15 PINTO SALINAS. CARACAS","","77","HIJO","2254387","5","2013-08-11","0","0","1900-01-00","orh+","","0");buffernowdotcom
INSERT INTO socios VALUES("80","103","JOAO MARIA","DOS SANTOS"," 7.524.571","2015-04-15","1977-04-16","0212-564-11-94","0416-4183511","1941-05-11","V","Masculino","CASADO","3","ESQ. TE—IDERO A SANTO TOMAS, RESD. CANDEMAR, PISO 5, APTO. 5-D, LA CANDELARIA","","78","ESPOSA E HIJOS","1425785","5","2009-05-15","0","9520616","2005-12-17","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("81","106","EZIO JOSE","BRICE—O DELGADO"," 5.783.380","1900-01-00","2001-08-31","0212-8714228","0424-1626600","1963-12-18","V","Masculino","","4","LOS MOLINOS CATIA  CASA N.-09 2da  CALLE                  CARACAS","","79","GABRIELA SUARES","5783380","5","2008-12-18","0","1715740","1999-12-18","","","0");buffernowdotcom
INSERT INTO socios VALUES("82","107","RAMON ANTONIO","GUDI—O","5.633.255","2010-10-29","2002-11-26","","04168103785","1959-11-29","V","Masculino","CASADO","4","Calle el Carmen, Casa Nro. 19-20, Manicomio.","","80","ESPOSA E HIJOS","971202","5","2015-11-25","0","12826835","2007-03-13","orh+","","0");buffernowdotcom
INSERT INTO socios VALUES("83","109","JESUS ARTURO","BUSTOS PEREZ"," 5.302.252","2008-01-10","1993-04-16","0212-6311008","","1962-01-10","V","Masculino","SOLTERO","1","CALLE EL CARMEN, MANZANA J, #42, PRADO DE MARIA, EL CEMENTERIO.","","81","HERMANA","227260","5","2010-01-10","0","6943836","2005-10-29","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("84","110","JORGE OMAR","PEREZ MARQUEZ"," 9.238.104","2015-07-06","2001-08-31","0212-424-89-27","0414-1197611","1964-05-06","V","Masculino","CASADO","5","INTERCOMUNAL DEL VALLE, BARRIO SAN ANTONIO, EDIF. ALBORADA, PISO 12, APTO. 5","","82","ESPOSA E HIJOS","14144535","5","2012-05-06","0","9638938","2005-12-20","","","0");buffernowdotcom
INSERT INTO socios VALUES("85","113","HECTOR EDUARDO","PAXI GUTIERREZ","23.638.790","2014-11-28","2001-04-30","561-37-96","0412-596-9248","1967-07-28","V","Masculino","SOLTERO","2","AV. PANTEON EDIF. ANDREA, PISO 7, APTO. 7-B, CARACAS.","","83","PADRE Y MADRE","1454039","5","2012-07-28","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("86","116","JORGE LUIS","BLANCO SALVADOR"," 6.275.137","2007-09-30","2006-03-28","0212-6312683","0412-9501897","1955-09-04","V","Masculino","CASADO","0","AV LOS CARMENES ESQ LA PICA N,. 31-08 EL CEMENTERIO","","84","","939142","5","2016-04-04","0","10357512","2007-04-08","","","0");buffernowdotcom
INSERT INTO socios VALUES("87","117","ALIRIO RAMON","BRICE—O DELGADO"," 5.633.866","2005-08-12","1991-01-08","0212-871-75-59","0424-1078581","1961-08-12","V","Masculino","CASADO","4","LOS MOLINOS , CASA NRO. 7, CATIA, CARACAS","","85","ESPOSA E HIJOS","778496","5","2011-08-12","0","11721183","2006-10-06","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("88","118","ANTONIO JOSE","ESCALONA VILLEGAS","14.780.389","2018-01-07","2009-02-18","","0416-2072001","1973-09-12","V","Masculino","SOLTERO","0","AV. LOS CARMENES CASA S/N 4TA TRASVERSAL EL CEMENTERIO","","86","","0","4","1900-01-00","0","20005836","2011-01-15","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("89","119","JOSE CECILIO","FORERO REYES"," 6.310.546","2012-02-13","1994-07-27","0212-4623626","0412-6332595","1951-02-13","V","Masculino","SOLTERO","3","AV. SAN MARTIN, ESQ. CRUZ DE LA VEGA A PALOS GRANDE RESD. URUVALE, PISO 5, APTO. 51- SAN MARTIN","","87","HIJOS","1326137","5","2012-02-13","0","9856053","2006-01-18","OHR+","","0");buffernowdotcom
INSERT INTO socios VALUES("90","120","MANUEL","DIAZ CORROPIO","   239.787","2000-10-14","1985-11-21","986-85-47","","1935-04-14","E","Masculino","CASADO","3","AV. PPAL. DE SAN LUIS, RESD. YENNY APTO. 62, EL CAFETAL","","88","ESPASA E HIJOS","0","6","2999-01-01","0","11825632","2006-10-28","O+","","0");buffernowdotcom
INSERT INTO socios VALUES("91","123","ROLANDO GABRIEL","GIL ANDRADES","13.629.738","2021-05-30","2011-05-29","0212-452-06-67","0414-031-98-12","1978-05-12","V","Masculino","SOLTERO","4","Av SAN MARTIN ENTRE CALLE ANAUCO Y CALLE SUCRE CASA N. 03","","89","","0","5","2021-05-12","0","316493","2011-11-05","","","0");buffernowdotcom
INSERT INTO socios VALUES("92","124","BARTOLO JOSE","BASTIDAS ALDANA","14.739.842","2020-11-30","2011-03-31","","0414-257-52-20","1978-08-24","V","Masculino","SOLTERO","0","AV. VICTORIA EDIF VIRGILIO PISO 3 APTO 3-D","","89","","0","5","2013-08-24","0","809481","2013-02-14","","","0");buffernowdotcom
INSERT INTO socios VALUES("93","125","ALVARO","DE CANHA TEXEIRA","15.165.215","2015-09-10","1998-12-01","02-781-29-36","0416-638-69-80","1955-07-10","V","Masculino","CASADO","3","AV. BUENOS AIRES RESD. FENIX, PISO 7, APTO. 77. LOS CAOBOS.","","89","ESPOSA E HIJOS","742943","5","2015-07-10","0","7881103","2006-03-10","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("94","126","ROBERTO ANTONIO","DUQUE JIMENEZ","12.612.056","2015-02-19","2001-12-18","0212-632-39-38","0412-722-92-49","1977-02-19","V","Masculino","SOLTERO","3","VER SOCIO 149","","90","IGUAL VEHICULO 149","607558","5","2014-02-19","0","1353483","2007-01-17","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("95","127","ALIRIO RAMON","BRICE—O DELGADO"," 5.633.866","1900-01-00","2006-01-30","","","1961-08-12","V","Masculino","SOLTERO","0","IGUAL VEHICULO NRO. 117","","91","","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("96","128","EMILIO","LAMAS CASAS","6.233.309","1900-01-00","1983-10-29","0212-552.28.54","0416-805.54.44","1940-07-06","V","Masculino","CASADO","3","AV. CAJIGAL, EDIF. SANTA ANGELICA, PISO 2, APTO. 12, SAN BERNANDINO.","","92","ESPOSA E HIJAS","1662662","5","2012-07-06","0","11608031","2005-09-20","orh+","","0");buffernowdotcom
INSERT INTO socios VALUES("97","129","LUIS JOSE","BERNALD JAIMES"," 5.906.335","2015-10-07","1996-01-04","","0414-178-31-93","1959-04-07","V","Masculino","SOLTERO","5","CALLE REAL, PRADO DE  MAR°A, CASA NRO. 24, LOS ROSALES.","","93","CONCUBINA E HIJOS","0","5","2012-04-07","0","10714513","2006-07-07","","","0");buffernowdotcom
INSERT INTO socios VALUES("98","130","FRANCISCO ANTONIO","DOS SANTOS GOMES","12.062.050","1900-01-00","1976-08-29","0212-631-35-56","","1950-12-20","V","Masculino","CASADO","0","AV. LOS SAMANES EDF. AUNINA 4TO PISO, NRO. 8 EL CEMENTERIO.","","94","","0","4","1999-09-27","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("99","132","JORGE ENRIQUE","GUEVARA BARSALLO","16.288.434","2014-07-30","2000-05-30","","0414-2888257","1958-04-30","V","Masculino","CASADO","3","AV. ANDRES BELLO, CALLE ARENA, CASA NRO. 46","","95","ESPOSA E HIJOS","1679064","5","2009-01-30","0","10246923","2006-03-15","","","0");buffernowdotcom
INSERT INTO socios VALUES("100","136","LIZARDO JOSE","SANCLER RODRIGUEZ"," 8.446.050","2010-09-17","2006-05-30","0416-4028758","","1960-09-17","V","Masculino","SOLTERO","0","CEMENTERIO CALLE LOS TOTUMOS S/N","","96","","1901397","5","2012-09-17","0","11164079","2006-07-21","","","0");buffernowdotcom
INSERT INTO socios VALUES("101","137","BENITO ENRIQUE","NIEVES INFANTE"," 6.290.547","2009-05-30","2009-04-13","0212-6328436","0416-2102851","1969-05-05","V","Masculino","CASADO","4","AV LOS CARMENES CASA N.-25 EL CEMENTERIO (AL LADO DEL PREESCOLAR CRECER ACTIVO)","","97","","1826815","5","2012-05-05","0","17129559","2009-09-20","","","0");buffernowdotcom
INSERT INTO socios VALUES("102","139","FRANKLIN OMAR","VASQUEZ BARRIOS","12.912.214","2010-08-30","2009-04-30","693-08-38","0412-976-0285","1975-11-26","V","Masculino","SOLTERO","0","AV FCO LAZO MARTI EDIF ALDEBARRAN APTO 28 PISO 3","","98","","0","5","2011-11-26","0","18342347","2010-09-08","","","0");buffernowdotcom
INSERT INTO socios VALUES("103","140","GASPAR JOAO","CARVALHO DA COSTA"," 6.303.929","2013-06-02","1990-02-02","945-70-41","0416-7076491","1952-03-21","V","Masculino","SOLTERO","5","CONJ. RESD. EL NARANJAL, TORRE D, APTO. 13. LAS MINAS DE BARUTA.","","99","ESPOSA E HIJOS","128769","5","2010-03-21","0","9240596","2005-11-12","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("104","141","JESUS JAVIER","PERNIA CONTRERAS","14.444.081","2011-01-19","2005-03-31","0212-415-72-80","0416-828-87-12","1979-01-19","V","Masculino","SOLTERO","2","Km. 3 del Junquito, Barrio 2da. Etapa de Olivett Casa Nro. 32","","100","MADRE Y PADRE","797112","5","2011-01-19","0","8542447","2005-10-22","","","0");buffernowdotcom
INSERT INTO socios VALUES("105","142","JOSE DEL ROSARIO","GRATEROL BENITEZ"," 6.248.556","2013-10-07","1993-01-26","0212-7150576","0416-9279993","1966-10-07","V","Masculino","DIVORCIADO","3","BARRIO 1RO. DE MAYO 2DA. CANCHA, CASA NRO. 59.El Cementerio","","101","HIJOS","6248556","5","2011-10-07","0","10984891","2006-06-23","O+","","0");buffernowdotcom
INSERT INTO socios VALUES("107","145","JUAN FRANCISCO","BASTIDAS ALDANA","11.133.422","2020-01-30","2012-02-14","0212-672-15-09","0414-313-62-79","1968-03-16","V","Masculino","SOLTERO","0","LOS JARDINES DEL VALLE CALLE 8 CON 11 EDIF. YURUBY APTO 01-02 PISO 1","","102","","2437876","5","2013-03-16","0","461411","2012-04-12","","","0");buffernowdotcom
INSERT INTO socios VALUES("108","146","JORGE RAFAEL","TORREALBA TOVAR"," 8.167.036","1900-01-00","2010-02-01","633-1114","0416-2146672","1961-09-05","V","Masculino","SOLTERO","0","","","103","","0","5","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("109","147","PEDRO CLAVEL","CISNEROS BRACAMONTE"," 5.516.854","2015-10-09","1995-02-10","0212-942-02-84","0412-3872327","1955-09-09","V","Masculino","SOLTERO","4","HOYO DE LA PUERTA, SECTOR EL CAFE # 27, BARUTA, EDO. MIRANDA.","","104","CONCUBINA E HIJOS","933714","5","2015-09-09","0","115674008","2006-10-03","O+","","0");buffernowdotcom
INSERT INTO socios VALUES("110","149","ROBERTO ANTONIO","DUQUE JIMENEZ","12.612.056","2015-02-19","2001-06-30","0212-632-39-38","0412-7229249","1977-02-19","V","Masculino","SOLTERO","2","CALLE REAL DE PRADO MARIA , EDIF. BOLIVAR, PISO 2,  APTO. 24, EL CEMENTERIO.","","105","ESPOSA E HIJA","607558","5","2010-03-08","0","13353483","2007-01-17","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("111","150","JESSICA MAYERLING","CANELONES COLMENARES","15.612.715","2017-09-30","2009-06-30","631-83-03","0416-8334972","1983-04-16","V","Femenino","SOLTERO","0","AV PPAL EL CEMENTERIO CALLE LA VEREDA CASA N.- 112","","106","","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("112","151","ANTONIO JOSE","ESCALONA VILLEGAS","14.780.389","2018-01-30","2011-08-04","","0416-207-20-01","1973-09-12","V","Masculino","SOLTERO","0","AV.- LOS CARMENES CASA S/N. 4TA TRSVL EL CEMENTERIO","","107","","0","5","2013-09-12","0","20005836","2011-10-15","","","0");buffernowdotcom
INSERT INTO socios VALUES("113","152","FRANCISCO","ANGUIANO BARRON","   693.923","2006-02-25","1978-10-07","0212-6310135","","1932-02-25","E","Masculino","CASADO","2","AV. LOS TOTUMOS, NRO. 90, EL CEMENTERIO","","108","HEPOSA E HIJA","594771","5","2014-02-25","0","11577185","2006-09-14","ORH+","","0");buffernowdotcom
INSERT INTO socios VALUES("114","153","JOSE","RIVAS"," 4.142.477","2012-01-28","1992-06-29","0212-919-87-79","0414-3141158","1953-01-28","V","Masculino","DIVORCIADO","3","AV. ROOSEVELT, CRUCE CON AV. GUAYANA, EDIF. SANTA MARA. PISO, 2,. APTO.  8. DETRAS EST. LOS SIMBOLOS","","109","CONCUBINA E HIJOS","1223332","5","2009-01-28","0","10353893","2006-03-19","","","0");buffernowdotcom
INSERT INTO socios VALUES("115","154","JOSE ANTONIO","DE ASCENCAO FERNANDES","16.677.017","2014-07-17","1996-11-06","0212-6324689","0414-9138631","1964-11-17","V","Masculino","SOLTERO","2","CALLE EL COLEGIO, CASA NRO. 52, URB. LOS ROSALES","","110","CONCUBINA E HIJO","675568","5","2011-11-17","0","9325162","2005-10-20","OHR+","","0");buffernowdotcom
INSERT INTO socios VALUES("116","155","ROLANDO MARCIAL","NARVAEZ ASUAJE","16.328.519","2014-07-07","2008-12-01","","","1983-10-31","V","Masculino","SOLTERO","0","","","111","","0","5","2018-10-31","0","19532527","2010-11-17","O+","","0");buffernowdotcom
INSERT INTO socios VALUES("117","156","DAVID RAFAEL","VELAZCO CALDERON","12.071.981","2009-04-03","1996-12-02","0212-6315694","0414-0335229","1975-04-03","V","Masculino","SOLTERO","2","CALLE LAS PALMAS, casa nro. 108-1, EL CEMENTERIO.","","112","ESPOSA E HIJOS","0","5","2009-04-03","0","10353011","2006-03-21","","","0");buffernowdotcom
INSERT INTO socios VALUES("118","158","DIEGO ORANGEL","CASTRO SANCHEZ","10.113.734","2015-10-30","2009-06-30","615-81-31","0414-205-10-83","1969-07-11","V","Masculino","SOLTERO","0","PROLONGACION RAZZETI RES MIJARES PISO 3 APTO 9 LOS ROSALES ( CERCA DE LA ESCUELA SANTA ANA)","","113","","2159240","5","2013-07-11","0","16380668","2009-07-18","","","0");buffernowdotcom
INSERT INTO socios VALUES("119","159","FELIX GONZALO","DELGADO CHAVEZ","17.297.458","2005-05-04","1993-06-18","0212-422-51-62","0414-1125163","1949-05-04","V","Masculino","CASADO","5","CALLE LOS AGUACATES, COLINA SUAVE, NRO. 19 KM. DEL JUNQUITO","","114","ESPOSA E HIJOS","0","5","2009-05-04","0","9475698","2005-11-12","","","0");buffernowdotcom
INSERT INTO socios VALUES("120","160","DOLORES","MARTINEZ RODRIGUEZ","   504.596","1900-01-00","2002-01-31","631-25-48","","1933-07-01","E","Femenino","VIUDO","2","AV. BOGOTA, RESD. BOGOTA, CONSERGERIA NRO. 64","","115","HIJOS","0","4","1900-01-00","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("121","161","VIRGILIO","GONZALEZ","   611.754","2014-04-27","1982-11-01","0212-265-84-87","0412-725-30-15","1928-11-27","V","Masculino","SOLTERO","0","CALLE PAEZ, EDIF. REPUBLICA, PISO 1, APTO. NRO. 07","","116","HIJOS","28199","5","2999-01-01","0","9964081","2006-01-29","","","0");buffernowdotcom
INSERT INTO socios VALUES("122","162","FERMIN ANTONIO","GARCIA"," 9.319.150","2010-04-08","2001-06-28","671.31.12","0414-3007131","1964-08-04","V","Masculino","SOLTERO","6","LONGARAY EL VALLE CASA NRO. 23","","117","ESPOSA E HIJOS","977660","5","2011-04-08","0","0","1900-01-00","","","0");buffernowdotcom
INSERT INTO socios VALUES("123","165","JORGE ENRIQUE","GUEVARA BARSALLO","16.288.434","2019-06-30","2011-09-09","0212-227-05-76","0426-519-19-60","1958-04-30","V","Masculino","SOLTERO","0","AV ANDRES BELLO CALLE ARENAS CASA 46","","118","","0","5","2021-04-30","0","926865","2013-06-02","","","0");buffernowdotcom



DROP TABLE tprestamo;buffernowdotcom

CREATE TABLE `tprestamo` (
  `id_tp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO tprestamo VALUES("1","Motor-Gasoil");buffernowdotcom
INSERT INTO tprestamo VALUES("2","Motor-Gasolina");buffernowdotcom
INSERT INTO tprestamo VALUES("3","Personal");buffernowdotcom



DROP TABLE usuarios;buffernowdotcom

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE latin1_general_ci,
  `apellido` text COLLATE latin1_general_ci,
  `cedula` int(18) NOT NULL,
  `nacionalidad` text COLLATE latin1_general_ci NOT NULL,
  `pregunta` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `respuesta` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `privilegio` enum('ADMINISTRADOR','CARGADOR') COLLATE latin1_general_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;buffernowdotcom

INSERT INTO usuarios VALUES("72","carlos","castillo","18270061","V","Numero de Placa?","mae-94a","lostro","d41d8cd98f00b204e9800998ecf8427e","ccastillo@gmail.com","ADMINISTRADOR");buffernowdotcom
INSERT INTO usuarios VALUES("76","Alejandro","Martin","18691998","V","Pais","Espa√±a","alemax","d0970714757783e6cf17b26fb8e2298f","alex@gmail.com","ADMINISTRADOR");buffernowdotcom
INSERT INTO usuarios VALUES("85","Javier","Sosa","18111111","E","Este","Oeste","javi","d41d8cd98f00b204e9800998ecf8427e","javi@hotmail.com","CARGADOR");buffernowdotcom



DROP TABLE vehiculos;buffernowdotcom

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_s` int(10) NOT NULL,
  `placa` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ano` int(4) NOT NULL,
  `cantptos` varchar(100) NOT NULL,
  `nmotor` varchar(100) NOT NULL,
  `chasis` varchar(100) NOT NULL,
  `combustible` varchar(100) NOT NULL,
  `cobdesde` date NOT NULL,
  `cobhasta` date NOT NULL,
  `poliza` int(11) DEFAULT NULL COMMENT 'numero de poliza',
  `tseguro` varchar(50) NOT NULL,
  `compaseg` text COMMENT 'nombre de compaÒia de seguro',
  `obs` varchar(100) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_s` (`id_s`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `socios` (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;buffernowdotcom

INSERT INTO vehiculos VALUES("1","1","AC8933","ENCAVA","E-NT900","B/MULTICOLOR","2004","26","079046","8XL9MC12DAE000867","Gasolina","1970-01-01","2011-11-03","35590","R.C.V","Banesco",".","0");buffernowdotcom
INSERT INTO vehiculos VALUES("2","2","AB6439","FORD","B-350","COBRE Y AMARILLO","1984","24","6. CIL.","AJB3EL39492F1238","Diesel","1900-01-00","2012-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("3","3","AB6330","Ford","1983","AZUL / MULTIC","1983","26","6 CIL.","AJD83DL70590","Dieles","1900-01-00","2011-08-06","4","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("4","4","AD4121","ENCAVA","ENT-900/04","B/ CON FRANJAS","2004","26","062874","8XL9C12D4E000862","Gasolina","1900-01-00","2012-02-03","3201","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("5","5","AA0011","Encava","600-28/91","Gris/Multicolor","1991","32","485786","I4076","Diesel","1900-01-00","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("6","6","AC8882","ENCAVA","ENCAVA/96","B/ MULTICOLOR","1996","28","KSV322307","CP2KSV322307F711","Diesel","1900-01-00","2011-08-06","820","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("7","7","AB6436","Dodge","1977","Beige/Multicolor","1977","21","31809170700","836BE7X20877","Diesel","1900-01-00","2011-08-06","10","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("8","8","AC1578","Encava","610-32/96","B/ MULTICOLOR","1996","32","610335","I5426","Diesel","1900-01-00","2012-01-04","11420757","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("9","9","AC1673","FORD","SUPER DUTY","B /MULTICOLOR","1992","32","8 CIL.","3B6ME3949PM110244","Diesel","1900-01-00","2011-08-06","0","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("10","10","AB9657","ENCAVA","AUTOBUSETE","ROJO Y GRIS","1986","28","6BD1613206","16711","Diesel","1900-01-00","2011-12-22","2147483647","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("11","11","AC5798","Ford","B-350/87","Rojo","1987","24","6 CIL","AJE3HM24513","Diesel","1900-01-00","2011-08-06","14","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("12","12","06AA8DM","Ford","B-350/82","CREMA Y MARRON","1982","18","6 CIL.","AJF37C19788","Diesel","1900-01-00","2011-08-06","4157","R.C.V.-","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("13","13","A0805AA","ENCAVA","ENT-900","BLANCO","2011","26","815506","8ZBFNP1Y9BV400784","Diesel","1900-01-00","2012-06-22","1301","TOTAL.","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("14","14","A51AT4G","ENCAVA","ENT-610-32","B/ MULTICOLOR","2010","32","439131","8XL6GC11DAE005019","Diesel","1900-01-00","2012-07-09","1164807","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("15","15","02AA9CW","FORD","1986","BLANCO MULTICOLOR","1986","24","6 CIL","AJB3GY22290","Diesel","1900-01-00","2011-09-21","7841","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("17","16","AA3876","ENCAVA","610-32","B/ MULTICOLOR","1997","32","612233","15811","Diesel","1900-01-00","2011-11-18","3201","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("18","17","AC3138","Encava","ISUZU/90","B/ MULTICOLOR","1990","28","463567","1-3842-CH3000137","Diesel","1900-01-00","2011-08-06","22","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("19","18","AB7184","Ford","ALKON/86","Blanco  y Rojo","1986","24","8 CIL.","AJB3GK61677","Diesel","1900-01-00","2011-08-06","0","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("20","19","AA7645","ENCAVA","1987","BLANCO Y ROJO","1987","24","6BI1728090","251037212979","Diesel","1900-01-00","2011-08-06","25","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("21","20","AD2414","ENCAVA","ENT900","BLANCO","1999","28","6BD1511130","I-6767","Diesel","1900-01-00","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("22","21","AC8925","ENCAVA","ENT-900/04","BLANCO","2004","26","062878","8XL9MC12D4E00863","Diesel","1900-01-00","2011-11-24","2000494","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("23","23","A69AT5G","ENCAVA","ENT-900","B/CON FRANJAS","2010","26","582005","8XL9MC12DAE001850","Gasolina","2011-10-26","2012-10-20","3201","","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("24","24","AA4588","ENCAVA","ISUZU","B/ MULTICOLOR","1990","32","464540","13877CH3000172","Diesel","1900-01-00","2011-10-26","204","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("25","25","AD0952","ENCAVA","ISUZU","B /MULTICOLOR","1991","28","490107","I-4227","Diesel","1900-01-00","2012-03-18","31","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("26","26","AB6335","Ford","B-350/86","Cobre/Multicolor","1986","24","6 CIL.","AJB3GT26891F2106","Diesel","1900-01-00","2011-08-06","36","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("27","27","AC8919","ENCAVA","ENT-900/04","B /CON FRANJAS","2004","26","062870","8XL9MC12D4E000861","Diesel","1900-01-00","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("28","28","AC8761","Chevrolet","P-31/93","B/ MULTICOLOR","1993","30","KPV301497","C2P2KPV301497","Diesel","1900-01-00","2012-04-04","820","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("29","29","AD1161","ENCAVA","ET61032/02","AZUL/ MULTIC","2002","32","300153","8XL6GC11D2E001210","Diesel","1900-01-00","2011-11-27","686","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("30","30","AC9331","CHEVROLET","P-31","B /MULTICOLOR","1995","28","KSV306981","C2P2KSV306981","Diesel","1900-01-00","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("31","31","AF3015","FORD","ANDINO","VERDE MULTIC","1984","24","6 CILINDROS","AJB3EL39074","Diesel","1900-01-00","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("32","32","AB6331","Chevrolet","1987","BLANCO Y AZUL","1987","24","THV207603","CP23THV207603","Diesel","1900-01-00","2011-08-06","0","COLECTIVO","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("33","33","AC5944","CHEVROLET","ALKON","B/ MULTICOLOR","1993","28","KPV302218","C2P2KPV302218","Diesel","1900-01-00","2012-03-18","1281","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("34","34","AC5723","ENCAVA","610-32S","B/ MULTICOLOR","1998","32","768156","I-6207","Diesel","1900-01-00","2011-09-23","820","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("35","35","AC8945","ENCAVA","ENT-900/04","B/ CON FRANJAS","2004","26","0628882","8XL9MC12D4E000864","Diesel","1900-01-00","2012-04-05","2000428","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("36","36","07AA1AM","FORD","1992","BLANCO Y AZUL","1992","28","6BD1417831","3FCLF59M11JA02764","Diesel","1900-01-00","2012-04-07","666582","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("37","37","AB6346","FORD","F-350/82","B/ MULTICOLOR","1982","24","6 CIL.","AJF3CK45876","Diesel","1900-01-00","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("38","38","01AA6NA","Ford","1982","Dorado y Mult.","1982","24","6 CIL","AJF3CM4564","Diesel","1900-01-00","2011-08-06","57","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("39","39","AC1962","ENCAVA","610-32","B/ MULTICOLOR","1998","32","612667","I-6166","Diesel","1900-01-00","2012-05-11","2147483647","COB TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("40","40","AC8980","CHEVROLET","ALKON","B/ MULTICOLOR","89","24","HKV200900","CP23HK200900","Diesel","1900-01-00","2011-08-06","10049","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("41","41","AB6334","Ford","ANDINA/83","Plata y Rojo","1983","24","8 CIL.","AJB3DA70072","Diesel","1900-01-00","2011-08-06","50","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("42","42","08AA3DD","ENCAVA","ENT-610","BLANCO","2010","32","439184","8XL6GC11DAE005036","Diesel","1900-01-00","2011-08-16","3201","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("43","43","AM671X","ENCAVA","ENT-900","B/ MULTICOLOR","2000","28","577531","8XL9MK18DXE000083","Diesel","1900-01-00","2012-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("44","44","AF3799","ENCAVA","ENT-610","B/ MULTICOLOR","2004","32","319034","8XL6GC11DAE002137","Diesel","1900-01-00","1900-01-00","0","","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("45","45","AD1510","ENCAVA","ENT.61032","B/ MULTICOLOR","2002","32","303589","8XL6GC11D2E001554","Diesel","1900-01-00","2011-08-06","2147483647","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("46","46","AC8991","ENCAVA","ENT-610","B/ MULTICOLOR","2002","32","303050","8XL6GC11D2E001510","Diesel","1900-01-00","2011-06-12","1301","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("47","47","AE0454","Chevrolet","1977","Vino Tinto y Gris","1977","21","CTU205526","CGL357U205526","Diesel","1900-01-00","2011-08-06","58","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("48","48","AC8921","ENCAVA","ENT-900/04","B/ CON FRANJAS","2004","26","062886","8XL9MC12D4E000865","Diesel","1900-01-00","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("49","49","AC8927","ENCAVA","ENT-900/04","B/ CON FRANJAS","2004","26","079037","8XL9MC12D4E000866","Diesel","1900-01-00","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("50","50","AA0845","FORD","B-350","BEIGE","1987","24","6 CILINDROS","AJE3HP25068","Diesel","1900-01-00","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("51","51","09AA0EG","Chevrolet","1993","B/ CON FRANJAS","1993","28","KPV313114","CP2KVP313114","Diesel","1900-01-00","2011-08-06","0","R.C.V.","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("52","52","AB8109","FORD","S/DUTY/92","BLANCO Y VERDE","1992","32","68D161846","3FCLF59M7NJA03322","Diesel","1900-01-00","2012-05-20","2147483647","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("53","53","AD7780","ENCAVA","ENT-610","B/ MULTICOLOR","2001","32","298466","I-8314","Diesel","1900-01-00","2012-02-20","2143","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("54","55","A51AT6G","ENCAVA","ENT-610","B/MULTICOLOR","2010","32","439156","8XL6GC11DAE005021","Gasolina","2011-08-06","2012-08-06","10049","COOP. GARA","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("55","56","24A82AS","ENCAVA","ENT-610","B/ MULTICOLOR","2000","32","293075","17594","Diesel","1900-01-00","2012-11-23","2147483647","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("56","57","00AA8LS","ENCAVA","610-32","B /MULTICOLOR","1999","32","138046","17066","Diesel","2012-01-24","2013-01-24","10049","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("57","58","AA7002","ENCAVA","E61032/95","B/ MULTICOLOR","1995","32","14833","I5325","Diesel","1900-01-00","2012-06-10","177","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("58","59","03AA3PA","CHEVROLET","P-31","B/ MULTICOLOR","1993","24","KPV314132","C2P2KPV314132","Gasolina","1900-01-00","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("59","60","A99BF0G","ENCAVA","ENT-900","BLANCO","2011","26","803894","8XL9C12DBE002039","Diesel","1900-01-00","2012-09-21","200101","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("60","61","05JGBI","ENCAVA","ENT-610-32","B/ MULTICOLOR","2001","32","299447","I8524","Diesel","1900-01-00","2011-12-15","72663","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("61","62","AB6014","FORD","ANDINO/88","VERDE/ MULT.","1988","28","6 CIL.","AJB3JG22688","Diesel","1900-01-00","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("62","63","AF1436","ENCAVA","ENT610","B/ MULTICOLOR","2007","32","427319","8XL6GC11D7E004081","Gasolina","2011-12-05","2012-08-05","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("63","64","00AA0HM","CHEVROLET","NPR","BLANCO","2007","27","37V364307","8ZBENJ7Y37V364307","Diesel","1900-01-00","2011-07-29","506","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("65","65","09AA6LM","Encava","610-32","B/ MULTICOLOR","2009","32","436467","8XL6GC11DE004919","Diesel","1900-01-00","2012-06-16","3201","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("66","66","AC8575","Chevrolet","P-31/87","Blanco y Azul","1987","30","THV204208","CP63630","Diesel","1900-01-00","2011-08-06","86","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("67","67","AC8943","ENCAVA","ENT900","B/ MULTICOLOR","2004","26","062862","8XL9MC12D4E000858","Diesel","1900-01-00","2011-12-03","2000447","COB TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("68","68","05AA2MA","CHEVROLET","NPR","BLANCO","2010","26","691917","8ZBFNP1Y39V403898","Diesel","1900-01-00","2011-12-14","36375","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("69","69","AB6333","CHEVROLET","1992","B/ MULTICOLOR","1992","28","MINIBUS","8 CIL","Diesel","1900-01-00","2011-08-06","20049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("70","70","34TSAR","ENCAVA","2008","Blanco","2008","32","430773","8XL6GC11DBE004713","Diesel","1900-01-00","2011-10-02","701","COB. TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("71","71","A99AT7G","ENCAVA","ENT610","B/ CON FRANJAS","2010","32","440583","8XL6GC11DAE005323","Diesel","1900-01-00","2012-03-02","1191296","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("72","72","AC8923","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","079049","8XL9CMC12D4E000868","Diesel","1900-01-00","2011-08-06","1004920004","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("73","73","AB0149","CHEVROLET","ALKON","AZUL Y BLANCO","1993","28","KO521CMJ","C2P2KPV315241","Diesel","1900-01-01","2011-08-06","0","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("74","74","AD9431","ENCAVA","ENT610-32","B/ MULTICOLOR","2002","32","302667","8XL6GC11D2E001440","Diesel","1900-01-02","2011-09-07","3201","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("75","75","05AA2LA","ENCAVA","ENT-900-26","B/ CON FRANJAS","2010","26","694731","8XL9MC12DAE001900","Diesel","1900-01-03","2012-03-08","1191802","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("76","76","AB7031","FORD","B-350","AMARILLO/FRANJAS","1986","24","6 CIL","AJB36U367906593","Diesel","1900-01-04","2011-08-06","10049","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("77","77","AC2547","CHEVROLET","ENCAVA","B/ MULTICOLOR","1995","30","KSV314504","C2P2KSV314504F","Diesel","1900-01-05","2011-06-08","0","RCV COL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("78","78","AE0459","ENCAVA","ENT610","B/ MULTICOLOR","2002","32","300120","8XL6GC11D2E001208","Diesel","1900-01-06","2012-04-03","3201","T. RIESGO","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("79","79","AC8576","Chevrolet","1992","B/ MULTICOLOR","1992","28","KNV356848","C22KNV356848","Diesel","1900-01-07","2012-04-25","1041156","TOTAL C/D","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("80","80","AB6347","Encava","1986","B /MULTICOLOR","1986","24","6 CIL.","2508474","Diesel","1900-01-08","2011-08-06","0","COLECTIVO","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("81","81","AD0668","ENCAVA","E-610-32","B/ MULTICOLOR","2000","32","293685","I-7671","Diesel","1900-01-09","2012-05-11","3201","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("82","82","AA5810","CHEVROLET","1995","B/ CON FRANJAS","1995","32","KSV314627","C2P2KSV314627","Diesel","1900-01-10","2011-08-06","0","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("83","83","AB7191","Ford","ALKON/87","B/MULTICOLOR","1987","24","6 CIL.","AJE3HM24292","Diesel","1900-01-11","2011-08-06","109","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("84","84","25A05AU","ENCAVA","MINIBUS","B /MULTICOLOR","1991","30","612464","I 404771","Gasolina","1900-01-12","2011-08-06","110","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("85","85","AB9011","ENCAVA","1991","CREMA Y MULTICOLOR","1991","32","484454","JALMR11HL300003I4025","Diesel","1900-01-13","2011-08-06","113","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("87","86","A97BF8G","ENCAVA","ENT-900","B/MULTICOLOR","2011","26","803849","8XL9MC12DBE002030","Diesel","1900-01-15","2012-07-11","8017186","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("88","87","AC8704","Encava","E-610/95","B/ MULTICOLOR","1995","32","602429","I-4967","Diesel","1900-01-16","2011-08-06","117","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("89","88","06AA2JA","ENCAVA","ENT-610","B /MULTICOLOR","2008","32","429101","8XL6GC11D8E004341","Diesel","1900-01-17","2011-07-13","201234","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("90","89","AE0299","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","079082","8XL9MCA2D4E000870","Diesel","1900-01-18","2011-11-03","2147483647","COB. TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("91","90","AC9531","ENCAVA","ENT900/04","B /CON FRANJAS","2004","26","079089","8XL9MC12D4E000871","Diesel","1900-01-19","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("92","91","AA0505","CHEVROLET","CHEVI","AZUL / BLANCO","1993","28","KPV3043778","C2P2KPV304378","Diesel","1900-01-20","2011-08-22","1336018","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("93","92","24A24AM","ENCAVA","ENT-610-32","B/ MULTICOLOR","2010","32","440786","8XL6GC11DAE005331","Diesel","1900-01-21","2012-03-14","3405","COB. TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("94","93","AC0161","CHEVROLET","1988","BLANCO","1988","24","HJV208377","CP23HJV208377","Diesel","1900-01-22","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("95","94","01AA9BD","ENCAVA","ENT-600","B/ CON FRANJAS","2010","32","439068","8XL6GC11DAE005006","Diesel","1900-01-23","2012-05-07","2964","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("96","95","05AA3MA","Encava","610-32","B/ MULTICOLOR","1998","32"," 612556","I-6022","Diesel","1900-01-24","2012-05-11","2364","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("97","96","AB6250","Dodge","B-300/77","Beige y Vino Tinto","1977","24","B831809211227","B36BE7X221192","Diesel","1900-01-25","2011-08-06","128","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("98","97","04AA2NM","ENCAVA","ENT-900-AE","B /CON FRANJAS","2010","26","571805","8XL9MC12DAE001829","Diesel","1900-01-26","2011-10-15","1173846","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("99","98","AB6442","Chevrolet","1984","Verde y Negro","1984","24","TEV209195","CP23TEV209195","Diesel","1900-01-27","2011-08-06","130","R.C.V","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("100","99","A59AT3G","ENCAVA","ENT600/10","B/ MULTICOLOR","2010","32","439829","8XL6GC11DAE005135","Diesel","1900-01-28","2011-09-20","1301","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("101","100","AB6445","FORD","82","GRIS Y ROJO","1982","28","6 CIL.","AJF3CB49895","Diesel","1900-01-29","2011-08-06","136","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("102","101","AO255AA","CHEVROLET","NPR","BLANCO","2009","26","687243","8ZBFNP1YX9V408273","Diesel","1900-01-30","2012-03-18","6167879","COB. TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("103","102","AC9382","ENCAVA","ENT-610","B/ MULTICOLOR","2001","32","296487","5560","Diesel","1900-01-31","2012-05-11","3201","COB TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("104","103","AE0515","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","062866","XL9MC12D4E000859","Diesel","1900-02-01","2011-06-08","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("105","104","04AA6GM","ENCAVA","ENT-610-32","B/ MULTICOLOR","2008","32","430052","8XL6GC11D8E004561","Diesel","1900-02-02","2011-07-19","29007","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("106","105","AC8946","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","079058","8XL9MC12D4E000872","Diesel","1900-02-03","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("107","107","AF1587","FORD","SUPER DUTY","B/MULTICOLOR","1992","32","6BD1495307","3FCLF59M9NJA03371","Gasolina","2011-08-06","2012-08-06","10049","COOP DE GS","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("108","108","AB6455","FORD","B-350","PLATA Y AZUL","1983","24","6 CILINDROS","AJB3DA70088","Diesel","1900-01-00","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("109","109","AC8948","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","079066","8XL9MC12D4E000873","Diesel","1900-01-01","2011-10-26","535","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("110","110","AD9896","ENCAVA","ENT-610/06","AZUL / CON FRANJAS","2006","32","411646","8XL6GC11D6E003113","Diesel","1900-01-02","2012-05-19","13251","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("111","111","AC8949","ENCAVA","ENT900","BLANCO CON ROJO","1994","26","079009","8XL0MC12D448000874","Diesel","1900-01-03","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("112","112","AD9957","ENCAVA","E-NT900","B/MULTICOLOR","2001","26","804843","8XL9MC12D1E000452","Diesel","1900-01-04","2012-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("113","113","AC8944","ENCAVA","ENT900/04","B /CON FRANJAS","2004","26","079092","8XL9MC12D4E000875","Diesel","1900-01-05","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("114","113","05AA8OA","ENCAVA","ENT-900","B/ CON FRANJAS","2010","26","689786","8XL9MC12DAE001887","Diesel","1900-01-06","2012-03-03","1191494","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("115","115","A98AE2U","ENCAVA","ENT-610","B/ FRANJAS DECORATIVAS","2011","32","454248","8XL6GC11DBE006073","Diesel","1900-01-07","2012-10-17","4078","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("116","116","04AA6ED","ENCAVA","ENT-900-AE","B/CON FRANJAS","2010","26","576128","8XL9MC12DAE001845","Diesel","1900-01-08","2012-01-14","9658","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("117","117","AC8920","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","079101","8XL9MC12D4E000876","Diesel","1900-01-09","2011-08-06","10049","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("118","118","AB5981","CHEVROLET","C-30","GRIS/NARANJA","1991","24","YMV306620","C2P2YMV306620","Diesel","1900-01-10","2011-08-06","10049","R.C.V.-","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("119","119","AC8924","ENCAVA","ENT900/04","B/ CON FRANJAS","2004","26","079107","8XL9MC12D4E000877","Diesel","1900-01-11","2011-10-27","534","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("120","120","AC2391","DODGE","420-24A/93","B/ MULTICOLOR","1993","24","8 CIL.","F-3706","Diesel","1900-01-12","2011-08-06","160","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("121","121","AF1274","ENCAVA","610-32","B/ MULTICOLOR","1999","32","6BD1613206","","Diesel","1900-01-13","2011-12-22","230","TOTAL","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("122","122","AC5206","ENCAVA","ISUZU","B/ MULTICOLOR","1987","28","TGV210483","CP23TGV210483","Diesel","1900-01-14","2011-08-06","0","RCV","","","0");buffernowdotcom
INSERT INTO vehiculos VALUES("123","123","A81AT9G","ENCAVA","ENT-900","B/CON FRANJAS","2010","26","689774","8XL9MC12DAE001886","Diesel","1900-01-15","2012-04-11","3201","TOTAL","","","0");buffernowdotcom



