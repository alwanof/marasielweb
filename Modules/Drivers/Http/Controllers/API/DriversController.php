<?php

namespace Modules\Drivers\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Drivers\Entities\Driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $drivers=Driver::where('active',0)->latest()->paginate(10);
        return $drivers;
    }

    public function search(Request $request)
    {
        $drivers= Driver::where('fname', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('lname', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('email', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('phone', 'LIKE', '%' . $request->keywords . '%')
            ->paginate(10);

        return $drivers;
    }

    public function setApproved(Driver $driver)
    {
        //return $driver;
        $driver->active = ($driver->active == 0) ? 1 : 0;
        $driver->save();
        //$this->leadWelcomeEmail($driver);
        return 1;
    }




    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
