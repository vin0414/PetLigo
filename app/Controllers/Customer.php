<?php

namespace App\Controllers;
use App\Libraries\Hash;
use CodeIgniter\Database\SQLite3\Table;

class Customer extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function Dashboard()
    {
        return view('customer/index');
    }

    public function Reservations()
    {
        return view('customer/reservations');
    }

    public function Orders()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblcustomer_order');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $order = $builder->get()->getResult();
        $data = ['order'=>$order];
        return view('customer/orders',$data);
    }

    public function Confirm()
    {
        $customerOrderModel = new \App\Models\customerOrderModel();
        $paymentModel = new \App\Models\paymentModel();
        //data
        $code = $this->request->getPost('code');
        $paymentMethod = $this->request->getPost('paymentMethod');
        $total = $this->request->getPost('total');
        $user = session()->get('sess_id');
        if($paymentMethod=="Gcash")
        {
            //send email
            $builder = $this->db->table('tblcustomer_order');
            $builder->select('*');
            $builder->WHERE('TransactionNo',$code);
            $datas = $builder->get();
            if($rows = $datas->getRow())
            {
                $fullname = $rows->Firstname." ".$rows->Surname;
                $email = \Config\Services::email();
                $email->setTo($rows->Email,$fullname);
                $email->setFrom("petligo2023@gmail.com","PetLigo");
                $imgURL = "assets/images/petligo.png";
                $qrcode = "assets/images/petligo-gcash.jpg";
                $email->attach($imgURL);
                $email->attach($qrcode);
                $cid = $email->setAttachmentCID($imgURL);
                $template = "<center>
                <img src='cid:". $cid ."' width='100'/>
                <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                <tr><td>Dear ".$fullname.",</td></tr>
                <tr><td>Thank you for shopping with Petligo - Grooming Services! We're delighted to confirm that we have received your order.</td><tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Below are the details of your purchase</td></tr>
                <tr><td>Order Date : ".$rows->DateCreated."</td></tr>
                <tr><td>Address : ".$rows->Address."</td></tr>
                <tr><td>Phone : ".$rows->contactNumber."</td></tr>
                <tr><td>Email : ".$rows->Email."</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>How to pay using Gcash Payment</td></tr>
                <tr><td>To use Gcash QR using your smartphone simply:</p></td></tr>
                <tr><td>Step 1 : Click on Pay QR on the main page.</p></td></tr>
                <tr><td>Step 2 : Tap on the 'Scan QR Code' Icon.</p></td></tr>
                <tr><td>Step 3 : Align the camera at the Cashier's QR Code</p></td></tr>
                <tr><td>Step 4 : Once the app detects and identifies the merchant, input the total amount of your purchase (amount to pay).</p></td></tr>
                <tr><td>Step 5 : Confirm transaction details.</p></td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Please review the details above to ensure everything is accurate. If you have any questions or concerns,</td></tr>
                <tr><td>please don't hesitate to contact our customer support at our Facebook Page 'Petligo - Grooming Services'.</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Thank you for choosing Petligo - Grooming Services. We appreciate your business and hope you enjoy your purchase!</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Best Regards,</td></tr>
                <tr><td>Petligo - Grooming Services</td></tr>
                <tr><td>452 Padre Pio, Santa Cruz, Cavite City, 4100 Cavite</td></tr>
                <tr><td>Facebook Page: Petligo - Grooming Services</td></tr>
                </tbody></table></center>";
                $subject = "Order Confirmation and Gcash Payment - Petligo";
                $email->setSubject($subject);
                $email->setMessage($template);
                $email->send();
            }
        }
        else
        {
            //send email
            $builder = $this->db->table('tblcustomer_order');
            $builder->select('*');
            $builder->WHERE('TransactionNo',$code);
            $datas = $builder->get();
            if($rows = $datas->getRow())
            {
                $fullname = $rows->Firstname." ".$rows->Surname;
                $email = \Config\Services::email();
                $email->setTo($rows->Email,$fullname);
                $email->setFrom("petligo2023@gmail.com","PetLigo");
                $imgURL = "assets/images/petligo.png";
                $email->attach($imgURL);
                $cid = $email->setAttachmentCID($imgURL);
                $template = "<center>
                <img src='cid:". $cid ."' width='100'/>
                <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                <tr><td>Dear ".$fullname.",</td></tr>
                <tr><td>Thank you for shopping with Petligo - Grooming Services! We're delighted to confirm that we have received your order.</td><tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Below are the details of your purchase</td></tr>
                <tr><td>Order Date : ".$rows->DateCreated."</td></tr>
                <tr><td>Address : ".$rows->Address."</td></tr>
                <tr><td>Phone : ".$rows->contactNumber."</td></tr>
                <tr><td>Email : ".$rows->Email."</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>We kindly request you to prepare the exact amount for your delivery. This will help ensure a smooth and contactless transactions process. </td></tr>
                <tr><td>Please review the details above to ensure everything is accurate. If you have any questions or concerns,</td></tr>
                <tr><td>please don't hesitate to contact our customer support at our Facebook Page 'Petligo - Grooming Services'.</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Thank you for choosing Petligo - Grooming Services. We appreciate your business and hope you enjoy your purchase!</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>Best Regards,</td></tr>
                <tr><td>Petligo - Grooming Services</td></tr>
                <tr><td>452 Padre Pio, Santa Cruz, Cavite City, 4100 Cavite</td></tr>
                <tr><td>Facebook Page: Petligo - Grooming Services</td></tr>
                </tbody></table></center>";
                $subject = "Order Confirmation - Petligo";
                $email->setSubject($subject);
                $email->setMessage($template);
                $email->send();
            }
        }
        //verify if the customer already purchase membership
        $builder = $this->db->table('tblmembership');
        $builder->select('customerID');
        $builder->WHERE('customerID',$user)->WHERE('DateCreated <=',date('Y-m-d'));
        $data = $builder->get();
        if($row = $data->getRow())
        {
            //get the records from the tblcustomer_order
            $builder = $this->db->table('tblcustomer_order');
            $builder->select('OrderNo');
            $builder->WHERE('TransactionNo',$code);
            $list = $builder->get();
            if($rows = $list->getRow())
            {
                $values = [
                    'charge'=>0.00,'Total'=>$total,
                ];
                $customerOrderModel->update($rows->OrderNo,$values);
            }
            //save the payment
            $values = [
                'TransactionNo'=>$code, 'PaymentMethod'=>$paymentMethod,'Status'=>0,'Total'=>$total,'Date'=>date('Y-m-d')
            ];
            $paymentModel->save($values);
        }
        else //no records
        {
            //get the records from the tblcustomer_order
            $builder = $this->db->table('tblcustomer_order');
            $builder->select('OrderNo');
            $builder->WHERE('TransactionNo',$code);
            $list = $builder->get();
            if($rows = $list->getRow())
            {
                $values = [
                    'charge'=>38.00,'Total'=>$total,
                ];
                $customerOrderModel->update($rows->OrderNo,$values);
            }
            //save the payment
            $values = [
                'TransactionNo'=>$code, 'PaymentMethod'=>$paymentMethod,'Status'=>0,'Total'=>$total+38.00,'Date'=>date('Y-m-d')
            ];
            $paymentModel->save($values);
        }
        session()->setFlashdata('success','Great! Your order(s) successfully confirmed');
        return redirect()->to('customer/orders')->withInput();
    }

    public function cancelOrder()
    {
        $customerOrderModel = new \App\Models\customerOrderModel();
        $paymentModel = new \App\Models\paymentModel();
        //data
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblcustomer_order');
        $builder->select('OrderNo');
        $builder->WHERE('TransactionNo',$val);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $values = ['Status'=>2];
            $customerOrderModel->update($row->OrderNo,$values);
        }
        //cancel payment
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblpayment');
        $builder->select('paymentID');
        $builder->WHERE('TransactionNo',$val);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $values = ['Status'=>2];
            $paymentModel->update($row->paymentID,$values);
        }
        echo "success";
    }

    public function viewOrder()
    {
        $val = $this->request->getGet('value');
        $builder = $this->db->table('tblorders');
        $builder->select('*');
        $builder->WHERE('TransactionNo',$val);
        $data = $builder->get();
        ?>
        <table class="table table-bordered table-stripe hover nowrap">
            <thead>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Price</th>
            </thead>
        <?php
        foreach($data->getResult() as $row)
        {
            ?>
            <tr>
                <td><?php echo $row->productName ?></td>
                <td><?php echo $row->Qty ?></td>
                <td style="text-align:right;"><?php echo number_format($row->price,2) ?></td>
            </tr>
            <?php
        }
        $builder = $this->db->table('tblorders');
        $builder->select('SUM(Qty)Qty,SUM(price)total');
        $builder->WHERE('TransactionNo',$val);
        $builder->groupBy('TransactionNo');
        $datas = $builder->get();
        if($row = $datas->getRow())
        {
            ?>
            <tr><td colspan='3'>&nbsp;</td></tr>
            <tr>
                <td>TOTAL</td>
                <td><?php echo number_format($row->Qty,0) ?></td>
                <td style="text-align:right;"><?php echo number_format($row->total,2) ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }

    public function Pets()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblpets');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $pets = $builder->get()->getResult();
        $data = ['pets'=>$pets];
        return view('customer/pets',$data);    
    }

    public function editPet($id=null)
    {
        $builder = $this->db->table('tblpets');
        $builder->select('*');
        $builder->WHERE('petsID',$id);
        $pets = $builder->get()->getResult();
        $data = ['pets'=>$pets];
        return view('customer/edit-pets',$data);
    }

    public function updatePet()
    {
        $petModel = new \App\Models\petModel();
        //data
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();
        $pet = $this->request->getPost('petname');
        $breed = $this->request->getPost('breed');
        $age = $this->request->getPost('age');
        $id = $this->request->getPost('petID');

        $validation = $this->validate([
            'petname'=>'required',
            'breed'=>'required',
            'age'=>'required',
        ]);

        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('customer/pets')->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('pets/',$originalName);
                $values = [
                    'Name'=>$pet,'Breed'=>$breed,'Age'=>$age,'Photo'=>$originalName,
                ];
                $petModel->update($id,$values);
                session()->setFlashdata('success','Great! Successfully updated');
                return redirect()->to('customer/pets')->withInput();
            }
            else
            {
                session()->setFlashdata('fail','Error! Something went wrong');
                return redirect()->to('customer/pets')->withInput();
            }
        }
    }

    public function profile()
    {
        return view('customer/profile');
    }

    public function upload()
    {
        $user = session()->get('sess_id');
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        if(empty($originalName))
        {
            echo "Invalid! Please fill in the form";
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $builder = $this->db->table('tblcustomer_info');
                $builder->select('infoID');
                $builder->WHERE('customerID',$user);
                $data = $builder->get();
                if($row = $data->getRow())
                {
                    $infoModel = new \App\Models\informationModel();
                    $file->move('profile/',$originalName);
                    $values = ['Image'=>$originalName];
                    $infoModel->update($row->infoID,$values);
                    echo "Success";
                }
                else
                {
                    echo "Sorry! Please update your account";
                }
            }
            else
            {
                echo "File already uploaded";
            }
        }
    }

    //functions 
    public function savePet()
    {
        $petModel = new \App\Models\petModel();
        //data
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();
        $pet = $this->request->getPost('petname');
        $breed = $this->request->getPost('breed');
        $age = $this->request->getPost('age');
        $user = session()->get('sess_id');

        $validation = $this->validate([
            'petname'=>'required',
            'breed'=>'required',
            'age'=>'required',
        ]);

        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('customer/pets')->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('pets/',$originalName);
                $values = [
                    'customerID'=>$user, 'Name'=>$pet,'Breed'=>$breed,'Age'=>$age,'Photo'=>$originalName,
                ];
                $petModel->save($values);
                session()->setFlashdata('success','Great! Successfully added');
                return redirect()->to('customer/pets')->withInput();
            }
            else
            {
                session()->setFlashdata('fail','Error! Something went wrong');
                return redirect()->to('customer/pets')->withInput();
            }
        }
    }

    public function shipping()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblorders');
        $builder->select('*');
        $builder->WHERE('customerID',$user)->WHERE('Status',0);
        $items = $builder->get()->getResult();
        //total
        $builder = $this->db->table('tblorders');
        $builder->select('SUM(Qty*price)total');
        $builder->WHERE('customerID',$user)->WHERE('Status',0);
        $total = $builder->get()->getResult();
        //blog
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();

        $data = ['items'=>$items,'total'=>$total,'blog'=>$blog];
        return view('cart/checkout',$data);
    }

    public function Success()
    {
        $code = $this->request->getGet('code');
        $builder = $this->db->table('tblorders');
        $builder->select('*');
        $builder->WHERE('TransactionNo',$code);
        $list = $builder->get()->getResult();
        //total
        $builder = $this->db->table('tblorders');
        $builder->select('SUM(Qty*price)total');
        $builder->WHERE('TransactionNo',$code)->GROUPBY('TransactionNo');
        $total = $builder->get()->getResult();

        $data = ['list'=>$list,'total'=>$total,'code'=>$code];
        return view('customer/success',$data);
    }

    public function saveInfo()
    {
        $informationModel = new \App\Models\informationModel();
        //save data
        $user = session()->get('sess_id');
        $address = $this->request->getPost('address');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $image = "N/A";

        $validation = $this->validate([
            'address'=>'required',
            'email'=>'required|valid_email',
            'phone'=>'required',
        ]);

        if(!$validation)
        {
            echo "Invalid! Please fill in the form";
        }
        else
        {
            $values = [
                'customerID'=>$user, 'Address'=>$address,'ContactNo'=>$phone,'EmailAddress'=>$email,'Image'=>$image
            ];
            $informationModel->save($values);
            echo "success";
        }
    }

    public function updatePassword()
    {
        $customerModel = new \App\Models\customerModel();
        $user = session()->get('sess_id');
        $new_password = $this->request->getPost('new_password');
        $retype_password = $this->request->getPost('retype_password');
        
        $validation = $this->validate([
            'new_password'=>'required',
            'retype_password'=>'required',
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('customer/profile')->withInput();
        }
        else
        {
            if($new_password!=$retype_password)
            {
                session()->setFlashdata('fail','Invalid! Password mismatched');
                return redirect()->to('customer/profile')->withInput();
            }
            else
            {
                $defaultPassword = Hash::make($new_password);
                $values = ['Password'=>$defaultPassword,];
                $customerModel->update($user,$values);
                session()->setFlashdata('success','Great! Successfully save changes');
                return redirect()->to('customer/profile')->withInput();
            }
        }
    }

    public function fetchInfo()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblcustomer_info a');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $data = $builder->get();
        $info="";
        foreach($data->getResult() as $row)
        {
            $info = array("Address"=>$row->Address,"Contact"=>$row->ContactNo,"Email"=>$row->EmailAddress);
        }
        echo json_encode($info);
    }

    public function removeItem()
    {
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblorders');
        $builder->where('orderID', $val);
        $builder->delete();
        echo "success";
    }

    public function reserve($id)
    {
        $user = session()->get('sess_id');
        $petModel = new \App\Models\petModel();
        $pets = $petModel->WHERE('customerID',$user)->findAll();
        $servicesModel = new \App\Models\servicesModel();
        $services = $servicesModel->WHERE('servicesID',$id)->first();
        $data = ['services'=>$services,'pets'=>$pets];
        return view('customer/reserve',$data);
    }

    public function saveReservation()
    {

    }

    public function getTime()
    {
        $date = $this->request->getGet('date');
        $list = array("08:00 AM","10:00 AM","12:00 PM","02:00 PM","04:00 PM");$lists = array();
        $numbers = array();
        $builder = $this->db->table('tblreservation');
        $builder->select('Time');
        $builder->WHERE('Date',$date);
        $datas = $builder->get();
        foreach($datas->getResult() as $row)
        {
            array_push($numbers,$row->Time);
        }
        $lists = array_diff($list,$numbers);
        $Obj = json_decode(json_encode($lists));
        foreach($Obj as $object)
        {
            echo "<option>".$object."</option>";
        }
    }
}