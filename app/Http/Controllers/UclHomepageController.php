<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;
use Illuminate\Http\Request;

class UclHomepageController extends Controller
{
    /**
     * Display the public UCL Homepage with 100% live database data.
     */
    public function index(Request $request)
    {
        // Pure live database counts
        $frameworksCount         = Framework::count();
        $domainsCount            = Domain::count();
        $controlsCount           = Control::count();
        $requirementsCount       = Requirement::count();
        $mappedRequirementsCount = RequirementFrameworkMapping::count();

        // Dynamic Domains with controls count from database
        $domains = Domain::withCount('controls')
            ->orderBy('id', 'asc')
            ->get();

        // Dynamic Controls with domain and requirements count from database
        $controls = Control::with(['domain', 'requirements'])
            ->withCount('requirements')
            ->orderBy('id', 'asc')
            ->take(12)
            ->get();

        // Dynamic Frameworks with mapping count from database
        $frameworks = Framework::withCount('mappings')
            ->orderBy('id', 'asc')
            ->get();

        // Dynamic Controls for Comparison Matrix
        $comparisonControls = Control::with('requirements')
            ->orderBy('id', 'asc')
            ->take(5)
            ->get();

        return view('aspiaUcl.ucl_homepage', [
            'frameworksCount'         => $frameworksCount,
            'domainsCount'            => $domainsCount,
            'controlsCount'           => $controlsCount,
            'requirementsCount'       => $requirementsCount,
            'mappedRequirementsCount' => $mappedRequirementsCount,
            'domains'                 => $domains,
            'controls'                => $controls,
            'frameworks'              => $frameworks,
            'comparisonControls'      => $comparisonControls,
        ]);
    }
}
