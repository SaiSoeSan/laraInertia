<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <Head title="Job Tracker" />

  <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
          <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
              <div class="bg-indigo-600 rounded-lg p-2">
                <svg
                  class="w-6 h-6 text-white"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"
                  />
                </svg>
              </div>
              <h1 class="text-2xl font-bold text-gray-900">Job Tracker</h1>
            </div>
          </div>

          <nav v-if="canLogin" class="flex items-center space-x-4">
            <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard')"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium transition duration-200"
            >
              Dashboard
            </Link>
            <template v-else>
              <Link
                :href="route('login')"
                class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md font-medium transition duration-200"
              >
                Log in
              </Link>
              <Link
                v-if="canRegister"
                :href="route('register')"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium transition duration-200"
              >
                Register
              </Link>
            </template>
          </nav>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="text-center">
        <h1
          class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl"
        >
          Track Your
          <span class="text-indigo-600">Job Applications</span>
        </h1>
        <p
          class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl"
        >
          Keep track of all your job applications in one place. Monitor your
          progress, schedule interviews, and never miss an opportunity again.
        </p>
        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
          <div class="rounded-md shadow">
            <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard')"
              class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-200"
            >
              Go to Dashboard
            </Link>
            <Link
              v-else
              :href="route('register')"
              class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-200"
            >
              Get Started
            </Link>
          </div>
          <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
            <Link
              v-if="!$page.props.auth.user"
              :href="route('login')"
              class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition duration-200"
            >
              Sign In
            </Link>
          </div>
        </div>
      </div>

      <!-- Features Section -->
      <div class="mt-24">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900">
            Everything you need to manage your job search
          </h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            Powerful features to help you stay organized and land your dream
            job.
          </p>
        </div>

        <div class="mt-20">
          <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Feature 1 -->
            <div
              class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-200"
            >
              <div
                class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-md mb-4"
              >
                <svg
                  class="w-6 h-6 text-indigo-600"
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
              <h3 class="text-lg font-medium text-gray-900 mb-2">
                Add Applications
              </h3>
              <p class="text-gray-500">
                Easily add new job applications with company details, position,
                and application status.
              </p>
            </div>

            <!-- Feature 2 -->
            <div
              class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-200"
            >
              <div
                class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-md mb-4"
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
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-medium text-gray-900 mb-2">
                Track Progress
              </h3>
              <p class="text-gray-500">
                Monitor the status of each application from applied to interview
                to offer.
              </p>
            </div>

            <!-- Feature 3 -->
            <div
              class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-200"
            >
              <div
                class="flex items-center justify-center w-12 h-12 bg-yellow-100 rounded-md mb-4"
              >
                <svg
                  class="w-6 h-6 text-yellow-600"
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
              </div>
              <h3 class="text-lg font-medium text-gray-900 mb-2">
                Edit & Update
              </h3>
              <p class="text-gray-500">
                Update application details, add notes, and modify status as you
                progress.
              </p>
            </div>

            <!-- Feature 4 -->
            <div
              class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-200"
            >
              <div
                class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-md mb-4"
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
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-medium text-gray-900 mb-2">
                View Details
              </h3>
              <p class="text-gray-500">
                Get a comprehensive view of all your applications with detailed
                information.
              </p>
            </div>

            <!-- Feature 5 -->
            <div
              class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-200"
            >
              <div
                class="flex items-center justify-center w-12 h-12 bg-red-100 rounded-md mb-4"
              >
                <svg
                  class="w-6 h-6 text-red-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-medium text-gray-900 mb-2">
                Manage Applications
              </h3>
              <p class="text-gray-500">
                Delete outdated or irrelevant applications to keep your tracker
                clean.
              </p>
            </div>

            <!-- Feature 6 -->
            <div
              class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-200"
            >
              <div
                class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-md mb-4"
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
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-medium text-gray-900 mb-2">
                Stay Organized
              </h3>
              <p class="text-gray-500">
                Keep all your job search activities organized in one centralized
                location.
              </p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center">
          <p class="text-gray-500">
            Built with Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
          </p>
          <p class="text-sm text-gray-400 mt-2">
            Job Tracker - Your Personal Job Application Manager
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>
