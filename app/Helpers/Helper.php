<?php

namespace App\Helpers;

class Helper {

	public static function printpdf($emailUser,$emailContent,$emailSubject) {

		$to = $emailUser;
		$subject = $emailSubject;
		$content = $emailContent;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <pwhtestsystem@gmail.com>' . "\r\n";
		$headers .= 'Cc: pwhtestsystem@gmail.com' . "\r\n";
		$EmailStatus = mail($to,$subject,$content,$headers);
		return $EmailStatus;
	}

	public static function statusPatient($stat)
	{
		if($stat == 0){
			$status = "Pending";
		}elseif ($stat == 1) {
			$status = "Accept";
		}else{
			$status = "Reject";
		}
		return $status;
	}

	public static function departmentName($depname)
	{
		if($depname == 1){
			$departmentname = "Admin";
		}elseif ($depname == 2) {
			$departmentname = "Center";
		}elseif ($depname == 3) {
			$departmentname = "Physio";
		}else{
			$departmentname = "Nursing";
		}
		return $departmentname;
	}
}
