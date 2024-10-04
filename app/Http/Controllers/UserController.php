<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Models\Payment;
use App\Models\ProfileId;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use app\Services\UserService;
use App\Traits\PaidUsersTrait;
use App\Traits\ActiveUsersTrait;
use App\Traits\InActiveUsersTrait;
use App\Traits\profileTrait;
use App\Traits\SpoteLightUsersTrait;
use App\Traits\ModelCountsTrait;


class UserController extends Controller
{
    use ModelCountsTrait;
    /**
     * Display a listing of the resource.
     */
    use PaidUsersTrait;
    use profileTrait;
    use ActiveUsersTrait;
    use InActiveUsersTrait;
    use SpoteLightUsersTrait;


    public function index(Request $request)
    {
        $fullUrl = $request->fullUrl();
        $segments = explode('/', $fullUrl);
        $lastSegment = end($segments);
        $urlName = '/' . $lastSegment;
        $active = User::where('status', 1)->count();
        $inActive = User::where('status', 0)->count();
        $countAll = User::count();
        $premiumUsersCount = count($this->paidUsers());
        $profilePrefixs = $this->profilePrefix();
        $paidUsers = $this->paidUsers();
        $spotlightUsers = $this->spotlightUsers();

        $users = User::with(['payments' => function ($query) {
            $query->orderBy('created_at', 'desc'); 
        }])->where('status', 1)->orderBy('created_at', 'desc')->get();

        if ($request->paidUsers) {
            $this->paidUsersCount(User::class, $urlName, $premiumUsersCount);
            return view('admin.users.index', compact('paidUsers', 'premiumUsersCount', 'profilePrefixs', 'active', 'inActive', 'countAll'));
        }
        if ($request->activeUsers) {
            $activeUsers = $this->activeUsers();
            $this->activeUsersCount(User::class, $urlName, $active);
            return view('admin.users.index', compact('activeUsers', 'profilePrefixs', 'premiumUsersCount', 'active', 'inActive', 'countAll'));
        }
        if ($request->inactiveUsers) {
            $inActiveUsers = $this->inActiveUsers();
            $this->inActiveUsersCount(User::class, $urlName, $inActive);
            return view('admin.users.index', compact('inActiveUsers', 'profilePrefixs', 'premiumUsersCount', 'active', 'inActive', 'countAll'));
        }
        $users = User::with(['payments', 'approvals', 'successStories'])
            ->orderByDesc('created_at')
            ->paginate(10);

        $count = ($users->currentPage() - 1) * $users->perPage();
        $this->indexCount(User::class, $urlName);
        return view('admin.users.index', compact('users', 'paidUsers', 'premiumUsersCount', 'active', 'inActive', 'countAll'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'name' => 'required',
            'string',
            'max:255',
            'email' => 'required',
            'email',
            'max:255',
            'password' => 'required',
            'string|min:8|confirmed',
        ]);

        $file = $request->file('image');
        if ($request->hasFile('image')) {

            // Check if the file is valid
            if ($file) {
                $fileName = rand(100, 1000) . time() . $file->getClientOriginalName();
                $filePath = public_path('storage/admin/image/');
                $file->move($filePath, $fileName);
                User::create([
                    'image' => $fileName,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>  Hash::make($request->input('password'))
                ]);
            } else {
                User::create([
                    'image' => null,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>  Hash::make($request->input('password'))
                ]);
                return redirect()->back()->with('error,', 'Please Upload Valid File.');
            }
        }
        return redirect('admin/admins')->with('success', 'Admin Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */


     public function userUpdate(Request $request, $id){
       
        $user = User::find($id);
       $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'gender' => $request->gender,
       ]);
       return response()->json([
        'success' => 'User information updated successfully!',
        'user' => $user,
        
      
    ]);
        //return redirect()->back()->with('success', 'User Profile Updated Successfully!');
     }

     
    public function update(AdminUpdateRequest $request, $id)
    {
        $admin = USer::find($id);

        if ($file = $request->file('image')) {
            $fileName = rand(100, 1000) . time() . $file->getClientOriginalName();
            $filePath = public_path('storage/admin/image/');
            $file->move($filePath, $fileName);
            $previousFilePath = $filePath . $admin->image;

            if (File::exists($previousFilePath)) {
                File::delete($previousFilePath);
            }
            $admin->update([
                'image' => $fileName,
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect('admin/admins')->with('success', 'Admin Updated Successfully!');
        } else {
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect('admin/admins')->with('success', 'Admin Updated Successfully!');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $admin = User::find($id);
        if ($admin) {
            $admin->destroy($id);
            return redirect()->back()->with('error', 'Admin Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }


    public function checkBoxDelete(Request $request)
    {
        //dd($request->all());
        $selectedDeleteAdminIds = $request->input('selectedDeleteAdminIds');
        if (!empty($selectedDeleteAdminIds)) {
            $ids = explode(',', $selectedDeleteAdminIds[0]);

            // Check if you're receiving an array of selected IDs
            foreach ($ids as $id) {
                //dd($id); // Check if each ID is being processed correctly
                $User = User::find($id);
                if ($User) {
                    $User->delete(); // Use delete() method to delete a single record
                }
            }

            return redirect()->back()->with('error', 'Admin Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }

    public function activeItem(Request $request)
    {
        //dd($request->all());
        $selectedActiveAdminIds = $request->input('selectedActiveAdminIds');
        if (!empty($selectedActiveAdminIds)) {
            $ids = explode(',', $selectedActiveAdminIds[0]);

            // Check if you're receiving an array of selected IDs
            foreach ($ids as $id) {
                //dd($id); // Check if each ID is being processed correctly
                $User = User::find($id);
                if ($User) {
                    $User->update([
                        'status' => 1
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Selected items Activated successfully.');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }
    public function inActiveItem(Request $request)
    {
        //dd($request->all());
        $selectedInactiveAdminIds = $request->input('selectedInactiveAdminIds');
        if (!empty($selectedInactiveAdminIds)) {
            $ids = explode(',', $selectedInactiveAdminIds[0]);

            // Check if you're receiving an array of selected IDs
            foreach ($ids as $id) {
                //dd($id); // Check if each ID is being processed correctly
                $User = User::find($id);
                if ($User) {
                    $User->update([
                        'status' => 0
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Selected items inActivated successfully.');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }

    public function profilePrefix()
    {
        $profilePrefixes = ProfileId::orderBy('created_at', 'desc')->get();
        return $profilePrefixes;
    }

    public function premiumForAdmin()
    {
        $paymentStatus = User::with(['payments', 'approvals', 'successStories'])
            ->orderBy('created_at', 'desc')
            ->get();
        //dd($paymentStatus);
        return $paymentStatus;
    }

    public function paidusersorders()
    {
        $profilePrefixs = $this->profilePrefix();
        $orders = User::whereHas('payments', function ($query) {
            $query->where('is_paid', 1);
        })->with(['payments' => function ($query) {
            $query->orderBy('is_paid', 'desc')
                ->orderBy('created_at', 'desc')->count();
        }])->get();

        // $freeUsersOrders = User::whereDoesntHave('payments', function ($query) {
        //     $query->where('is_paid', 1);
        // })->with(['payments' => function ($query) {
        //     $query->where('is_paid', 0);
        // }])->get();

        $freeUsersOrders = User::whereDoesntHave('payments', function ($query) {
            $query->where('is_paid', 1);
        })->whereHas('payments', function ($query) {
            $query->where('is_paid', 0);
        })->with(['payments' => function ($query) {
            $query->where('is_paid', 0);
        }])->withCount('payments')->get();
        // dd($freeUsersOrders);

        return view('admin.users.orders', compact('orders', 'profilePrefixs', 'freeUsersOrders'));
    }
}
