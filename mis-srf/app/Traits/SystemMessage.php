<?php
namespace App\Traits;

trait SystemMessage {
    public function exception()
    {
        return 'Oops something went wrong, please contact your administrator!';
    }

    public function store_success()
    {
        return 'Entry has been successfully added to our records!';
    }

    public function store_fail()
    {
        return 'We have encountered some problem saving the record!';
    }

    public function delete_success()
    {
        return 'Record has been successfully deleted!';
    }
}