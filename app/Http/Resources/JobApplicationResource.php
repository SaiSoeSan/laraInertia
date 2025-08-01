<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'position_title' => $this->position_title,
            'job_description' => $this->job_description,
            'location' => $this->location,
            'application_url' => $this->application_url,
            'source' => $this->source,
            'status' => $this->status,
            'status_label' => $this->getStatusLabel(),
            'status_color' => $this->getStatusColor(),
            'applied_date' => $this->applied_date?->format('Y-m-d'),
            'applied_date_formatted' => $this->applied_date?->format('M j, Y'),
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    /**
     * Get the status label for display
     */
    private function getStatusLabel(): string
    {
        return match($this->status) {
            'applied' => 'Applied',
            'phone_screen' => 'Phone Screen',
            'interview' => 'Interview',
            'technical_test' => 'Technical Test',
            'final_interview' => 'Final Interview',
            'offer' => 'Offer',
            'rejected' => 'Rejected',
            'withdrawn' => 'Withdrawn',
            default => ucfirst($this->status)
        };
    }

    /**
     * Get the status color classes for display
     */
    private function getStatusColor(): string
    {
        return match($this->status) {
            'applied' => 'bg-blue-100 text-blue-800',
            'phone_screen' => 'bg-yellow-100 text-yellow-800',
            'interview' => 'bg-purple-100 text-purple-800',
            'technical_test' => 'bg-orange-100 text-orange-800',
            'final_interview' => 'bg-indigo-100 text-indigo-800',
            'offer' => 'bg-green-100 text-green-800',
            'rejected' => 'bg-red-100 text-red-800',
            'withdrawn' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }
}
