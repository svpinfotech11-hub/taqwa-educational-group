<?php

namespace App\Providers;

use App\Models\School;
use App\Models\NeetDomicile;
use App\Models\SchoolMember;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.navbar', function ($view) {
        $currentRoute = Route::currentRouteName(); // route name
        $school = null;

        $neetStates = NeetDomicile::orderBy('state_name')->get();

        if (in_array($currentRoute, ['pages.show', 'pages.detail-page'])) {
            // Determine school
            if (request()->route('slug')) { // show page
                $school = School::where('slug', request()->route('slug'))->first();
            } elseif (request()->route('id')) { // detail page
                $member = SchoolMember::find(request()->route('id'));
                if ($member) {
                    $school = School::find($member->school_id);
                }
            }
        }

        // Pass both variables to navbar
        $view->with([
            'school' => $school,
            'currentRoute' => $currentRoute,
            'neetStates' => $neetStates
        ]);
    });
    }
}
