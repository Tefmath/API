<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function createUser(Request $request){
		$user=new User;
		
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->save();
		
		return response()->json([$user]);
    }
	
	public function listUser(){  /* retorna lista de todos os usuarios cadastrados */
		$user = User::all();
		return response()->json($user);
	}
	
	public function showUser($id){  /*passa um id e ele vai tentar achar um usuario com esse id, se ele nao achar, vai retornar erro */
		$user = User::findOrFail($id);
		return response()->json([$user]);
	}
	
	public function updateUser(Request $request,$id){
		
		$user = User::find($id); /* se ele achar o id, ira pras etapas abaixo */
		
		if($user){ /*se for indo segue os passos abaixo */ 
			if($request->name){
				$user->name = $request->name;
			}
			else if($request->email){
				$user->email = $request->email;
			}
			else if($request->password){
				$user->password = $request->password;
			}
			else{ /* se nao for (caso onde nenhum parametro foi passado) */
				return response()->json(['insira o parametro a ser atualizado']);
			}
			$user->save();
			return response()->json([$user]);
		}
		else{
			return response()->json(['este user nao existe']);
		}
	}
		
	public function deleteUser($id){ /*CRUD*/
			User::destroy($id);
			return response()->json(['User deletado']);
		}
}
				
			
