<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "snc" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE snc_voice ( id INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(id),

			Sl_NO    VARCHAR(50),
			assetID    VARCHAR(50),
			siteID    VARCHAR(50),
			siteLID    VARCHAR(50),
			inventory_id    VARCHAR(50),
			order_id    VARCHAR(50),
			product_id    VARCHAR(50),
			manufacturer    VARCHAR(50),
			Equipment_Type_New     VARCHAR(50),
			Model_Number_New     VARCHAR(50),
			product_description    VARCHAR(50),
			Compliance_Status    VARCHAR(50),
			Compliance_Status_Remarks    VARCHAR(50),
			equipment_type    VARCHAR(50),
			model_number      VARCHAR(50),
			OLD_assetManufacturer    VARCHAR(50),
			OLD_assetModelNumber    VARCHAR(50),
			OLD_assetPartNumber    VARCHAR(50),
			assetHostName          VARCHAR(50),
			assetIPAddress         VARCHAR(50),
			assetSerialNumber    VARCHAR(50),
			assetHoneywellAssetTag    VARCHAR(50),
			assetVendorAssetTag    VARCHAR(50),
			assetOperatingSystem    VARCHAR(50),
			assetOSVersionLevel    VARCHAR(50),
			assetSoftwareUpgradeDate    VARCHAR(50),
			assetAssetType    VARCHAR(50),
			assetAssetStatus    VARCHAR(50),
			assetAge    VARCHAR(50),
			assetBuilding    VARCHAR(50),
			assetFloor    VARCHAR(50),
			assetRoom    VARCHAR(50),
			assetRack    VARCHAR(50),
			assetRackPositions    VARCHAR(50),
			assetDescIP    VARCHAR(50),
			assetFeature    VARCHAR(50),
			assetDesc    VARCHAR(50),
			asset_name    VARCHAR(50),
			mod_dt    VARCHAR(50),
			rec_create_src    VARCHAR(50),
			cascaded    VARCHAR(50),
			ipt    VARCHAR(50),
			usage_status    VARCHAR(50),
			last_modified_by    VARCHAR(50),
			proposed_cost_current_support    VARCHAR(50),
			proposed_cost_new_support    VARCHAR(50),
			proposed_cost_engineering_support    VARCHAR(50),
			actual_cost_current_support    VARCHAR(50),
			actual_cost_new_support    VARCHAR(50),
			actual_cost_engineering_support    VARCHAR(50),
			proposed_cost_hardware    VARCHAR(50),
			actual_cost_hardware    VARCHAR(50),
			Clarifications_Required    VARCHAR(50),
			spare1    VARCHAR(50),
			spare2    VARCHAR(50),
			spare3    VARCHAR(50),
			spare4    VARCHAR(50) ) " )

		or die (mysql_error ());

	echo "Table Created";


?>
