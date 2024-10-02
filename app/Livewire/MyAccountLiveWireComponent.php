<?php

namespace App\Livewire;

use App\Models\OrderRecipt;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MyAccountLiveWireComponent extends Component
{
    public  $User;
    public  $Orders;
    public  $Recipts;
    public  $Addresses;
    public  $OpenAddressModal = false;
    public  $newAddress = [
        'title' => '',
        'address' => '',
        'city' => '',
        'contact_number' => '',
    ];
    public $newUser = [
        'firstName' => '',
        'lastName' => '',
        'displayName' => '',
        'email' => '',
        'currentPassword' => '',
        'newPassword' => '',
        'confirmPassword' => '',
    ];
    public function render()
    {

        $this->fetchUser();
        $this->fetchOrders();
        $this->fetchRecipts();
        $this->fetchAddresses();
        return view('livewire.my-account-live-wire-component');
    }
    function fetchUser()
    {
        $this->User = User::find(Auth::user()->id);
        $this->newUser['firstName'] = $this->User->firstName;
        $this->newUser['lastName'] = $this->User->lastName;
        $this->newUser['displayName'] = $this->User->displayName;
        $this->newUser['email'] = $this->User->email;
    }
    function fetchOrders()
    {
        $this->Orders = UserOrder::with('book')->where('user_id', $this->User->id)->get();
    }
    function fetchRecipts()
    {
        $OrderCodes = $this->Orders->pluck('Code');
        $this->Recipts = OrderRecipt::all()->whereIn('order_Code', $OrderCodes);
    }
    function fetchAddresses()
    {
        $this->Addresses = UserAddress::all()->where('user_id', $this->User->id);
    }

    function DeleteAddress($id)
    {
        $address = UserAddress::find($id);
        if ($address->user_id == $this->User->id) {
            $address->delete();
        }
    }
    function OpenAddressModel()
    {
        $this->OpenAddressModal = true;
    }
    function AddNewAddress()
    {
        $address = $this->newAddress;
        UserAddress::create([
            'user_id' => $this->User->id,
            'title' => $address['title'],
            'city' => $address['city'],
            'address' => $address['address'],
            'contactNumber' => $address['contact_number'],
        ]);
        $this->OpenAddressModal = false;
        $this->newAddress = [
            'title' => '',
            'address' => '',
            'city' => '',
            'contact_number' => '',
        ];
        $message = 'Address Successfully Added';
        $this->dispatch('ManageAddedAlert', $message);
    }

    public function UpdateUserInfo()
    {
        // Validate the data
        $this->validate([
            'newUser.firstName' => 'required|string|max:255',
            'newUser.lastName' => 'required|string|max:255',
            'newUser.displayName' => 'required|string|max:255',
            'newUser.email' => 'required|email|unique:users,email,' . auth()->id(),
            'newUser.currentPassword' => 'nullable|string',
            'newUser.newPassword' => 'nullable|min:8|same:newUser.confirmPassword',
        ]);
        $user = User::find($this->User->id);

        // Check if current password is provided and correct
        if (!empty($this->newUser['currentPassword']) && $this->newUser['currentPassword'] !='') {
           
            if (!Hash::check($this->newUser['currentPassword'], $user->password)) {
                $this->addError('newUser.currentPassword', 'The current password is incorrect.');
                
                $message = 'Info not Successfully';
                $this->dispatch('ManageRemoveAlert', $message);
            }

            // Update password
            if (!empty($this->newUser['newPassword'])) {
                $user->password = Hash::make($this->newUser['newPassword']);
            }
        } 
        // Update user info
        $user->firstName = $this->newUser['firstName'];
        $user->lastName = $this->newUser['lastName'];
        $user->displayName = $this->newUser['displayName'];
        $user->email = $this->newUser['email'];
        $user->save();
        $message = 'Info Updated Successfully';
        $this->dispatch('ManageAddedAlert', $message);
        return ;
    }
}
