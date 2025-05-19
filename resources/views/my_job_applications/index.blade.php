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
                <div>Rig</div>
            </div>
        </x-job-card>
    @empty
    @endforelse
</x-layout>
