#!/usr/bin/bash


mysql -uroot -proot snc -e'load data LOCAL infile "snc_combined_Jan2010.txt" into table snc_combined fields terminated by "\t" lines terminated by "\n" ( SL_NO    ,
			Quarter   , 
			LID   , 
			Customer_Region   , 
			Customer_Region_SnC   , 
			FQHN   , 
			SQHN      , 
			IP_Address   , 
			Managed_By   , 
			Managed_By_SnC   , 
			SBG   , 
			SBU   , 
			SBE   , 
			Categorization   , 
			SBG_OS_Name   , 
			SBG_OS_Version   , 
			OS_Name   , 
			OS_Version   , 
			Vendor_Support   , 
			Vendor_Support_End_Date   , 
			Application_Type   , 
			Source   , 
			Source_SBG   , 
			SM_Clarity   

)';
