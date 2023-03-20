<?php

return [
    'Report' => [
        'method_report' => [
            'pathReport' => 'pdfreport.methodpdf',
            'table' => 'summary_diagnose',
            'patient' => 'patients',
            'pdfname' => 'Method.pdf',
        ],
        'attendance_report' => [
            'pathReport' => 'pdfreport.attendancepdf',
            'table' => 'treatment',
            'patient' => 'patients',
            'pdfname' => 'Attendance.pdf',
        ],
        'simple_report' => [
            'pathReport' => 'pdfreport.simplepdf',
            'table' => 'report_diagnose',
            'patient' => 'patients',
            'pdfname' => 'Simple Report.pdf',
        ],
        'ortho_report' => [
            'pathReport' => 'pdfreport.orthopdf',
            'table' => 'diagnose',
            'patient' => 'patients',
            'pdfname' => 'Orthopaedic Assessment Report.pdf',
        ],
        'joint_ortho_report' => [
            'pathReport' => 'pdfreport.jointorthopdf',
            'table' => 'movement_joint',
            'patient' => 'patients',
            'pdfname' => 'Joint Orthopaedic Assessment Report.pdf',
        ],
        'nursing_daily_report' => [
            'pathReport' => 'pdfreport.nursingdailypdf',
            'table' => 'nursing_daily_report',
            'patient' => 'patients',
            'pdfname' => 'Nursing Daily Report.pdf',
        ],
        'nursing_assessment_report' => [
            'pathReport' => 'pdfreport.nursingassesreport',
            'table' => 'nursing_assessment_report',
            'patient' => 'patients',
            'pdfname' => 'Nursing Assessment Report.pdf',
        ],
        'nursing_monthly_report' => [
            'pathReport' => 'pdfreport.nursingmonthlyreport',
            'table' => 'nursing_monthly_report',
            'patient' => 'patients',
            'pdfname' => 'Nursing Monthly Report.pdf',
        ],

    ],
];