<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "snc" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE snc_combined ( id INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(id),


			SL_NO    INT,
			Quarter    VARCHAR(30), 
			LID    VARCHAR(30), 
			Customer_Region    VARCHAR(30), 
			Customer_Region_SnC    VARCHAR(30), 
			FQHN    VARCHAR(30), 
			SQHN       VARCHAR(30), 
			IP_Address    VARCHAR(30), 
			Managed_By    VARCHAR(30), 
			Managed_By_SnC    VARCHAR(30), 
			SBG    VARCHAR(30), 
			SBU    VARCHAR(30), 
			SBE    VARCHAR(30), 
			Categorization    VARCHAR(30), 
			SBG_OS_Name    VARCHAR(30), 
			SBG_OS_Version    VARCHAR(30), 
			OS_Name    VARCHAR(30), 
			OS_Version    VARCHAR(30), 
			Vendor_Support    VARCHAR(30), 
			Vendor_Support_End_Date    VARCHAR(30), 
			Application_Type    VARCHAR(30), 
			Source    VARCHAR(30), 
			Source_SBG    VARCHAR(30), 
			SM_Clarity    VARCHAR(30)


) " )

		or die (mysql_error ());

	echo "Table Created";


?>
