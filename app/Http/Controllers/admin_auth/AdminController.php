<?php

namespace App\Http\Controllers\admin_auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\ActivityLog;
use App\Models\Admin;
use App\Models\EmailTemplate;
use App\Models\ProfileId;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Services\EmailService;
use App\Services\AdminEmailService;
use App\Traits\ModelCountsTrait;

class AdminController extends Controller
{
    use ModelCountsTrait;
    /**
     * Display a listing of the resource.
     */
    protected $emailService;
    protected $adminEmailService;

    public function __construct(EmailService $emailService, AdminEmailService $adminEmailService)
    {
        $this->emailService = $emailService;
        $this->adminEmailService = $adminEmailService;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $admin = Admin::where('status', 1)->first();

        if (!$admin) {
            return redirect('admin-login')->with('error', 'Verify your account first, Contact with Admin!');
        }
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin/dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect('admin-login')->with('error', 'The email and password do not match.');
    }

    public function create()
    {
        return view('admin-create');
    }

    public function index()
    {
        $admins = Admin::all();
        if ($admins) {
            $url = request()->path();
            $segments = explode('/', $url);
            $lastSegment = end($segments);
            $urlName = '/' . $lastSegment;
            $this->indexCount(Admin::class, $urlName);
            return view('admin.admins.index', compact('admins'));
        } else {
            return redirect()->back()->with('erroe', "Something went wrong!");
        }
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdminRequest $request)
    {
        $name = $request->Registration;
        $fileName = rand(100, 1000) . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('storage/admin/admin-images/'), $fileName);

        $admin = Admin::create([
            'image' => $fileName,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'roll' => $request->roll,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ]);

        $data = [
            'email' => $admin->email,
            'name' => $admin->name,
            'subject' => 'Welcome to the Admin Panel',

        ];

        $emailTemplate = EmailTemplate::where('status', 1)->where('name', $name)->first();
        // $this->adminEmailService->configureMailer($admin, $emailTemplate);
        $this->emailService->sendMail($admin, $emailTemplate);

        return redirect()->back()->with('success', 'Admin Registered Successfully');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.logout');
    }


    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $admin = Auth::guard('admin')->user();
        if ($admin) {
            return view('admin.admins.show', compact('admin'));
        } else {
            return redirect()->back()->with('error', " Something went wrong!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'status' => 'sometimes|in:0,1',
            'roll' => 'sometimes|in:0,1',
            'mobile' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->image) {

            if ($file = $request->file('image')) {
                $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $filePath = public_path('storage/admin/admin-images/');
                $file->move($filePath, $fileName);
                if ($admin->image) {
                    $previousFilePath = $filePath . $admin->image;
                    if (File::exists($previousFilePath)) {
                        File::delete($previousFilePath);
                    }
                }
                $admin->update([
                    'image' => $fileName
                ]);
            }
        }
        if ($request->destroyAdminImage) {

            if ($admin = Auth::guard('admin')->user()) {

                $filePath = public_path('storage/admin/admin-images/');
                if ($admin->image) {

                    $previousFilePath = $filePath . $admin->image;
                    if (File::exists($previousFilePath)) {
                        File::delete($previousFilePath);
                    }
                }
                $admin->update([
                    'image' => null
                ]);
                return redirect()->back()->with('error', "Admin Image Deleted Successfully!");
            }
        }
        if ($request->name) {
            $admin->update([
                'name' => $request->name
            ]);
        }
        if ($request->email) {
            $admin->update([
                'email' => $request->email
            ]);
        }
        if ($request->mobile) {
            $admin->update([
                'mobile' => $request->mobile
            ]);
        };
        if ($request->has('roll')) {
            $admin->update([
                'roll' => $request->roll
            ]);
        }
        if ($request->password) {
            $admin->update([
                'password' => Hash::make($request->password)
            ]);
        }
        if ($request->has('status')) {
            $admin->update([
                'status' => $request->status
            ]);
        }
        return redirect()->back()->with('success', 'Admin Updated Successfully!');
    }





    /**
     * Remove Image.
     */

    public function destroy(Request $request, Admin $admin)
    {
        if ($admin) {
            $filePath = public_path('storage/admin/admin-images/');
            $previousFilePath = $filePath . $admin->image;
            if (File::exists($previousFilePath)) {
                File::delete($previousFilePath);
                $admin->destroy($admin->id);
                $msg = "Admin Deleted Successfully!";
                return redirect()->back()->with('error', $msg);
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
    public function checkBoxDelete(Request $request)
    {
        $selectedDeleteAdminIds = $request->input('selectedDeleteAdminIds');
        if (!empty($selectedDeleteAdminIds)) {
            $ids = explode(',', $selectedDeleteAdminIds[0]);
            foreach ($ids as $id) {
                $User = User::find($id);
                if ($User) {
                    $User->delete();
                }
            }
            return redirect()->back()->with('error', 'Admin Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }
    public function activeItem(Request $request)
    {
        $selectedActiveAdminIds = $request->input('selectedActiveAdminIds');
        if (!empty($selectedActiveAdminIds)) {
            $ids = explode(',', $selectedActiveAdminIds[0]);

            foreach ($ids as $id) {
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
       $selectedInactiveAdminIds = $request->input('selectedInactiveAdminIds');
        if (!empty($selectedInactiveAdminIds)) {
            $ids = explode(',', $selectedInactiveAdminIds[0]);
foreach ($ids as $id) {
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
    // public function twoFactor()
    // {
    //     return view('profile.two-factor-authentication-form');
    // }
}
