<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\WeddingPackageResource;
use App\Models\WeddingPackage;
use Illuminate\Http\Request;

class WeddingPackagesController extends Controller
{
    public function index()
    {
        $weddingPackages = WeddingPackage::with([
            'city' => function ($query) {
                $query->withCount('weddingPackages');
            },
            'weddingOrganizer' => function ($query) {
                $query->withCount('weddingPackages');
            }
        ])->get();
        return WeddingPackageResource::collection($weddingPackages);
    }

    public function show(WeddingPackage $weddingPackage) // model binding (slug) -> otomatis query berdasarkan slug
    {
        $weddingPackage->load([
            'city',
            'photos',
            'weddingBonusPackages.bonusPackage',
            'weddingOrganizer',
            'weddingTestimonials'
        ]);
        $weddingPackage->weddingOrganizer->loadCount('weddingPackages');
        $weddingPackage->city->loadCount('weddingPackages');
        return new WeddingPackageResource($weddingPackage);
    }

    public function popular(Request $request)
    {
        $limit = $request->query('limit', 10); // default 10 if not specified
        $popularWeddingPackages = WeddingPackage::where('is_popular', true)->with([
            'city' => function ($query) {
                $query->withCount('weddingPackages');
            },
            'weddingOrganizer' => function ($query) {
                $query->withCount('weddingPackages');
            }
        ])->limit($limit)->get();
        return WeddingPackageResource::collection($popularWeddingPackages);
    }
}
