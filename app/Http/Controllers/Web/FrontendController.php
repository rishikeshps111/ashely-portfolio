<?php

namespace App\Http\Controllers\Web;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use App\Models\CompanyCollaboration;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function home()
    {
        $testimonials = Testimonial::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        $collaborations = CompanyCollaboration::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        $serviceCategories = ServiceCategory::where('is_active', 1)->orderBy('created_at', 'desc')->get();

        return view('pages.home', compact('testimonials', 'collaborations', 'serviceCategories'));
    }

    public function portfolio()
    {
        $projects = Project::with('category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
        return view('pages.portfolio', compact('projects'));
    }

    public function projectDetails(Project $project)
    {
        return view('pages.project-details', compact('project'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function services()
    {
        $serviceCategories = ServiceCategory::with(['services' => function ($query) {
            $query->where('is_active', 1);
        }])->where('is_active', 1)->orderBy('created_at', 'desc')->get();
        return view('pages.services', compact('serviceCategories'));
    }


    public function subscribe(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:newsletter_subscribers,email',
            ],
            [
                'email.required' => 'Email is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.unique' => 'This email is already subscribed.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thank you for subscribing!',
        ], 200);
    }

    public function contactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        ContactMessage::create($validated);

        return response()->json(['success' => true]);
    }
}
