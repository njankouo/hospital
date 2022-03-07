<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        ['nom'=>'njankouo','prenom'=>'dairou','sexe'=>1,'telephone1'=>699072561,'telephone2'=>658464951,'pieceIdentite'=>1,'numeroPieceIdentite'=>100095998,'email'=>'dairounjankouo2019@gmail.com','password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','photo'=>'https://via.placeholder.com/640x480.png/00dd77?text=laudantium'],
['nom'=>'bankoui','prenom'=>'mamouda','sexe'=>1,'telephone1'=>699072560,'telephone2'=>658464981,'pieceIdentite'=>0,'numeroPieceIdentite'=>100895998,'email'=>'bankoui@gmail.com','password'=>'92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','photo'=>'https://via.placeholder.com/680x480.png/00dd77?text=laudantium'],
['nom'=>'bamkou','prenom'=>'dollar','sexe'=>1,'telephone1'=>690072561,'telephone2'=>650464951,'pieceIdentite'=>1,'numeroPieceIdentite'=>150095998,'email'=>'bamkouo@gmail.com','password'=>'$2y$10$92IXUNpkQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','photo'=>'https://via.placeholder.com/640x480.png/00dd77?text=laudantium'],
['nom'=>'olivia','prenom'=>'xana','sexe'=>0,'telephone1'=>679072561,'telephone2'=>678464951,'pieceIdentite'=>1,'numeroPieceIdentite'=>700095998,'email'=>'olivia@gmail.com','password'=>'$2y$10$92IXUNpkjQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','photo'=>'https://via.placeholder.com/640x480.png/00dd77?text=laudantium'],
['nom'=>'abdel','prenom'=>'danai','sexe'=>0,'telephone1'=>699072565,'telephone2'=>658464954,'pieceIdentite'=>1,'numeroPieceIdentite'=>1850095998,'email'=>'abdel@gmail.com','password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','photo'=>'https://via.placeholder.com/640x480.png/00dd77?text=laudantium'],

        ]);
    }
}
