<?php

namespace App\Controllers;

class Report extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function totalIncome()
    {
        $from = $this->request->getGet('from');
        $to = $this->request->getGet('to');

        $ftotal = 0;$stotal=0;
        $builder = $this->db->table('tblpayment');
        $builder->select('SUM(Total)Total');
        $builder->WHERE('Status',1)->WHERE('Date >=',$from)->WHERE('Date <=',$to);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $ftotal = $row->Total;
        }

        $stat = [1,3];
        $builder = $this->db->table('tblreservation');
        $builder->select('SUM(TotalAmount)Total');
        $builder->WHEREIN('Status',$stat)->WHERE('Date >=',$from)->WHERE('Date <=',$to);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $stotal = $row->Total;
        }

        echo number_format($ftotal+$stotal,2);
    }

    public function productIncome()
    {
        $from = $this->request->getGet('from');
        $to = $this->request->getGet('to');

        $builder = $this->db->table('tblpayment');
        $builder->select('SUM(Total)Total');
        $builder->WHERE('Status',1)->WHERE('Date >=',$from)->WHERE('Date <=',$to);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            echo number_format($row->Total,2);
        }
    }

    public function servicesIncome()
    {
        $from = $this->request->getGet('from');
        $to = $this->request->getGet('to');


        $stat = [1,3];
        $builder = $this->db->table('tblreservation');
        $builder->select('servicesName,SUM(TotalAmount)Total');
        $builder->WHEREIN('Status',$stat)->WHERE('Date >=',$from)->WHERE('Date <=',$to);
        $builder->groupBy('servicesName');
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <tr>
                <td><?php echo $row->servicesName ?></td>
                <td style="text-align: right;"><?php echo number_format($row->Total,2) ?></td>
            </tr>
            <?php
        }
    }

    public function acceptReservation()
    {
        $reservationModel = new \App\Models\reservationModel();
        //data
        $val = $this->request->getPost('value');
        $values = ['Status'=>1];
        $reservationModel->update($val,$values);
        echo "success";
    }

    public function paidReservation()
    {
        $reservationModel = new \App\Models\reservationModel();
        //data
        $val = $this->request->getPost('value');
        $values = ['Remarks'=>'PAID'];
        $reservationModel->update($val,$values);
        echo "success";
    }

    public function doneReservation()
    {
        $reservationModel = new \App\Models\reservationModel();
        //data
        $val = $this->request->getPost('value');
        $values = ['Status'=>3];
        $reservationModel->update($val,$values);
        echo "success";
    }

    public function acceptMembership()
    {
        $subscribeModel = new \App\Models\subscribeModel();
        $val = $this->request->getPost('value');
        $values = ['Status'=>1];
        $subscribeModel->update($val,$values);
        echo "success";
    }

    public function cancelMembership()
    {
        $subscribeModel = new \App\Models\subscribeModel();
        $val = $this->request->getPost('value');
        $values = ['Status'=>3];
        $subscribeModel->update($val,$values);
        echo "success";
    }

    public function renew()
    {
        $subscribeModel = new \App\Models\subscribeModel();
        $val = $this->request->getPost('value');
        $dateCreated = date('Y-m-d');
        $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($dateCreated)) . " + 1 year"));
        $values = ['Status'=>1,'DateCreated'=>$dateCreated,'EndDate'=>$newEndingDate];
        $subscribeModel->update($val,$values);
        echo "success";
    }

    public function autoDetect()
    {
        $subscribeModel = new \App\Models\subscribeModel();
        $date = date('Y-m-d');
        $builder = $this->db->table('tblmembership');
        $builder->select('*');
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            if($row->EndDate==$date)
            {
                $values = ['Status'=>2];
                $subscribeModel->update($row->membershipID,$values);
                echo "Updated";
            }
        }
    }
}