<?php namespace App\Models;
use App\Models\MysqlModel;

class SchoolModel extends MysqlModel{
   
    static $tabla = 'schools';
    static $id = 'IdSchool_Pk';
    static $cols = "SchoolCode,NameSchool, SchoolAddress, IdTypeSchool_S_Fk, IdEduLevel_S_Fk,IdMuni_S_Fk";
    static $vals = "10000, 'EORM','Las Tunas I', 1, 1, 1";
    static $colsval ="SchoolCode=01000101,NameSchool='Parvulos III', SchoolAddress='TUNAS 2' , 
    IdTypeSchool_S_Fk=1 , IdEduLevel_S_Fk=1,IdMuni_S_Fk=1";
}