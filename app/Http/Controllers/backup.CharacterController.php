<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    public function index()
    {
        return "successfully processed";
    }
    public function insertSql()
    {
        // $result = DB::insert("
        //     INSERT INTO characters(
        //         code,name,constellation,weapon,birth_date,base_atk,created_at,updated_at
        //     )
        //     VALUES (
        //         'SUNIL',
        //         'Nilou',
        //         'Lotos Somno',
        //         'sword',
        //         '2004-12-03',
        //         229,
        //         now(),
        //         now()
        //     )
        // ");
        $result = DB::insert("INSERT INTO characters(
            code,name,constellation,weapon,birth_date,base_atk,created_at,updated_at) 
            VALUES (?,?,?,?,?,?,?,?) ", [
            'LIKEQ',
            'Keqing',
            'Trulla Cementarii',
            'sword',
            '2002-11-20',
            322,
            now(),
            now()
        ]);
        dump($result);
    }
    public function insertBinding()
    {
        $result = DB::insert("INSERT INTO characters(
            code,name,constellation,weapon,birth_date,base_atk,created_at,updated_at) 
            VALUES (:code,:name,:const,:weapon,:birth,:atk,:created,:updated) ", [
            'code' => 'LIYEL',
            'name' => 'Yelan',
            'const' => 'Umbrabilis Orchis',
            'weapon' => 'bow',
            'birth' => '2000-04-20',
            'atk' => 243,
            'created' => now(),
            'updated' => now()
        ]);
        dump($result);
    }
    public function update()
    {
        // $result = DB::update("UPDATE characters SET created_at = now(),
        //                     updated_at = now()
        //                     WHERE code = ?", ['INAYK']);
        // dump($result);
        $result = DB::table('characters')
            ->where('code', 'LIKEQ')
            ->update([
                'weapon' => 'catalyst',
                'base_atk' => 540,
                'updated_at' => now()
            ]);
        dump($result);
    }
    public function delete()
    {
        // $result = DB::delete("DELETE FROM characters 
        //                     WHERE name = ?", ['Keqing']);
        $result = DB::table('characters')
            ->where('base_atk', '>', 400)
            ->delete();
        dump($result);
    }
    public function select()
    {
        // $result = DB::select("SELECT * FROM characters");
        $result = DB::table('characters')
            ->select('weapon', 'name', 'base_atk as atk')
            ->get();
        dump($result);
    }
    public function selectShow()
    {
        $result = DB::select("SELECT * FROM characters");
        echo ($result[0]->id) . '<br>';
        echo ($result[0]->code) . '<br>';
        echo ($result[0]->name) . '<br>';
        echo ($result[0]->constellation) . '<br>';
        echo ($result[0]->weapon) . '<br>';
        echo ($result[0]->birth_date) . '<br>';
        echo ($result[0]->base_atk) . '<br>';
    }
    public function selectView()
    {
        $result = DB::select("SELECT * FROM characters");
        return view('show-character', ['characters' => $result]);
    }
    public function selectWhere()
    {
        $result = DB::select("SELECT * FROM characters Where base_atk > ? ORDER BY name ASC", [300]);
        return view('show-character', ['characters' => $result]);
    }
    public function statement()
    {
        $result = DB::statement("TRUNCATE characters");
        return 'Character table has been emptied';
    }
    public function insert()
    {
        $result = DB::table('characters')->insert([
            'code' => 'LIKEQ',
            'name' => 'Keqing',
            'constellation' => 'Trulla Cementarii',
            'weapon' => 'sword',
            'birth_date' => '2002-11-20',
            'base_atk' => 322,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        dump($result);
    }

    public function insertMulti()
    {
        $result = DB::table('characters')->insert(
            [
                [
                    'code' => 'SUNIL',
                    'name' => 'Nilou',
                    'constellation' => 'Lotos Somno',
                    'weapon' => 'sword',
                    'birth_date' => '2004-12-03',
                    'base_atk' => 229,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'LIYEL',
                    'name' => 'Yelan',
                    'constellation' => 'Umbrabilis Orchis',
                    'weapon' => 'bow',
                    'birth_date' => '2000-04-20',
                    'base_atk' => 243,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );

        dump($result);
    }
    public function updateOrInsert()
    {
        $result = DB::table('characters')->updateOrInsert(
            ['code' => 'INYOI'],
            [
                'name' => 'Yoimiya',
                'constellation' => 'Carassius Auratus',
                'weapon' => 'bow',
                'birth_date' => '2003-06-21',
                'base_atk' => 322,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($result);
    }
    public function get()
    {
        $result = DB::table('characters')->get();
        dump($result);
    }

    public function getShow()
    {
        $result = DB::table('characters')->get();
        echo ($result[0]->id) . '<br>';
        echo ($result[0]->code) . '<br>';
        echo ($result[0]->name) . '<br>';
        echo ($result[0]->constellation) . '<br>';
        echo ($result[0]->weapon) . '<br>';
        echo ($result[0]->birth_date) . '<br>';
        echo ($result[0]->base_atk) . '<br>';
    }
    public function getView()
    {
        $result = DB::table('characters')->get();
        return view('show-character', ['characters' => $result]);
    }
    public function getWhere()
    {
        $result = DB::table('characters')
            ->where('weapon', '=', 'sword')
            ->orderBy('name', 'asc')
            ->get();
        return view('show-character', ['characters' => $result]);
    }
    public function take()
    {
        $result = DB::table('characters')
            ->orderBy('name', 'asc')
            ->skip(1)
            ->take(2)
            ->get();
        return view('show-character', ['characters' => $result]);
    }
    public function first()
    {
        $result = DB::table('characters')
            ->where('weapon', 'bow')->first();
        dump($result);
        return view('show-character', ['characters' => [$result]]);
    }
    public function find()
    {
        $result = DB::table('characters')->find(3);
        return view('show-character', ['characters' => [$result]]);
    }
    public function raw()
    {
        $result = DB::table('characters')
            ->selectRaw('count(*) as total_character')
            ->get();
        echo $result[0]->total_character . '<br>';
    }
}
