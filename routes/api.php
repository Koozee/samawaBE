<?php

use App\Http\Controllers\Api\BookingTransactionController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\WeddingOrganizerController;
use App\Http\Controllers\Api\WeddingPackagesController;
use App\Http\Controllers\Api\WeddingTestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('city/{city:slug}', [CityController::class, 'show']);
Route::apiResource('cities', CityController::class);

Route::get('wedding-organizer/{weddingOrganizer:slug}', [WeddingOrganizerController::class, 'show']);
Route::apiResource('wedding-organizers', WeddingOrganizerController::class);

Route::get('wedding-packages/popular', [WeddingPackagesController::class, 'popular']);
Route::get('wedding-package/{weddingPackage:slug}', [WeddingPackagesController::class, 'show']);
Route::apiResource('wedding-packages', WeddingPackagesController::class);

Route::apiResource('wedding-testimonials', WeddingTestimonialController::class);

Route::post('booking-transaction', [BookingTransactionController::class, 'store']);
Route::post('check-booking', [BookingTransactionController::class, 'booking_details']);