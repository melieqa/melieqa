@php
    $timeline = [
        [
            'period' => '2025 — Present',
            'role' => 'Freelance',
            'org' => 'Diagrams, visualisation and 3D modelling',
            'note' =>
                'For architecture studios and independent architects, from first concept diagram to final delivered set. Recent work includes Rhino modelling on 4 small-scale projects for Palette Visuals.',
        ],
        [
            'period' => '2025 — Present',
            'role' => 'Architectural Graphic Designer',
            'org' => 'Atelier Mehrkish · Remote, project-based',
            'note' =>
                'Developed analytical graphics for 12 architectural projects, helping design concepts become clearer for presentations and client communication.',
        ],
        [
            'period' => '2025 — Present',
            'role' => 'Teaching Assistant',
            'org' => 'Palette Academy',
            'note' => null,
        ],
        [
            'period' => '2022 — 2024',
            'role' => 'Independent study & professional development',
            'org' => 'Intensive German study, design research, environmental volunteering, travel across Iran',
            'note' => 'The visual and research habits behind my current work were built in these two years.',
        ],
        [
            'period' => '2020 - 2021',
            'role' => 'Architectural Intern',
            'org' => 'Souzandareh Co.',
            'note' => null,
        ],
    ];
@endphp

<ol class="list-none my-0 pl-0 relative border-l border-dashed border-line ml-2 md:ml-3">
    @foreach ($timeline as $entry)
        <li class="relative pl-6 md:pl-10 pb-10 last:pb-0">
            <span class="absolute -left-[5px] top-2 h-2 w-2 rotate-45 bg-klein-bright" aria-hidden="true"></span>

            <p class="text-xs md:text-sm uppercase tracking-[0.18em] text-paper-dim my-0">{{ $entry['period'] }}</p>

            <h3 class="text-lg md:text-xl font-semibold text-paper-bright mt-2 mb-1 leading-snug">{{ $entry['role'] }}
            </h3>

            <p class="text-sm text-paper my-0">{{ $entry['org'] }}</p>

            @if ($entry['note'])
                <p class="text-sm text-paper-dim mt-2 mb-0 max-w-2xl">{{ $entry['note'] }}</p>
            @endif
        </li>
    @endforeach
</ol>
