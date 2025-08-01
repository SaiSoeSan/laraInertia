<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Dashboard - Job Tracker" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Job Tracker Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-8 overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6">
            <div class="flex items-center justify-between">
              <div>
                <h3 class="text-lg font-medium text-gray-900">
                  Welcome back, {{ $page.props.auth.user.name }}!
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Track and manage your job applications efficiently.
                </p>
              </div>
              <Link
                :href="route('job-applications.create')"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition"
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
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                  />
                </svg>
                Add New Application
              </Link>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
          <!-- View All Applications -->
          <Link
            :href="route('job-applications.index')"
            class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200"
          >
            <div class="p-6">
              <div class="flex items-center">
                <div
                  class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-md"
                >
                  <svg
                    class="w-6 h-6 text-blue-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                    />
                  </svg>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">
                    View Applications
                  </h3>
                  <p class="text-sm text-gray-600">
                    See all your job applications
                  </p>
                </div>
              </div>
            </div>
          </Link>

          <!-- Add New Application -->
          <Link
            :href="route('job-applications.create')"
            class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200"
          >
            <div class="p-6">
              <div class="flex items-center">
                <div
                  class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-md"
                >
                  <svg
                    class="w-6 h-6 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    />
                  </svg>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">
                    Add Application
                  </h3>
                  <p class="text-sm text-gray-600">
                    Create a new job application
                  </p>
                </div>
              </div>
            </div>
          </Link>

          <!-- Profile Settings -->
          <Link
            :href="route('profile.edit')"
            class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200"
          >
            <div class="p-6">
              <div class="flex items-center">
                <div
                  class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-md"
                >
                  <svg
                    class="w-6 h-6 text-purple-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">
                    Profile Settings
                  </h3>
                  <p class="text-sm text-gray-600">Manage your account</p>
                </div>
              </div>
            </div>
          </Link>
        </div>

        <!-- Recent Activity / Stats -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">
              Getting Started
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <h4 class="font-medium text-gray-900 mb-2">Quick Tips</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                  <li>• Add all your job applications to track progress</li>
                  <li>• Update status as you move through interview stages</li>
                  <li>• Add notes to remember important details</li>
                  <li>• Set interview dates to stay organized</li>
                </ul>
              </div>
              <div>
                <h4 class="font-medium text-gray-900 mb-2">
                  Application Status Options
                </h4>
                <div class="flex flex-wrap gap-2">
                  <span
                    class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800"
                    >Applied</span
                  >
                  <span
                    class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800"
                    >Phone Screen</span
                  >
                  <span
                    class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800"
                    >Interview</span
                  >
                  <span
                    class="px-2 py-1 text-xs rounded-full bg-indigo-100 text-indigo-800"
                    >Final Interview</span
                  >
                  <span
                    class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800"
                    >Offer</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
