<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Http\Resources\JobApplicationResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $applications = Auth::user()->jobApplications()
            ->orderBy('applied_date', 'desc')
            ->paginate(10);
        $response = [
                'data' => JobApplicationResource::collection($applications->items())->toArray(request()),
                'current_page' => $applications->currentPage(),
                'last_page' => $applications->lastPage(),
                'per_page' => $applications->perPage(),
                'total' => $applications->total(),
                'from' => $applications->firstItem(),
                'to' => $applications->lastItem(),
                'prev_page_url' => $applications->previousPageUrl(),
                'next_page_url' => $applications->nextPageUrl(),
        ];
        return Inertia::render('JobApplications/Index', [
            'applications' => $response,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('JobApplications/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'position_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'application_url' => 'nullable|url',
            'source' => 'required|in:LinkedIn,Indeed,Glassdoor,Email',
            'status' => 'required|in:applied,phone_screen,interview,technical_test,final_interview,offer,rejected,withdrawn',
            'applied_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Auth::user()->jobApplications()->create($validated);

        return redirect()->route('job-applications.index')
            ->with('success', 'Job application created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication): Response
    {
        // Ensure user can only view their own applications
        if ($jobApplication->user_id !== Auth::id()) {
            abort(403);
        }
        return Inertia::render('JobApplications/Show', [
             'application' => (new JobApplicationResource($jobApplication))->toArray(request()),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApplication $jobApplication): Response
    {
        // Ensure user can only edit their own applications
        if ($jobApplication->user_id !== Auth::id()) {
            abort(403);
        }

        return Inertia::render('JobApplications/Edit', [
            'jobApplication' => (new JobApplicationResource($jobApplication))->toArray(request()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobApplication $jobApplication): RedirectResponse
    {
        // Ensure user can only update their own applications
        if ($jobApplication->user_id !== Auth::id()) {
            abort(403);
        }
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'position_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'application_url' => 'nullable|url',
            'source' => 'required|in:LinkedIn,Indeed,Glassdoor,Email',
            'status' => 'required|in:applied,phone_screen,interview,technical_test,final_interview,offer,rejected,withdrawn',
            'applied_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);
        
        $jobApplication->update($validated);

        return redirect()->route('job-applications.show', ['job_application' => $jobApplication->id])
            ->with('success', 'Job application updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication): RedirectResponse
    {
        // Ensure user can only delete their own applications
        if ($jobApplication->user_id !== Auth::id()) {
            abort(403);
        }

        $jobApplication->delete();

        return redirect()->route('job-applications.index')
            ->with('success', 'Job application deleted successfully!');
    }
}
