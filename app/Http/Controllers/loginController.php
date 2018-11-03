<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Customers;
use App\Stations;
use App\Bookings;
use Illuminate\Http\Request;
Use Redirect;

class loginController extends Controller
{
    public function index(Request $request){
      /*
      -Variables are grabbed from the form and validated, if a validation fails then an error is added to an error array.
      -If no errors exist then the user is logged in and redirected to the myAccount page otherwise they're sent back to the signUp page and show the error messages.
      */


  unset($errors);


$errors = array();


  $email = $_POST['email'];
  $password = $_POST['password'];
  $customers = Customers::where('email', '=',$email)->first();

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);




      if (($customers->email == $email) && ($customers->password == $password)) {
        session()->flash('correct', 'true');
        session()->put('email', $email);
        session()->put('success', 'You are now logged in!');
        return Redirect('myAccount');

        }
        else {
      		array_push($errors, "Wrong username/password combination");
        //  dd($errors[0]);
          return Redirect::back()->with('errors',$errors);

      	}


  }


    }

  public function logout(){
    if(session()->has('email')) {
    session()->flush();
    return Redirect('/');
  }
  }

}
