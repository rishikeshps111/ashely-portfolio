<?php

use App\Models\Project;
use Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting;

if (!function_exists('generalSetting')) {
    /**
     * Get a general setting value by key.
     *
     * Example:
     * general_setting('site_name');
     * general_setting('social_network.facebook');
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    function generalSetting(?string $key = null, $default = null)
    {
        static $settings;
        if (!$settings) {
            $settings = GeneralSetting::first();
        }
        if (!$settings) {
            return $default;
        }
        $settingsArray = $settings->toArray();
        if (!$key) {
            return $settingsArray;
        }

        return data_get($settingsArray, $key, $default);
    }
}

if (!function_exists('latestActiveProjects')) {
    /**
     * Get the latest active 5 projects.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function latestActiveProjects(int $limit = 5)
    {
        return Project::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
}

if (!function_exists('styledTitle')) {
    function styledTitle($title)
    {
        $words = explode(' ', trim($title));
        $lastWord = array_pop($words);

        return implode(' ', $words) . ' <span class="mil-thin">' . $lastWord . '</span>';
    }
}


if (!function_exists('getAdjacentProjects')) {
    /**
     * Get previous, all, and next project navigation items in a circular loop.
     *
     * @param Project $project
     * @return array
     */
    function getAdjacentProjects(Project $project): array
    {
        $projects = Project::where('is_active', 1)
            ->orderBy('id', 'asc')
            ->get(['id', 'slug', 'title']);

        if ($projects->isEmpty()) {
            return [];
        }

        // Find current project's position in list
        $index = $projects->search(fn($item) => $item->id === $project->id);

        // Handle previous (wrap if first)
        $previous = $index === 0
            ? $projects->last()
            : $projects[$index - 1];

        // Handle next (wrap if last)
        $next = $index === $projects->count() - 1
            ? $projects->first()
            : $projects[$index + 1];

        return [
            [
                'label' => 'Prev project',
                'type' => 'prev',
                'route' => route('projectDetails', $previous->slug),
                'iconClass' => 'mil-icon-left',
                'extraClass' => 'mil-arrow-place',
            ],
            [
                'label' => 'All projects',
                'type' => 'all',
                'route' => route('portfolio'),
                'iconClass' => '',
                'extraClass' => '',
            ],
            [
                'label' => 'Next project',
                'type' => 'next',
                'route' => route('projectDetails', $next->slug),
                'iconClass' => '',
                'extraClass' => 'mil-arrow-place',
            ],
        ];
    }
}
