<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";

const form = useForm({
  company_name: "",
  position_title: "",
  job_description: "",
  location: "",
  application_url: "",
  source: "LinkedIn",
  status: "applied",
  applied_date: new Date().toISOString().split("T")[0], // Current date in YYYY-MM-DD format
  notes: "",
});

const submit = () => {
  form.post(route("job-applications.store"));
};

const statusOptions = [
  { value: "applied", label: "Applied" },
  { value: "phone_screen", label: "Phone Screen" },
  { value: "interview", label: "Interview" },
  { value: "technical_test", label: "Technical Test" },
  { value: "final_interview", label: "Final Interview" },
  { value: "offer", label: "Offer" },
  { value: "rejected", label: "Rejected" },
  { value: "withdrawn", label: "Withdrawn" },
];

const sourceOptions = [
  { value: "LinkedIn", label: "LinkedIn" },
  { value: "Indeed", label: "Indeed" },
  { value: "Glassdoor", label: "Glassdoor" },
  { value: "Email", label: "Email" },
];
</script>

<template>
  <Head title="Add Job Application" />

  <AuthenticatedLayout>
    <template #header>
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
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Add New Job Application
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <form @submit.prevent="submit" class="p-6 space-y-6">
            <!-- Basic Information -->
            <div class="border-b border-gray-200 pb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">
                Basic Information
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Company Name -->
                <div>
                  <label
                    for="company_name"
                    class="block text-sm font-medium text-gray-700 mb-2"
                  >
                    Company Name *
                  </label>
                  <input
                    v-model="form.company_name"
                    type="text"
                    id="company_name"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    :class="{ 'border-red-500': form.errors.company_name }"
                  />
                  <div
                    v-if="form.errors.company_name"
                    class="mt-1 text-sm text-red-600"
                  >
                    {{ form.errors.company_name }}
                  </div>
                </div>

                <!-- Position Title -->
                <div>
                  <label
                    for="position_title"
                    class="block text-sm font-medium text-gray-700 mb-2"
                  >
                    Position Title *
                  </label>
                  <input
                    v-model="form.position_title"
                    type="text"
                    id="position_title"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    :class="{ 'border-red-500': form.errors.position_title }"
                  />
                  <div
                    v-if="form.errors.position_title"
                    class="mt-1 text-sm text-red-600"
                  >
                    {{ form.errors.position_title }}
                  </div>
                </div>

                <!-- Location -->
                <div>
                  <label
                    for="location"
                    class="block text-sm font-medium text-gray-700 mb-2"
                  >
                    Location
                  </label>
                  <input
                    v-model="form.location"
                    type="text"
                    id="location"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    :class="{ 'border-red-500': form.errors.location }"
                  />
                  <div
                    v-if="form.errors.location"
                    class="mt-1 text-sm text-red-600"
                  >
                    {{ form.errors.location }}
                  </div>
                </div>

                <!-- Source -->
                <div>
                  <label
                    for="source"
                    class="block text-sm font-medium text-gray-700 mb-2"
                  >
                    Source *
                  </label>
                  <select
                    v-model="form.source"
                    id="source"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    :class="{ 'border-red-500': form.errors.source }"
                  >
                    <option
                      v-for="option in sourceOptions"
                      :key="option.value"
                      :value="option.value"
                    >
                      {{ option.label }}
                    </option>
                  </select>
                  <div
                    v-if="form.errors.source"
                    class="mt-1 text-sm text-red-600"
                  >
                    {{ form.errors.source }}
                  </div>
                </div>
              </div>

              <!-- Job Description -->
              <div class="mt-6">
                <label
                  for="job_description"
                  class="block text-sm font-medium text-gray-700 mb-2"
                >
                  Job Description
                </label>
                <textarea
                  v-model="form.job_description"
                  id="job_description"
                  rows="4"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  :class="{ 'border-red-500': form.errors.job_description }"
                ></textarea>
                <div
                  v-if="form.errors.job_description"
                  class="mt-1 text-sm text-red-600"
                >
                  {{ form.errors.job_description }}
                </div>
              </div>

              <!-- Application URL -->
              <div class="mt-6">
                <label
                  for="application_url"
                  class="block text-sm font-medium text-gray-700 mb-2"
                >
                  Application URL
                </label>
                <input
                  v-model="form.application_url"
                  type="url"
                  id="application_url"
                  placeholder="https://..."
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  :class="{ 'border-red-500': form.errors.application_url }"
                />
                <div
                  v-if="form.errors.application_url"
                  class="mt-1 text-sm text-red-600"
                >
                  {{ form.errors.application_url }}
                </div>
              </div>
            </div>

            <!-- Application Status & Dates -->
            <div class="border-b border-gray-200 pb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">
                Application Status & Dates
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Status -->
                <div>
                  <label
                    for="status"
                    class="block text-sm font-medium text-gray-700 mb-2"
                  >
                    Status *
                  </label>
                  <select
                    v-model="form.status"
                    id="status"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    :class="{ 'border-red-500': form.errors.status }"
                  >
                    <option
                      v-for="option in statusOptions"
                      :key="option.value"
                      :value="option.value"
                    >
                      {{ option.label }}
                    </option>
                  </select>
                  <div
                    v-if="form.errors.status"
                    class="mt-1 text-sm text-red-600"
                  >
                    {{ form.errors.status }}
                  </div>
                </div>

                <!-- Applied Date -->
                <div>
                  <label
                    for="applied_date"
                    class="block text-sm font-medium text-gray-700 mb-2"
                  >
                    Applied Date *
                  </label>
                  <input
                    v-model="form.applied_date"
                    type="date"
                    id="applied_date"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    :class="{ 'border-red-500': form.errors.applied_date }"
                  />
                  <div
                    v-if="form.errors.applied_date"
                    class="mt-1 text-sm text-red-600"
                  >
                    {{ form.errors.applied_date }}
                  </div>
                </div>
              </div>
            </div>

            <!-- Notes -->
            <div>
              <h3 class="text-lg font-medium text-gray-900 mb-4">
                Additional Notes
              </h3>
              <div>
                <label
                  for="notes"
                  class="block text-sm font-medium text-gray-700 mb-2"
                >
                  Notes
                </label>
                <textarea
                  v-model="form.notes"
                  id="notes"
                  rows="4"
                  placeholder="Any additional notes about this application..."
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                  :class="{ 'border-red-500': form.errors.notes }"
                ></textarea>
                <div v-if="form.errors.notes" class="mt-1 text-sm text-red-600">
                  {{ form.errors.notes }}
                </div>
              </div>
            </div>

            <!-- Form Actions -->
            <div
              class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200"
            >
              <Link
                :href="route('job-applications.index')"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Cancel
              </Link>
              <button
                type="submit"
                :disabled="form.processing"
                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
              >
                <span v-if="form.processing">Creating...</span>
                <span v-else>Create Application</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
