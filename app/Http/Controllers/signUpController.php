<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Customers;
use App\Stations;
use App\Bookings;
use Redirect;
use Illuminate\Http\Request;

class signUpController extends Controller
{
    public function index(Request $request){
/*
-Grabs all the records from the car table and stores it into $Cars
-You must connect to a model to access the Database, Look at the above use App\Cars;
-make a model under app, try to name it after the table in the database - customer.php is a good example
*/
      $cars = Cars::all();
      $currentCar = Cars::where('rego', '=', 'SED123')->get();

      $customers = Customers::all();
      $currentCustomer = Customers::where('email', '=', 'chris@gmail.com')->get();

      $stations = Stations::all();
      $currentStation = Stations::where('stationName', '=', 'RMIT')->get();
      //return the view to the page that it's going to access and send back the variables without the $ like below.

      $OK = $request->session()->get('OK');




      return view('signUp', compact('cars','stations','currentCar','customers','currentCustomer','currentStation'));
    }

    public function signupCheck(Request $request){

      $customers = Customers::all();
      $email = "";
      $password = "";
      $firstName ="";
      $lastName ="";
      $phone ="";
      $dateOfBirth ="";
      $street ="";
      $suburb ="";
      $state ="";
      $postcode ="";
      $country ="";
      $password_1 = "";
      $password_2 = "";
      $errors = array();

      // REGISTER USER
      if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $street = $_POST['street'];
        $suburb = $_POST['suburb'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];
        $country = $_POST['country'];
        $password_1 = $_POST['password'];
        $password_2 = $_POST['confirmPassword'];


        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($firstName)) { array_push($errors, "First name is required"); }
        if (empty($lastName)) { array_push($errors, "Last name is required"); }
        if (empty($phone)) { array_push($errors, "Phone number is required"); }
        if (empty($dateOfBirth)) { array_push($errors, "Date of birth is required"); }
        if (empty($street)) { array_push($errors, "Street name is required"); }
        if (empty($suburb)) { array_push($errors, "Suburb is required"); }
        if (empty($state)) { array_push($errors, "State is required"); }
        if (empty($postcode)) { array_push($errors, "Postcode is required"); }
        if (empty($country)) { array_push($errors, "Country is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        if (empty($password_2)) { array_push($errors, "Password is required"); }
        if ($password_1 != $password_2) {
      	array_push($errors, "The two passwords do not match");
        }

        // first check the database to make sure
        // a user does not already exist with the same username and/or email

            foreach ($customers as $user) {
              $dbemail = $user->email;

              if ($dbemail === $email) {
                array_push($errors, "Email is already being used! Try another");
                }
            }




        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
        	$md5password = md5($password_1);//encrypt the password before saving in the database

          session()->flash('password', $md5password);
          session()->flash('OK', 'true');

          $md5pw = $request->input('password');

          $md5pw = md5($md5pw);

          $sessionemail = $request->input('email');



            session()->put('email', $sessionemail);
            session()->put('success', 'You are now logged in!');
          $carshare = new Customers([
            'email'  =>  $request->input('email'),
            'password'  =>  $md5pw,
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'phone' => $request->input('phone'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'street' => $request->input('street'),
            'suburb' => $request->input('suburb'),
            'state' => $request->input('state'),
            'postcode' => $request->input('postcode'),
            'country' => $request->input('country'),
            'isAdmin' => $request->input('isAdmin')
          ]);
          $carshare -> save();

          return Redirect('/myAccount');
        }
        else{
          return Redirect::back()->with('errors',$errors);
        }

        print_r($errors);

      }


    }

}
