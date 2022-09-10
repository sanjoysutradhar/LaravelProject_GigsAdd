<?php
    namespace App\Models;

    class Listing{
        public static function all(){
            return [
                [
                    'id'=> 1,
                    'title'=>"listing One",
                    'description'=>"that about descriptions",
                ],
                [
                    'id'=> 2,
                    'title'=>"listing two",
                    'description'=>"that about descriptions",
                ]
                ];
        }
        public static function find($id){
            $listings= self::all();

            foreach($listings as $listing){
                if($listing['id']==$id){
                    return $listing;
                }
                
            }
        }
    }
?>