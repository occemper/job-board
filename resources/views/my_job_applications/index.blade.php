<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My job applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job"></x-job-card>
    @empty
    @endforelse
</x-layout>
