<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Support\Facades\DB;


class CharacterController extends Controller
{
    public function cekObject()
    {
        $character = new Character();
        dump($character);
    }
    public function insert()
    {
        $character = new Character;
        $character->code = 'INAYK';
        $character->name = 'Kamisato Ayaka';
        $character->region = 'Innazuma';
        $character->element = 'cryo';
        $character->constellation = 'Grus Nivis';
        $character->weapon = 'sword';
        $character->birth_date = '2002-09-28';
        $character->base_atk = 342;
        $character->save();
        dump($character);
    }
    public function massAlignment()
    {
        Character::create(
            [
                'code' => 'NALOY',
                'name' => 'Aloy',
                'region' => 'Another World',
                'element' => 'cryo',
                'constellation' => 'Nora Fortis',
                'weapon' => 'bow',
                'birth_date' => '2000-04-4',
                'base_atk' => 90
            ]
        );
        return "successfully processed";
    }
    public function massAlignment2()
    {
        $char1 = Character::create(
            [
                'code' => 'MOAMB',
                'name' => 'Amber',
                'region' => 'Mondstadt',
                'element' => 'pyro',
                'constellation' => 'Lepus',
                'weapon' => 'bow',
                'birth_date' => '2000-08-10',
                'base_atk' => 223
            ]
        );
        dump($char1);

        $char2 = Character::create(
            [
                'code' => 'INITT',
                'name' => 'Arataki Itto',
                'region' => 'Innazuma',
                'element' => 'geo',
                'constellation' => 'Taurus Iracundus',
                'weapon' => 'claymore',
                'birth_date' => '2000-06-01',
                'base_atk' => 227
            ]
        );
        dump($char2);

        $char3 = Character::create(
            [
                'code' => 'MOBAR',
                'name' => 'Barbara',
                'region' => 'Mondstadt',
                'element' => 'hydro',
                'constellation' => 'Crater',
                'weapon' => 'catalyst',
                'birth_date' => '2000-07-05',
                'base_atk' => 159
            ]
        );
        dump($char3);
    }
    public function update()
    {
        $char = Character::find(7);
        $char->code = 'UALOY';
        $char->region = 'Unknown';
        $char->base_atk = 233;
        $char->save();
        dump($char);
    }
    public function updateWhere()
    {
        $char = Character::where('name', 'Kamisato Ayaka')->first();
        $char->birth_date = '2003-09-23';
        $char->base_atk = 400;
        $char->save();
        dump($char);
    }
    public function delete()
    {
        $char = Character::find(2);
        $char->delete();
        dump($char);
    }
    public function destroy()
    {
        $char = Character::destroy(7);
        dump($char);
    }
    public function all()
    {
        $result = Character::all();
        // dump($result);
        echo '<div style="display:flex">';
        foreach ($result as $char) {
            echo '<div>';
            echo ($char->id) . '<br>';
            echo ($char->code) . '<br>';
            echo ($char->name) . '<br>';
            echo ($char->region) . '<br>';
            echo ($char->element) . '<br>';
            echo ($char->constellation) . '<br>';
            echo ($char->weapon) . '<br>';
            echo ($char->birth_date) . '<br>';
            echo ($char->base_atk) . '<br>';
            echo '</div><hr>';
        }
        echo '</div>';
    }
    public function allView()
    {
        $result = Character::all();
        return view('show-character', ['characters' => $result]);
    }
    public function getWhere()
    {
        $result = Character::where('base_atk', '<', 400)
            ->orderBy('name', 'desc')
            ->get();
        return view('show-character', ['characters' => $result]);
    }
    public function first()
    {
        $result = Character::where('code', 'INAYK')->first();
        return view('show-character', ['characters' => [$result]]);
    }
    public function softDelete()
    {
        Character::where('code', 'INAYK')->delete();
        return "Successfully deleted";
    }
    public function selectView()
    {
        $result = DB::select("SELECT * FROM characters");
        return view('show-character', ['characters' => $result]);
    }
    public function getView()
    {
        $result = DB::table('characters')->get();
        return view('show-character', ['characters' => $result]);
    }
    public function withTrashed()
    {
        $result = Character::withTrashed()->get();
        return view('show-character', ['characters' => $result]);
    }
    public function restore()
    {
        $result = Character::withTrashed()->where('code', 'INAYK')->restore();
        return "Successfully restored";
    }
    public function forceDelete()
    {
        Character::where('code', 'INAYK')->forceDelete();
        return "Permanently deleted successfully";
    }
}
