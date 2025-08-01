<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
  application: Object,
});

const deleteApplication = (id) => {
  if (confirm("Are you sure you want to delete this job application?")) {
    router.delete(route("job-applications.destroy", { job_application: id }), {
      onSuccess: () => {
        router.visit(route("job-applications.index"));
      },
    });
  }
};

const getStatusColor = (status) => {
  const colors = {
    applied: "bg-blue-100 text-blue-800",
    phone_screen: "bg-yellow-100 text-yellow-800",
    interview: "bg-purple-100 text-purple-800",
    final_interview: "bg-indigo-100 text-indigo-800",
    offer: "bg-green-100 text-green-800",
    rejected: "bg-red-100 text-red-800",
    withdrawn: "bg-gray-100 text-gray-800",
    accepted: "bg-emerald-100 text-emerald-800",
  };
  return colors[status] || "bg-gray-100 text-gray-800";
};

const formatDate = (dateString) => {
  if (!dateString) return "Not set";
  return new Date(dateString).toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
};
</script>

<template>
  <Head
    :title="`${application.company_name} - ${application.position_title}`"
  />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
          <Link
            :href="route('job-applications.index')"
            class="text-gray-600 hover:text-gray-900"
          >
            <svg
              class="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 19l-7-7m0 0l7-7m-7 7h18"
              />
            </svg>
          </Link>
          <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
              {{ application.company_name }}
            </h2>
            <p class="text-sm text-gray-600">
              {{ application.position_title }}
            </p>
          </div>
        </div>

        <div class="flex items-center space-x-3">
          <span
            :class="getStatusColor(application.status)"
            class="inline-flex px-3 py-1 text-sm font-semibold rounded-full"
          >
            {{ application.status_label }}
          </span>
          <Link
            :href="
              route('job-applications.edit', {
                job_application: application.id,
              })
            "
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition"
          >
            <svg
              class="w-4 h-4 mr-2"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
              />
            </svg>
            Edit
          </Link>
          <button
            @click="deleteApplication(application.id)"
            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition"
          >
            <svg
              class="w-4 h-4 mr-2"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
              />
            </svg>
            Delete
          </button>
        </div>
      </div>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6">
            <!-- Basic Information -->
            <div class="border-b border-gray-200 pb-6 mb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">
                Basic Information
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <dt class="text-sm font-medium text-gray-500">
                    Company Name
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    {{ application.company_name }}
                  </dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">
                    Position Title
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    {{ application.position_title }}
                  </dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">Location</dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    {{ application.location || "Not specified" }}
                  </dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">
                    Salary Range
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    {{ application.salary_range || "Not specified" }}
                  </dd>
                </div>
              </div>

              <div v-if="application.job_description" class="mt-6">
                <dt class="text-sm font-medium text-gray-500">
                  Job Description
                </dt>
                <dd class="mt-1 text-sm text-gray-900 whitespace-pre-wrap">
                  {{ application.job_description }}
                </dd>
              </div>

              <div v-if="application.application_url" class="mt-6">
                <dt class="text-sm font-medium text-gray-500">
                  Application URL
                </dt>
                <dd class="mt-1">
                  <a
                    :href="application.application_url"
                    target="_blank"
                    class="text-indigo-600 hover:text-indigo-900 underline flex items-center"
                  >
                    {{ application.application_url }}
                    <svg
                      class="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                      />
                    </svg>
                  </a>
                </dd>
              </div>
            </div>

            <!-- Status & Dates -->
            <div class="border-b border-gray-200 pb-6 mb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">
                Application Status & Timeline
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                  <dt class="text-sm font-medium text-gray-500">
                    Current Status
                  </dt>
                  <dd class="mt-1">
                    <span
                      :class="getStatusColor(application.status)"
                      class="inline-flex px-3 py-1 text-sm font-semibold rounded-full"
                    >
                      {{ application.status_label }}
                    </span>
                  </dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">
                    Applied Date
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    {{ formatDate(application.applied_date) }}
                  </dd>
                </div>
                <div>
                  <dt class="text-sm font-medium text-gray-500">
                    Interview Date
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    {{ formatDate(application.interview_date) }}
                  </dd>
                </div>
              </div>
            </div>

            <!-- Notes -->
            <div v-if="application.notes">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Notes</h3>
              <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-900 whitespace-pre-wrap">
                  {{ application.notes }}
                </p>
              </div>
            </div>

            <!-- No notes message -->
            <div v-else>
              <h3 class="text-lg font-medium text-gray-900 mb-4">Notes</h3>
              <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-500 italic">No notes added yet.</p>
              </div>
            </div>

            <!-- Application Metadata -->
            <div class="mt-8 pt-6 border-t border-gray-200">
              <div
                class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs text-gray-500"
              >
                <div>
                  <span class="font-medium">Created:</span>
                  {{ new Date(application.created_at).toLocaleString() }}
                </div>
                <div>
                  <span class="font-medium">Last Updated:</span>
                  {{ new Date(application.updated_at).toLocaleString() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
