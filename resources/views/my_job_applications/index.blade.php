<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My job applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex justify-between text-xs text-slate-500 items-center">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>

                    <div>
                        Your asking salary ${{ number_format($application->expected_salary) }}
                    </div>

                    <div>
                        Average asking salary
                        ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </div>

                    <div>
                        Number of applicants: {{ number_format($application->job->job_applications_count) }}
                    </div>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No job applications yet
            </div>
            <div class="text-center">
                Go find some jobs <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
